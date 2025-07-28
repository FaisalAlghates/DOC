<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
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
                'description' => $data['purpose'] ?? '',
                'doc_type' => 'engineering',
                'user_id' => Auth::id(),
            ]);
            // تجهيز بيانات الجدول الفرعي فقط
            $engineeringData = collect($data)
                ->except(['title', 'user_id'])
                ->toArray();
            $engineeringData['documentation_id'] = $docMain->id;
            $doc = \App\Models\EngineeringDocumentation::create($engineeringData);
            // سجل العملية في history
            \App\Models\DocumentHistory::create([
                'documentation_id' => $docMain->id,
                'user_id' => Auth::id(),
                'action' => 'create',
                'changes' => json_encode($engineeringData),
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
                'description' => $data['project_overview'] ?? '',
                'doc_type' => 'bestpractice',
                'user_id' => Auth::id(),
            ]);
            // تجهيز بيانات الجدول الفرعي فقط
            $bestPracticeData = collect($data)
                ->except(['project_name', 'project_overview', 'user_id'])
                ->toArray();
            $bestPracticeData['documentation_id'] = $docMain->id;
            $doc = \App\Models\BestPracticeDocumentation::create($bestPracticeData);
            \App\Models\DocumentHistory::create([
                'documentation_id' => $docMain->id,
                'user_id' => Auth::id(),
                'action' => 'create',
                'changes' => json_encode($bestPracticeData),
            ]);
            return redirect()->route('docs.index')->with('message', 'Best Practice documentation created successfully.');
        }
        return redirect()->route('docs.index')->with('message', 'لم يتم تحديد نموذج التوثيق.');
    }


    public function show(Request $request, $id)
    {
        $type = $request->query('type');
        if ($type === 'engineering') {
            $doc = \App\Models\EngineeringDocumentation::findOrFail($id);
        } elseif ($type === 'bestpractice') {
            $doc = \App\Models\BestPracticeDocumentation::findOrFail($id);
        } else {
            abort(404, 'نوع التوثيق غير معروف');
        }
        return view('docs.show', compact('doc'));
    }


    public function edit(Request $request, $id)
    {
        $type = $request->query('type');
        if ($type === 'engineering') {
            $doc = \App\Models\EngineeringDocumentation::findOrFail($id);
        } elseif ($type === 'bestpractice') {
            $doc = \App\Models\BestPracticeDocumentation::findOrFail($id);
        } else {
            abort(404, 'نوع التوثيق غير معروف');
        }
        return view('docs.edit', compact('doc'));
    }

    public function update(Request $request, $id)
    {
        $docMain = \App\Models\Documentation::findOrFail($id);
        // فقط المالك أو صاحب الوثيقة أو المطور على وثيقته يمكنه التعديل
        $user = Auth::user();
        if ($user->role === 'developer' && $docMain->user_id !== $user->id) {
            abort(403, 'غير مصرح لك بالتعديل على هذه الوثيقة');
        }
        $data = $request->all();
        // تحديث الجدول الرئيسي
        $docMain->update([
            'title' => $data['title'] ?? $docMain->title,
            'description' => $data['purpose'] ?? $docMain->description,
        ]);
        // تحديث الجدول الفرعي حسب النوع
        if ($docMain->doc_type === 'engineering') {
            $doc = \App\Models\EngineeringDocumentation::where('documentation_id', $docMain->id)->first();
            $doc->update($data);
        } elseif ($docMain->doc_type === 'bestpractice') {
            $doc = \App\Models\BestPracticeDocumentation::where('documentation_id', $docMain->id)->first();
            $doc->update($data);
        }
        // سجل العملية في history
        \App\Models\DocumentHistory::create([
            'documentation_id' => $docMain->id,
            'user_id' => $user->id,
            'action' => 'update',
            'changes' => json_encode($data),
        ]);
        return redirect()->route('docs.index')->with('message', 'تم تحديث التوثيق بنجاح.');
    }


    public function destroy(Request $request, $id)
    {
        $user = Auth::user();
        $docMain = \App\Models\Documentation::findOrFail($id);
        // فقط المالك يمكنه الحذف
        if ($user->role !== 'owner') {
            abort(403, 'غير مصرح لك بحذف هذه الوثيقة');
        }
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
