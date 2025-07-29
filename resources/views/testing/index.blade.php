@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-100 dark:from-slate-900 dark:via-purple-900 dark:to-slate-900 py-8 px-4">
    <!-- Floating Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-10 left-10 w-72 h-72 bg-purple-300/20 dark:bg-purple-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-40 right-10 w-96 h-96 bg-blue-300/20 dark:bg-blue-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute bottom-10 left-1/3 w-80 h-80 bg-indigo-300/20 dark:bg-indigo-500/10 rounded-full blur-3xl animate-pulse delay-500"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto">
        <!-- Modern Header Section -->
        <div class="bg-white/70 dark:bg-slate-800/60 backdrop-blur-2xl rounded-3xl border border-gray-200/50 dark:border-white/10 shadow-xl p-8 mb-8 hover:shadow-2xl transition-all duration-500">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-tr from-purple-400 via-pink-400 to-red-400 rounded-2xl flex items-center justify-center shadow-2xl transform rotate-6 hover:rotate-12 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-400 rounded-full border-4 border-white animate-ping"></div>
                    </div>
                    <div>
                        <h1 class="text-5xl font-black text-gray-800 dark:text-white mb-3">
                            <span class="bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600 bg-clip-text text-transparent">Testing</span>
                            <span class="text-gray-800 dark:text-white">Hub</span>
                        </h1>
                        <p class="text-lg text-gray-600 dark:text-gray-300 font-medium">Streamline your testing workflow with advanced management tools</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2 bg-gradient-to-r from-purple-100 to-pink-100 dark:from-purple-900/50 dark:to-pink-900/50 px-4 py-2 rounded-xl">
                        <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">
                            {{ $tests->count() }} 
                            @if(isset($projectId) && $projectId)
                                Filtered Tests
                            @else
                                Total Tests
                            @endif
                        </span>
                    </div>
                    <a href="{{ route('testing.create') }}" class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 text-white font-bold rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-600 via-pink-600 to-red-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        <span class="relative z-10">Create Test</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Enhanced Filter Section -->
        <div class="bg-white/50 dark:bg-slate-800/40 backdrop-blur-xl rounded-2xl border border-gray-200/50 dark:border-white/10 shadow-lg p-6 mb-8">
            <form method="GET" action="{{ route('testing.index') }}" class="flex flex-wrap gap-6 items-center">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z"/>
                        </svg>
                    </div>
                    <div>
                        <label for="project" class="text-xl font-bold text-gray-800 dark:text-white block">Filter Tests</label>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            @if(isset($projectId) && $projectId)
                                Showing {{ $tests->count() }} tests from selected project
                            @else
                                Choose a project to filter by ({{ $tests->count() }} total tests)
                            @endif
                        </p>
                    </div>
                </div>
                <div class="flex-1 flex items-center gap-4">
                    <select name="project" id="project" class="flex-1 min-w-[300px] bg-white/80 dark:bg-slate-700/80 border-2 border-gray-200 dark:border-gray-600 rounded-xl py-4 px-6 text-gray-800 dark:text-white text-lg font-semibold backdrop-blur-sm focus:ring-4 focus:ring-purple-400/50 focus:border-purple-400 transition-all shadow-lg" onchange="this.form.submit()">
                        <option value="">🌟 All Projects</option>
                        @foreach($projects ?? [] as $project)
                            <option value="{{ $project->id }}" @if(isset($projectId) && $projectId == $project->id) selected @endif>
                                📁 {{ $project->title ?? $project->project_name ?? 'Doc #'.$project->id }}
                            </option>
                        @endforeach
                    </select>
                    @if(isset($projectId) && $projectId)
                        <a href="{{ route('testing.index') }}" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-all duration-200 transform hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Clear
                        </a>
                    @endif
                </div>
            </form>
        </div>        <!-- Modern Tests Grid -->
        <div class="grid gap-8">
            @forelse($tests as $test)
                <div class="group bg-white/60 dark:bg-slate-800/50 backdrop-blur-2xl rounded-3xl border border-gray-200/50 dark:border-white/10 shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden hover:transform hover:scale-[1.02]">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-purple-500/10 via-pink-500/10 to-blue-500/10 dark:from-purple-500/20 dark:via-pink-500/20 dark:to-blue-500/20 p-6 border-b border-gray-200/50 dark:border-white/10">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg transform group-hover:rotate-6 transition-transform duration-300">
                                    <span class="text-2xl font-black text-white">#{{ $test->id }}</span>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-black text-gray-800 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">
                                        {{ optional($test->documentation)->title ?? optional($test->documentation)->project_name ?? 'Doc #'.$test->documentation_id }}
                                    </h3>
                                    <div class="flex items-center space-x-2 mt-2">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-gradient-to-r from-blue-100 to-purple-100 text-blue-800 dark:from-blue-900/50 dark:to-purple-900/50 dark:text-blue-300">
                                            {{ $test->test_type }}
                                        </span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $test->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                                <div class="w-3 h-3 bg-yellow-400 rounded-full animate-pulse delay-100"></div>
                                <div class="w-3 h-3 bg-red-400 rounded-full animate-pulse delay-200"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Content -->
                    <div class="p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <div class="space-y-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-green-400 to-blue-500 rounded-lg flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <h4 class="text-lg font-bold text-gray-800 dark:text-white">Description</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed pl-11">{{ Str::limit($test->test_description, 150) }}</p>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-pink-500 rounded-lg flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                        </svg>
                                    </div>
                                    <h4 class="text-lg font-bold text-gray-800 dark:text-white">Results</h4>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed pl-11">{{ Str::limit($test->test_results, 150) }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Footer with Actions -->
                    <div class="bg-gradient-to-r from-gray-50 to-blue-50 dark:from-slate-800/50 dark:to-slate-700/50 p-6 border-t border-gray-200/50 dark:border-white/10">
                        <div class="flex justify-center space-x-4">
                            <a href="{{ route('testing.show', $test->id) }}" class="group/btn inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 group-hover/btn:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                View Details
                            </a>
                            
                            <a href="{{ route('testing.edit', $test->id) }}" class="group/btn inline-flex items-center px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-500 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 group-hover/btn:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit Test
                            </a>
                            
                            <form action="{{ route('testing.destroy', $test->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="group/btn inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-pink-500 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200" onclick="return confirm('Are you sure you want to delete this test?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 group-hover/btn:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Smart Empty State -->
                <div class="bg-white/60 dark:bg-slate-800/50 backdrop-blur-2xl rounded-3xl border border-gray-200/50 dark:border-white/10 shadow-xl p-16 text-center">
                    <div class="max-w-md mx-auto">
                        <div class="relative w-32 h-32 mx-auto mb-8">
                            <div class="absolute inset-0 bg-gradient-to-tr from-purple-400 via-pink-400 to-blue-500 rounded-full opacity-20 animate-pulse"></div>
                            <div class="absolute inset-4 bg-gradient-to-tr from-purple-500 via-pink-500 to-blue-600 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    @if(isset($projectId) && $projectId)
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    @endif
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-3xl font-black text-gray-800 dark:text-white mb-4">
                            @if(isset($projectId) && $projectId)
                                No Tests Found
                            @else
                                No Tests Yet!
                            @endif
                        </h3>
                        <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                            @if(isset($projectId) && $projectId)
                                No tests match your current filter. Try selecting a different project or clear the filter to see all tests.
                            @else
                                Start your testing journey by creating your first test case. It's quick and easy!
                            @endif
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            @if(isset($projectId) && $projectId)
                                <a href="{{ route('testing.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Clear Filter
                                </a>
                            @endif
                            <a href="{{ route('testing.create') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-500 via-pink-500 to-blue-500 text-white font-bold rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                @if(isset($projectId) && $projectId)
                                    Add New Test
                                @else
                                    Create Your First Test
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
/* Enhanced Animations */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

@keyframes gradient-shift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 20px rgba(168, 85, 247, 0.4); }
    50% { box-shadow: 0 0 40px rgba(168, 85, 247, 0.8); }
}

