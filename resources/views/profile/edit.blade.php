<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">تعديل الملف الشخصي</h2>
    </x-slot>

    <div class="max-w-lg mx-auto py-8">
        @if(session('message'))
            <div class="mb-4 text-green-600">{{ session('message') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf @method('PATCH')
            <div class="mb-4">
                <label class="block mb-1">الاسم:</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full border rounded px-3 py-2" required>
                @error('name')<div class="text-red-600">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">حفظ التغييرات</button>
        </form>
    </div>
</x-app-layout>
