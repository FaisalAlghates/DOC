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
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-tr from-cyan-400 via-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-2xl transform rotate-6 hover:rotate-12 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-cyan-400 rounded-full border-4 border-white animate-ping"></div>
                    </div>
                    <div>
                        <h1 class="text-5xl font-black text-gray-800 dark:text-white mb-3">
                            <span class="bg-gradient-to-r from-cyan-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">View</span>
                            <span class="text-gray-800 dark:text-white">Test</span>
                        </h1>
                        <p class="text-lg text-gray-600 dark:text-gray-300 font-medium">Comprehensive test case details and execution results</p>
                    </div>
                </div>
                
                <!-- Quick Action Buttons -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('testing.edit', $test->id) }}" 
                       class="group relative inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 via-red-500 to-pink-500 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-600 via-red-600 to-pink-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span class="relative z-10">Edit Test</span>
                    </a>
                    
                    <a href="{{ route('testing.index') }}" 
                       class="group relative inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-500 via-gray-600 to-gray-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-gray-600 via-gray-700 to-gray-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span class="relative z-10">Back to List</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content Container -->
        <div class="bg-white/60 dark:bg-slate-800/50 backdrop-blur-2xl rounded-3xl border border-gray-200/50 dark:border-white/10 shadow-xl p-8 space-y-8">
            
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
                    <div class="space-y-4">
                        <div class="bg-white/60 dark:bg-slate-700/60 backdrop-blur-sm rounded-xl p-4 border border-blue-200/50 dark:border-blue-500/30">
                            <div class="text-sm font-semibold text-blue-700 dark:text-blue-300 mb-1">Test Case ID</div>
                            <div class="text-lg font-bold text-gray-800 dark:text-white">{{ $test->test_case_id ?: 'Not specified' }}</div>
                        </div>
                        <div class="bg-white/60 dark:bg-slate-700/60 backdrop-blur-sm rounded-xl p-4 border border-blue-200/50 dark:border-blue-500/30">
                            <div class="text-sm font-semibold text-blue-700 dark:text-blue-300 mb-1">Created By</div>
                            <div class="text-lg font-bold text-gray-800 dark:text-white">{{ $test->created_by ?: 'Not specified' }}</div>
                        </div>
                        <div class="bg-white/60 dark:bg-slate-700/60 backdrop-blur-sm rounded-xl p-4 border border-blue-200/50 dark:border-blue-500/30">
                            <div class="text-sm font-semibold text-blue-700 dark:text-blue-300 mb-1">Priority</div>
                            <div class="text-lg font-bold text-gray-800 dark:text-white">
                                @if($test->priority)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        @if(strtolower($test->priority) == 'high') bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300
                                        @elseif(strtolower($test->priority) == 'medium') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300
                                        @elseif(strtolower($test->priority) == 'low') bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300
                                        @else bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300
                                        @endif">
                                        {{ $test->priority }}
                                    </span>
                                @else
                                    Not specified
                                @endif
                            </div>
                        </div>
                        <div class="bg-white/60 dark:bg-slate-700/60 backdrop-blur-sm rounded-xl p-4 border border-blue-200/50 dark:border-blue-500/30">
                            <div class="text-sm font-semibold text-blue-700 dark:text-blue-300 mb-1">Date Tested</div>
                            <div class="text-lg font-bold text-gray-800 dark:text-white">{{ $test->date_tested ?: 'Not specified' }}</div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="bg-white/60 dark:bg-slate-700/60 backdrop-blur-sm rounded-xl p-4 border border-blue-200/50 dark:border-blue-500/30">
                            <div class="text-sm font-semibold text-blue-700 dark:text-blue-300 mb-1">Test Case Description</div>
                            <div class="text-lg font-bold text-gray-800 dark:text-white">{{ $test->test_case_description ?: 'Not specified' }}</div>
                        </div>
                        <div class="bg-white/60 dark:bg-slate-700/60 backdrop-blur-sm rounded-xl p-4 border border-blue-200/50 dark:border-blue-500/30">
                            <div class="text-sm font-semibold text-blue-700 dark:text-blue-300 mb-1">Revised By</div>
                            <div class="text-lg font-bold text-gray-800 dark:text-white">{{ $test->revised_by ?: 'Not specified' }}</div>
                        </div>
                        <div class="bg-white/60 dark:bg-slate-700/60 backdrop-blur-sm rounded-xl p-4 border border-blue-200/50 dark:border-blue-500/30">
                            <div class="text-sm font-semibold text-blue-700 dark:text-blue-300 mb-1">Tester's Name</div>
                            <div class="text-lg font-bold text-gray-800 dark:text-white">{{ $test->tester_name ?: 'Not specified' }}</div>
                        </div>
                        <div class="bg-white/60 dark:bg-slate-700/60 backdrop-blur-sm rounded-xl p-4 border border-blue-200/50 dark:border-blue-500/30">
                            <div class="text-sm font-semibold text-blue-700 dark:text-blue-300 mb-1">Test Execution Status</div>
                            <div class="text-lg font-bold text-gray-800 dark:text-white">
                                @if($test->test_execution_status)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        @if(strtolower($test->test_execution_status) == 'passed') bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300
                                        @elseif(strtolower($test->test_execution_status) == 'failed') bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300
                                        @elseif(strtolower($test->test_execution_status) == 'not executed') bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300
                                        @else bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300
                                        @endif">
                                        {{ $test->test_execution_status }}
                                    </span>
                                @else
                                    Not specified
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Test Scenario Section -->
            @if($test->test_description)
            <div class="bg-gradient-to-r from-purple-100/50 to-pink-100/50 dark:from-purple-900/30 dark:to-pink-900/30 backdrop-blur-sm rounded-2xl p-6 border border-purple-200/50 dark:border-purple-500/30">
                <div class="flex items-center space-x-4 mb-4">
                    <div class="p-3 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 dark:text-white">Test Scenario</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Detailed test scenario description</p>
                    </div>
                </div>
                <div class="bg-white/60 dark:bg-slate-700/60 backdrop-blur-sm rounded-xl p-6 border border-purple-200/50 dark:border-purple-500/30">
                    <div class="text-gray-800 dark:text-white leading-relaxed">{{ $test->test_description }}</div>
                </div>
            </div>
            @endif

            <!-- Prerequisites Section -->
            @if($test->prerequisites && (is_array($test->prerequisites) ? count(array_filter($test->prerequisites)) > 0 : !empty($test->prerequisites)))
            <div class="bg-gradient-to-r from-green-100/50 to-emerald-100/50 dark:from-green-900/30 dark:to-emerald-900/30 backdrop-blur-sm rounded-2xl p-6 border border-green-200/50 dark:border-green-500/30">
                <div class="flex items-center space-x-4 mb-6">
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

                <!-- Desktop Table View -->
                <div class="hidden md:block overflow-hidden rounded-2xl border border-green-200/50 dark:border-green-500/30 shadow-lg">
                    <table class="w-full bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm">
                        <thead>
                            <tr class="bg-gradient-to-r from-green-500/10 to-emerald-500/10 dark:from-green-600/20 dark:to-emerald-600/20">
                                <th class="border-b border-green-200/50 dark:border-green-500/30 px-6 py-4 text-sm font-bold text-green-700 dark:text-green-300 text-center w-20">#</th>
                                <th class="border-b border-green-200/50 dark:border-green-500/30 px-6 py-4 text-sm font-bold text-green-700 dark:text-green-300 text-left">Prerequisite</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(is_array($test->prerequisites) ? $test->prerequisites : explode("\n", $test->prerequisites) as $i => $prereq)
                                @if(trim($prereq))
                                <tr class="hover:bg-green-50/50 dark:hover:bg-green-900/20 transition-colors duration-200">
                                    <td class="border-b border-green-100/50 dark:border-green-700/30 px-6 py-4 text-center">
                                        <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-emerald-400 text-white font-bold rounded-lg flex items-center justify-center text-sm mx-auto">
                                            {{ $i+1 }}
                                        </div>
                                    </td>
                                    <td class="border-b border-green-100/50 dark:border-green-700/30 px-6 py-4 text-gray-800 dark:text-white">{{ trim($prereq) }}</td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Card View -->
                <div class="md:hidden space-y-3">
                    @foreach(is_array($test->prerequisites) ? $test->prerequisites : explode("\n", $test->prerequisites) as $i => $prereq)
                        @if(trim($prereq))
                        <div class="bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm rounded-xl border border-green-200/50 dark:border-green-500/30 p-4 shadow-lg">
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-emerald-400 text-white font-bold rounded-lg flex items-center justify-center text-sm flex-shrink-0 mt-1">
                                    {{ $i+1 }}
                                </div>
                                <div class="text-gray-800 dark:text-white">{{ trim($prereq) }}</div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Test Steps Section -->
            @if($test->steps && is_array($test->steps) && count($test->steps) > 0)
            <div class="bg-gradient-to-r from-orange-100/50 to-red-100/50 dark:from-orange-900/30 dark:to-red-900/30 backdrop-blur-sm rounded-2xl p-6 border border-orange-200/50 dark:border-orange-500/30">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="p-3 bg-gradient-to-br from-orange-500 to-red-500 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 dark:text-white">Test Steps</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Detailed execution steps and results</p>
                    </div>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($test->steps as $step)
                                <tr class="hover:bg-orange-50/50 dark:hover:bg-orange-900/20 transition-colors duration-200">
                                    <td class="border-b border-orange-100/50 dark:border-orange-700/30 px-4 py-4 text-center">
                                        <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-red-400 text-white font-bold rounded-lg flex items-center justify-center text-sm mx-auto">
                                            {{ $step['step'] ?? '' }}
                                        </div>
                                    </td>
                                    <td class="border-b border-orange-100/50 dark:border-orange-700/30 px-4 py-4 text-gray-800 dark:text-white">
                                        <div class="max-w-xs break-words">{{ $step['details'] ?? 'Not specified' }}</div>
                                    </td>
                                    <td class="border-b border-orange-100/50 dark:border-orange-700/30 px-4 py-4 text-gray-800 dark:text-white">
                                        <div class="max-w-xs break-words">{{ $step['expected'] ?? 'Not specified' }}</div>
                                    </td>
                                    <td class="border-b border-orange-100/50 dark:border-orange-700/30 px-4 py-4">
                                        @if($step['result'] ?? '')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                                @if(strtolower($step['result']) == 'pass') bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300
                                                @elseif(strtolower($step['result']) == 'fail') bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300
                                                @elseif(strtolower($step['result']) == 'not executed') bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300
                                                @else bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300
                                                @endif">
                                                {{ $step['result'] }}
                                            </span>
                                        @else
                                            <span class="text-gray-500 dark:text-gray-400">Not specified</span>
                                        @endif
                                    </td>
                                    <td class="border-b border-orange-100/50 dark:border-orange-700/30 px-4 py-4 text-gray-800 dark:text-white">
                                        <div class="max-w-xs break-words">{{ $step['actual'] ?? 'Not specified' }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Card View -->
                <div class="lg:hidden space-y-4">
                    @foreach($test->steps as $step)
                    <div class="bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm rounded-xl border border-orange-200/50 dark:border-orange-500/30 p-4 shadow-lg">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-red-400 text-white font-bold rounded-lg flex items-center justify-center text-sm">
                                {{ $step['step'] ?? '' }}
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white">Test Step {{ $step['step'] ?? '' }}</h3>
                        </div>
                        
                        <div class="space-y-3">
                            <div>
                                <div class="text-sm font-semibold text-orange-700 dark:text-orange-300 mb-1">Step Details</div>
                                <div class="text-gray-800 dark:text-white bg-white/40 dark:bg-slate-700/40 rounded-lg p-3">{{ $step['details'] ?? 'Not specified' }}</div>
                            </div>
                            <div>
                                <div class="text-sm font-semibold text-orange-700 dark:text-orange-300 mb-1">Expected Results</div>
                                <div class="text-gray-800 dark:text-white bg-white/40 dark:bg-slate-700/40 rounded-lg p-3">{{ $step['expected'] ?? 'Not specified' }}</div>
                            </div>
                            <div>
                                <div class="text-sm font-semibold text-orange-700 dark:text-orange-300 mb-1">Status</div>
                                <div class="bg-white/40 dark:bg-slate-700/40 rounded-lg p-3">
                                    @if($step['result'] ?? '')
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                            @if(strtolower($step['result']) == 'pass') bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300
                                            @elseif(strtolower($step['result']) == 'fail') bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300
                                            @elseif(strtolower($step['result']) == 'not executed') bg-gray-100 text-gray-800 dark:bg-gray-900/50 dark:text-gray-300
                                            @else bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300
                                            @endif">
                                            {{ $step['result'] }}
                                        </span>
                                    @else
                                        <span class="text-gray-500 dark:text-gray-400">Not specified</span>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <div class="text-sm font-semibold text-orange-700 dark:text-orange-300 mb-1">Actual Results</div>
                                <div class="text-gray-800 dark:text-white bg-white/40 dark:bg-slate-700/40 rounded-lg p-3">{{ $step['actual'] ?? 'Not specified' }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
