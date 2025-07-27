@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-2 md:px-6">
    <h2 class="text-3xl font-extrabold text-blue-700 mb-8 flex items-center gap-2">
        <svg xmlns='http://www.w3.org/2000/svg' class='w-8 h-8 text-blue-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M8 16h8M8 12h8m-8-4h8M4 6h16M4 10h16M4 14h16M4 18h16'/></svg>
        Documentation List
    </h2>
    @if(session('message'))
        <div class="mb-4 text-green-700 bg-green-50 border border-green-200 rounded px-4 py-2 shadow">{{ session('message') }}</div>
    @endif
    <div class="grid gap-8">
        @forelse($docs as $doc)
            <div class="bg-white/90 rounded-3xl shadow-xl p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-6 border border-blue-100 hover:shadow-2xl transition-all duration-200 group relative overflow-hidden">
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wide"
                            style="background: {{ $doc->doc_type === 'engineering' ? 'linear-gradient(90deg,#3b82f6,#a78bfa,#f472b6)' : 'linear-gradient(90deg,#4ade80,#fde047,#f87171)'}}; color: #fff; box-shadow:0 2px 8px 0 rgba(59,130,246,0.10);">
                            {{ $doc->doc_type === 'engineering' ? 'Engineering' : 'Best Practice' }}
                        </span>
                        <span class="text-gray-400 text-xs">#{{ $doc->id }}</span>
                    </div>
                    <h3 class="text-2xl font-bold text-blue-900 group-hover:text-blue-700 transition">{{ $doc->title ?? $doc->project_name }}</h3>
                    <div class="text-gray-500 text-sm mt-1 line-clamp-2">
                        {{ $doc->purpose ?? $doc->project_overview ?? $doc->scope ?? $doc->business_goals ?? $doc->description ?? '' }}
                    </div>
                    <div class="text-gray-400 text-xs mt-2">Created: {{ $doc->created_at ? $doc->created_at->format('Y-m-d') : '' }}</div>
                </div>
                <div class="flex gap-3 mt-2 md:mt-0">
                    <a href="{{ route('docs.show', ['id' => $doc->id, 'type' => $doc->doc_type]) }}" class="docs-btn border-2 border-black font-bold text-lg px-6 py-2 flex items-center gap-2 bg-white hover:bg-gray-100 shadow">
                        <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6 text-black' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z'/></svg>
                        <span style="color:#111">View</span>
                    </a>
                    <a href="{{ route('docs.edit', ['id' => $doc->id, 'type' => $doc->doc_type]) }}" class="docs-btn border-2 border-black font-bold text-lg px-6 py-2 flex items-center gap-2 bg-white hover:bg-gray-100 shadow">
                        <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6 text-black' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m2 2l-6 6m2-2l6-6'/></svg>
                        <span style="color:#111">Edit</span>
                    </a>
                    <form action="{{ route('docs.destroy', ['id' => $doc->id, 'type' => $doc->doc_type]) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="docs-btn border-2 border-black font-bold text-lg px-6 py-2 flex items-center gap-2 bg-white hover:bg-gray-100 shadow" onclick="return confirm('Are you sure you want to delete this documentation?')">
                            <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6 text-black' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12'/></svg>
                            <span style="color:#111">Delete</span>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-gray-400 text-center py-10">No documentations yet.</div>
        @endforelse
    </div>
</div>
<style>
.docs-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: 1rem;
    font-weight: 700;
    font-size: 1rem;
    color: #fff;
    box-shadow: 0 2px 8px 0 rgba(59,130,246,0.08);
    transition: all 0.18s cubic-bezier(.4,0,.2,1);
    border: none;
    position: relative;
    overflow: hidden;
}
.docs-btn:hover, .docs-btn:focus {
    color: #fff;
    box-shadow: 0 6px 24px 0 rgba(59,130,246,0.13);
    transform: translateY(-2px) scale(1.04);
}
</style>
@endsection
