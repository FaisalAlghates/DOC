<?php

namespace App\Http\Controllers;

use App\Models\Testing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TestingController extends Controller
{
    public function store(Request $request)
    {
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

        // Convert prerequisites to array if not already
        if (isset($data['prerequisites']) && is_string($data['prerequisites'])) {
            $data['prerequisites'] = array_filter(array_map('trim', explode("\n", $data['prerequisites'])));
        }

        // Convert steps to array if not already
        if (isset($data['steps']) && is_string($data['steps'])) {
            $data['steps'] = json_decode($data['steps'], true);
        }

        $test = new \App\Models\Testing($data);
        $test->save();
        return redirect()->route('testing.index')->with('message', 'Test added successfully.');
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
        return redirect()->route('testing.index')->with('message', 'Test updated successfully.');
    }

    public function destroy($id)
    {
        $test = Testing::findOrFail($id);
        $test->delete();
        return redirect()->route('testing.index')->with('message', 'Test deleted successfully.');
    }
}
