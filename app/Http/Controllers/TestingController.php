<?php

namespace App\Http\Controllers;

use App\Models\Testing;
use App\Models\DocumentHistory;
use App\Models\Documentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TestingController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        // All users have full permissions
        
        $data = $request->validate([
            'documentation_id' => 'required|exists:documentations,id',
            'test_type' => 'nullable|string|max:255',
            'test_description' => 'nullable|string',
            'test_results' => 'nullable|string',
            'test_case_id' => 'nullable|string|max:255',
            'test_case_description' => 'nullable|string',
            'created_by' => 'nullable|string',
            'revised_by' => 'nullable|string',
            'priority' => 'nullable|string',
            'tester_name' => 'nullable|string',
            'date_tested' => 'nullable|date',
            'test_execution_status' => 'nullable|string',
            'prerequisites' => 'nullable',
            'steps' => 'nullable',
        ]);

        // Check if project exists (All users have full permissions)
        $project = \App\Models\Documentation::findOrFail($data['documentation_id']);

        // Add user_id to the data
        $data['user_id'] = $user->id;

        // Convert prerequisites to array if it's a string
        if (isset($data['prerequisites']) && is_string($data['prerequisites'])) {
            $data['prerequisites'] = array_filter(array_map('trim', explode("\n", $data['prerequisites'])));
        }

        // Convert steps to array if not already
        if (isset($data['steps']) && is_string($data['steps'])) {
            $data['steps'] = json_decode($data['steps'], true);
        }

        $test = new \App\Models\Testing($data);
        $test->save();
        // Record the operation in history
        $doc = Documentation::find($test->documentation_id);
        if ($doc) {
            DocumentHistory::create([
                'documentation_id' => $doc->id,
                'user_id' => $user->id,
                'action' => 'add_test',
                'changes' => json_encode($data),
            ]);
        }
        return redirect()->route('testing.index')->with('message', 'Test added successfully to project: ' . $project->title);
    }
    public function index(Request $request)
    {
        $projectId = $request->get('project');
        $query = Testing::latest();
        if ($projectId) {
            $query->where('documentation_id', $projectId);
        }
        $tests = $query->get();
        $projects = \App\Models\Documentation::all();
        return view('testing.index', compact('tests', 'projects', 'projectId'));
    }

    public function create()
    {
        $user = Auth::user();
        // جميع المستخدمين لهم كامل الصلاحيات
        
        // جلب جميع المشاريع المتاحة
        $projects = \App\Models\Documentation::all();
        return view('testing.create', compact('projects'));
    }

    public function show($id)
    {
        $test = Testing::findOrFail($id);
        return view('testing.show', compact('test'));
    }

    public function edit($id)
    {
        $test = Testing::findOrFail($id);
        return view('testing.edit', compact('test'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        // جميع المستخدمين لهم كامل الصلاحيات
        
        $test = Testing::findOrFail($id);
        $data = $request->validate([
            'documentation_id' => 'required|exists:documentations,id',
            'test_type' => 'nullable|string|max:255',
            'test_description' => 'nullable|string',
            'test_results' => 'nullable|string',
            'test_case_id' => 'nullable|string|max:255',
            'test_case_description' => 'nullable|string',
            'created_by' => 'nullable|string',
            'revised_by' => 'nullable|string',
            'priority' => 'nullable|string',
            'tester_name' => 'nullable|string',
            'date_tested' => 'nullable|date',
            'test_execution_status' => 'nullable|string',
            'prerequisites' => 'nullable',
            'steps' => 'nullable',
        ]);

        if (isset($data['prerequisites']) && is_string($data['prerequisites'])) {
            $data['prerequisites'] = array_filter(array_map('trim', explode("\n", $data['prerequisites'])));
        }
        if (isset($data['steps']) && is_string($data['steps'])) {
            $data['steps'] = json_decode($data['steps'], true);
        }

        $test->update($data);
        // Record the operation in history
        $doc = Documentation::find($test->documentation_id);
        if ($doc) {
            DocumentHistory::create([
                'documentation_id' => $doc->id,
                'user_id' => $user->id,
                'action' => 'update_test',
                'changes' => json_encode($data),
            ]);
        }
        return redirect()->route('testing.index')->with('message', 'Test updated successfully.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        // جميع المستخدمين لهم كامل الصلاحيات
        
        $test = Testing::findOrFail($id);
        $test->delete();
        return redirect()->route('testing.index')->with('message', 'Test deleted successfully.');
    }
}
