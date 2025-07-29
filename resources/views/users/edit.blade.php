@extends('layouts.app')

@section('content')
<!-- ===================== ULTRA PREMIUM EDIT USER PAGE ===================== -->
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-amber-50 to-orange-50 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-10 left-10 w-72 h-72 bg-amber-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
        <div class="absolute top-0 right-4 w-96 h-96 bg-orange-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-80 h-80 bg-yellow-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-4000"></div>
    </div>
    
    <!-- Grid Pattern -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.02"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('users.index') }}" class="group inline-flex items-center space-x-3 text-black hover:text-amber-600 transition-colors duration-300">
                <div class="w-10 h-10 bg-white/80 backdrop-blur-xl rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-r from-amber-400/20 via-orange-500/20 to-yellow-600/20 blur-sm"></div>
                
                <div class="relative z-10 flex items-center space-x-8">
                    <!-- 3D Floating Icon -->
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-br from-amber-400 via-orange-500 to-yellow-600 rounded-2xl flex items-center justify-center shadow-2xl transform hover:scale-110 hover:rotate-6 transition-all duration-700 relative overflow-hidden">
                            <!-- Inner Glow -->
                            <div class="absolute inset-1 bg-gradient-to-br from-white/20 to-transparent rounded-xl"></div>
                            <svg class="w-10 h-10 text-white relative z-10 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <!-- Floating Rings -->
                        <div class="absolute -inset-3 bg-gradient-to-r from-amber-300 via-orange-400 to-yellow-500 rounded-2xl opacity-30 animate-spin-slow blur-md"></div>
                    </div>
                    
                    <!-- Title Section -->
                    <div>
                        <h1 class="text-4xl font-black text-black mb-2">
                            Edit User
                        </h1>
                        <p class="text-lg text-gray-800 font-medium leading-relaxed">
                            Update {{ $user->name }}'s profile and permissions
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="relative">
            <!-- Floating Background Effects -->
            <div class="absolute inset-0 bg-gradient-to-r from-amber-400/5 to-orange-600/5 rounded-3xl blur-xl"></div>
            
            <!-- Main Form Card -->
            <div class="relative bg-white/90 backdrop-blur-3xl rounded-3xl p-8 border border-gray-200 shadow-2xl">
                <!-- Glow Border Effect -->
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-r from-amber-400/20 to-orange-600/20 opacity-0 hover:opacity-100 transition-opacity duration-700 blur-sm"></div>
                
                <div class="relative z-10">
                    <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-8">
                        @csrf
                        @method('PUT')
                        
                        <!-- Name Field -->
                        <div class="space-y-3">
                            <label for="name" class="flex items-center space-x-3 text-lg font-bold text-black">
                                <div class="w-8 h-8 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <span>Full Name</span>
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                                class="w-full px-6 py-4 bg-white/80 backdrop-blur-xl border-2 border-gray-200 rounded-2xl text-black placeholder-gray-500 focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 transition-all duration-300 text-lg font-medium shadow-lg focus:shadow-xl"
                                placeholder="Enter user's full name">
                            @error('name')
                                <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Email Field -->
                        <div class="space-y-3">
                            <label for="email" class="flex items-center space-x-3 text-lg font-bold text-black">
                                <div class="w-8 h-8 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                                <span>Email Address</span>
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                                class="w-full px-6 py-4 bg-white/80 backdrop-blur-xl border-2 border-gray-200 rounded-2xl text-black placeholder-gray-500 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 transition-all duration-300 text-lg font-medium shadow-lg focus:shadow-xl"
                                placeholder="Enter user's email address">
                            @error('email')
                                <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Role Field -->
                        <div class="space-y-3">
                            <label for="role" class="flex items-center space-x-3 text-lg font-bold text-black">
                                <div class="w-8 h-8 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                                <span>User Role</span>
                            </label>
                            <select id="role" name="role" required
                                class="w-full px-6 py-4 bg-white/80 backdrop-blur-xl border-2 border-gray-200 rounded-2xl text-black focus:border-purple-500 focus:ring-4 focus:ring-purple-500/20 transition-all duration-300 text-lg font-medium shadow-lg focus:shadow-xl">
                                <option value="">Select user role</option>
                                <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>Regular User</option>
                                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Administrator</option>
                            </select>
                            @error('role')
                                <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Password Field -->
                        <div class="space-y-3">
                            <label for="password" class="flex items-center space-x-3 text-lg font-bold text-black">
                                <div class="w-8 h-8 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <span>New Password (Optional)</span>
                            </label>
                            <input type="password" id="password" name="password"
                                class="w-full px-6 py-4 bg-white/80 backdrop-blur-xl border-2 border-gray-200 rounded-2xl text-black placeholder-gray-500 focus:border-red-500 focus:ring-4 focus:ring-red-500/20 transition-all duration-300 text-lg font-medium shadow-lg focus:shadow-xl"
                                placeholder="Leave blank to keep current password">
                            @error('password')
                                <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Confirm Password Field -->
                        <div class="space-y-3">
                            <label for="password_confirmation" class="flex items-center space-x-3 text-lg font-bold text-black">
                                <div class="w-8 h-8 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center shadow-lg">
                                    <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span>Confirm New Password</span>
                            </label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full px-6 py-4 bg-white/80 backdrop-blur-xl border-2 border-gray-200 rounded-2xl text-black placeholder-gray-500 focus:border-red-500 focus:ring-4 focus:ring-red-500/20 transition-all duration-300 text-lg font-medium shadow-lg focus:shadow-xl"
                                placeholder="Confirm the new password">
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
                                <div class="absolute inset-0 bg-gradient-to-r from-amber-400/20 to-orange-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                                <div class="relative bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-black px-8 py-4 rounded-2xl font-bold text-lg shadow-2xl hover:shadow-3xl transition-all duration-300 flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-black">Update User</span>
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
