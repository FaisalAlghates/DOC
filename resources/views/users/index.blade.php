@extends('layouts.app')

@section('content')
<!-- ===================== ULTRA PREMIUM USER MANAGEMENT PAGE ===================== -->
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-purple-50 to-indigo-50 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-10 left-10 w-72 h-72 bg-purple-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
        <div class="absolute top-0 right-4 w-96 h-96 bg-indigo-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-80 h-80 bg-pink-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-4000"></div>
    </div>
    
    <!-- Grid Pattern -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.02"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Ultra Premium Header -->
        <div class="relative mb-16">
            <!-- Floating Header Card -->
            <div class="relative bg-white/90 backdrop-blur-3xl rounded-3xl p-8 border border-gray-200 shadow-2xl">
                <!-- Glowing Border Effect -->
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-r from-purple-400/20 via-indigo-500/20 to-pink-600/20 blur-sm"></div>
                
                <div class="relative z-10 flex items-center justify-between">
                    <div class="flex items-center space-x-8">
                        <!-- 3D Floating Icon -->
                        <div class="relative">
                            <div class="w-24 h-24 bg-gradient-to-br from-purple-400 via-indigo-500 to-pink-600 rounded-3xl flex items-center justify-center shadow-2xl transform hover:scale-110 hover:rotate-6 transition-all duration-700 relative overflow-hidden">
                                <!-- Inner Glow -->
                                <div class="absolute inset-1 bg-gradient-to-br from-white/20 to-transparent rounded-2xl"></div>
                                <svg class="w-12 h-12 text-black relative z-10 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                            <!-- Floating Rings -->
                            <div class="absolute -inset-4 bg-gradient-to-r from-purple-300 via-indigo-400 to-pink-500 rounded-3xl opacity-30 animate-spin-slow blur-md"></div>
                            <div class="absolute -top-3 -right-3 w-8 h-8 bg-emerald-400 rounded-full animate-bounce shadow-lg">
                                <div class="absolute inset-0 bg-emerald-400 rounded-full animate-ping opacity-40"></div>
                            </div>
                        </div>
                        
                        <!-- Title Section -->
                        <div>
                            <h1 class="text-5xl font-black text-black mb-3">
                                User Management
                            </h1>
                            <p class="text-xl text-gray-800 font-medium leading-relaxed max-w-2xl">
                                Comprehensive user administration with advanced controls and insights
                            </p>
                        </div>
                    </div>
                    
                    <!-- Add User Button -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('users.create') }}" class="group relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-emerald-400/20 to-green-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                            <div class="relative bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-black px-8 py-4 rounded-2xl font-bold text-lg shadow-2xl hover:shadow-3xl transition-all duration-300 flex items-center space-x-3">
                                <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="text-black">Add New User</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Dashboard -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-400/20 to-indigo-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-6 border border-gray-200 text-center">
                    <div class="text-4xl font-black text-purple-600 mb-2">{{ $users->count() }}</div>
                    <div class="text-sm text-gray-700 font-semibold uppercase tracking-wider">Total Users</div>
                </div>
            </div>
            
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-400/20 to-green-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-6 border border-gray-200 text-center">
                    <div class="text-4xl font-black text-emerald-600 mb-2">{{ $users->where('role', 'admin')->count() }}</div>
                    <div class="text-sm text-gray-700 font-semibold uppercase tracking-wider">Admins</div>
                </div>
            </div>
            
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-cyan-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-6 border border-gray-200 text-center">
                    <div class="text-4xl font-black text-blue-600 mb-2">{{ $users->where('role', 'user')->count() }}</div>
                    <div class="text-sm text-gray-700 font-semibold uppercase tracking-wider">Regular Users</div>
                </div>
            </div>
            
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-amber-400/20 to-orange-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-6 border border-gray-200 text-center">
                    <div class="text-4xl font-black text-amber-600 mb-2">{{ $users->sum('documentations_count') }}</div>
                    <div class="text-sm text-gray-700 font-semibold uppercase tracking-wider">Total Docs</div>
                </div>
            </div>
        </div>

        <!-- Users Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($users as $user)
                <div class="group relative">
                    <!-- Floating Background Effects -->
                    <div class="absolute inset-0 bg-gradient-to-r 
                        @if($user->role === 'admin') from-purple-400/5 to-indigo-600/5
                        @else from-blue-400/5 to-cyan-600/5
                        @endif
                        rounded-3xl blur-xl group-hover:blur-2xl transition-all duration-700"></div>
                    
                    <!-- Main Card -->
                    <div class="relative bg-white/90 backdrop-blur-3xl rounded-3xl p-8 border border-gray-200 shadow-2xl hover:shadow-3xl transition-all duration-700 hover:scale-[1.02] group-hover:bg-white/95">
                        <!-- Role Badge -->
                        <div class="absolute -top-3 -right-3 flex items-center space-x-2 
                            @if($user->role === 'admin') bg-gradient-to-r from-purple-600 to-indigo-600
                            @else bg-gradient-to-r from-blue-600 to-cyan-600
                            @endif
                            text-black px-4 py-2 rounded-full shadow-lg">
                            @if($user->role === 'admin')
                                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            @else
                                <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            @endif
                            <span class="text-sm font-bold uppercase text-black">{{ $user->role }}</span>
                        </div>
                        
                        <!-- Glow Border Effect -->
                        <div class="absolute inset-0 rounded-3xl bg-gradient-to-r 
                            @if($user->role === 'admin') from-purple-400/20 to-indigo-600/20
                            @else from-blue-400/20 to-cyan-600/20
                            @endif
                            opacity-0 group-hover:opacity-100 transition-opacity duration-700 blur-sm"></div>
                        
                        <div class="relative z-10">
                            <!-- Avatar -->
                            <div class="flex justify-center mb-6">
                                <div class="relative">
                                    <div class="w-20 h-20 bg-gradient-to-br 
                                        @if($user->role === 'admin') from-purple-400 to-indigo-600
                                        @else from-blue-400 to-cyan-600
                                        @endif
                                        rounded-full flex items-center justify-center shadow-2xl transform group-hover:scale-110 transition-all duration-700">
                                        <span class="text-2xl font-bold text-black">{{ $user->initials() }}</span>
                                    </div>
                                    <!-- Online Indicator -->
                                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-emerald-400 rounded-full border-4 border-white shadow-lg">
                                        <div class="absolute inset-0 bg-emerald-400 rounded-full animate-ping opacity-40"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- User Info -->
                            <div class="text-center mb-6">
                                <h3 class="text-2xl font-bold text-black mb-2">{{ $user->name }}</h3>
                                <p class="text-gray-600 font-medium">{{ $user->email }}</p>
                                <p class="text-sm text-gray-500 mt-2">Member since {{ $user->created_at->format('M Y') }}</p>
                            </div>
                            
                            <!-- Stats -->
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-emerald-600">{{ $user->documentations_count ?? 0 }}</div>
                                    <div class="text-xs text-gray-600 uppercase tracking-wider">Documents</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-amber-600">{{ $user->document_histories_count ?? 0 }}</div>
                                    <div class="text-xs text-gray-600 uppercase tracking-wider">Activities</div>
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex items-center justify-center space-x-3">
                                <a href="{{ route('users.show', $user) }}" class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-black p-3 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('users.edit', $user) }}" class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-black p-3 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                @if($user->id !== auth()->id())
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-black p-3 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                                            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Premium Empty State -->
                <div class="col-span-full text-center py-32">
                    <div class="relative inline-block">
                        <div class="w-48 h-48 bg-gradient-to-br from-gray-300 to-gray-500 rounded-full flex items-center justify-center mx-auto mb-12 shadow-2xl">
                            <div class="absolute inset-4 bg-gradient-to-br from-white/30 to-transparent rounded-full"></div>
                            <svg class="w-24 h-24 text-black relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <div class="absolute -inset-8 bg-gradient-to-r from-purple-400/20 via-indigo-500/20 to-pink-600/20 rounded-full blur-2xl animate-pulse"></div>
                    </div>
                    <h3 class="text-4xl font-bold text-black mb-6">No Users Found</h3>
                    <p class="text-xl text-black max-w-2xl mx-auto leading-relaxed">Start by creating your first user to begin managing your team.</p>
                </div>
            @endforelse
        </div>
        
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="fixed top-4 right-4 bg-gradient-to-r from-emerald-500 to-green-600 text-black px-6 py-4 rounded-2xl shadow-2xl z-50 transform transition-all duration-300">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-bold text-black">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        
        @if(session('error'))
            <div class="fixed top-4 right-4 bg-gradient-to-r from-red-500 to-pink-600 text-black px-6 py-4 rounded-2xl shadow-2xl z-50 transform transition-all duration-300">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-bold text-black">{{ session('error') }}</span>
                </div>
            </div>
        @endif
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
    
    /* Auto-hide messages */
    .fixed.top-4.right-4 {
        animation: slideIn 0.3s ease-out, slideOut 0.3s ease-in 4.7s forwards;
    }
    
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
</style>
@endsection
