@extends('layouts.app')

@section('content')
<!-- ===================== ULTRA PREMIUM CREATE USER PAGE ===================== -->
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-emerald-50 to-green-50 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-10 left-10 w-72 h-72 bg-emerald-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
        <div class="absolute top-0 right-4 w-96 h-96 bg-green-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-80 h-80 bg-teal-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-4000"></div>
    </div>
    
    <!-- Grid Pattern -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.02"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('users.index') }}" class="group inline-flex items-center space-x-3 text-gray-600 hover:text-emerald-600 transition-colors duration-300">
                <div class="w-10 h-10 bg-white/80 backdrop-blur-xl rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </div>
                <span class="font-semibold">Back to Users</span>
            </a>
        </div>
        
        <!-- Ultra Premium Header -->
        <div class="relative mb-12">
            <!-- Floating Header Card -->
            <div class="relative bg-white/90 backdrop-blur-3xl rounded-3xl p-8 border border-gray-200 shadow-2xl">
                <!-- Glowing Border Effect -->
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-r from-emerald-400/20 via-green-500/20 to-teal-600/20 blur-sm"></div>
                
                <div class="relative z-10 flex items-center space-x-8">
                    <!-- 3D Floating Icon -->
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-br from-emerald-400 via-green-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-2xl transform hover:scale-110 hover:rotate-6 transition-all duration-700 relative overflow-hidden">
                            <!-- Inner Glow -->
                            <div class="absolute inset-1 bg-gradient-to-br from-white/20 to-transparent rounded-xl"></div>
                            <svg class="w-10 h-10 text-black relative z-10 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </div>
                        <!-- Floating Rings -->
                        <div class="absolute -inset-3 bg-gradient-to-r from-emerald-300 via-green-400 to-teal-500 rounded-2xl opacity-30 animate-spin-slow blur-md"></div>
                    </div>
                    
                    <!-- Title Section -->
                    <div>
                        <h1 class="text-4xl font-black text-black mb-2">
                            Create New User
                        </h1>
                        <p class="text-lg text-gray-800 font-medium leading-relaxed">
                            Add a new team member with customized permissions and role
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="relative">
            <!-- Floating Background Effects -->
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-400/5 to-green-600/5 rounded-3xl blur-xl"></div>
            
            <!-- Main Form Card -->
            <div class="relative bg-white/90 backdrop-blur-3xl rounded-3xl p-8 border border-gray-200 shadow-2xl">
                <!-- Glow Border Effect -->
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-r from-emerald-400/20 to-green-600/20 opacity-0 hover:opacity-100 transition-opacity duration-700 blur-sm"></div>
                
                <div class="relative z-10">
                    <form action="{{ route('users.store') }}" method="POST" class="space-y-8">
                        @csrf
                        
                        <!-- Name Field -->
                        <div class="space-y-3">
                            <label for="name" class="flex items-center space-x-3 text-lg font-bold text-black">
                                <div class="w-8 h-8 bg-gradient-to-br from-emerald-400 to-green-600 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <span>Full Name</span>
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full px-6 py-4 bg-white/80 backdrop-blur-xl border-2 border-gray-200 rounded-2xl text-black placeholder-gray-500 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20 transition-all duration-300 text-lg font-medium shadow-lg focus:shadow-xl"
                                placeholder="Enter user's full name">
                            @error('name')
                                <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Email Field -->
                        <div class="space-y-3">
                            <label for="email" class="flex items-center space-x-3 text-lg font-bold text-black">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-cyan-600 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                                <span>Email Address</span>
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-6 py-4 bg-white/80 backdrop-blur-xl border-2 border-gray-200 rounded-2xl text-black placeholder-gray-500 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 transition-all duration-300 text-lg font-medium shadow-lg focus:shadow-xl"
                                placeholder="Enter user's email address">
                            @error('email')
                                <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Role Field -->
                        <div class="space-y-3">
                            <label for="role" class="flex items-center space-x-3 text-lg font-bold text-black">
                                <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-indigo-600 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                                <span>User Role</span>
                            </label>
                            <select id="role" name="role" required
                                class="w-full px-6 py-4 bg-white/80 backdrop-blur-xl border-2 border-gray-200 rounded-2xl text-black focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 transition-all duration-300 text-lg font-medium shadow-lg focus:shadow-xl">
                                <option value="">Select user role</option>
                                <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>Regular User</option>
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrator</option>
                            </select>
                            @error('role')
                                <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Password Field -->
                        <div class="space-y-3">
                            <label for="password" class="flex items-center space-x-3 text-lg font-bold text-black">
                                <div class="w-8 h-8 bg-gradient-to-br from-red-400 to-pink-600 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <span>Password</span>
                            </label>
                            <input type="password" id="password" name="password" required
                                class="w-full px-6 py-4 bg-white/80 backdrop-blur-xl border-2 border-gray-200 rounded-2xl text-black placeholder-gray-500 focus:border-red-500 focus:ring-4 focus:ring-red-500/20 transition-all duration-300 text-lg font-medium shadow-lg focus:shadow-xl"
                                placeholder="Enter a secure password">
                            @error('password')
                                <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Confirm Password Field -->
                        <div class="space-y-3">
                            <label for="password_confirmation" class="flex items-center space-x-3 text-lg font-bold text-black">
                                <div class="w-8 h-8 bg-gradient-to-br from-red-400 to-pink-600 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span>Confirm Password</span>
                            </label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="w-full px-6 py-4 bg-white/80 backdrop-blur-xl border-2 border-gray-200 rounded-2xl text-black placeholder-gray-500 focus:border-red-500 focus:ring-4 focus:ring-red-500/20 transition-all duration-300 text-lg font-medium shadow-lg focus:shadow-xl"
                                placeholder="Confirm the password">
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end space-x-4 pt-8">
                            <a href="{{ route('users.index') }}" class="group relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-gray-400/20 to-gray-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                                <div class="relative bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-black px-8 py-4 rounded-2xl font-bold text-lg shadow-2xl hover:shadow-3xl transition-all duration-300 flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span class="text-black">Cancel</span>
                                </div>
                            </a>
                            
                            <button type="submit" class="group relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-emerald-400/20 to-green-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                                <div class="relative bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-black px-8 py-4 rounded-2xl font-bold text-lg shadow-2xl hover:shadow-3xl transition-all duration-300 flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <span class="text-black">Create User</span>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ultra Premium Styles -->
<style>
    /* Blob Animation */
    @keyframes blob {
        0%, 100% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }
    
    /* Slow Spin */
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .animate-spin-slow { animation: spin-slow 20s linear infinite; }
    
    /* Enhanced Shadow */
    .shadow-3xl {
        box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.5);
    }
</style>
@endsection
