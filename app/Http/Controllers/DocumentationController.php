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
        $engineeringDocs = \App\Models\EngineeringDocumentation::where('user_id', Auth::id())->get();
        $bestPracticeDocs = \App\Models\BestPracticeDocumentation::where('user_id', Auth::id())->get();
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
            $data['user_id'] = Auth::id();
            $doc = \App\Models\EngineeringDocumentation::create($data);
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
            $data['user_id'] = Auth::id();
            $doc = \App\Models\BestPracticeDocumentation::create($data);
            return redirect()->route('docs.index')->with('message', 'Best Practice documentation created successfully.');
        }
        return redirect()->route('docs.index')->with('message', 'لم يتم تحديد نموذج التوثيق.');
    }

    public function show($id)
    {
        $doc = Documentation::findOrFail($id);
        return view('docs.show', compact('doc'));
    }

    public function edit($id)
    {
        $doc = Documentation::findOrFail($id);
        return view('docs.edit', compact('doc'));
    }

    public function update(Request $request, $id)
    {
        $doc = Documentation::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $doc->update($data);
        return redirect()->route('docs.index')->with('message', 'تم تحديث التوثيق بنجاح.');
    }

    public function destroy($id)
    {
        $doc = Documentation::findOrFail($id);
        $doc->delete();
        return redirect()->route('docs.index')->with('message', 'تم حذف التوثيق.');
    }
}
