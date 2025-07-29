@extends('layouts.app')

@section('content')
<div x-data="{ tab: '{{ ($doc->documentation && $doc->documentation->doc_type === 'bestpractice') || (isset($doc->doc_type) && $doc->doc_type === 'bestpractice') ? 2 : 1 }}' }" class="max-w-4xl mx-auto py-12 px-2 md:px-6">
    <div class="bg-white/95 rounded-3xl shadow-2xl border border-blue-100 p-0 md:p-10 flex flex-col gap-8">
        <div class="flex justify-center gap-4 mb-6">
            <button type="button" @click="tab = 1" :class="tab == 1 ? 'bg-blue-700 text-white' : 'bg-blue-100 text-blue-700'" class="px-6 py-2 rounded-lg font-bold transition">النموذج الهندسي</button>
            <button type="button" @click="tab = 2" :class="tab == 2 ? 'bg-green-700 text-white' : 'bg-green-100 text-green-700'" class="px-6 py-2 rounded-lg font-bold transition">نموذج Best Practice</button>
        </div>
        <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8 px-6 pt-8">
            <div class="flex-shrink-0 flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 border border-blue-200">
                <svg xmlns='http://www.w3.org/2000/svg' class='w-10 h-10 text-blue-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M8 16h8M8 12h8m-8-4h8M4 6h16M4 10h16M4 14h16M4 18h16'/></svg>
            </div>
            <div class="flex-1">
                <h2 class="text-3xl md:text-4xl font-extrabold text-blue-700 mb-1">{{ $doc->documentation->title ?? $doc->title ?? 'عنوان غير محدد' }}</h2>
                <p class="text-gray-500 text-base md:text-lg">Software Documentation Details</p>
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
                @php 
                    $lastHistory = App\Models\DocumentHistory::where('documentation_id', $doc->documentation->id)
                                                           ->where('action', 'update')
                                                           ->with('user')
                                                           ->latest()
                                                           ->first();
                @endphp
                @if($lastHistory)
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span class="font-semibold text-gray-700">آخر تعديل بواسطة:</span>
                    <span class="text-gray-600">{{ $lastHistory->user->name ?? 'غير محدد' }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-semibold text-gray-700">تاريخ آخر تعديل:</span>
                    <span class="text-gray-600">{{ $lastHistory->created_at->format('Y-m-d H:i') }}</span>
                </div>
                @else
                <div class="md:col-span-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-gray-500 italic">لم يتم تعديل هذا التوثيق بعد</span>
                </div>
                @endif
            </div>
        </div>
        <div x-show="tab == 1">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-blue-50/60 rounded-xl p-6 border border-blue-100">
                    @include('components.doc-field', ['label' => 'Purpose', 'value' => $doc->purpose, 'color' => 'blue'])
                    @include('components.doc-field', ['label' => 'Scope', 'value' => $doc->scope, 'color' => 'blue'])
                    @include('components.doc-field', ['label' => 'Definitions, Acronyms, and Abbreviations', 'value' => $doc->definitions, 'color' => 'blue'])
                </div>
                <div class="flex flex-col gap-4 bg-blue-50/60 rounded-xl p-6 border border-blue-100">
                    @include('components.doc-field', ['label' => 'Overall Description', 'value' => $doc->overall_description, 'color' => 'blue'])
                    @include('components.doc-field', ['label' => 'Product Perspective', 'value' => $doc->product_perspective, 'color' => 'blue'])
                    @include('components.doc-field', ['label' => 'User Classes and Characteristics', 'value' => $doc->user_classes, 'color' => 'blue'])
                    @include('components.doc-field', ['label' => 'Operating Environment', 'value' => $doc->operating_environment, 'color' => 'blue'])
                </div>
            </div>
            <!-- Testing Section -->
            @php $testings = \App\Models\Testing::where('documentation_id', $doc->documentation->id)->get(); @endphp
            @if($testings->count())
            <div class="grid grid-cols-1 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-gray-50/60 rounded-xl p-6 border border-gray-200">
                    <div class="text-lg font-bold text-gray-700 mb-2">Testing (اختبارات)</div>
                    @foreach($testings as $test)
                        <div class="mb-2">
                            <div class="font-semibold text-gray-800">نوع الاختبار: <span class="font-normal">{{ $test->test_type }}</span></div>
                            <div class="text-gray-700">الوصف: {{ $test->test_description }}</div>
                            @if($test->test_results)
                                <div class="text-green-700">النتائج: {{ $test->test_results }}</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-green-50/60 rounded-xl p-6 border border-green-100">
                    @include('components.doc-field', ['label' => 'Design and Implementation Constraints', 'value' => $doc->constraints, 'color' => 'green'])
                    @include('components.doc-field', ['label' => 'Assumptions and Dependencies', 'value' => $doc->assumptions, 'color' => 'green'])
                    @include('components.doc-field', ['label' => 'Functional Requirements', 'value' => $doc->functional_requirements, 'color' => 'green'])
                    @include('components.doc-field', ['label' => 'Non-Functional Requirements', 'value' => $doc->nonfunctional_requirements, 'color' => 'green'])
                </div>
                <div class="flex flex-col gap-4 bg-yellow-50/60 rounded-xl p-6 border border-yellow-100">
                    @include('components.doc-field', ['label' => 'Use Cases', 'value' => $doc->use_cases, 'color' => 'yellow'])
                    @include('components.doc-field', ['label' => 'Data Model (Entities & Relationships)', 'value' => $doc->data_model, 'color' => 'yellow'])
                    @include('components.doc-field', ['label' => 'Interface Requirements (UI & API)', 'value' => $doc->interface_requirements, 'color' => 'yellow'])
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-purple-50/60 rounded-xl p-6 border border-purple-100">
                    @include('components.doc-field', ['label' => 'Appendices (Glossary, References)', 'value' => $doc->appendices, 'color' => 'purple'])
                    @include('components.doc-field', ['label' => 'SRS Compliance Report', 'value' => $doc->compliance_report, 'color' => 'purple'])
                    @include('components.doc-field', ['label' => 'Database Tables (Overview, Mapping)', 'value' => $doc->database_tables, 'color' => 'purple'])
                </div>
                <div class="flex flex-col gap-4 bg-pink-50/60 rounded-xl p-6 border border-pink-100">
                    @include('components.doc-field', ['label' => 'UI/UX', 'value' => $doc->ui_ux, 'color' => 'pink'])
                    @include('components.doc-field', ['label' => 'Conclusion', 'value' => $doc->conclusion, 'color' => 'pink'])
                    @include('components.doc-field', ['label' => 'Content (AI Generated or Manual)', 'value' => $doc->content, 'color' => 'pink'])
                    @if($doc->code_files && is_array($doc->code_files))
                        <div class="mt-4">
                            <div class="font-semibold text-pink-700 mb-2">Uploaded Code Files:</div>
                            <ul class="list-disc list-inside text-pink-800 text-sm">
                                @foreach($doc->code_files as $file)
                                    <li><a href="{{ asset('storage/' . $file) }}" class="underline hover:text-pink-600" target="_blank">{{ basename($file) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div x-show="tab == 2">
            @if($doc->doc_type === 'bestpractice' || ($doc->documentation && $doc->documentation->doc_type === 'bestpractice'))
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-blue-50/60 rounded-xl p-6 border border-blue-100">
                    @include('components.doc-field', ['label' => 'Project Name', 'value' => $doc->project_name ?? '', 'color' => 'blue'])
                    @include('components.doc-field', ['label' => 'Project Overview', 'value' => $doc->project_overview ?? '', 'color' => 'blue'])
                    @include('components.doc-field', ['label' => 'Stakeholders', 'value' => $doc->stakeholders ?? '', 'color' => 'blue'])
                </div>
                <div class="flex flex-col gap-4 bg-green-50/60 rounded-xl p-6 border border-green-100">
                    @include('components.doc-field', ['label' => 'Business Goals', 'value' => $doc->business_goals ?? '', 'color' => 'green'])
                    @include('components.doc-field', ['label' => 'Deliverables', 'value' => $doc->deliverables ?? '', 'color' => 'green'])
                    @include('components.doc-field', ['label' => 'Timeline', 'value' => $doc->timeline ?? '', 'color' => 'green'])
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-yellow-50/60 rounded-xl p-6 border border-yellow-100">
                    @include('components.doc-field', ['label' => 'Architecture & Technology Stack', 'value' => $doc->architecture ?? '', 'color' => 'yellow'])
                    @include('components.doc-field', ['label' => 'Risks & Mitigation', 'value' => $doc->risks ?? '', 'color' => 'yellow'])
                </div>
                <div class="flex flex-col gap-4 bg-purple-50/60 rounded-xl p-6 border border-purple-100">
                    @include('components.doc-field', ['label' => 'Deployment & Maintenance', 'value' => $doc->deployment ?? '', 'color' => 'purple'])
                    @include('components.doc-field', ['label' => 'Lessons Learned', 'value' => $doc->lessons ?? '', 'color' => 'purple'])
                </div>
            </div>
            @endif
        </div>
        
        <!-- تاريخ التعديلات -->
        @php $histories = App\Models\DocumentHistory::where('documentation_id', $doc->documentation->id)
                                                   ->with('user')
                                                   ->orderBy('created_at', 'desc')
                                                   ->get(); @endphp
        @if($histories->count() > 0)
        <div class="mx-6 mb-6">
            <details class="bg-white border border-gray-200 rounded-xl">
                <summary class="p-4 cursor-pointer font-semibold text-gray-700 hover:bg-gray-50 rounded-xl transition">
                    📋 تاريخ التعديلات ({{ $histories->count() }} {{ $histories->count() == 1 ? 'عملية' : 'عمليات' }})
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
                                <span class="text-green-700 font-medium">تم إنشاء التوثيق</span>
                            @else
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </div>
                                <span class="text-blue-700 font-medium">تم تحديث التوثيق</span>
                            @endif
                            <span class="text-gray-600">بواسطة {{ $history->user->name ?? 'مستخدم محذوف' }}</span>
                        </div>
                        <span class="text-gray-500 text-sm">{{ $history->created_at->format('Y-m-d H:i') }}</span>
                    </div>
                    @endforeach
                </div>
            </details>
        </div>
        @endif
        
        <div class="flex gap-4 px-6 pb-8">
            <a href="{{ route('docs.edit', $doc->documentation->id) }}" class="px-5 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg font-semibold flex items-center gap-1 transition"><svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m2 2l-6 6m2-2l6-6'/></svg>Edit</a>
            <form action="{{ route('docs.destroy', $doc->documentation->id) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button class="px-5 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg font-semibold flex items-center gap-1 transition" onclick="return confirm('Are you sure you want to delete this documentation?')"><svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12'/></svg>Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
