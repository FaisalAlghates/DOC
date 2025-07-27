@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white rounded-lg shadow-lg p-8">
    <h1 class="text-2xl font-bold text-purple-700 mb-6">View Test</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div>
            <div class="mb-2"><span class="font-semibold text-gray-700">Test Case ID:</span> <span class="text-gray-900">{{ $test->test_case_id }}</span></div>
            <div class="mb-2"><span class="font-semibold text-gray-700">Test Case Description:</span> <span class="text-gray-900">{{ $test->test_case_description }}</span></div>
            <div class="mb-2"><span class="font-semibold text-gray-700">Created By:</span> <span class="text-gray-900">{{ $test->created_by }}</span></div>
            <div class="mb-2"><span class="font-semibold text-gray-700">Revised By:</span> <span class="text-gray-900">{{ $test->revised_by }}</span></div>
            <div class="mb-2"><span class="font-semibold text-gray-700">Priority:</span> <span class="text-gray-900">{{ $test->priority }}</span></div>
        </div>
        <div>
            <div class="mb-2"><span class="font-semibold text-gray-700">Tester's Name:</span> <span class="text-gray-900">{{ $test->tester_name }}</span></div>
            <div class="mb-2"><span class="font-semibold text-gray-700">Date Tested:</span> <span class="text-gray-900">{{ $test->date_tested }}</span></div>
            <div class="mb-2"><span class="font-semibold text-gray-700">Test Execution Status:</span> <span class="text-gray-900">{{ $test->test_execution_status }}</span></div>
        </div>
    </div>
    <div class="mb-6">
        <span class="font-semibold text-blue-700">Prerequisites:</span>
        <table class="w-full border mt-2 text-sm">
            <thead>
                <tr class="bg-blue-50">
                    <th class="border px-2 py-1">#</th>
                    <th class="border px-2 py-1">Prerequisite</th>
                </tr>
            </thead>
            <tbody>
                @foreach(is_array($test->prerequisites) ? $test->prerequisites : (array) $test->prerequisites as $i => $prereq)
                    @if($prereq)
                    <tr>
                        <td class="border px-2 py-1 text-center">{{ $i+1 }}</td>
                        <td class="border px-2 py-1">{{ $prereq }}</td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mb-6">
        <span class="font-semibold text-blue-700">Test Scenario:</span>
        <div class="border border-blue-100 rounded p-3 mt-2 bg-blue-50 text-gray-800">{{ $test->test_description }}</div>
    </div>
    <div class="mb-6">
        <span class="font-semibold text-blue-700">Test Steps:</span>
        <table class="w-full border mt-2 text-sm">
            <thead>
                <tr class="bg-blue-50">
                    <th class="border px-2 py-1">Step #</th>
                    <th class="border px-2 py-1">Step Details</th>
                    <th class="border px-2 py-1">Expected Results</th>
                    <th class="border px-2 py-1">Pass / Fail / Not executed / Paused</th>
                    <th class="border px-2 py-1">Actual Results if Fail</th>
                </tr>
            </thead>
            <tbody>
                @foreach(is_array($test->steps) ? $test->steps : (array) $test->steps as $step)
                    <tr>
                        <td class="border px-2 py-1 text-center font-bold">{{ $step['step'] ?? '' }}</td>
                        <td class="border px-2 py-1">{{ $step['details'] ?? '' }}</td>
                        <td class="border px-2 py-1">{{ $step['expected'] ?? '' }}</td>
                        <td class="border px-2 py-1">{{ $step['result'] ?? '' }}</td>
                        <td class="border px-2 py-1">{{ $step['actual'] ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('testing.index') }}" class="inline-block mt-4 px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition">Back to List</a>
</div>
@endsection