/* Custom Animations */
.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-gradient {
    background-size: 200% 200%;
    animation: gradient-shift 4s ease infinite;
}

.animate-pulse-glow {
    animation: pulse-glow 2s ease-in-out infinite;
}

/* Enhanced Hover Effects */
.group:hover {
    transform: translateY(-8px) scale(1.02);
}

/* Gradient Text Animation */
.gradient-text {
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradient-shift 4s ease infinite;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Glass Morphism Enhanced */
.glass {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 12px;
}

::-webkit-scrollbar-track {
    background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    border-radius: 6px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(45deg, #8b5cf6, #ec4899, #3b82f6);
    border-radius: 6px;
    border: 2px solid transparent;
    background-clip: content-box;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(45deg, #7c3aed, #db2777, #2563eb);
    background-clip: content-box;
}

/* Button Hover Effects */
.btn-modern {
    position: relative;
    overflow: hidden;
}

.btn-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-modern:hover::before {
    left: 100%;
}

/* Card Hover Glow */
.card-glow:hover {
    box-shadow: 0 20px 40px rgba(168, 85, 247, 0.2),
                0 0 80px rgba(236, 72, 153, 0.1);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .grid {
        grid-template-columns: 1fr;
    }
    
    .text-5xl {
        font-size: 2.5rem;
    }
    
    .px-8 {
        padding-left: 1rem;
        padding-right: 1rem;
    }
}

/* Dark Mode Enhancements */
@media (prefers-color-scheme: dark) {
    .glass {
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
}
</style>
@endsection
