@extends('layouts.app')

@section('content')
<div x-data="{ tab: '{{ $doc->project_doc ? 2 : 1 }}' }" class="max-w-4xl mx-auto py-12 px-2 md:px-6">
    <div class="bg-white/95 rounded-3xl shadow-2xl border border-blue-100 p-0 md:p-10 flex flex-col gap-8">
        <div class="flex justify-center gap-4 mb-6">
            <button type="button" @click="tab = 1" :class="tab == 1 ? 'bg-blue-700 text-white' : 'bg-blue-100 text-blue-700'" class="px-6 py-2 rounded-lg font-bold transition">النموذج الهندسي</button>
            <button type="button" @click="tab = 2" :class="tab == 2 ? 'bg-green-700 text-white' : 'bg-green-100 text-green-700'" class="px-6 py-2 rounded-lg font-bold transition">نموذج Best Practice</button>
        </div>
        <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8 px-6 pt-8">
            <div class="flex-shrink-0 flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 border border-blue-200">
                <svg xmlns='http://www.w3.org/2000/svg' class='w-10 h-10 text-blue-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M8 16h8M8 12h8m-8-4h8M4 6h16M4 10h16M4 14h16M4 18h16'/></svg>
            </div>
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-blue-700 mb-1">{{ $doc->title }}</h2>
                <p class="text-gray-500 text-base md:text-lg">Software Documentation Details</p>
            </div>
        </div>
        <div x-show="tab == 1">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-blue-50/60 rounded-xl p-6 border border-blue-100">
                    <x-doc-field label="Purpose" :value="$doc->purpose" color="blue" />
                    <x-doc-field label="Scope" :value="$doc->scope" color="blue" />
                    <x-doc-field label="Definitions, Acronyms, and Abbreviations" :value="$doc->definitions" color="blue" />
                </div>
                <div class="flex flex-col gap-4 bg-blue-50/60 rounded-xl p-6 border border-blue-100">
                    <x-doc-field label="Overall Description" :value="$doc->overall_description" color="blue" />
                    <x-doc-field label="Product Perspective" :value="$doc->product_perspective" color="blue" />
                    <x-doc-field label="User Classes and Characteristics" :value="$doc->user_classes" color="blue" />
                    <x-doc-field label="Operating Environment" :value="$doc->operating_environment" color="blue" />
                </div>
            </div>
            <!-- Testing Section -->
            @php $testings = \App\Models\Testing::where('documentation_id', $doc->id)->get(); @endphp
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
                    <x-doc-field label="Design and Implementation Constraints" :value="$doc->constraints" color="green" />
                    <x-doc-field label="Assumptions and Dependencies" :value="$doc->assumptions" color="green" />
                    <x-doc-field label="Functional Requirements" :value="$doc->functional_requirements" color="green" />
                    <x-doc-field label="Non-Functional Requirements" :value="$doc->nonfunctional_requirements" color="green" />
                </div>
                <div class="flex flex-col gap-4 bg-yellow-50/60 rounded-xl p-6 border border-yellow-100">
                    <x-doc-field label="Use Cases" :value="$doc->use_cases" color="yellow" />
                    <x-doc-field label="Data Model (Entities & Relationships)" :value="$doc->data_model" color="yellow" />
                    <x-doc-field label="Interface Requirements (UI & API)" :value="$doc->interface_requirements" color="yellow" />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-purple-50/60 rounded-xl p-6 border border-purple-100">
                    <x-doc-field label="Appendices (Glossary, References)" :value="$doc->appendices" color="purple" />
                    <x-doc-field label="SRS Compliance Report" :value="$doc->compliance_report" color="purple" />
                    <x-doc-field label="Database Tables (Overview, Mapping)" :value="$doc->database_tables" color="purple" />
                </div>
                <div class="flex flex-col gap-4 bg-pink-50/60 rounded-xl p-6 border border-pink-100">
                    <x-doc-field label="UI/UX" :value="$doc->ui_ux" color="pink" />
                    <x-doc-field label="Conclusion" :value="$doc->conclusion" color="pink" />
                    <x-doc-field label="Content (AI Generated or Manual)" :value="$doc->content" color="pink" />
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
            @php $project = $doc->project_doc ? json_decode($doc->project_doc, true) : null; @endphp
            @if($project)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-blue-50/60 rounded-xl p-6 border border-blue-100">
                    <x-doc-field label="Project Name" :value="$project['project_name'] ?? ''" color="blue" />
                    <x-doc-field label="Project Overview" :value="$project['project_overview'] ?? ''" color="blue" />
                    <x-doc-field label="Stakeholders" :value="$project['stakeholders'] ?? ''" color="blue" />
                </div>
                <div class="flex flex-col gap-4 bg-green-50/60 rounded-xl p-6 border border-green-100">
                    <x-doc-field label="Business Goals" :value="$project['business_goals'] ?? ''" color="green" />
                    <x-doc-field label="Deliverables" :value="$project['deliverables'] ?? ''" color="green" />
                    <x-doc-field label="Timeline" :value="$project['timeline'] ?? ''" color="green" />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-yellow-50/60 rounded-xl p-6 border border-yellow-100">
                    <x-doc-field label="Architecture & Technology Stack" :value="$project['architecture'] ?? ''" color="yellow" />
                    <x-doc-field label="Risks & Mitigation" :value="$project['risks'] ?? ''" color="yellow" />
                </div>
                <div class="flex flex-col gap-4 bg-purple-50/60 rounded-xl p-6 border border-purple-100">
                    <x-doc-field label="Deployment & Maintenance" :value="$project['deployment'] ?? ''" color="purple" />
                    <x-doc-field label="Lessons Learned" :value="$project['lessons'] ?? ''" color="purple" />
                </div>
            </div>
            @endif
        </div>
        <div class="flex gap-4 px-6 pb-8">
            <a href="{{ route('docs.edit', $doc->id) }}" class="px-5 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg font-semibold flex items-center gap-1 transition"><svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m2 2l-6 6m2-2l6-6'/></svg>Edit</a>
            <form action="{{ route('docs.destroy', $doc->id) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button class="px-5 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg font-semibold flex items-center gap-1 transition" onclick="return confirm('Are you sure you want to delete this documentation?')"><svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12'/></svg>Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
