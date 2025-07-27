@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-2 md:px-6">
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-blue-100 p-8 flex flex-col gap-8 animate-doc-fade">
        <h2 class="text-3xl font-extrabold text-blue-700 mb-4 tracking-tight">Testing Documentation</h2>
        <form method="POST" action="{{ route('testing.store') }}" class="flex flex-col gap-6"
            x-data="{
                steps: [{step: 1, details: '', expected: '', result: '', actual: ''}],
                addStep() {
                    this.steps.push({step: this.steps.length+1, details: '', expected: '', result: '', actual: ''});
                },
                removeStep(i) {
                    this.steps.splice(i, 1);
                    // إعادة ترقيم الخطوات بعد الحذف
                    this.steps.forEach((s, idx) => s.step = idx+1);
                }
            }"
        >
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block mb-1 text-base font-semibold text-blue-700" for="documentation_id">Select Project <span class="text-red-500">*</span></label>
                    <select id="documentation_id" name="documentation_id" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" required>
                        <option value="" disabled selected>Select a project...</option>
                        @foreach(App\Models\Documentation::all() as $doc)
                            <option value="{{ $doc->id }}">{{ $doc->title ?? $doc->project_name ?? 'Doc #'.$doc->id }}</option>
                        @endforeach
                    </select>
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
    </div>
</div>
@endsection
