@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[70vh]">
    <div class="w-full max-w-md bg-white/90 shadow-xl rounded-2xl px-10 py-8 border border-blue-100 animate-fade-in">
        <h2 class="text-3xl font-extrabold mb-8 text-center text-blue-700 tracking-tight">Login</h2>
        <form method="POST" action="{{ url('/login') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block mb-2 text-sm font-semibold text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="transition-all border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 rounded-lg w-full py-2 px-4 text-gray-800 bg-gray-50 placeholder-gray-400">
                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-semibold text-gray-700">Password</label>
                <input id="password" type="password" name="password" required class="transition-all border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 rounded-lg w-full py-2 px-4 text-gray-800 bg-gray-50 placeholder-gray-400">
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <label class="inline-flex items-center select-none">
                    <input type="checkbox" name="remember" class="accent-blue-600 rounded">
                    <span class="mr-2 text-gray-600 text-sm">Remember me</span>
                </label>
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline text-sm font-medium">New user? Register now</a>
            </div>
            <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-blue-200">Login</button>
        </form>
    </div>
</div>
@endsection
