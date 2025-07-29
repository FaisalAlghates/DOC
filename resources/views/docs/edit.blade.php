@extends('layouts.app')

@section('content')
<style>
    [x-cloak] { display: none !important; }
</style>

<div x-data="{ tab: '{{ ($doc->documentation && $doc->documentation->doc_type === 'bestpractice') || (isset($doc->doc_type) && $doc->doc_type === 'bestpractice') ? 2 : 1 }}' }" class="max-w-4xl mx-auto py-12 px-2 md:px-6">
    
    @if(session('message'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            {{ session('message') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            {{ session('error') }}
        </div>
    @endif
    
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
            <p class="font-semibold mb-2">يرجى تصحيح الأخطاء التالية:</p>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="bg-white/95 rounded-3xl shadow-2xl border border-yellow-100 p-0 md:p-10 flex flex-col gap-8">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8 px-6 pt-8">
            <div class="flex-shrink-0 flex items-center justify-center w-16 h-16 rounded-full bg-yellow-50 border border-yellow-200">
                <svg xmlns='http://www.w3.org/2000/svg' class='w-10 h-10 text-yellow-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m2 2l-6 6m2-2l6-6'/></svg>
            </div>
            <div class="flex-1">
                <h2 class="text-3xl md:text-4xl font-extrabold text-yellow-700 mb-1">تحرير التوثيق</h2>
                <p class="text-gray-500 text-base md:text-lg">{{ $doc->documentation->title ?? $doc->title ?? 'عنوان غير محدد' }}</p>
            </div>
        </div>
        
        <!-- معلومات المؤلف والتعديل -->
        <div class="mx-6 mb-6 p-4 bg-gray-50 rounded-xl border border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="font-semibold text-gray-700">أنشأ بواسطة:</span>
                    <span class="text-gray-600">{{ $doc->documentation->user->name ?? 'غير محدد' }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10m6-10v10m-6-4h6" />
                    </svg>
                    <span class="font-semibold text-gray-700">تاريخ الإنشاء:</span>
                    <span class="text-gray-600">{{ $doc->documentation->created_at ? $doc->documentation->created_at->format('Y-m-d H:i') : 'غير محدد' }}</span>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="flex justify-center gap-4 mb-6">
            <button type="button" @click="tab = 1" :class="tab == 1 ? 'bg-blue-700 text-white' : 'bg-blue-100 text-blue-700'" class="px-6 py-2 rounded-lg font-bold transition">النموذج الهندسي</button>
            <button type="button" @click="tab = 2" :class="tab == 2 ? 'bg-green-700 text-white' : 'bg-green-100 text-green-700'" class="px-6 py-2 rounded-lg font-bold transition">نموذج Best Practice</button>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('docs.update', $doc->documentation->id) }}" class="flex flex-col gap-8">
            @csrf @method('PUT')
            <input type="hidden" name="doc_type" value="{{ $doc->documentation->doc_type }}">
            
            <!-- Engineering Documentation Tab -->
            <div x-show="tab == 1" x-cloak>
                <!-- Title -->
                <div class="px-6 mb-6">
                    <label class="block mb-2 text-lg font-semibold text-blue-700">عنوان التوثيق</label>
                    <input type="text" name="title" value="{{ old('title', $doc->documentation->title ?? $doc->title ?? '') }}" class="w-full border border-blue-200 rounded-lg py-3 px-4 text-gray-800 bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-100" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                    <div class="flex flex-col gap-4 bg-blue-50/60 rounded-xl p-6 border border-blue-100">
                        @include('components.edit-field', ['label' => 'Purpose', 'name' => 'purpose', 'value' => $doc->purpose, 'color' => 'blue'])
                        @include('components.edit-field', ['label' => 'Scope', 'name' => 'scope', 'value' => $doc->scope, 'color' => 'blue'])
                        @include('components.edit-field', ['label' => 'Definitions, Acronyms, and Abbreviations', 'name' => 'definitions', 'value' => $doc->definitions, 'color' => 'blue', 'type' => 'textarea'])
                    </div>
                    <div class="flex flex-col gap-4 bg-blue-50/60 rounded-xl p-6 border border-blue-100">
                        @include('components.edit-field', ['label' => 'Overall Description', 'name' => 'overall_description', 'value' => $doc->overall_description, 'color' => 'blue', 'type' => 'textarea'])
                        @include('components.edit-field', ['label' => 'Product Perspective', 'name' => 'product_perspective', 'value' => $doc->product_perspective, 'color' => 'blue'])
                        @include('components.edit-field', ['label' => 'User Classes and Characteristics', 'name' => 'user_classes', 'value' => $doc->user_classes, 'color' => 'blue'])
                        @include('components.edit-field', ['label' => 'Operating Environment', 'name' => 'operating_environment', 'value' => $doc->operating_environment, 'color' => 'blue', 'type' => 'textarea'])
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                    <div class="flex flex-col gap-4 bg-green-50/60 rounded-xl p-6 border border-green-100">
                        @include('components.edit-field', ['label' => 'Design and Implementation Constraints', 'name' => 'constraints', 'value' => $doc->constraints, 'color' => 'green', 'type' => 'textarea'])
                        @include('components.edit-field', ['label' => 'Assumptions and Dependencies', 'name' => 'assumptions', 'value' => $doc->assumptions, 'color' => 'green', 'type' => 'textarea'])
                        @include('components.edit-field', ['label' => 'Functional Requirements', 'name' => 'functional_requirements', 'value' => $doc->functional_requirements, 'color' => 'green', 'type' => 'textarea', 'rows' => 3])
                        @include('components.edit-field', ['label' => 'Non-Functional Requirements', 'name' => 'nonfunctional_requirements', 'value' => $doc->nonfunctional_requirements, 'color' => 'green', 'type' => 'textarea', 'rows' => 3])
                    </div>
                    <div class="flex flex-col gap-4 bg-yellow-50/60 rounded-xl p-6 border border-yellow-100">
                        @include('components.edit-field', ['label' => 'Use Cases', 'name' => 'use_cases', 'value' => $doc->use_cases, 'color' => 'yellow', 'type' => 'textarea', 'rows' => 3])
                        @include('components.edit-field', ['label' => 'Data Model (Entities & Relationships)', 'name' => 'data_model', 'value' => $doc->data_model, 'color' => 'yellow', 'type' => 'textarea'])
                        @include('components.edit-field', ['label' => 'Interface Requirements (UI & API)', 'name' => 'interface_requirements', 'value' => $doc->interface_requirements, 'color' => 'yellow', 'type' => 'textarea'])
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                    <div class="flex flex-col gap-4 bg-purple-50/60 rounded-xl p-6 border border-purple-100">
                        @include('components.edit-field', ['label' => 'Appendices (Glossary, References)', 'name' => 'appendices', 'value' => $doc->appendices, 'color' => 'purple', 'type' => 'textarea'])
                        @include('components.edit-field', ['label' => 'SRS Compliance Report', 'name' => 'compliance_report', 'value' => $doc->compliance_report, 'color' => 'purple', 'type' => 'textarea'])
                        @include('components.edit-field', ['label' => 'Database Tables (Overview, Mapping)', 'name' => 'database_tables', 'value' => $doc->database_tables, 'color' => 'purple', 'type' => 'textarea'])
                    </div>
                    <div class="flex flex-col gap-4 bg-pink-50/60 rounded-xl p-6 border border-pink-100">
                        @include('components.edit-field', ['label' => 'UI/UX', 'name' => 'ui_ux', 'value' => $doc->ui_ux, 'color' => 'pink', 'type' => 'textarea'])
                        @include('components.edit-field', ['label' => 'Conclusion', 'name' => 'conclusion', 'value' => $doc->conclusion, 'color' => 'pink', 'type' => 'textarea'])
                        @include('components.edit-field', ['label' => 'Content (AI Generated or Manual)', 'name' => 'content', 'value' => $doc->content, 'color' => 'pink', 'type' => 'textarea'])
                    </div>
                </div>
            </div>

            <!-- Best Practice Documentation Tab -->
            <div x-show="tab == 2" x-cloak>
                <!-- Title for Best Practice -->
                <div class="px-6 mb-6">
                    <label class="block mb-2 text-lg font-semibold text-green-700">اسم المشروع</label>
                    <input type="text" name="project_name" value="{{ old('project_name', $doc->project_name ?? '') }}" class="w-full border border-green-200 rounded-lg py-3 px-4 text-gray-800 bg-white focus:border-green-500 focus:ring-2 focus:ring-green-100">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                    <div class="flex flex-col gap-4 bg-blue-50/60 rounded-xl p-6 border border-blue-100">
                        @include('components.edit-field', ['label' => 'Project Overview', 'name' => 'project_overview', 'value' => $doc->project_overview ?? '', 'color' => 'blue', 'type' => 'textarea'])
                        @include('components.edit-field', ['label' => 'Stakeholders', 'name' => 'stakeholders', 'value' => $doc->stakeholders ?? '', 'color' => 'blue'])
                    </div>
                    <div class="flex flex-col gap-4 bg-green-50/60 rounded-xl p-6 border border-green-100">
                        @include('components.edit-field', ['label' => 'Business Goals', 'name' => 'business_goals', 'value' => $doc->business_goals ?? '', 'color' => 'green', 'type' => 'textarea'])
                        @include('components.edit-field', ['label' => 'Deliverables', 'name' => 'deliverables', 'value' => $doc->deliverables ?? '', 'color' => 'green', 'type' => 'textarea'])
                        @include('components.edit-field', ['label' => 'Timeline', 'name' => 'timeline', 'value' => $doc->timeline ?? '', 'color' => 'green'])
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                    <div class="flex flex-col gap-4 bg-yellow-50/60 rounded-xl p-6 border border-yellow-100">
                        @include('components.edit-field', ['label' => 'Architecture & Technology Stack', 'name' => 'architecture', 'value' => $doc->architecture ?? '', 'color' => 'yellow', 'type' => 'textarea'])
                        @include('components.edit-field', ['label' => 'Risks & Mitigation', 'name' => 'risks', 'value' => $doc->risks ?? '', 'color' => 'yellow', 'type' => 'textarea'])
                    </div>
                    <div class="flex flex-col gap-4 bg-purple-50/60 rounded-xl p-6 border border-purple-100">
                        @include('components.edit-field', ['label' => 'Deployment & Maintenance', 'name' => 'deployment', 'value' => $doc->deployment ?? '', 'color' => 'purple', 'type' => 'textarea'])
                        @include('components.edit-field', ['label' => 'Lessons Learned', 'name' => 'lessons', 'value' => $doc->lessons ?? '', 'color' => 'purple', 'type' => 'textarea'])
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4 px-6 pb-8">
                <button type="submit" class="px-8 py-3 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg font-semibold flex items-center gap-2 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    حفظ التعديلات
                </button>
                <a href="{{ route('docs.show', ['id' => $doc->id, 'type' => ($doc->documentation->doc_type ?? 'engineering')]) }}" class="px-8 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-lg font-semibold flex items-center gap-2 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    إلغاء
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
