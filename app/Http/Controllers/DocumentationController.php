<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use App\Models\DocumentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\OpenAIService;

class DocumentationController extends Controller
{
    public function index()
    {
        $engineeringDocs = \App\Models\EngineeringDocumentation::whereHas('documentation', function($q) {
            $q->where('user_id', Auth::id());
        })->get();
        $bestPracticeDocs = \App\Models\BestPracticeDocumentation::whereHas('documentation', function($q) {
            $q->where('user_id', Auth::id());
        })->get();
        // دمج النتائج في مجموعة واحدة مع نوع التوثيق
        $docs = collect();
        foreach ($engineeringDocs as $doc) {
            $doc->doc_type = 'engineering';
            $docs->push($doc);
        }
        foreach ($bestPracticeDocs as $doc) {
            $doc->doc_type = 'bestpractice';
            $docs->push($doc);
        }
        // ترتيب حسب الأحدث
        $docs = $docs->sortByDesc('created_at');
        return view('docs.index', compact('docs'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('docs.create', compact('user'));
    }

    public function store(Request $request)
    {
        // Check which template is being submitted
        if ($request->has('title')) {
            // Engineering template
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'purpose' => 'nullable|string',
                'scope' => 'nullable|string',
                'definitions' => 'nullable|string',
                'overall_description' => 'nullable|string',
                'product_perspective' => 'nullable|string',
                'user_classes' => 'nullable|string',
                'operating_environment' => 'nullable|string',
                'constraints' => 'nullable|string',
                'assumptions' => 'nullable|string',
                'functional_requirements' => 'nullable|string',
                'nonfunctional_requirements' => 'nullable|string',
                'use_cases' => 'nullable|string',
                'data_model' => 'nullable|string',
                'interface_requirements' => 'nullable|string',
                'appendices' => 'nullable|string',
                'compliance_report' => 'nullable|string',
                'database_tables' => 'nullable|string',
                'ui_ux' => 'nullable|string',
                'conclusion' => 'nullable|string',
            ]);
            // إنشاء سجل documentation أولاً
            $docMain = \App\Models\Documentation::create([
                'title' => $data['title'],
                'user_id' => Auth::id(),
                'doc_type' => 'engineering',
            ]);
            // تجهيز بيانات الجدول الفرعي فقط
            $engineeringData = collect($data)
                ->except(['title', 'user_id'])
                ->toArray();
            $engineeringData['documentation_id'] = $docMain->id;
            $doc = \App\Models\EngineeringDocumentation::create($engineeringData);
            // سجل العملية في history
            DocumentHistory::create([
                'documentation_id' => $docMain->id,
                'user_id' => Auth::id(),
                'action' => 'create',
                'changes' => json_encode(collect($data)->except(['title', 'user_id'])->toArray()),
            ]);
            return redirect()->route('docs.index')->with('message', 'Engineering documentation created successfully.');
        } else if ($request->has('project_name')) {
            // Best Practice template
            $data = $request->validate([
                'project_name' => 'required|string|max:255',
                'project_overview' => 'nullable|string',
                'stakeholders' => 'nullable|string',
                'business_goals' => 'nullable|string',
                'deliverables' => 'nullable|string',
                'timeline' => 'nullable|string',
                'architecture' => 'nullable|string',
                'risks' => 'nullable|string',
                'deployment' => 'nullable|string',
                'lessons' => 'nullable|string',
            ]);
            $docMain = \App\Models\Documentation::create([
                'title' => $data['project_name'],
                'user_id' => Auth::id(),
                'doc_type' => 'bestpractice',
            ]);
            // تجهيز بيانات الجدول الفرعي فقط
            $bestPracticeData = collect($data)
                ->except(['project_name', 'user_id'])
                ->toArray();
            $bestPracticeData['documentation_id'] = $docMain->id;
            $doc = \App\Models\BestPracticeDocumentation::create($bestPracticeData);
            DocumentHistory::create([
                'documentation_id' => $docMain->id,
                'user_id' => Auth::id(),
                'action' => 'create',
                'changes' => json_encode(collect($data)->except(['project_name', 'user_id'])->toArray()),
            ]);
            return redirect()->route('docs.index')->with('message', 'Best Practice documentation created successfully.');
        }
        return redirect()->route('docs.index')->with('message', 'لم يتم تحديد نموذج التوثيق.');
    }


