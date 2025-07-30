@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-100 dark:from-slate-900 dark:via-purple-900 dark:to-slate-900 py-8 px-4">
    <!-- Floating Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-10 left-10 w-72 h-72 bg-purple-300/20 dark:bg-purple-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-40 right-10 w-96 h-96 bg-blue-300/20 dark:bg-blue-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute bottom-10 left-1/3 w-80 h-80 bg-indigo-300/20 dark:bg-indigo-500/10 rounded-full blur-3xl animate-pulse delay-500"></div>
    </div>

    <div class="relative max-w-6xl mx-auto">
        <!-- Modern Header Section -->
        <div class="bg-white/70 dark:bg-slate-800/60 backdrop-blur-2xl rounded-3xl border border-gray-200/50 dark:border-white/10 shadow-xl p-8 mb-8 hover:shadow-2xl transition-all duration-500">
            <div class="flex items-center space-x-6">
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-tr from-orange-400 via-pink-400 to-purple-500 rounded-2xl flex items-center justify-center shadow-2xl transform rotate-6 hover:rotate-12 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-orange-400 rounded-full border-4 border-white animate-ping"></div>
                </div>
                <div>
                    <h1 class="text-5xl font-black text-gray-800 dark:text-white mb-3">
                        <span class="bg-gradient-to-r from-orange-600 via-pink-600 to-purple-600 bg-clip-text text-transparent">Edit</span>
                        <span class="text-gray-800 dark:text-white">Test</span>
                    </h1>
                    <p class="text-lg text-gray-600 dark:text-gray-300 font-medium">Update and refine your test case with advanced editing tools</p>
                </div>
            </div>
        </div>

        <!-- Main Form Container -->
        <div class="bg-white/60 dark:bg-slate-800/50 backdrop-blur-2xl rounded-3xl border border-gray-200/50 dark:border-white/10 shadow-xl p-8">
            @php
                $stepsJson = $test->steps ?? [['step'=>1,'details'=>'','expected'=>'','result'=>'','actual'=>'']];
            @endphp
            
            <form action="{{ route('testing.update', $test->id) }}" method="POST" class="space-y-8"
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

                <!-- Project Selection Section -->
                <div class="bg-gradient-to-r from-purple-100/50 to-pink-100/50 dark:from-purple-900/30 dark:to-pink-900/30 backdrop-blur-sm rounded-2xl p-6 border border-purple-200/50 dark:border-purple-500/30">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="p-3 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white">Project Selection</h2>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Choose the project this test belongs to</p>
                        </div>
                    </div>
                    <label class="block mb-2 text-base font-semibold text-purple-700 dark:text-purple-300" for="documentation_id">
                        Select Project <span class="text-red-500">*</span>
                    </label>
                    <select id="documentation_id" name="documentation_id" 
                            class="w-full bg-white/80 dark:bg-slate-700/80 border-2 border-purple-200 dark:border-purple-500 rounded-xl py-4 px-6 text-gray-800 dark:text-white text-lg font-semibold backdrop-blur-sm focus:ring-4 focus:ring-purple-400/50 focus:border-purple-400 transition-all shadow-lg" 
                            required>
                        <option value="" disabled>Select a project...</option>
                        @foreach(App\Models\Documentation::all() as $doc)
                            <option value="{{ $doc->id }}" @if($test->documentation_id == $doc->id) selected @endif>
                                📁 {{ $doc->title ?? $doc->project_name ?? 'Doc #'.$doc->id }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Test Information Section -->
                <div class="bg-gradient-to-r from-blue-100/50 to-cyan-100/50 dark:from-blue-900/30 dark:to-cyan-900/30 backdrop-blur-sm rounded-2xl p-6 border border-blue-200/50 dark:border-blue-500/30">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white">Test Information</h2>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Basic test case details and metadata</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group">
                            <label class="block mb-2 text-base font-semibold text-blue-700 dark:text-blue-300" for="test_case_id">
                                Test Case ID
                            </label>
                            <input id="test_case_id" name="test_case_id" type="text" 
                                   class="w-full bg-white/80 dark:bg-slate-700/80 border-2 border-blue-200 dark:border-blue-500 rounded-xl py-3 px-4 text-gray-800 dark:text-white backdrop-blur-sm focus:ring-4 focus:ring-blue-400/50 focus:border-blue-400 transition-all shadow-lg group-hover:shadow-xl" 
                                   value="{{ old('test_case_id', $test->test_case_id) }}"
                                   placeholder="TC_001">
                        </div>
                        <div class="group">
                            <label class="block mb-2 text-base font-semibold text-blue-700 dark:text-blue-300" for="test_case_description">
                                Test Case Description
                            </label>
                            <input id="test_case_description" name="test_case_description" type="text" 
                                   class="w-full bg-white/80 dark:bg-slate-700/80 border-2 border-blue-200 dark:border-blue-500 rounded-xl py-3 px-4 text-gray-800 dark:text-white backdrop-blur-sm focus:ring-4 focus:ring-blue-400/50 focus:border-blue-400 transition-all shadow-lg group-hover:shadow-xl" 
                                   value="{{ old('test_case_description', $test->test_case_description) }}"
                                   placeholder="User login functionality">
                        </div>
                        <div class="group">
                            <label class="block mb-2 text-base font-semibold text-blue-700 dark:text-blue-300" for="created_by">
                                Created By
                            </label>
                            <input id="created_by" name="created_by" type="text" 
                                   class="w-full bg-white/80 dark:bg-slate-700/80 border-2 border-blue-200 dark:border-blue-500 rounded-xl py-3 px-4 text-gray-800 dark:text-white backdrop-blur-sm focus:ring-4 focus:ring-blue-400/50 focus:border-blue-400 transition-all shadow-lg group-hover:shadow-xl" 
                                   value="{{ old('created_by', $test->created_by) }}"
                                   placeholder="Test Engineer">
                        </div>
                        <div class="group">
                            <label class="block mb-2 text-base font-semibold text-blue-700 dark:text-blue-300" for="revised_by">
                                Revised By
                            </label>
                            <input id="revised_by" name="revised_by" type="text" 
                                   class="w-full bg-white/80 dark:bg-slate-700/80 border-2 border-blue-200 dark:border-blue-500 rounded-xl py-3 px-4 text-gray-800 dark:text-white backdrop-blur-sm focus:ring-4 focus:ring-blue-400/50 focus:border-blue-400 transition-all shadow-lg group-hover:shadow-xl" 
                                   value="{{ old('revised_by', $test->revised_by) }}"
                                   placeholder="QA Lead">
                        </div>
                        <div class="group">
                            <label class="block mb-2 text-base font-semibold text-blue-700 dark:text-blue-300" for="priority">
                                Priority
                            </label>
                            <input id="priority" name="priority" type="text" 
                                   class="w-full bg-white/80 dark:bg-slate-700/80 border-2 border-blue-200 dark:border-blue-500 rounded-xl py-3 px-4 text-gray-800 dark:text-white backdrop-blur-sm focus:ring-4 focus:ring-blue-400/50 focus:border-blue-400 transition-all shadow-lg group-hover:shadow-xl" 
                                   value="{{ old('priority', $test->priority) }}"
                                   placeholder="High / Medium / Low">
                        </div>
                        <div class="group">
                            <label class="block mb-2 text-base font-semibold text-blue-700 dark:text-blue-300" for="tester_name">
                                Tester's Name
                            </label>
                            <input id="tester_name" name="tester_name" type="text" 
                                   class="w-full bg-white/80 dark:bg-slate-700/80 border-2 border-blue-200 dark:border-blue-500 rounded-xl py-3 px-4 text-gray-800 dark:text-white backdrop-blur-sm focus:ring-4 focus:ring-blue-400/50 focus:border-blue-400 transition-all shadow-lg group-hover:shadow-xl" 
                                   value="{{ old('tester_name', $test->tester_name) }}"
                                   placeholder="John Doe">
                        </div>
                        <div class="group">
                            <label class="block mb-2 text-base font-semibold text-blue-700 dark:text-blue-300" for="date_tested">
                                Date Tested
                            </label>
                            <input id="date_tested" name="date_tested" type="date" 
                                   class="w-full bg-white/80 dark:bg-slate-700/80 border-2 border-blue-200 dark:border-blue-500 rounded-xl py-3 px-4 text-gray-800 dark:text-white backdrop-blur-sm focus:ring-4 focus:ring-blue-400/50 focus:border-blue-400 transition-all shadow-lg group-hover:shadow-xl" 
                                   value="{{ old('date_tested', $test->date_tested ? \Illuminate\Support\Carbon::parse($test->date_tested)->format('Y-m-d') : '') }}">
                        </div>
                        <div class="group">
                            <label class="block mb-2 text-base font-semibold text-blue-700 dark:text-blue-300" for="test_execution_status">
                                Test Execution Status
                            </label>
                            <input id="test_execution_status" name="test_execution_status" type="text" 
                                   class="w-full bg-white/80 dark:bg-slate-700/80 border-2 border-blue-200 dark:border-blue-500 rounded-xl py-3 px-4 text-gray-800 dark:text-white backdrop-blur-sm focus:ring-4 focus:ring-blue-400/50 focus:border-blue-400 transition-all shadow-lg group-hover:shadow-xl" 
                                   value="{{ old('test_execution_status', $test->test_execution_status) }}"
                                   placeholder="Passed / Failed / Not Executed">
                        </div>
                    </div>
                </div>

                <!-- Prerequisites Section -->
                <div class="bg-gradient-to-r from-green-100/50 to-emerald-100/50 dark:from-green-900/30 dark:to-emerald-900/30 backdrop-blur-sm rounded-2xl p-6 border border-green-200/50 dark:border-green-500/30">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="p-3 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white">Prerequisites</h2>
                            <p class="text-sm text-gray-600 dark:text-gray-300">Conditions that must be met before running this test</p>
                        </div>
                    </div>
                    <label class="block mb-2 text-base font-semibold text-green-700 dark:text-green-300">
                        Prerequisites
                    </label>
                    <textarea name="prerequisites" rows="4" 
                              class="w-full bg-white/80 dark:bg-slate-700/80 border-2 border-green-200 dark:border-green-500 rounded-xl py-4 px-6 text-gray-800 dark:text-white backdrop-blur-sm focus:ring-4 focus:ring-green-400/50 focus:border-green-400 transition-all shadow-lg resize-none" 
                              placeholder="• Valid user account&#10;• Active internet connection&#10;• Browser with JavaScript enabled">{{ is_array($test->prerequisites) ? implode("\n", $test->prerequisites) : $test->prerequisites }}</textarea>
                </div>
                <!-- Test Steps Section -->
                <div class="bg-gradient-to-r from-orange-100/50 to-red-100/50 dark:from-orange-900/30 dark:to-red-900/30 backdrop-blur-sm rounded-2xl p-6 border border-orange-200/50 dark:border-orange-500/30">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-gray-800 dark:text-white">Test Steps</h2>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Define detailed execution steps and expected results</p>
                            </div>
                        </div>
                        <button type="button" @click="addStep()" 
                                class="group relative inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 via-red-500 to-pink-500 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-orange-600 via-red-600 to-pink-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <span class="relative z-10">Add Step</span>
                        </button>
                    </div>

                    <!-- Desktop Table View -->
                    <div class="hidden lg:block overflow-hidden rounded-2xl border border-orange-200/50 dark:border-orange-500/30 shadow-lg">
                        <table class="w-full bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm">
                            <thead>
                                <tr class="bg-gradient-to-r from-orange-500/10 to-red-500/10 dark:from-orange-600/20 dark:to-red-600/20">
                                    <th class="border-b border-orange-200/50 dark:border-orange-500/30 px-4 py-4 text-sm font-bold text-orange-700 dark:text-orange-300 text-center">Step #</th>
                                    <th class="border-b border-orange-200/50 dark:border-orange-500/30 px-4 py-4 text-sm font-bold text-orange-700 dark:text-orange-300">Step Details</th>
                                    <th class="border-b border-orange-200/50 dark:border-orange-500/30 px-4 py-4 text-sm font-bold text-orange-700 dark:text-orange-300">Expected Results</th>
                                    <th class="border-b border-orange-200/50 dark:border-orange-500/30 px-4 py-4 text-sm font-bold text-orange-700 dark:text-orange-300">Status</th>
                                    <th class="border-b border-orange-200/50 dark:border-orange-500/30 px-4 py-4 text-sm font-bold text-orange-700 dark:text-orange-300">Actual Results</th>
                                    <th class="border-b border-orange-200/50 dark:border-orange-500/30 px-4 py-4 text-sm font-bold text-orange-700 dark:text-orange-300 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(step, i) in steps" :key="i">
                                    <tr class="hover:bg-orange-50/50 dark:hover:bg-orange-900/20 transition-colors duration-200">
                                        <td class="border-b border-orange-100/50 dark:border-orange-700/30 px-4 py-4 text-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-red-400 text-white font-bold rounded-lg flex items-center justify-center text-sm mx-auto">
                                                <span x-text="i+1"></span>
                                            </div>
                                            <input type="hidden" :name="'steps['+i+'][step]'" :value="i+1">
                                        </td>
                                        <td class="border-b border-orange-100/50 dark:border-orange-700/30 px-4 py-4">
                                            <textarea :name="'steps['+i+'][details]'" x-model="step.details" 
                                                    class="w-full bg-white/80 dark:bg-slate-700/80 border border-orange-200 dark:border-orange-600 rounded-lg py-2 px-3 text-sm text-gray-800 dark:text-white backdrop-blur-sm focus:ring-2 focus:ring-orange-400/50 focus:border-orange-400 transition-all resize-none" 
                                                    rows="2" placeholder="Enter step details..."></textarea>
                                        </td>
                                        <td class="border-b border-orange-100/50 dark:border-orange-700/30 px-4 py-4">
                                            <textarea :name="'steps['+i+'][expected]'" x-model="step.expected" 
                                                    class="w-full bg-white/80 dark:bg-slate-700/80 border border-orange-200 dark:border-orange-600 rounded-lg py-2 px-3 text-sm text-gray-800 dark:text-white backdrop-blur-sm focus:ring-2 focus:ring-orange-400/50 focus:border-orange-400 transition-all resize-none" 
                                                    rows="2" placeholder="Expected result..."></textarea>
                                        </td>
                                        <td class="border-b border-orange-100/50 dark:border-orange-700/30 px-4 py-4">
                                            <input type="text" :name="'steps['+i+'][result]'" x-model="step.result" 
                                                   class="w-full bg-white/80 dark:bg-slate-700/80 border border-orange-200 dark:border-orange-600 rounded-lg py-2 px-3 text-sm text-gray-800 dark:text-white backdrop-blur-sm focus:ring-2 focus:ring-orange-400/50 focus:border-orange-400 transition-all" 
                                                   placeholder="Pass/Fail/Not Executed">
                                        </td>
                                        <td class="border-b border-orange-100/50 dark:border-orange-700/30 px-4 py-4">
                                            <textarea :name="'steps['+i+'][actual]'" x-model="step.actual" 
                                                    class="w-full bg-white/80 dark:bg-slate-700/80 border border-orange-200 dark:border-orange-600 rounded-lg py-2 px-3 text-sm text-gray-800 dark:text-white backdrop-blur-sm focus:ring-2 focus:ring-orange-400/50 focus:border-orange-400 transition-all resize-none" 
                                                    rows="2" placeholder="Actual result if fail..."></textarea>
                                        </td>
                                        <td class="border-b border-orange-100/50 dark:border-orange-700/30 px-4 py-4 text-center">
                                            <button type="button" @click="removeStep(i)" 
                                                    class="w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded-lg flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-lg" 
                                                    x-show="steps.length > 1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Card View -->
                    <div class="lg:hidden space-y-4">
                        <template x-for="(step, i) in steps" :key="i">
                            <div class="bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm rounded-xl border border-orange-200/50 dark:border-orange-500/30 p-4 shadow-lg">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-red-400 text-white font-bold rounded-lg flex items-center justify-center text-sm">
                                            <span x-text="i+1"></span>
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-800 dark:text-white">Test Step</h3>
                                    </div>
                                    <button type="button" @click="removeStep(i)" 
                                            class="w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded-lg flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-lg" 
                                            x-show="steps.length > 1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                    <input type="hidden" :name="'steps['+i+'][step]'" :value="i+1">
                                </div>
                                
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-sm font-semibold text-orange-700 dark:text-orange-300 mb-1">Step Details</label>
                                        <textarea :name="'steps['+i+'][details]'" x-model="step.details" 
                                                class="w-full bg-white/80 dark:bg-slate-700/80 border border-orange-200 dark:border-orange-600 rounded-lg py-2 px-3 text-sm text-gray-800 dark:text-white backdrop-blur-sm focus:ring-2 focus:ring-orange-400/50 focus:border-orange-400 transition-all resize-none" 
                                                rows="2" placeholder="Enter step details..."></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-orange-700 dark:text-orange-300 mb-1">Expected Results</label>
                                        <textarea :name="'steps['+i+'][expected]'" x-model="step.expected" 
                                                class="w-full bg-white/80 dark:bg-slate-700/80 border border-orange-200 dark:border-orange-600 rounded-lg py-2 px-3 text-sm text-gray-800 dark:text-white backdrop-blur-sm focus:ring-2 focus:ring-orange-400/50 focus:border-orange-400 transition-all resize-none" 
                                                rows="2" placeholder="Expected result..."></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-orange-700 dark:text-orange-300 mb-1">Status</label>
                                        <input type="text" :name="'steps['+i+'][result]'" x-model="step.result" 
                                               class="w-full bg-white/80 dark:bg-slate-700/80 border border-orange-200 dark:border-orange-600 rounded-lg py-2 px-3 text-sm text-gray-800 dark:text-white backdrop-blur-sm focus:ring-2 focus:ring-orange-400/50 focus:border-orange-400 transition-all" 
                                               placeholder="Pass/Fail/Not Executed">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-orange-700 dark:text-orange-300 mb-1">Actual Results</label>
                                        <textarea :name="'steps['+i+'][actual]'" x-model="step.actual" 
                                                class="w-full bg-white/80 dark:bg-slate-700/80 border border-orange-200 dark:border-orange-600 rounded-lg py-2 px-3 text-sm text-gray-800 dark:text-white backdrop-blur-sm focus:ring-2 focus:ring-orange-400/50 focus:border-orange-400 transition-all resize-none" 
                                                rows="2" placeholder="Actual result if fail..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center pt-6">
                    <button type="submit" 
                            class="group relative inline-flex items-center px-12 py-4 bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500 text-white font-bold rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 overflow-hidden text-lg">
                        <div class="absolute inset-0 bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        <span class="relative z-10">Update Test</span>
                    </button>
                    
                    <a href="{{ route('testing.index') }}" 
                       class="group relative inline-flex items-center px-12 py-4 bg-gradient-to-r from-gray-400 via-gray-500 to-gray-600 text-white font-bold rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 overflow-hidden text-lg">
                        <div class="absolute inset-0 bg-gradient-to-r from-gray-500 via-gray-600 to-gray-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span class="relative z-10">Cancel</span>
                    </a>
                </div>
                
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
            </form>
        </div>
    </div>
</div>
@endsection
