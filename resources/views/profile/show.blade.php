@extends('layouts.app')

@section('content')
<div class="container max-w-xl mx-auto py-10">
    <div class="bg-white rounded shadow p-8 mb-8">
        <h1 class="text-2xl font-bold mb-2">Welcome, {{ $user->name }}!</h1>
        <p class="text-blue-600 mb-4">We're glad to have you here. Wishing you a productive and inspiring day!</p>
        <div class="mb-4">
            <strong>Name:</strong> {{ $user->name }}<br>
            <strong>Email:</strong> {{ $user->email }}
        </div>
    </div>
    <div class="bg-white rounded shadow p-8 mb-8">
        <h2 class="text-lg font-semibold mb-4">Change Password</h2>
        <form method="POST" action="{{ route('profile.changePassword') }}">
            @csrf
            <div class="mb-3">
                <label class="block mb-1">New Password:</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
                @error('password')<div class="text-red-600">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="block mb-1">Confirm New Password:</label>
                <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Change Password</button>
        </form>
    </div>
    {{-- جميع المستخدمين لهم كامل الصلاحيات --}}
    <div class="bg-white rounded shadow p-8 mb-8">
        <h2 class="text-lg font-semibold mb-4">Add Developer by Email</h2>
        <form method="POST" action="{{ route('profile.addDeveloper') }}">
            @csrf
            <div class="mb-3">
                <label class="block mb-1">Developer Email:</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
                @error('email')<div class="text-red-600">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Add Developer</button>
        </form>
    </div>
    {{-- إنهاء قسم إضافة المطور --}}
</div>
@endsection