    public function show(Request $request, $id)
    {
        $type = $request->query('type');
        if ($type === 'engineering') {
            $doc = \App\Models\EngineeringDocumentation::with('documentation.user')->findOrFail($id);
        } elseif ($type === 'bestpractice') {
            $doc = \App\Models\BestPracticeDocumentation::with('documentation.user')->findOrFail($id);
        } else {
            abort(404, 'نوع التوثيق غير معروف');
        }
        return view('docs.show', compact('doc'));
    }


    public function edit(Request $request, $id)
    {
        $type = $request->query('type');
        if ($type === 'engineering') {
            $doc = \App\Models\EngineeringDocumentation::with('documentation.user')->findOrFail($id);
        } elseif ($type === 'bestpractice') {
            $doc = \App\Models\BestPracticeDocumentation::with('documentation.user')->findOrFail($id);
        } else {
            abort(404, 'نوع التوثيق غير معروف');
        }
        return view('docs.edit', compact('doc'));
    }

    public function update(Request $request, $id)
    {
        try {
            // $id هنا يشير إلى documentation_id (الجدول الرئيسي)
            $docMain = \App\Models\Documentation::findOrFail($id);
            $user = Auth::user();
            
            $data = $request->all();
            
            // تحديث الجدول الرئيسي
            $titleField = '';
            if ($docMain->doc_type === 'engineering') {
                $titleField = $data['title'] ?? $docMain->title;
            } elseif ($docMain->doc_type === 'bestpractice') {
                $titleField = $data['project_name'] ?? $data['title'] ?? $docMain->title;
            }
            
            $docMain->update([
                'title' => $titleField,
                'updated_at' => now(),
            ]);
            
            // تحديث الجدول الفرعي حسب النوع
            $subDocId = null;
            if ($docMain->doc_type === 'engineering') {
                $doc = \App\Models\EngineeringDocumentation::where('documentation_id', $docMain->id)->first();
                if ($doc) {
                    // فقط الحقول الخاصة بـ Engineering Documentation
                    $engineeringFields = [
                        'purpose', 'scope', 'definitions', 'overall_description', 
                        'product_perspective', 'user_classes', 'operating_environment',
                        'constraints', 'assumptions', 'functional_requirements',
                        'nonfunctional_requirements', 'use_cases', 'data_model',
                        'interface_requirements', 'appendices', 'compliance_report',
                        'database_tables', 'ui_ux', 'conclusion', 'content'
                    ];
                    
                    $engineeringData = collect($data)->only($engineeringFields)->toArray();
                    $doc->update($engineeringData);
                    $subDocId = $doc->id;
                }
            } elseif ($docMain->doc_type === 'bestpractice') {
                $doc = \App\Models\BestPracticeDocumentation::where('documentation_id', $docMain->id)->first();
                if ($doc) {
                    // فقط الحقول الخاصة بـ Best Practice Documentation
                    $bestPracticeFields = [
                        'project_overview', 'stakeholders', 'business_goals',
                        'deliverables', 'timeline', 'architecture', 
                        'risks', 'deployment', 'lessons'
                    ];
                    
                    $bestPracticeData = collect($data)->only($bestPracticeFields)->toArray();
                    $doc->update($bestPracticeData);
                    $subDocId = $doc->id;
                }
            }
            
            // سجل العملية في history
            DocumentHistory::create([
                'documentation_id' => $docMain->id,
                'user_id' => $user->id,
                'action' => 'update',
                'changes' => json_encode(['updated_at' => now()]),
            ]);
            
            // استخدام ID السجل الفرعي في التوجيه
            return redirect()->route('docs.show', ['id' => $subDocId, 'type' => $docMain->doc_type])
                             ->with('message', 'تم حفظ التعديلات بنجاح! ✅');
                             
        } catch (\Exception $e) {
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'حدث خطأ أثناء الحفظ: ' . $e->getMessage());
        }
    }


    public function destroy(Request $request, $id)
    {
        $user = Auth::user();
        $docMain = \App\Models\Documentation::findOrFail($id);
        // جميع المستخدمين لهم كامل الصلاحيات
        
        // حذف جميع السجلات المرتبطة
        if ($docMain->doc_type === 'engineering') {
            \App\Models\EngineeringDocumentation::where('documentation_id', $docMain->id)->delete();
        } elseif ($docMain->doc_type === 'bestpractice') {
            \App\Models\BestPracticeDocumentation::where('documentation_id', $docMain->id)->delete();
        }
        $docMain->delete();
        return redirect()->route('docs.index')->with('message', 'تم حذف التوثيق.');
    }
}
