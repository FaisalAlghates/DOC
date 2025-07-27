@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-2 md:px-6">
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-purple-100 p-8 flex flex-col gap-8 animate-doc-fade">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-extrabold text-purple-700 tracking-tight">Testing Management</h2>
            <a href="{{ route('testing.create') }}" class="flex items-center justify-center w-14 h-14 rounded-full bg-gradient-to-br from-purple-500 to-purple-700 shadow-lg hover:scale-110 hover:shadow-2xl transition-all duration-200 focus:outline-none mr-4" title="Add New Test">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </a>
        </div>
        <form method="GET" action="" class="mb-6 flex flex-wrap gap-4 items-center">
            <label for="project" class="font-semibold text-purple-700">Filter by Project:</label>
            <select name="project" id="project" class="border border-purple-200 rounded-lg py-2 px-4 bg-white" onchange="this.form.submit()">
                <option value="">All Projects</option>
                @foreach($projects ?? [] as $project)
                    <option value="{{ $project->id }}" @if(isset($projectId) && $projectId == $project->id) selected @endif>
                        {{ $project->title ?? $project->project_name ?? 'Doc #'.$project->id }}
                    </option>
                @endforeach
            </select>
        </form>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-xl border border-purple-100">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-purple-700 font-bold">#</th>
                        <th class="px-4 py-2 text-purple-700 font-bold">Documentation</th>
                        <th class="px-4 py-2 text-purple-700 font-bold">Test Type</th>
                        <th class="px-4 py-2 text-purple-700 font-bold">Description</th>
                        <th class="px-4 py-2 text-purple-700 font-bold">Results</th>
                    <th class="px-4 py-2 text-purple-700 font-bold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach(App\Models\Testing::latest()->get() as $test)
                    <tr class="border-b border-purple-50 hover:bg-purple-50/40 transition">
                        <td class="px-4 py-2">{{ $test->id }}</td>
                        <td class="px-4 py-2">{{ optional($test->documentation)->title ?? optional($test->documentation)->project_name ?? 'Doc #'.$test->documentation_id }}</td>
                        <td class="px-4 py-2">{{ $test->test_type }}</td>
                        <td class="px-4 py-2">{{ $test->test_description }}</td>
                        <td class="px-4 py-2">{{ $test->test_results }}</td>
                        <td class="px-4 py-2 flex flex-col gap-2 items-center">
                            <a href="{{ route('testing.show', $test->id) }}" class="inline-flex items-center gap-1 px-3 py-1 rounded-lg bg-blue-100 text-blue-700 font-semibold text-sm shadow hover:bg-blue-200 hover:scale-105 transition-all duration-150 mb-1" title="View">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                View
                            </a>
                            <a href="{{ route('testing.edit', $test->id) }}" class="inline-flex items-center gap-1 px-3 py-1 rounded-lg bg-yellow-100 text-yellow-800 font-semibold text-sm shadow hover:bg-yellow-200 hover:scale-105 transition-all duration-150 mb-1" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13h3l8-8a2.828 2.828 0 10-4-4l-8 8v3z" /></svg>
                                Edit
                            </a>
                            <form action="{{ route('testing.destroy', $test->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1 px-3 py-1 rounded-lg bg-red-100 text-red-700 font-semibold text-sm shadow hover:bg-red-200 hover:scale-105 transition-all duration-150" title="Delete" onclick="return confirm('Are you sure you want to delete this test?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
