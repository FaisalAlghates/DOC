@extends('layouts.app')

@section('content')
{{-- Alpine.js fallback loader: ensures Alpine is always loaded --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div x-data="{ docType: 'engineering', currentStep: 1 }" x-init="$nextTick(() => { docType = 'engineering'; }); $watch('docType', value => { if (!['engineering','bestpractice'].includes(value)) docType = 'engineering'; })" class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <!-- Professional Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 shadow-2xl mb-8 relative">
                <div class="absolute inset-0 rounded-full bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 animate-pulse opacity-75"></div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h1 class="text-6xl font-black text-gray-900 mb-6">
                <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Professional</span><br>
                <span class="text-gray-800">Documentation Platform</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed font-medium">
                Create enterprise-grade documentation following industry standards. Build comprehensive technical specifications with our professional templates designed for software engineering excellence.
            </p>
        </div>

        <!-- Documentation Type Selector -->
        <div class="flex flex-col lg:flex-row gap-8 justify-center mb-16">
            <label class="group relative cursor-pointer flex-1 max-w-md">
                <input type="radio" name="docType" value="engineering" x-model="docType" class="sr-only">
                <div class="relative bg-white/80 backdrop-blur-xl rounded-3xl border-2 transition-all duration-500 shadow-xl hover:shadow-2xl p-10 h-full"
                     :class="docType === 'engineering' ? 'border-indigo-500 bg-gradient-to-br from-indigo-50 to-purple-50 scale-105 shadow-indigo-200/50' : 'border-gray-200 hover:border-indigo-300'">
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto mb-6 rounded-3xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-lg transform transition-transform duration-300"
                             :class="docType === 'engineering' ? 'animate-bounce' : 'group-hover:scale-110'">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Engineering Documentation</h3>
                        <p class="text-gray-600 leading-relaxed">Complete technical specifications including SRS compliance, system architecture, database design, and API documentation following IEEE standards.</p>
                        <div class="mt-6 flex flex-wrap gap-2 justify-center">
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-xs font-medium">SRS Compliant</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-medium">IEEE 830-1998</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">Technical</span>
                        </div>
                    </div>
                    <div class="absolute -top-3 -right-3 w-8 h-8 bg-indigo-500 rounded-full border-4 border-white opacity-0 transition-all duration-300 flex items-center justify-center"
                         :class="docType === 'engineering' ? 'opacity-100 scale-100' : 'opacity-0 scale-75'">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                    </div>
                </div>
            </label>

            <label class="group relative cursor-pointer flex-1 max-w-md">
                <input type="radio" name="docType" value="bestpractice" x-model="docType" class="sr-only">
                <div class="relative bg-white/80 backdrop-blur-xl rounded-3xl border-2 transition-all duration-500 shadow-xl hover:shadow-2xl p-10 h-full"
                     :class="docType === 'bestpractice' ? 'border-emerald-500 bg-gradient-to-br from-emerald-50 to-teal-50 scale-105 shadow-emerald-200/50' : 'border-gray-200 hover:border-emerald-300'">
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto mb-6 rounded-3xl bg-gradient-to-br from-emerald-500 to-teal-500 flex items-center justify-center shadow-lg transform transition-transform duration-300"
                             :class="docType === 'bestpractice' ? 'animate-bounce' : 'group-hover:scale-110'">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Best Practice Documentation</h3>
                        <p class="text-gray-600 leading-relaxed">Comprehensive project workflows, business processes, stakeholder management, and lessons learned documentation for organizational knowledge transfer.</p>
                        <div class="mt-6 flex flex-wrap gap-2 justify-center">
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-medium">Project Management</span>
                            <span class="px-3 py-1 bg-teal-100 text-teal-800 rounded-full text-xs font-medium">Best Practices</span>
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Workflows</span>
                        </div>
                    </div>
                    <div class="absolute -top-3 -right-3 w-8 h-8 bg-emerald-500 rounded-full border-4 border-white opacity-0 transition-all duration-300 flex items-center justify-center"
                         :class="docType === 'bestpractice' ? 'opacity-100 scale-100' : 'opacity-0 scale-75'">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                    </div>
                </div>
            </label>
        </div>

        <!-- Engineering Documentation Form -->
        <div x-show="docType === 'engineering'" x-cloak x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
            <div class="bg-white/70 backdrop-blur-2xl rounded-3xl border border-gray-200/50 shadow-2xl overflow-hidden">
                <form method="POST" action="{{ route('docs.store') }}" enctype="multipart/form-data" class="space-y-0">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ isset($user) ? $user->id : '' }}">
                    
                    <!-- Form Header -->
                    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 p-8">
                        <h2 class="text-3xl font-bold text-white mb-2">Engineering Documentation</h2>
                        <p class="text-indigo-100">Create comprehensive technical specifications following IEEE 830-1998 standards</p>
                    </div>

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
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-indigo-700" for="title">Document Title *</label>
                                <input id="title" type="text" name="title" value="{{ old('title') }}" 
                                       class="w-full border-2 border-indigo-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-indigo-300 transition-all duration-200 font-medium"
                                       placeholder="e.g., AI Documentation Platform - Technical Specification" required>
                                @error('title')<div class="text-red-600 mt-1 text-sm">{{ $message }}</div>@enderror
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-indigo-700" for="purpose">Purpose *</label>
                                <input id="purpose" type="text" name="purpose" value="{{ old('purpose') }}" 
                                       class="w-full border-2 border-indigo-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-indigo-300 transition-all duration-200 font-medium"
                                       placeholder="Primary objective and intended use of the system" required>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-indigo-700" for="scope">Scope</label>
                                <input id="scope" type="text" name="scope" value="{{ old('scope') }}" 
                                       class="w-full border-2 border-indigo-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-indigo-300 transition-all duration-200 font-medium"
                                       placeholder="System boundaries and coverage limitations">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-indigo-700" for="definitions">Definitions & Acronyms</label>
                                <textarea id="definitions" name="definitions" rows="3" 
                                          class="w-full border-2 border-indigo-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-indigo-300 transition-all duration-200 resize-none"
                                          placeholder="Key terms, definitions, and acronyms used throughout the documentation">{{ old('definitions') }}</textarea>
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
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-blue-700" for="overall_description">Overall Description</label>
                                <textarea id="overall_description" name="overall_description" rows="4" 
                                          class="w-full border-2 border-blue-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-blue-300 transition-all duration-200 resize-none"
                                          placeholder="Comprehensive overview of the system, its capabilities, and main functions">{{ old('overall_description') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-blue-700" for="product_perspective">Product Perspective</label>
                                <textarea id="product_perspective" name="product_perspective" rows="4" 
                                          class="w-full border-2 border-blue-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-blue-300 transition-all duration-200 resize-none"
                                          placeholder="How the product fits into the larger ecosystem and system context">{{ old('product_perspective') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-blue-700" for="user_classes">User Classes & Characteristics</label>
                                <textarea id="user_classes" name="user_classes" rows="3" 
                                          class="w-full border-2 border-blue-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-blue-300 transition-all duration-200 resize-none"
                                          placeholder="Different user types, their technical expertise, and usage patterns">{{ old('user_classes') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-blue-700" for="operating_environment">Operating Environment</label>
                                <textarea id="operating_environment" name="operating_environment" rows="3" 
                                          class="w-full border-2 border-blue-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-blue-300 transition-all duration-200 resize-none"
                                          placeholder="Technology stack, frameworks, browsers, and system requirements">{{ old('operating_environment') }}</textarea>
                            </div>
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
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-amber-700" for="functional_requirements">Functional Requirements</label>
                                <textarea id="functional_requirements" name="functional_requirements" rows="5" 
                                          class="w-full border-2 border-amber-200 focus:border-amber-500 focus:ring-4 focus:ring-amber-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-amber-300 transition-all duration-200 resize-none"
                                          placeholder="What the system must do - specific behaviors, features, and capabilities">{{ old('functional_requirements') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-amber-700" for="nonfunctional_requirements">Non-Functional Requirements</label>
                                <textarea id="nonfunctional_requirements" name="nonfunctional_requirements" rows="5" 
                                          class="w-full border-2 border-amber-200 focus:border-amber-500 focus:ring-4 focus:ring-amber-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-amber-300 transition-all duration-200 resize-none"
                                          placeholder="Performance, security, usability, reliability, and scalability requirements">{{ old('nonfunctional_requirements') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-amber-700" for="constraints">Design & Implementation Constraints</label>
                                <textarea id="constraints" name="constraints" rows="4" 
                                          class="w-full border-2 border-amber-200 focus:border-amber-500 focus:ring-4 focus:ring-amber-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-amber-300 transition-all duration-200 resize-none"
                                          placeholder="Technical limitations, business constraints, and compliance requirements">{{ old('constraints') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-amber-700" for="assumptions">Assumptions & Dependencies</label>
                                <textarea id="assumptions" name="assumptions" rows="4" 
                                          class="w-full border-2 border-amber-200 focus:border-amber-500 focus:ring-4 focus:ring-amber-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-amber-300 transition-all duration-200 resize-none"
                                          placeholder="Key assumptions and external dependencies that affect system design">{{ old('assumptions') }}</textarea>
                            </div>
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
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-violet-700" for="use_cases">Use Cases</label>
                                <textarea id="use_cases" name="use_cases" rows="5" 
                                          class="w-full border-2 border-violet-200 focus:border-violet-500 focus:ring-4 focus:ring-violet-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-violet-300 transition-all duration-200 resize-none"
                                          placeholder="Key user interactions, scenarios, and system workflows">{{ old('use_cases') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-violet-700" for="data_model">Data Model</label>
                                <textarea id="data_model" name="data_model" rows="5" 
                                          class="w-full border-2 border-violet-200 focus:border-violet-500 focus:ring-4 focus:ring-violet-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-violet-300 transition-all duration-200 resize-none"
                                          placeholder="Entities, relationships, attributes, and data structure design">{{ old('data_model') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-violet-700" for="interface_requirements">Interface Requirements</label>
                                <textarea id="interface_requirements" name="interface_requirements" rows="4" 
                                          class="w-full border-2 border-violet-200 focus:border-violet-500 focus:ring-4 focus:ring-violet-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-violet-300 transition-all duration-200 resize-none"
                                          placeholder="UI/UX specifications, API interfaces, and external system connections">{{ old('interface_requirements') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-violet-700" for="database_tables">Database Design</label>
                                <textarea id="database_tables" name="database_tables" rows="4" 
                                          class="w-full border-2 border-violet-200 focus:border-violet-500 focus:ring-4 focus:ring-violet-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-violet-300 transition-all duration-200 resize-none"
                                          placeholder="Table structures, relationships, indexes, and database schema">{{ old('database_tables') }}</textarea>
                            </div>
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
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-slate-700" for="appendices">Appendices & References</label>
                                <textarea id="appendices" name="appendices" rows="4" 
                                          class="w-full border-2 border-slate-200 focus:border-slate-500 focus:ring-4 focus:ring-slate-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-slate-300 transition-all duration-200 resize-none"
                                          placeholder="Glossary, references, additional resources, and supporting materials">{{ old('appendices') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-slate-700" for="compliance_report">SRS Compliance Report</label>
                                <textarea id="compliance_report" name="compliance_report" rows="4" 
                                          class="w-full border-2 border-slate-200 focus:border-slate-500 focus:ring-4 focus:ring-slate-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-slate-300 transition-all duration-200 resize-none"
                                          placeholder="IEEE 830-1998 compliance status and standards validation">{{ old('compliance_report') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-slate-700" for="ui_ux">UI/UX Design Specifications</label>
                                <textarea id="ui_ux" name="ui_ux" rows="4" 
                                          class="w-full border-2 border-slate-200 focus:border-slate-500 focus:ring-4 focus:ring-slate-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-slate-300 transition-all duration-200 resize-none"
                                          placeholder="User interface design principles, UX guidelines, and interaction patterns">{{ old('ui_ux') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-slate-700" for="conclusion">Conclusion</label>
                                <textarea id="conclusion" name="conclusion" rows="4" 
                                          class="w-full border-2 border-slate-200 focus:border-slate-500 focus:ring-4 focus:ring-slate-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-slate-300 transition-all duration-200 resize-none"
                                          placeholder="Summary, final thoughts, and next steps for the documentation">{{ old('conclusion') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="p-8 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600">
                        <div class="flex justify-center">
                            <button type="submit" class="group relative inline-flex items-center px-16 py-5 bg-white text-gray-800 font-bold text-xl rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-r from-white to-gray-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <svg class="w-8 h-8 mr-4 relative z-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                <span class="relative z-10">Create Engineering Documentation</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Best Practice Documentation Form -->
        <div x-show="docType === 'bestpractice'" x-cloak x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
            <div class="bg-white/70 backdrop-blur-2xl rounded-3xl border border-gray-200/50 shadow-2xl overflow-hidden">
                <form method="POST" action="{{ route('docs.store') }}" enctype="multipart/form-data" class="space-y-0">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ isset($user) ? $user->id : '' }}">
                    
                    <!-- Form Header -->
                    <div class="bg-gradient-to-r from-emerald-600 via-teal-600 to-green-600 p-8">
                        <h2 class="text-3xl font-bold text-white mb-2">Best Practice Documentation</h2>
                        <p class="text-emerald-100">Create comprehensive project workflows and organizational best practices</p>
                    </div>

                    <!-- Project Overview Section -->
                    <div class="p-8 bg-gradient-to-br from-emerald-50/50 to-teal-50/50 border-b border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800">Project Overview</h3>
                                <p class="text-gray-600">Project identification, stakeholders, and executive summary</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-emerald-700" for="project_name">Project Name *</label>
                                <input id="project_name" type="text" name="project_name" value="{{ old('project_name') }}" 
                                       class="w-full border-2 border-emerald-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-emerald-300 transition-all duration-200 font-medium"
                                       placeholder="e.g., AI Documentation Platform Implementation" required>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-emerald-700" for="stakeholders">Key Stakeholders</label>
                                <input id="stakeholders" type="text" name="stakeholders" value="{{ old('stakeholders') }}" 
                                       class="w-full border-2 border-emerald-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-emerald-300 transition-all duration-200 font-medium"
                                       placeholder="Project sponsors, team members, and decision makers">
                            </div>
                            <div class="lg:col-span-2 space-y-2">
                                <label class="block text-sm font-semibold text-emerald-700" for="project_overview">Project Overview</label>
                                <textarea id="project_overview" name="project_overview" rows="4" 
                                          class="w-full border-2 border-emerald-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-emerald-300 transition-all duration-200 resize-none"
                                          placeholder="Comprehensive overview of the project scope, objectives, and expected outcomes">{{ old('project_overview') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Business Goals & Deliverables Section -->
                    <div class="p-8 bg-gradient-to-br from-blue-50/50 to-indigo-50/50 border-b border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800">Business Goals & Deliverables</h3>
                                <p class="text-gray-600">Strategic objectives, success metrics, and project outcomes</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-blue-700" for="business_goals">Business Goals</label>
                                <textarea id="business_goals" name="business_goals" rows="5" 
                                          class="w-full border-2 border-blue-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-blue-300 transition-all duration-200 resize-none"
                                          placeholder="Strategic business objectives, ROI expectations, and organizational benefits">{{ old('business_goals') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-blue-700" for="deliverables">Key Deliverables</label>
                                <textarea id="deliverables" name="deliverables" rows="5" 
                                          class="w-full border-2 border-blue-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-blue-300 transition-all duration-200 resize-none"
                                          placeholder="Tangible outputs, milestones, and measurable project outcomes">{{ old('deliverables') }}</textarea>
                            </div>
                            <div class="lg:col-span-2 space-y-2">
                                <label class="block text-sm font-semibold text-blue-700" for="timeline">Project Timeline</label>
                                <input id="timeline" type="text" name="timeline" value="{{ old('timeline') }}" 
                                       class="w-full border-2 border-blue-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-blue-300 transition-all duration-200 font-medium"
                                       placeholder="Project phases, key dates, and delivery schedule">
                            </div>
                        </div>
                    </div>

                    <!-- Technical Architecture & Risk Management Section -->
                    <div class="p-8 bg-gradient-to-br from-amber-50/50 to-yellow-50/50 border-b border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-yellow-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800">Technical Architecture & Risk Management</h3>
                                <p class="text-gray-600">Technology decisions, architecture overview, and risk mitigation</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-amber-700" for="architecture">Technical Architecture & Stack</label>
                                <textarea id="architecture" name="architecture" rows="5" 
                                          class="w-full border-2 border-amber-200 focus:border-amber-500 focus:ring-4 focus:ring-amber-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-amber-300 transition-all duration-200 resize-none"
                                          placeholder="Technology choices, frameworks, architecture decisions, and technical rationale">{{ old('architecture') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-amber-700" for="risks">Risk Assessment & Mitigation</label>
                                <textarea id="risks" name="risks" rows="5" 
                                          class="w-full border-2 border-amber-200 focus:border-amber-500 focus:ring-4 focus:ring-amber-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-amber-300 transition-all duration-200 resize-none"
                                          placeholder="Identified risks, probability assessment, impact analysis, and mitigation strategies">{{ old('risks') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Deployment & Lessons Learned Section -->
                    <div class="p-8 bg-gradient-to-br from-purple-50/50 to-pink-50/50">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800">Deployment & Knowledge Transfer</h3>
                                <p class="text-gray-600">Implementation processes and organizational learning outcomes</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-purple-700" for="deployment">Deployment & Maintenance</label>
                                <textarea id="deployment" name="deployment" rows="5" 
                                          class="w-full border-2 border-purple-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-purple-300 transition-all duration-200 resize-none"
                                          placeholder="Deployment procedures, environment setup, maintenance protocols, and operational guidelines">{{ old('deployment') }}</textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-purple-700" for="lessons">Lessons Learned & Best Practices</label>
                                <textarea id="lessons" name="lessons" rows="5" 
                                          class="w-full border-2 border-purple-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 rounded-xl py-3 px-4 text-gray-800 bg-white/90 placeholder-purple-300 transition-all duration-200 resize-none"
                                          placeholder="Key insights, challenges overcome, recommendations for future projects, and knowledge transfer">{{ old('lessons') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="p-8 bg-gradient-to-r from-emerald-600 via-teal-600 to-green-600">
                        <div class="flex justify-center">
                            <button type="submit" class="group relative inline-flex items-center px-16 py-5 bg-white text-gray-800 font-bold text-xl rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-r from-white to-gray-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <svg class="w-8 h-8 mr-4 relative z-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                <span class="relative z-10">Create Best Practice Documentation</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
[x-cloak] { display: none !important; }

/* Professional Animation System */
@keyframes enterprise-fade {
    from { 
        opacity: 0; 
        transform: translateY(50px) scale(0.92);
        filter: blur(8px);
    }
    to { 
        opacity: 1; 
        transform: translateY(0) scale(1);
        filter: blur(0);
    }
}

@keyframes gradient-wave {
    0%, 100% { 
        background-position: 0% 50%; 
        transform: scale(1);
    }
    50% { 
        background-position: 100% 50%; 
        transform: scale(1.02);
    }
}

@keyframes professional-glow {
    0%, 100% { 
        box-shadow: 0 0 30px rgba(79, 70, 229, 0.3), 
                    0 0 60px rgba(139, 92, 246, 0.2),
                    0 0 90px rgba(219, 39, 119, 0.1);
    }
    50% { 
        box-shadow: 0 0 40px rgba(79, 70, 229, 0.5), 
                    0 0 80px rgba(139, 92, 246, 0.3),
                    0 0 120px rgba(219, 39, 119, 0.2);
    }
}

@keyframes section-entrance {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Enhanced Component Styles */
.animate-enterprise-fade { 
    animation: enterprise-fade 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both; 
}

.animate-gradient-wave {
    background-size: 300% 300%;
    animation: gradient-wave 4s ease-in-out infinite;
}

.animate-professional-glow {
    animation: professional-glow 3s ease-in-out infinite;
}

.animate-section-entrance {
    animation: section-entrance 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
}

/* Enhanced Input and Form Styles */
input:focus, textarea:focus {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1), 
                0 5px 15px rgba(0, 0, 0, 0.08);
    border-width: 3px;
}

input:hover, textarea:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
}

/* Professional Button Enhancement */
button:hover {
    transform: translateY(-4px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

button:active {
    transform: translateY(-2px) scale(0.98);
}

/* Enhanced Card Hover Effects */
.group:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
}

/* Responsive Professional Design */
@media (max-width: 1024px) {
    .max-w-7xl {
        max-width: 100%;
        padding: 0 1rem;
    }
}

@media (max-width: 768px) {
    .text-6xl {
        font-size: 2.5rem;
    }
    .p-10 {
        padding: 1.5rem;
    }
    .px-16 {
        padding-left: 2rem;
        padding-right: 2rem;
    }
}

/* Glass Morphism Enhancement */
.backdrop-blur-xl {
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
}

.backdrop-blur-2xl {
    backdrop-filter: blur(40px);
    -webkit-backdrop-filter: blur(40px);
}

/* Section Spacing and Layout */
.space-y-0 > * + * {
    margin-top: 0;
}

/* Professional Focus States */
.focus\:ring-4:focus {
    --tw-ring-opacity: 0.3;
    box-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
}

/* Enhanced Typography */
.font-black {
    font-weight: 900;
    letter-spacing: -0.025em;
}

.text-xl {
    line-height: 1.75;
}

/* Professional Color Transitions */
.transition-all {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 300ms;
}

/* Enhanced Shadow System */
.shadow-2xl {
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

.hover\:shadow-2xl:hover {
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35);
}

/* Professional Grid Layout */
.grid {
    gap: 1.5rem;
}

@media (min-width: 1024px) {
    .lg\:grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

/* Enhanced Border Radius */
.rounded-3xl {
    border-radius: 1.5rem;
}

.rounded-xl {
    border-radius: 0.75rem;
}

/* Professional Loading States */
.opacity-0 {
    opacity: 0;
}

.opacity-100 {
    opacity: 1;
}

/* Enhanced Overflow Handling */
.overflow-hidden {
    overflow: hidden;
}

/* Professional Z-Index Management */
.relative {
    position: relative;
}

.absolute {
    position: absolute;
}

.z-10 {
    z-index: 10;
}
</style>
@endsection
