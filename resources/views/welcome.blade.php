@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[70vh]">
    <div class="bg-white/90 dark:bg-gray-800 rounded-2xl shadow-xl px-10 py-12 border border-blue-100 max-w-xl w-full text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold text-blue-700 mb-4 tracking-tight">Welcome to the Smart Documentation Platform</h1>
        <p class="mb-8 text-lg text-gray-600 dark:text-gray-200">Create, edit, and share your software documentation with ease and professionalism.</p>
        @guest
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="{{ route('login') }}" class="w-full md:w-auto px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-bold text-lg shadow transition-all">Login</a>
                <a href="{{ route('register') }}" class="w-full md:w-auto px-8 py-3 bg-green-500 hover:bg-green-600 text-white rounded-lg font-bold text-lg shadow transition-all">Register</a>
            </div>
        @else
            <a href="{{ route('dashboard') }}" class="px-8 py-3 bg-blue-700 hover:bg-blue-800 text-white rounded-lg font-bold text-lg shadow transition-all">Go to Dashboard</a>
        @endguest
    </div>
</div>
@endsection
