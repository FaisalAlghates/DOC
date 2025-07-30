@extends('layouts.app')

@section('content')
<style>
    [x-cloak] { display: none !important; }
    .glass-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .floating-label {
        transition: all 0.3s ease;
    }
    .floating-label:focus-within label {
        transform: translateY(-1.5rem) scale(0.85);
        color: #4F46E5;
    }
    .floating-label input:not(:placeholder-shown) + label {
        transform: translateY(-1.5rem) scale(0.85);
        color: #6B7280;
    }
</style>

<!-- Professional Background -->
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50">
    <!-- Hero Header -->
    <div class="relative overflow-hidden bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/80 to-purple-600/80"></div>
        
        <!-- Content -->
        <div class="relative max-w-7xl mx-auto px-6 py-16">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-xl rounded-3xl flex items-center justify-center border border-white/30">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m2 2l-6 6m2-2l6-6"/>
                        </svg>
                    </div>
                    <div class="text-white">
                        <h1 class="text-4xl md:text-5xl font-bold mb-2">Edit Documentation</h1>
                        <p class="text-xl text-indigo-100">{{ $doc->documentation->title ?? $doc->title ?? 'Untitled Document' }}</p>
                        <div class="flex items-center mt-4 space-x-6 text-sm text-indigo-200">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>{{ $doc->documentation->user->name ?? 'Unknown' }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>{{ $doc->documentation->created_at ? $doc->documentation->created_at->format('M d, Y') : 'Unknown' }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                <span class="px-2 py-1 bg-white/20 rounded-full text-xs font-medium">
                                    {{ $doc->documentation->doc_type ?? 'engineering' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="hidden md:flex space-x-4">
                    <a href="{{ route('docs.show', ['id' => $doc->id ?? $doc->documentation->id, 'type' => ($doc->documentation->doc_type ?? 'engineering')]) }}" 
                       class="px-6 py-3 bg-white/20 backdrop-blur-xl text-white rounded-2xl font-semibold hover:bg-white/30 transition-all duration-300 border border-white/30">
                        View Documentation
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-6 py-12" x-data="{ 
        tab: '{{ ($doc->documentation && $doc->documentation->doc_type === 'bestpractice') || (isset($doc->doc_type) && $doc->doc_type === 'bestpractice') ? 'best_practice' : 'engineering' }}',
        showPreview: false,
        autoSave: false
    }">
        
        <!-- Status Messages -->
        @if(session('message'))
            <div class="mb-8 bg-white/80 backdrop-blur-xl rounded-2xl border border-emerald-200 p-6 shadow-lg">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-emerald-800">Success</h3>
                        <p class="text-emerald-700">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-8 bg-white/80 backdrop-blur-xl rounded-2xl border border-red-200 p-6 shadow-lg">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-red-800">Error</h3>
                        <p class="text-red-700">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-8 bg-white/80 backdrop-blur-xl rounded-2xl border border-red-200 p-6 shadow-lg">
                <div class="flex items-start space-x-3">
                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-red-800 mb-2">Please correct the following errors:</h3>
                        <ul class="space-y-1">
                            @foreach ($errors->all() as $error)
                                <li class="text-red-700 text-sm">• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Professional Tab Navigation -->
        <div class="bg-white/80 backdrop-blur-2xl rounded-3xl border border-gray-200/50 shadow-2xl p-8 mb-8">
            <div class="flex flex-col lg:flex-row justify-center items-center gap-6">
                <div class="flex bg-gray-100/80 backdrop-blur-xl rounded-2xl p-2 gap-2">
                    <!-- Engineering Documentation Tab -->
                    <button 
                        @click="tab = 'engineering'" 
                        :class="tab === 'engineering' ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg transform scale-105' : 'bg-transparent text-gray-600 hover:bg-white/70'" 
                        class="group relative px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 flex items-center gap-3">
                        <svg class="w-6 h-6 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                        Engineering Documentation
                        <div x-show="tab === 'engineering'" x-cloak class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full border-2 border-white"></div>
                    </button>
                    
                    <!-- Best Practice Documentation Tab -->
                    <button 
                        @click="tab = 'best_practice'" 
                        :class="tab === 'best_practice' ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-lg transform scale-105' : 'bg-transparent text-gray-600 hover:bg-white/70'" 
                        class="group relative px-8 py-4 rounded-2xl font-bold text-lg transition-all duration-300 flex items-center gap-3">
                        <svg class="w-6 h-6 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                        Best Practice Documentation
                        <div x-show="tab === 'best_practice'" x-cloak class="absolute -top-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full border-2 border-white"></div>
                    </button>
                </div>
                
                <!-- Advanced Options -->
                <div class="flex items-center space-x-4">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" x-model="autoSave" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <span class="text-sm font-medium text-gray-700">Auto-save</span>
                    </label>
                    <button @click="showPreview = !showPreview" 
                            class="px-4 py-2 bg-white/70 backdrop-blur-xl text-gray-700 rounded-xl font-medium hover:bg-white/90 transition-all duration-300 border border-gray-200">
                        <span x-text="showPreview ? 'Hide Preview' : 'Show Preview'"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Form Container -->
        <form method="POST" action="{{ route('docs.update', $doc->id) }}" 
              class="bg-white/80 backdrop-blur-2xl rounded-3xl border border-gray-200/50 shadow-2xl overflow-hidden"
              x-data="{ 
                  formData: {},
                  isDirty: false,
                  isSubmitting: false
              }"
              @input="isDirty = true"
              @submit="isSubmitting = true; setTimeout(() => { if(isSubmitting) { alert('Form submission taking too long. Please check your internet connection.'); isSubmitting = false; } }, 30000)">
            @csrf 
            @method('PUT')
            <input type="hidden" name="doc_type" value="{{ $doc->documentation->doc_type }}">
            
            <!-- Engineering Documentation Section -->
            <div x-show="tab === 'engineering'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                
                <!-- Documentation Title Section -->
                <div class="p-8 bg-gradient-to-br from-indigo-50/50 to-purple-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Document Information</h3>
                            <p class="text-gray-600">Essential documentation metadata and identification</p>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <input type="text" 
                               name="title" 
                               value="{{ old('title', $doc->documentation->title ?? $doc->title ?? '') }}" 
                               placeholder=" "
                               class="peer w-full px-6 py-4 text-lg font-medium border-2 border-indigo-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-300"
                               required>
                        <label class="absolute left-6 top-4 text-gray-500 text-lg transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-indigo-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                            Documentation Title *
                        </label>
                    </div>
                </div>

                <!-- Basic Information Section -->
                <div class="p-8 bg-gradient-to-br from-blue-50/50 to-cyan-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Basic Information</h3>
                            <p class="text-gray-600">Essential project details and documentation metadata</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Purpose Field -->
                        <div class="relative">
                            <textarea name="purpose" 
                                      placeholder=" "
                                      rows="4"
                                      class="peer w-full px-6 py-4 border-2 border-blue-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 resize-none">{{ old('purpose', $doc->purpose ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-blue-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Purpose
                            </label>
                        </div>
                        
                        <!-- Scope Field -->
                        <div class="relative">
                            <textarea name="scope" 
                                      placeholder=" "
                                      rows="4"
                                      class="peer w-full px-6 py-4 border-2 border-blue-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 resize-none">{{ old('scope', $doc->scope ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-blue-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Scope
                            </label>
                        </div>
                        
                        <!-- Definitions Field -->
                        <div class="relative lg:col-span-2">
                            <textarea name="definitions" 
                                      placeholder=" "
                                      rows="4"
                                      class="peer w-full px-6 py-4 border-2 border-blue-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 resize-none">{{ old('definitions', $doc->definitions ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-blue-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Definitions, Acronyms, and Abbreviations
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Product Description Section -->
                <div class="p-8 bg-gradient-to-br from-amber-50/50 to-orange-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Product Description</h3>
                            <p class="text-gray-600">System overview, perspective, and environmental context</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Overall Description -->
                        <div class="relative">
                            <textarea name="overall_description" 
                                      placeholder=" "
                                      rows="4"
                                      class="peer w-full px-6 py-4 border-2 border-amber-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-100 transition-all duration-300 resize-none">{{ old('overall_description', $doc->overall_description ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-amber-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Overall Description
                            </label>
                        </div>
                        
                        <!-- Product Perspective -->
                        <div class="relative">
                            <textarea name="product_perspective" 
                                      placeholder=" "
                                      rows="4"
                                      class="peer w-full px-6 py-4 border-2 border-amber-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-100 transition-all duration-300 resize-none">{{ old('product_perspective', $doc->product_perspective ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-amber-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Product Perspective
                            </label>
                        </div>
                        
                        <!-- User Classes -->
                        <div class="relative">
                            <textarea name="user_classes" 
                                      placeholder=" "
                                      rows="4"
                                      class="peer w-full px-6 py-4 border-2 border-amber-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-100 transition-all duration-300 resize-none">{{ old('user_classes', $doc->user_classes ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-amber-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                User Classes and Characteristics
                            </label>
                        </div>
                        
                        <!-- Operating Environment -->
                        <div class="relative">
                            <textarea name="operating_environment" 
                                      placeholder=" "
                                      rows="4"
                                      class="peer w-full px-6 py-4 border-2 border-amber-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-100 transition-all duration-300 resize-none">{{ old('operating_environment', $doc->operating_environment ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-amber-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Operating Environment
                            </label>
                        </div>
                    </div>
                </div>
                <!-- Requirements & Constraints Section -->
                <div class="p-8 bg-gradient-to-br from-emerald-50/50 to-teal-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Requirements & Constraints</h3>
                            <p class="text-gray-600">Functional and non-functional requirements with implementation constraints</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Constraints -->
                        <div class="relative">
                            <textarea name="constraints" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-emerald-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 transition-all duration-300 resize-none">{{ old('constraints', $doc->constraints ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-emerald-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Design and Implementation Constraints
                            </label>
                        </div>
                        
                        <!-- Assumptions -->
                        <div class="relative">
                            <textarea name="assumptions" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-emerald-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 transition-all duration-300 resize-none">{{ old('assumptions', $doc->assumptions ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-emerald-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Assumptions and Dependencies
                            </label>
                        </div>
                        
                        <!-- Functional Requirements -->
                        <div class="relative">
                            <textarea name="functional_requirements" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-emerald-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 transition-all duration-300 resize-none">{{ old('functional_requirements', $doc->functional_requirements ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-emerald-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Functional Requirements
                            </label>
                        </div>
                        
                        <!-- Non-Functional Requirements -->
                        <div class="relative">
                            <textarea name="nonfunctional_requirements" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-emerald-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 transition-all duration-300 resize-none">{{ old('nonfunctional_requirements', $doc->nonfunctional_requirements ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-emerald-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Non-Functional Requirements
                            </label>
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
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Use Cases -->
                        <div class="relative">
                            <textarea name="use_cases" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-violet-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-violet-500 focus:ring-4 focus:ring-violet-100 transition-all duration-300 resize-none">{{ old('use_cases', $doc->use_cases ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-violet-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Use Cases
                            </label>
                        </div>
                        
                        <!-- Data Model -->
                        <div class="relative">
                            <textarea name="data_model" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-violet-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-violet-500 focus:ring-4 focus:ring-violet-100 transition-all duration-300 resize-none">{{ old('data_model', $doc->data_model ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-violet-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Data Model (Entities & Relationships)
                            </label>
                        </div>
                        
                        <!-- Interface Requirements -->
                        <div class="relative">
                            <textarea name="interface_requirements" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-violet-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-violet-500 focus:ring-4 focus:ring-violet-100 transition-all duration-300 resize-none">{{ old('interface_requirements', $doc->interface_requirements ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-violet-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Interface Requirements (UI & API)
                            </label>
                        </div>
                        
                        <!-- Database Tables -->
                        <div class="relative">
                            <textarea name="database_tables" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-violet-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-violet-500 focus:ring-4 focus:ring-violet-100 transition-all duration-300 resize-none">{{ old('database_tables', $doc->database_tables ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-violet-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Database Tables (Overview, Mapping)
                            </label>
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
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Appendices -->
                        <div class="relative">
                            <textarea name="appendices" 
                                      placeholder=" "
                                      rows="4"
                                      class="peer w-full px-6 py-4 border-2 border-slate-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-slate-500 focus:ring-4 focus:ring-slate-100 transition-all duration-300 resize-none">{{ old('appendices', $doc->appendices ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-slate-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Appendices (Glossary, References)
                            </label>
                        </div>
                        
                        <!-- Compliance Report -->
                        <div class="relative">
                            <textarea name="compliance_report" 
                                      placeholder=" "
                                      rows="4"
                                      class="peer w-full px-6 py-4 border-2 border-slate-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-slate-500 focus:ring-4 focus:ring-slate-100 transition-all duration-300 resize-none">{{ old('compliance_report', $doc->compliance_report ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-slate-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                SRS Compliance Report
                            </label>
                        </div>
                        
                        <!-- UI/UX -->
                        <div class="relative">
                            <textarea name="ui_ux" 
                                      placeholder=" "
                                      rows="4"
                                      class="peer w-full px-6 py-4 border-2 border-slate-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-slate-500 focus:ring-4 focus:ring-slate-100 transition-all duration-300 resize-none">{{ old('ui_ux', $doc->ui_ux ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-slate-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                UI/UX
                            </label>
                        </div>
                        
                        <!-- Conclusion -->
                        <div class="relative">
                            <textarea name="conclusion" 
                                      placeholder=" "
                                      rows="4"
                                      class="peer w-full px-6 py-4 border-2 border-slate-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-slate-500 focus:ring-4 focus:ring-slate-100 transition-all duration-300 resize-none">{{ old('conclusion', $doc->conclusion ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-slate-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Conclusion
                            </label>
                        </div>
                        
                        <!-- Content -->
                        <div class="relative lg:col-span-2">
                            <textarea name="content" 
                                      placeholder=" "
                                      rows="6"
                                      class="peer w-full px-6 py-4 border-2 border-slate-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-slate-500 focus:ring-4 focus:ring-slate-100 transition-all duration-300 resize-none">{{ old('content', $doc->content ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-slate-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Content (AI Generated or Manual)
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Best Practice Documentation Section -->
            <div x-show="tab === 'best_practice'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                
                <!-- Project Name Section -->
                <div class="p-8 bg-gradient-to-br from-emerald-50/50 to-teal-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Project Information</h3>
                            <p class="text-gray-600">Essential project details and identification</p>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <input type="text" 
                               name="project_name" 
                               value="{{ old('project_name', $doc->project_name ?? '') }}" 
                               placeholder=" "
                               class="peer w-full px-6 py-4 text-lg font-medium border-2 border-emerald-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 transition-all duration-300">
                        <label class="absolute left-6 top-4 text-gray-500 text-lg transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-emerald-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                            Project Name
                        </label>
                    </div>
                </div>

                <!-- Project Overview Section -->
                <div class="p-8 bg-gradient-to-br from-blue-50/50 to-cyan-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Project Overview</h3>
                            <p class="text-gray-600">Comprehensive project description and stakeholder information</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Project Overview -->
                        <div class="relative">
                            <textarea name="project_overview" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-blue-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 resize-none">{{ old('project_overview', $doc->project_overview ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-blue-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Project Overview
                            </label>
                        </div>
                        
                        <!-- Stakeholders -->
                        <div class="relative">
                            <textarea name="stakeholders" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-blue-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all duration-300 resize-none">{{ old('stakeholders', $doc->stakeholders ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-blue-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Stakeholders
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Business Goals Section -->
                <div class="p-8 bg-gradient-to-br from-amber-50/50 to-orange-50/50 border-b border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Business Goals & Deliverables</h3>
                            <p class="text-gray-600">Strategic objectives, timeline, and expected outcomes</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Business Goals -->
                        <div class="relative">
                            <textarea name="business_goals" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-amber-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-100 transition-all duration-300 resize-none">{{ old('business_goals', $doc->business_goals ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-amber-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Business Goals
                            </label>
                        </div>
                        
                        <!-- Timeline -->
                        <div class="relative">
                            <textarea name="timeline" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-amber-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-100 transition-all duration-300 resize-none">{{ old('timeline', $doc->timeline ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-amber-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Timeline
                            </label>
                        </div>
                        
                        <!-- Deliverables -->
                        <div class="relative lg:col-span-2">
                            <textarea name="deliverables" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-amber-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-100 transition-all duration-300 resize-none">{{ old('deliverables', $doc->deliverables ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-amber-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Deliverables
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Technical Implementation Section -->
                <div class="p-8 bg-gradient-to-br from-slate-50/50 to-gray-50/50">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-slate-500 to-gray-600 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Technical Implementation</h3>
                            <p class="text-gray-600">Architecture, risk management, deployment, and lessons learned</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Architecture -->
                        <div class="relative">
                            <textarea name="architecture" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-slate-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-slate-500 focus:ring-4 focus:ring-slate-100 transition-all duration-300 resize-none">{{ old('architecture', $doc->architecture ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-slate-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Architecture & Technology Stack
                            </label>
                        </div>
                        
                        <!-- Risks -->
                        <div class="relative">
                            <textarea name="risks" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-slate-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-slate-500 focus:ring-4 focus:ring-slate-100 transition-all duration-300 resize-none">{{ old('risks', $doc->risks ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-slate-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Risks & Mitigation
                            </label>
                        </div>
                        
                        <!-- Deployment -->
                        <div class="relative">
                            <textarea name="deployment" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-slate-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-slate-500 focus:ring-4 focus:ring-slate-100 transition-all duration-300 resize-none">{{ old('deployment', $doc->deployment ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-slate-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Deployment & Maintenance
                            </label>
                        </div>
                        
                        <!-- Lessons Learned -->
                        <div class="relative">
                            <textarea name="lessons" 
                                      placeholder=" "
                                      rows="5"
                                      class="peer w-full px-6 py-4 border-2 border-slate-200 rounded-2xl bg-white/80 backdrop-blur-xl focus:border-slate-500 focus:ring-4 focus:ring-slate-100 transition-all duration-300 resize-none">{{ old('lessons', $doc->lessons ?? '') }}</textarea>
                            <label class="absolute left-6 top-4 text-gray-500 transition-all duration-300 pointer-events-none peer-focus:-top-2 peer-focus:left-4 peer-focus:text-sm peer-focus:text-slate-600 peer-focus:bg-white peer-focus:px-2 peer-[:not(:placeholder-shown)]:-top-2 peer-[:not(:placeholder-shown)]:left-4 peer-[:not(:placeholder-shown)]:text-sm peer-[:not(:placeholder-shown)]:text-gray-600 peer-[:not(:placeholder-shown)]:bg-white peer-[:not(:placeholder-shown)]:px-2">
                                Lessons Learned
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Professional Action Buttons -->
            <div class="p-8 bg-gradient-to-r from-gray-50 to-white border-t border-gray-100">
                <div class="flex justify-center space-x-6">
                    <!-- Save Changes Button -->
                    <button type="submit" 
                            :disabled="isSubmitting"
                            @click="
                                if (!isSubmitting) {
                                    isSubmitting = true;
                                    console.log('Submitting form to: {{ route('docs.update', $doc->id) }}');
                                    console.log('CSRF Token: ', document.querySelector('input[name=_token]').value);
                                    console.log('Doc Type: ', document.querySelector('input[name=doc_type]').value);
                                }
                            "
                            class="group relative px-10 py-4 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg class="w-6 h-6 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span x-text="isSubmitting ? 'Saving...' : 'Save Changes'"></span>
                        <div class="absolute inset-0 rounded-2xl bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </button>
                    
                    <!-- Reset Saving State Button (shows only when submitting) -->
                    <button type="button" 
                            x-show="isSubmitting"
                            @click="isSubmitting = false; alert('Save operation cancelled. You can try again.');"
                            class="group relative px-6 py-4 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Cancel Save
                    </button>
                    
                    <!-- Cancel Button -->
                    <a href="{{ route('docs.show', ['id' => $doc->id ?? $doc->documentation->id, 'type' => ($doc->documentation->doc_type ?? 'engineering')]) }}" 
                       class="group relative px-10 py-4 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center gap-3">
                        <svg class="w-6 h-6 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Cancel
                        <div class="absolute inset-0 rounded-2xl bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                </div>

                <!-- Status Indicator -->
                <div class="mt-6 text-center">
                    <div x-show="isDirty && !isSubmitting" class="inline-flex items-center px-4 py-2 bg-amber-100 text-amber-800 rounded-xl text-sm font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                        You have unsaved changes
                    </div>
                    <div x-show="autoSave" class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-xl text-sm font-medium mt-2">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Auto-save enabled
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
