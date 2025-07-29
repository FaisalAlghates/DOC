@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-2 md:px-6">
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-blue-100 p-8 flex flex-col gap-8 animate-doc-fade">
        <h2 class="text-3xl font-extrabold text-blue-700 mb-4 tracking-tight">Testing Documentation</h2>
        <form method="POST" action="{{ route('testing.store') }}" class="flex flex-col gap-6"
            x-data="{
                steps: [{step: 1, details: '', expected: '', result: '', actual: ''}],
                projectSelected: false,
                addStep() {
                    this.steps.push({step: this.steps.length+1, details: '', expected: '', result: '', actual: ''});
                },
                removeStep(i) {
                    this.steps.splice(i, 1);
                    // Re-number steps after deletion
                    this.steps.forEach((s, idx) => s.step = idx+1);
                },
                selectProject() {
                    this.projectSelected = document.getElementById('documentation_id').value !== '';
                }
            }"
        >
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block mb-1 text-base font-semibold text-blue-700" for="documentation_id">Choose Project <span class="text-red-500">*</span></label>
                    @if($projects->count() > 0)
                        <select id="documentation_id" name="documentation_id" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200" required onchange="showProjectInfo(this); selectProject()">
                            <option value="" disabled selected>Choose the project you want to add a test to...</option>
                            @foreach($projects as $doc)
                                <option value="{{ $doc->id }}" data-user="Created by: {{ $doc->user->name ?? 'Not specified' }}" data-created="Creation Date: {{ $doc->created_at->format('d/m/Y') }}">{{ $doc->title }} (#{{ $doc->id }})</option>
                            @endforeach
                        </select>
                        <div id="project-info" class="text-sm text-gray-600 mt-2 hidden">
                            <p id="project-details"></p>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Select the project you want this test to belong to</p>
                    @else
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 text-center">
                            <svg class="mx-auto h-12 w-12 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-yellow-800">No projects available</h3>
                            <p class="mt-2 text-yellow-700">You must create a project first before adding tests to it.</p>
                            <a href="{{ route('docs.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Create New Project
                            </a>
                        </div>
                    @endif
                </div>
                <div>
                    <label class="block mb-1 text-base font-semibold text-blue-700" for="test_case_id">Test Case ID</label>
                    <input id="test_case_id" name="test_case_id" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" required>
                </div>
                <div>
                    <label class="block mb-1 text-base font-semibold text-blue-700" for="test_case_description">Test Case Description</label>
                    <input id="test_case_description" name="test_case_description" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" required>
                </div>
                <div>
                    <label class="block mb-1 text-base font-semibold text-blue-700" for="created_by">Created By</label>
                    <input id="created_by" name="created_by" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" required>
                </div>
                <div>
                    <label class="block mb-1 text-base font-semibold text-blue-700" for="revised_by">Revised By</label>
                    <input id="revised_by" name="revised_by" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white">
                </div>
                <div>
                    <label class="block mb-1 text-base font-semibold text-blue-700" for="priority">Priority</label>
                    <input id="priority" name="priority" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white">
                </div>
                <div>
                    <label class="block mb-1 text-base font-semibold text-blue-700" for="tester_name">Tester's Name</label>
                    <input id="tester_name" name="tester_name" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white">
                </div>
                <div>
                    <label class="block mb-1 text-base font-semibold text-blue-700" for="date_tested">Date Tested</label>
                    <input id="date_tested" name="date_tested" type="date" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white">
                </div>
                <div>
                    <label class="block mb-1 text-base font-semibold text-blue-700" for="test_execution_status">Test Execution Status</label>
                    <input id="test_execution_status" name="test_execution_status" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white">
                </div>
            </div>
            <div>
                <label class="block mb-1 text-base font-semibold text-blue-700">Prerequisites</label>
                <textarea name="prerequisites" rows="2" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" placeholder="List prerequisites, one per line"></textarea>
            </div>
            <div>
                <label class="block mb-1 text-base font-semibold text-blue-700">Test Steps</label>
                <table class="w-full border text-sm">
                    <thead>
                        <tr class="bg-blue-50">
                            <th class="border px-2 py-1">Step #</th>
                            <th class="border px-2 py-1">Step Details</th>
                            <th class="border px-2 py-1">Expected Results</th>
                            <th class="border px-2 py-1">Pass / Fail / Not executed / Paused</th>
                            <th class="border px-2 py-1">Actual Results if Fail</th>
                            <th class="border px-2 py-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(step, i) in steps" :key="i">
                            <tr>
                                <td class="border px-2 py-1 text-center font-bold">
                                    <span x-text="i+1"></span>
                                    <input type="hidden" :name="'steps['+i+'][step]'" :value="i+1">
                                </td>
                                <td class="border px-2 py-1">
                                    <input type="text" :name="'steps['+i+'][details]'" x-model="step.details" class="w-full border rounded px-1 py-1" placeholder="Step details...">
                                </td>
                                <td class="border px-2 py-1">
                                    <input type="text" :name="'steps['+i+'][expected]'" x-model="step.expected" class="w-full border rounded px-1 py-1" placeholder="Expected result...">
                                </td>
                                <td class="border px-2 py-1">
                                    <input type="text" :name="'steps['+i+'][result]'" x-model="step.result" class="w-full border rounded px-1 py-1" placeholder="Pass / Fail / ...">
                                </td>
                                <td class="border px-2 py-1">
                                    <input type="text" :name="'steps['+i+'][actual]'" x-model="step.actual" class="w-full border rounded px-1 py-1" placeholder="Actual result if fail...">
                                </td>
                                <td class="border px-2 py-1 text-center">
                                    <button type="button" @click="removeStep(i)" class="text-red-600 hover:text-red-900 font-bold text-lg" x-show="steps.length > 1">&times;</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
                <button type="button" @click="addStep()" class="mt-2 px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200">+ Add Step</button>
            </div>
            <button type="submit" class="doc-btn bg-black hover:bg-gray-900">Save Test</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <script>
            function showProjectInfo(select) {
                const option = select.options[select.selectedIndex];
                const infoDiv = document.getElementById('project-info');
                const detailsP = document.getElementById('project-details');
                
                if (option.value) {
                    const userInfo = option.getAttribute('data-user');
                    const createdInfo = option.getAttribute('data-created');
                    detailsP.innerHTML = `${userInfo} | ${createdInfo}`;
                    infoDiv.classList.remove('hidden');
                } else {
                    infoDiv.classList.add('hidden');
                }
            }
        </script>
    </div>
</div>
@endsection
