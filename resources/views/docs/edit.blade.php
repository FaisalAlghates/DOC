@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-10 px-4">
    <div class="bg-white/90 dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-yellow-100">
        <h2 class="text-3xl font-extrabold text-yellow-700 mb-6 flex items-center gap-2">
            <svg xmlns='http://www.w3.org/2000/svg' class='w-7 h-7 text-yellow-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m2 2l-6 6m2-2l6-6'/></svg>
            تعديل التوثيق
        </h2>
        <form method="POST" action="{{ route('docs.update', $doc->id) }}" class="space-y-6">
            @csrf @method('PUT')
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-700">العنوان</label>
                <input type="text" name="title" value="{{ old('title', $doc->title) }}" class="w-full border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-100 rounded-lg py-2 px-4 text-gray-800 bg-gray-50 placeholder-gray-400 transition" required>
                @error('title')<div class="text-red-600 mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-700">المحتوى</label>
                <textarea name="content" rows="6" class="w-full border border-gray-300 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-100 rounded-lg py-2 px-4 text-gray-800 bg-gray-50 placeholder-gray-400 transition" required>{{ old('content', $doc->content) }}</textarea>
                @error('content')<div class="text-red-600 mt-1">{{ $message }}</div>@enderror
            </div>
            <button class="w-full py-2.5 bg-yellow-600 hover:bg-yellow-700 text-white font-bold rounded-lg shadow transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-yellow-200">تحديث</button>
        </form>
    </div>
</div>
@endsection
