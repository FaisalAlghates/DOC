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

        <div class="flex gap-2 mt-6">
            <a href="{{ route('profile.show', $user->id ?? 1) }}" class="px-4 py-2 bg-gray-500 text-white rounded">عرض</a>
            <a href="{{ route('profile.edit', $user->id ?? 1) }}" class="px-4 py-2 bg-yellow-500 text-white rounded">تعديل</a>
            <form action="{{ route('profile.destroy', $user->id ?? 1) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف الحساب؟');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">حذف</button>
            </form>
        </div>
    </div>
</x-app-layout>
