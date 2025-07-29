@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-8">
    <!-- Header Section -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full mb-6 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-black mb-4">Your Personal Universe</h1>
            <p class="text-xl text-black max-w-2xl mx-auto">Complete control over your documentation and settings</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Profile Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-8 text-center">
                        <div class="w-24 h-24 bg-white rounded-full mx-auto mb-4 flex items-center justify-center shadow-lg">
                            <span class="text-2xl font-bold text-black">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                        </div>
                        <h2 class="text-2xl font-bold text-white mb-2">{{ $user->name }}</h2>
                        <p class="text-blue-100">Personal Founder</p>
                        <div class="mt-4 inline-flex items-center px-3 py-1 rounded-full bg-white bg-opacity-90 text-black text-sm font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                            Full Access
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                                <span class="font-medium">{{ $user->email }}</span>
                            </div>
                            <div class="flex items-center text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span>Database: <span class="font-mono text-sm bg-gray-100 px-2 py-1 rounded text-black">doc_user_{{ auth()->id() }}</span></span>
                            </div>
                            <div class="flex items-center text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Joined {{ $user->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings & Actions -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Change Password Card -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-white px-6 py-4 border-b border-gray-200">
                        <h3 class="text-xl font-bold text-black flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Security Settings
                        </h3>
                    </div>
                    <div class="p-6">
                        <form method="POST" action="{{ route('profile.changePassword') }}" class="space-y-6">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-black mb-2">New Password</label>
                                <div class="relative">
                                    <input type="password" name="password" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-black" 
                                           placeholder="Enter your new password" required>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute right-3 top-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                @error('password')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-black mb-2">Confirm New Password</label>
                                <div class="relative">
                                    <input type="password" name="password_confirmation" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-black" 
                                           placeholder="Confirm your new password" required>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute right-3 top-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <button type="submit" class="w-full bg-white border-2 border-black text-black py-3 px-6 rounded-lg font-semibold hover:bg-gray-100 transform hover:scale-[1.02] transition-all duration-200 shadow-lg">
                                Update Password
                            </button>
                        </form>
                    </div>
                </div>

                @if(Auth::user()->canManageUsers())
                <!-- System Management Card (Global Founder Only) -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-white px-6 py-4 border-b border-gray-200">
                        <h3 class="text-xl font-bold text-black flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                            </svg>
                            System Management
                        </h3>
                        <p class="text-red-600 text-sm mt-1">Global Founder Privileges</p>
                    </div>
                    <div class="p-6">
                        <div class="mb-6">
                            <form method="POST" action="{{ route('profile.addDeveloper') }}" class="space-y-4">
                                @csrf
                                <div>
                                    <label class="block text-sm font-medium text-black mb-2">Add New User</label>
                                    <div class="relative">
                                        <input type="email" name="email" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-colors text-black" 
                                               placeholder="Enter user email address" required>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute right-3 top-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </div>
                                    @error('email')<div class="text-red-500 text-sm mt-1">{{ $message }}</div>@enderror
                                </div>
                                <button type="submit" class="w-full bg-white border-2 border-black text-black py-3 px-6 rounded-lg font-semibold hover:bg-gray-100 transform hover:scale-[1.02] transition-all duration-200 shadow-lg">
                                    Add User to System
                                </button>
                            </form>
                        </div>
                        <div class="pt-4 border-t border-gray-200">
                            <a href="{{ route('users.index') }}" class="flex items-center justify-center w-full p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-2 group-hover:text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="font-medium text-black group-hover:text-black">Manage All Users</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
