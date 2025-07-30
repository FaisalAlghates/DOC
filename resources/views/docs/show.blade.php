@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div x-data="{ 
    tab: '{{ ($doc->documentation && $doc->documentation->doc_type === 'bestpractice') || (isset($doc->doc_type) && $doc->doc_type === 'bestpractice') ? 'bestpractice' : 'engineering' }}',
    showHistory: false,
    copySuccess: false
}" class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-8 px-4">
    
    <div class="max-w-7xl mx-auto">
        @if(session('message'))
            <div class="mb-8 p-6 bg-gradient-to-r from-emerald-50 to-green-50 border-l-4 border-emerald-500 rounded-2xl shadow-lg">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-emerald-800 font-medium">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Professional Header Section -->
        <div class="bg-white/80 backdrop-blur-2xl rounded-3xl border border-gray-200/50 shadow-2xl mb-8 overflow-hidden">
            <!-- Hero Header -->
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 p-10 relative">
                <div class="absolute inset-0 bg-black/10"></div>
                <div class="relative z-10">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                        <div class="flex items-center gap-6">
                            <div class="w-20 h-20 bg-white/20 backdrop-blur-xl rounded-2xl flex items-center justify-center border border-white/30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-4xl lg:text-5xl font-black text-white mb-2">
                                    {{ $doc->documentation->title ?? $doc->title ?? 'Software Documentation' }}
                                </h1>
                                <p class="text-xl text-white/90 font-medium">Professional Technical Specification</p>
                                <div class="flex items-center gap-4 mt-3">
                                    <span class="px-4 py-2 bg-white/20 backdrop-blur-xl rounded-full text-white text-sm font-medium border border-white/30">
                                        {{ ucfirst($doc->documentation->doc_type ?? 'engineering') }} Documentation
                                    </span>
                                    <span class="px-4 py-2 bg-white/20 backdrop-blur-xl rounded-full text-white text-sm font-medium border border-white/30">
                                        IEEE 830-1998 Compliant
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Actions -->
                        <div class="flex flex-col sm:flex-row gap-3">
                            <a href="{{ route('docs.edit', ['id' => $doc->documentation->id, 'type' => $doc->documentation->doc_type]) }}" 
                               class="group inline-flex items-center px-6 py-3 bg-white/20 backdrop-blur-xl text-white font-semibold rounded-xl border border-white/30 hover:bg-white/30 transition-all duration-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Edit Documentation
                            </a>
                            <button @click="copySuccess = true; setTimeout(() => copySuccess = false, 2000)" 
                                    class="group inline-flex items-center px-6 py-3 bg-white/20 backdrop-blur-xl text-white font-semibold rounded-xl border border-white/30 hover:bg-white/30 transition-all duration-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                <span x-show="!copySuccess">Share Link</span>
                                <span x-show="copySuccess" x-cloak>Copied!</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metadata Section -->
            <div class="p-8 bg-gradient-to-br from-gray-50 to-white border-b border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Created by</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $doc->documentation->user->name ?? 'Not specified' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10m6-10v10m-6-4h6"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Created on</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $doc->documentation->created_at ? $doc->documentation->created_at->format('M d, Y') : 'Not specified' }}</p>
                        </div>
                    </div>

                    @php 
                        $lastHistory = App\Models\DocumentHistory::where('documentation_id', $doc->documentation->id)
                                                               ->where('action', 'update')
                                                               ->with('user')
                                                               ->latest()
                                                               ->first();
                    @endphp
                    
                    @if($lastHistory)
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Last edited by</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $lastHistory->user->name ?? 'Not specified' }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Last modified</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $lastHistory->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    @else
                    <div class="md:col-span-2 flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-gray-400 to-gray-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Status</p>
                            <p class="text-lg font-semibold text-gray-900">No modifications yet</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Advanced Tab Navigation -->
            <div class="p-8 bg-white border-b border-gray-100">
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button type="button" 
                            @click="tab = 'engineering'" 
                            :class="tab === 'engineering' ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg transform scale-105' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'" 
                            class="group relative px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 flex items-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                        Engineering Documentation
                        <div x-show="tab === 'engineering'" x-cloak class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full border-2 border-white"></div>
                    </button>
                    
                    <button type="button" 
                            @click="tab = 'best_practice'" 
                            :class="tab === 'best_practice' ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-lg transform scale-105' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'" 
                            class="group relative px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 flex items-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                        Best Practice Documentation
                        <div x-show="tab === 'best_practice'" x-cloak class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full border-2 border-white"></div>
                    </button>
                </div>
            </div>
        </div>
        <!-- Engineering Documentation Content -->
        <div x-show="tab === 'engineering'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
            <div class="bg-white/80 backdrop-blur-2xl rounded-3xl border border-gray-200/50 shadow-2xl overflow-hidden">
                
                <!-- Basic Information Section -->
                <div class="p-8 bg-gradient-to-br from-indigo-50/50 to-purple-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Basic Information</h3>
                            <p class="text-gray-600">Essential project details and documentation metadata</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @include('components.doc-field', ['label' => 'Purpose', 'value' => $doc->purpose, 'color' => 'indigo'])
                        @include('components.doc-field', ['label' => 'Scope', 'value' => $doc->scope, 'color' => 'indigo'])
                        <div class="lg:col-span-2">
                            @include('components.doc-field', ['label' => 'Definitions, Acronyms, and Abbreviations', 'value' => $doc->definitions, 'color' => 'indigo'])
                        </div>
                    </div>
                </div>

                <!-- Product Description Section -->
                <div class="p-8 bg-gradient-to-br from-blue-50/50 to-cyan-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Product Description</h3>
                            <p class="text-gray-600">System overview, perspective, and environmental context</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @include('components.doc-field', ['label' => 'Overall Description', 'value' => $doc->overall_description, 'color' => 'blue'])
                        @include('components.doc-field', ['label' => 'Product Perspective', 'value' => $doc->product_perspective, 'color' => 'blue'])
                        @include('components.doc-field', ['label' => 'User Classes and Characteristics', 'value' => $doc->user_classes, 'color' => 'blue'])
                        @include('components.doc-field', ['label' => 'Operating Environment', 'value' => $doc->operating_environment, 'color' => 'blue'])
                    </div>
                </div>

                <!-- Requirements & Constraints Section -->
                <div class="p-8 bg-gradient-to-br from-amber-50/50 to-orange-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Requirements & Constraints</h3>
                            <p class="text-gray-600">Functional and non-functional requirements with implementation constraints</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @include('components.doc-field', ['label' => 'Functional Requirements', 'value' => $doc->functional_requirements, 'color' => 'amber'])
                        @include('components.doc-field', ['label' => 'Non-Functional Requirements', 'value' => $doc->nonfunctional_requirements, 'color' => 'amber'])
                        @include('components.doc-field', ['label' => 'Design and Implementation Constraints', 'value' => $doc->constraints, 'color' => 'amber'])
                        @include('components.doc-field', ['label' => 'Assumptions and Dependencies', 'value' => $doc->assumptions, 'color' => 'amber'])
                    </div>
                </div>

                <!-- System Design Section -->
                <div class="p-8 bg-gradient-to-br from-violet-50/50 to-purple-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">System Design</h3>
                            <p class="text-gray-600">Architecture, data models, and interface specifications</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @include('components.doc-field', ['label' => 'Use Cases', 'value' => $doc->use_cases, 'color' => 'violet'])
                        @include('components.doc-field', ['label' => 'Data Model (Entities & Relationships)', 'value' => $doc->data_model, 'color' => 'violet'])
                        @include('components.doc-field', ['label' => 'Interface Requirements (UI & API)', 'value' => $doc->interface_requirements, 'color' => 'violet'])
                        @include('components.doc-field', ['label' => 'Database Tables (Overview, Mapping)', 'value' => $doc->database_tables, 'color' => 'violet'])
                    </div>
                </div>

                <!-- Additional Information Section -->
                <div class="p-8 bg-gradient-to-br from-slate-50/50 to-gray-50/50">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-slate-500 to-gray-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Additional Information</h3>
                            <p class="text-gray-600">Supporting documentation, compliance, and concluding remarks</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @include('components.doc-field', ['label' => 'Appendices (Glossary, References)', 'value' => $doc->appendices, 'color' => 'slate'])
                        @include('components.doc-field', ['label' => 'SRS Compliance Report', 'value' => $doc->compliance_report, 'color' => 'slate'])
                        @include('components.doc-field', ['label' => 'UI/UX', 'value' => $doc->ui_ux, 'color' => 'slate'])
                        <div class="space-y-4">
                            @include('components.doc-field', ['label' => 'Conclusion', 'value' => $doc->conclusion, 'color' => 'slate'])
                            @if($doc->content)
                                @include('components.doc-field', ['label' => 'Content (AI Generated or Manual)', 'value' => $doc->content, 'color' => 'slate'])
                            @endif
                            @if($doc->code_files && is_array($doc->code_files))
                                <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                                    <div class="font-semibold text-slate-700 mb-3 flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                                        </svg>
                                        Uploaded Code Files
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                        @foreach($doc->code_files as $file)
                                            <a href="{{ asset('storage/' . $file) }}" 
                                               class="flex items-center gap-2 p-3 bg-white rounded-lg border border-slate-200 hover:border-slate-400 hover:shadow-md transition-all duration-200" 
                                               target="_blank">
                                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                <span class="text-sm font-medium text-slate-700 truncate">{{ basename($file) }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Testing Section (if exists) -->
                @php $testings = \App\Models\Testing::where('documentation_id', $doc->documentation->id)->get(); @endphp
                @if($testings->count())
                <div class="p-8 bg-gradient-to-br from-rose-50/50 to-pink-50/50 border-t border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-rose-500 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Testing Information</h3>
                            <p class="text-gray-600">Associated test cases and validation results</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @foreach($testings as $index => $test)
                            <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 border border-rose-200 shadow-lg">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-8 h-8 bg-gradient-to-br from-rose-500 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                        {{ $index + 1 }}
                                    </div>
                                    <h4 class="font-bold text-gray-800">Test Case {{ $index + 1 }}</h4>
                                </div>
                                <div class="space-y-3">
                                    <div>
                                        <span class="font-semibold text-rose-700">Type:</span>
                                        <span class="text-gray-700">{{ $test->test_type ?? 'Not specified' }}</span>
                                    </div>
                                    <div>
                                        <span class="font-semibold text-rose-700">Description:</span>
                                        <p class="text-gray-700 text-sm mt-1">{{ $test->test_description ?? 'No description provided' }}</p>
                                    </div>
                                    @if($test->test_results)
                                        <div>
                                            <span class="font-semibold text-emerald-700">Results:</span>
                                            <p class="text-emerald-600 text-sm mt-1">{{ $test->test_results }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
        <!-- Best Practice Documentation Content -->
        <div x-show="tab === 'best_practice'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
            @if($doc->doc_type === 'bestpractice' || ($doc->documentation && $doc->documentation->doc_type === 'bestpractice'))
            <div class="bg-white/80 backdrop-blur-2xl rounded-3xl border border-gray-200/50 shadow-2xl overflow-hidden">
                
                <!-- Project Overview Section -->
                <div class="p-8 bg-gradient-to-br from-emerald-50/50 to-teal-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Project Overview</h3>
                            <p class="text-gray-600">Essential project information and stakeholder details</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @include('components.doc-field', ['label' => 'Project Name', 'value' => $doc->project_name ?? '', 'color' => 'emerald'])
                        @include('components.doc-field', ['label' => 'Stakeholders', 'value' => $doc->stakeholders ?? '', 'color' => 'emerald'])
                        <div class="lg:col-span-2">
                            @include('components.doc-field', ['label' => 'Project Overview', 'value' => $doc->project_overview ?? '', 'color' => 'emerald'])
                        </div>
                    </div>
                </div>

                <!-- Business & Goals Section -->
                <div class="p-8 bg-gradient-to-br from-blue-50/50 to-cyan-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Business & Goals</h3>
                            <p class="text-gray-600">Strategic objectives, deliverables, and timeline planning</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @include('components.doc-field', ['label' => 'Business Goals', 'value' => $doc->business_goals ?? '', 'color' => 'blue'])
                        @include('components.doc-field', ['label' => 'Timeline', 'value' => $doc->timeline ?? '', 'color' => 'blue'])
                        <div class="lg:col-span-2">
                            @include('components.doc-field', ['label' => 'Deliverables', 'value' => $doc->deliverables ?? '', 'color' => 'blue'])
                        </div>
                    </div>
                </div>

                <!-- Technical & Implementation Section -->
                <div class="p-8 bg-gradient-to-br from-amber-50/50 to-orange-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Technical & Implementation</h3>
                            <p class="text-gray-600">Architecture, technology stack, and risk assessment</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @include('components.doc-field', ['label' => 'Architecture & Technology Stack', 'value' => $doc->architecture ?? '', 'color' => 'amber'])
                        @include('components.doc-field', ['label' => 'Risks & Mitigation', 'value' => $doc->risks ?? '', 'color' => 'amber'])
                    </div>
                </div>

                <!-- Operations & Knowledge Section -->
                <div class="p-8 bg-gradient-to-br from-slate-50/50 to-gray-50/50">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-slate-500 to-gray-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Operations & Knowledge</h3>
                            <p class="text-gray-600">Deployment strategies and lessons learned</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @include('components.doc-field', ['label' => 'Deployment & Maintenance', 'value' => $doc->deployment ?? '', 'color' => 'slate'])
                        @include('components.doc-field', ['label' => 'Lessons Learned', 'value' => $doc->lessons ?? '', 'color' => 'slate'])
                    </div>
                </div>
            </div>
            @endif
        </div>
        
        <!-- Modification History -->
        @php $histories = App\Models\DocumentHistory::where('documentation_id', $doc->documentation->id)
                                                   ->with('user')
                                                   ->orderBy('created_at', 'desc')
                                                   ->get(); @endphp
        @if($histories->count() > 0)
        <div class="mx-6 mb-6">
            <details class="bg-white border border-gray-200 rounded-xl">
                <summary class="p-4 cursor-pointer font-semibold text-gray-700 hover:bg-gray-50 rounded-xl transition">
                    📋 Modification History ({{ $histories->count() }} {{ $histories->count() == 1 ? 'operation' : 'operations' }})
                </summary>
                <div class="p-4 border-t border-gray-200 max-h-60 overflow-y-auto">
                    @foreach($histories as $history)
                    <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-b-0">
                        <div class="flex items-center gap-3">
                            @if($history->action === 'create')
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </div>
                                <span class="text-green-700 font-medium">Documentation created</span>
                            @else
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </div>
                                <span class="text-blue-700 font-medium">Documentation updated</span>
                            @endif
                            <span class="text-gray-600">by {{ $history->user->name ?? 'Deleted user' }}</span>
                        </div>
                        <span class="text-gray-500 text-sm">{{ $history->created_at->format('Y-m-d H:i') }}</span>
                    </div>
                    @endforeach
                </div>
            </details>
        </div>
        @endif
        
        <!-- Action Buttons -->
        <div class="flex justify-center gap-6 px-6 pb-8">
            <a href="{{ route('docs.edit', ['id' => $doc->documentation->id, 'type' => $doc->documentation->doc_type]) }}" 
               class="group relative px-8 py-4 bg-gradient-to-r from-amber-400 to-yellow-500 hover:from-amber-500 hover:to-yellow-600 text-white rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center gap-3">
                <svg class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m2 2l-6 6m2-2l6-6"/>
                </svg>
                Edit Documentation
                <div class="absolute inset-0 rounded-2xl bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>
            
            <form action="{{ route('docs.destroy', $doc->documentation->id) }}" method="POST" class="inline">
                @csrf 
                @method('DELETE')
                <button type="submit" 
                        class="group relative px-8 py-4 bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 text-white rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center gap-3" 
                        onclick="return confirm('Are you sure you want to delete this documentation? This action cannot be undone.')">
                    <svg class="w-6 h-6 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Delete Documentation
                    <div class="absolute inset-0 rounded-2xl bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
