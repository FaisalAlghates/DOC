@extends('layouts.app')

@section('content')
{{-- <!-- Alpine.js fallback loader: ensures Alpine is always loaded even if @push('scripts') --> --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<div x-data="{ docType: 'engineering' }" x-init="$nextTick(() => { docType = 'engineering'; }); $watch('docType', value => { if (!['engineering','bestpractice'].includes(value)) docType = 'engineering'; })" class="max-w-4xl mx-auto py-12 px-2 md:px-6">
    <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-blue-100 p-0 md:p-10 flex flex-col gap-8 animate-doc-fade">
        <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8 px-6 pt-8">
            <div class="flex-shrink-0 flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-br from-blue-100 via-blue-50 to-white border border-blue-200 shadow-lg">
                <svg xmlns='http://www.w3.org/2000/svg' class='w-10 h-10 text-blue-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'/></svg>
            </div>
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold text-blue-700 mb-1 tracking-tight">Add Documentation</h2>
                <p class="text-gray-500 text-base md:text-lg">Fill in the details below to create a new software documentation. You can upload code files and generate documentation with AI for a seamless experience.</p>
            </div>
        </div>
        <div class="flex justify-center gap-8 mb-6">
            <label
                class="flex items-center cursor-pointer gap-2 px-6 py-3 rounded-2xl transition-all duration-500 shadow-lg border-2"
                :class="docType === 'engineering' ? 'bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 animate-gradient-move border-blue-700 text-white scale-105' : 'bg-white border-blue-200 text-black opacity-80'"
            >
                <input type="radio" name="docType" value="engineering" x-model="docType" class="form-radio h-5 w-5 text-black focus:ring-black border-black">
                <span class="font-bold">Engineering Documentation (with Testing)</span>
            </label>
            <label
                class="flex items-center cursor-pointer gap-2 px-6 py-3 rounded-2xl transition-all duration-500 shadow-lg border-2"
                :class="docType === 'bestpractice' ? 'bg-gradient-to-r from-green-400 via-yellow-400 to-red-400 animate-gradient-move border-yellow-700 text-white scale-105' : 'bg-white border-yellow-200 text-black opacity-80'"
            >
                <input type="radio" name="docType" value="bestpractice" x-model="docType" class="form-radio h-5 w-5 text-black focus:ring-black border-black">
                <span class="font-bold">Best Practice Project Documentation</span>
            </label>
        </div>
        <form x-show="docType === 'engineering'" x-cloak method="POST" action="{{ route('docs.store') }}" enctype="multipart/form-data" class="flex flex-col gap-8" x-data="{ aiLoading: false }" @change.debounce.300ms="$event.target.name === 'code_files[]' ? (aiLoading = true, $nextTick(() => { $el.querySelector('button[name=generate_ai]').click(); })) : null">
            <!-- Documentation language field removed -->
            <input type="hidden" name="user_id" value="{{ isset($user) ? $user->id : '' }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-blue-50/60 rounded-xl p-6 border border-blue-100">
                    <label class="block mb-1 text-base font-semibold text-blue-700" for="title">Title</label>
                    <input id="title" type="text" name="title" value="{{ old('title') }}" class="w-full border border-blue-200 focus:border-blue-400 focus:ring-2 focus:ring-blue-100 rounded-lg py-2 px-4 text-blue-900 bg-white placeholder-blue-300 transition" required>
                    @error('title')<div class="text-red-600 mt-1">{{ $message }}</div>@enderror
                    <label class="block mt-4 mb-1 text-base font-semibold text-blue-700" for="purpose">Purpose</label>
                    <input id="purpose" type="text" name="purpose" value="{{ old('purpose') }}" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" required>
                    <label class="block mt-4 mb-1 text-base font-semibold text-blue-700" for="scope">Scope</label>
                    <input id="scope" type="text" name="scope" value="{{ old('scope') }}" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white">
                    <label class="block mt-4 mb-1 text-base font-semibold text-blue-700" for="definitions">Definitions, Acronyms, and Abbreviations</label>
                    <textarea id="definitions" name="definitions" rows="2" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white">{{ old('definitions') }}</textarea>
                </div>
                <div class="flex flex-col gap-4 bg-blue-50/60 rounded-xl p-6 border border-blue-100">
                    <label class="block mb-1 text-base font-semibold text-blue-700" for="overall_description">Overall Description</label>
                    <textarea id="overall_description" name="overall_description" rows="2" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white">{{ old('overall_description') }}</textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-blue-700" for="product_perspective">Product Perspective</label>
                    <input id="product_perspective" type="text" name="product_perspective" value="{{ old('product_perspective') }}" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white">
                    <label class="block mt-4 mb-1 text-base font-semibold text-blue-700" for="user_classes">User Classes and Characteristics</label>
                    <input id="user_classes" type="text" name="user_classes" value="{{ old('user_classes') }}" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white">
                    <label class="block mt-4 mb-1 text-base font-semibold text-blue-700" for="operating_environment">Operating Environment (Framework, Libraries, Browser)</label>
                    <textarea id="operating_environment" name="operating_environment" rows="2" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white">{{ old('operating_environment') }}</textarea>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-green-50/60 rounded-xl p-6 border border-green-100">
                    <label class="block mb-1 text-base font-semibold text-green-700" for="constraints">Design and Implementation Constraints</label>
                    <textarea id="constraints" name="constraints" rows="2" class="w-full border border-green-200 rounded-lg py-2 px-4 bg-white">{{ old('constraints') }}</textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-green-700" for="assumptions">Assumptions and Dependencies</label>
                    <textarea id="assumptions" name="assumptions" rows="2" class="w-full border border-green-200 rounded-lg py-2 px-4 bg-white">{{ old('assumptions') }}</textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-green-700" for="functional_requirements">Functional Requirements</label>
                    <textarea id="functional_requirements" name="functional_requirements" rows="3" class="w-full border border-green-200 rounded-lg py-2 px-4 bg-white">{{ old('functional_requirements') }}</textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-green-700" for="nonfunctional_requirements">Non-Functional Requirements</label>
                    <textarea id="nonfunctional_requirements" name="nonfunctional_requirements" rows="3" class="w-full border border-green-200 rounded-lg py-2 px-4 bg-white">{{ old('nonfunctional_requirements') }}</textarea>
                </div>
                <div class="flex flex-col gap-4 bg-yellow-50/60 rounded-xl p-6 border border-yellow-100">
                    <label class="block mb-1 text-base font-semibold text-yellow-700" for="use_cases">Use Cases</label>
                    <textarea id="use_cases" name="use_cases" rows="3" class="w-full border border-yellow-200 rounded-lg py-2 px-4 bg-white">{{ old('use_cases') }}</textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-yellow-700" for="data_model">Data Model (Entities & Relationships)</label>
                    <textarea id="data_model" name="data_model" rows="2" class="w-full border border-yellow-200 rounded-lg py-2 px-4 bg-white">{{ old('data_model') }}</textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-yellow-700" for="interface_requirements">Interface Requirements (UI & API)</label>
                    <textarea id="interface_requirements" name="interface_requirements" rows="2" class="w-full border border-yellow-200 rounded-lg py-2 px-4 bg-white">{{ old('interface_requirements') }}</textarea>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-purple-50/60 rounded-xl p-6 border border-purple-100">
                    <label class="block mb-1 text-base font-semibold text-purple-700" for="appendices">Appendices (Glossary, References)</label>
                    <textarea id="appendices" name="appendices" rows="2" class="w-full border border-purple-200 rounded-lg py-2 px-4 bg-white">{{ old('appendices') }}</textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-purple-700" for="compliance_report">SRS Compliance Report</label>
                    <textarea id="compliance_report" name="compliance_report" rows="2" class="w-full border border-purple-200 rounded-lg py-2 px-4 bg-white">{{ old('compliance_report') }}</textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-purple-700" for="database_tables">Database Tables (Overview, Mapping)</label>
                    <textarea id="database_tables" name="database_tables" rows="2" class="w-full border border-purple-200 rounded-lg py-2 px-4 bg-white">{{ old('database_tables') }}</textarea>
                </div>
                <div class="flex flex-col gap-4 bg-pink-50/60 rounded-xl p-6 border border-pink-100">
                    <label class="block mb-1 text-base font-semibold text-pink-700" for="ui_ux">UI/UX</label>
                    <textarea id="ui_ux" name="ui_ux" rows="2" class="w-full border border-pink-200 rounded-lg py-2 px-4 bg-white">{{ old('ui_ux') }}</textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-pink-700" for="conclusion">Conclusion</label>
                    <textarea id="conclusion" name="conclusion" rows="2" class="w-full border border-pink-200 rounded-lg py-2 px-4 bg-white">{{ old('conclusion') }}</textarea>
                </div>
            </div>
            <!-- Testing section removed from form -->
            <div class="flex flex-col md:flex-row gap-4 mt-4 px-6 pb-8">
                <template x-if="aiLoading">
                    <button type="button" class="doc-btn bg-gray-400 cursor-not-allowed" disabled>Generating Documentation with AI...</button>
                </template>
                <template x-if="!aiLoading">
                    <>
                        <button type="submit" class="doc-btn bg-black hover:bg-gray-900">Save Documentation</button>
                        <button type="submit" name="generate_ai" value="1" class="doc-btn bg-black hover:bg-gray-900" style="display:none;">Generate with AI</button>
                    </>
                </template>
            </div>
        </form>
        <!-- Best Practice Project Documentation -->
        <form x-show="docType === 'bestpractice'" x-cloak method="POST" action="{{ route('docs.store') }}" enctype="multipart/form-data" class="flex flex-col gap-8" x-data="{ aiLoading: false }" @change.debounce.300ms="$event.target.name === 'code_files[]' ? (aiLoading = true, $nextTick(() => { $el.querySelector('button[name=generate_ai]').click(); })) : null">
            <!-- Documentation language field removed -->
            @csrf
            <input type="hidden" name="user_id" value="{{ isset($user) ? $user->id : '' }}">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-blue-50/60 rounded-xl p-6 border border-blue-100">
                    <label class="block mb-1 text-base font-semibold text-blue-700" for="project_name">Project Name</label>
                    <input id="project_name" type="text" name="project_name" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white" required>
                    <label class="block mt-4 mb-1 text-base font-semibold text-blue-700" for="project_overview">Project Overview</label>
                    <textarea id="project_overview" name="project_overview" rows="2" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white"></textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-blue-700" for="stakeholders">Stakeholders</label>
                    <input id="stakeholders" type="text" name="stakeholders" class="w-full border border-blue-200 rounded-lg py-2 px-4 bg-white">
                </div>
                <div class="flex flex-col gap-4 bg-green-50/60 rounded-xl p-6 border border-green-100">
                    <label class="block mb-1 text-base font-semibold text-green-700" for="business_goals">Business Goals</label>
                    <textarea id="business_goals" name="business_goals" rows="2" class="w-full border border-green-200 rounded-lg py-2 px-4 bg-white"></textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-green-700" for="deliverables">Deliverables</label>
                    <textarea id="deliverables" name="deliverables" rows="2" class="w-full border border-green-200 rounded-lg py-2 px-4 bg-white"></textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-green-700" for="timeline">Timeline</label>
                    <input id="timeline" type="text" name="timeline" class="w-full border border-green-200 rounded-lg py-2 px-4 bg-white">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6">
                <div class="flex flex-col gap-4 bg-yellow-50/60 rounded-xl p-6 border border-yellow-100">
                    <label class="block mb-1 text-base font-semibold text-yellow-700" for="architecture">Architecture & Technology Stack</label>
                    <textarea id="architecture" name="architecture" rows="2" class="w-full border border-yellow-200 rounded-lg py-2 px-4 bg-white"></textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-yellow-700" for="risks">Risks & Mitigation</label>
                    <textarea id="risks" name="risks" rows="2" class="w-full border border-yellow-200 rounded-lg py-2 px-4 bg-white"></textarea>
                </div>
                <div class="flex flex-col gap-4 bg-purple-50/60 rounded-xl p-6 border border-purple-100">
                    <label class="block mb-1 text-base font-semibold text-purple-700" for="deployment">Deployment & Maintenance</label>
                    <textarea id="deployment" name="deployment" rows="2" class="w-full border border-purple-200 rounded-lg py-2 px-4 bg-white"></textarea>
                    <label class="block mt-4 mb-1 text-base font-semibold text-purple-700" for="lessons">Lessons Learned</label>
                    <textarea id="lessons" name="lessons" rows="2" class="w-full border border-purple-200 rounded-lg py-2 px-4 bg-white"></textarea>
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-4 mt-4 px-6 pb-8">
                <template x-if="aiLoading">
                    <button type="button" class="doc-btn bg-gray-400 cursor-not-allowed" disabled>Generating Documentation with AI...</button>
                </template>
                <template x-if="!aiLoading">
                    <>
                        <button type="submit" class="doc-btn bg-black hover:bg-gray-900">Save Documentation</button>
                        <button type="submit" name="generate_ai" value="1" class="doc-btn bg-black hover:bg-gray-900" style="display:none;">Generate with AI</button>
                    </>
                </template>
            </div>
        </form>
    </div>
</div>
<style>
[x-cloak] { display: none !important; }
.animate-doc-fade { animation: doc-fade 1.2s cubic-bezier(.4,0,.2,1) both; }
@keyframes doc-fade { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: none; } }
.doc-btn {
    width: 100%;
    padding: 1rem 0;
    font-size: 1.15rem;
    font-weight: 700;
    border-radius: 1rem;
    color: #fff;
    box-shadow: 0 2px 12px 0 rgba(59,130,246,0.10);
    transition: all 0.18s cubic-bezier(.4,0,.2,1);
    border: none;
    position: relative;
    overflow: hidden;
    outline: none;
}
.doc-btn:hover, .doc-btn:focus {
    color: #fff;
    box-shadow: 0 8px 32px 0 rgba(59,130,246,0.13);
    transform: translateY(-2px) scale(1.03);
}
@keyframes gradient-move {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
.animate-gradient-move {
    background-size: 200% 200%;
    animation: gradient-move 2.5s ease-in-out infinite;
}
</style>
@endsection

<!-- Alpine.js fallback loader is now included at the top of the file to guarantee functionality. -->
