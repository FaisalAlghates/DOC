@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white rounded-lg shadow-lg p-8">
    <h1 class="text-2xl font-bold text-purple-700 mb-6">Edit Test</h1>
    @php
        $stepsJson = $test->steps ?? [['step'=>1,'details'=>'','expected'=>'','result'=>'','actual'=>'']];
    @endphp
    <form action="{{ route('testing.update', $test->id) }}" method="POST" class="flex flex-col gap-6"
        x-data='{
            steps: @json($stepsJson),
            addStep() {
                this.steps.push({step: this.steps.length+1, details: "", expected: "", result: "", actual: ""});
            },
            removeStep(i) {
                this.steps.splice(i, 1);
                this.steps.forEach((s, idx) => s.step = idx+1);
            }
        }'>
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block mb-1 text-base font-semibold text-blue-700" for="documentation_id">Select Project <span class="text-red-500">*</span></label>
                <select id="documentation_id" name="documentation_id" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" required>
                    <option value="" disabled>Select a project...</option>
                    @foreach(App\Models\Documentation::all() as $doc)
                        <option value="{{ $doc->id }}" @if($test->documentation_id == $doc->id) selected @endif>{{ $doc->title ?? $doc->project_name ?? 'Doc #'.$doc->id }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-1 text-base font-semibold text-blue-700" for="test_case_id">Test Case ID</label>
                <input id="test_case_id" name="test_case_id" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" value="{{ old('test_case_id', $test->test_case_id) }}">
            </div>
            <div>
                <label class="block mb-1 text-base font-semibold text-blue-700" for="test_case_description">Test Case Description</label>
                <input id="test_case_description" name="test_case_description" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" value="{{ old('test_case_description', $test->test_case_description) }}">
            </div>
            <div>
                <label class="block mb-1 text-base font-semibold text-blue-700" for="created_by">Created By</label>
                <input id="created_by" name="created_by" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" value="{{ old('created_by', $test->created_by) }}">
            </div>
            <div>
                <label class="block mb-1 text-base font-semibold text-blue-700" for="revised_by">Revised By</label>
                <input id="revised_by" name="revised_by" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" value="{{ old('revised_by', $test->revised_by) }}">
            </div>
            <div>
                <label class="block mb-1 text-base font-semibold text-blue-700" for="priority">Priority</label>
                <input id="priority" name="priority" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" value="{{ old('priority', $test->priority) }}">
            </div>
            <div>
                <label class="block mb-1 text-base font-semibold text-blue-700" for="tester_name">Tester's Name</label>
                <input id="tester_name" name="tester_name" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" value="{{ old('tester_name', $test->tester_name) }}">
            </div>
            <div>
                <label class="block mb-1 text-base font-semibold text-blue-700" for="date_tested">Date Tested</label>
                <input id="date_tested" name="date_tested" type="date" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" value="{{ old('date_tested', $test->date_tested ? \Illuminate\Support\Carbon::parse($test->date_tested)->format('Y-m-d') : '') }}">
            </div>
            <div>
                <label class="block mb-1 text-base font-semibold text-blue-700" for="test_execution_status">Test Execution Status</label>
                <input id="test_execution_status" name="test_execution_status" type="text" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" value="{{ old('test_execution_status', $test->test_execution_status) }}">
            </div>
        </div>
        <div>
            <label class="block mb-1 text-base font-semibold text-blue-700">Prerequisites</label>
            <textarea name="prerequisites" rows="2" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" placeholder="List prerequisites, one per line">{{ is_array($test->prerequisites) ? implode("\n", $test->prerequisites) : $test->prerequisites }}</textarea>
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
        <button type="submit" class="doc-btn bg-purple-600 hover:bg-purple-700">Update</button>
        <a href="{{ route('testing.index') }}" class="ml-2 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Cancel</a>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    </form>
</div>
@endsection
