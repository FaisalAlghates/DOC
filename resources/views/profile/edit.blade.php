<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Edit Profile</h2>
    </x-slot>

    <div class="max-w-lg mx-auto py-8">
        @if(session('message'))
            <div class="mb-4 text-green-600">{{ session('message') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf @method('PATCH')
            <div class="mb-4">
                <label class="block mb-1">Name:</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full border rounded px-3 py-2" required>
                @error('name')<div class="text-red-600">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save Changes</button>
        </form>

        <div class="flex gap-2 mt-6">
            <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-yellow-500 text-white rounded">Edit</a>
            <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the account?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Delete</button>
            </form>
        </div>
    </div>
</x-app-layout>
