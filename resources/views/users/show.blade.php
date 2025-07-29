@extends('layouts.app')

@section('content')
<!-- ===================== ULTRA PREMIUM USER PROFILE PAGE ===================== -->
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-cyan-50 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-10 left-10 w-72 h-72 bg-blue-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
        <div class="absolute top-0 right-4 w-96 h-96 bg-cyan-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-80 h-80 bg-indigo-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-4000"></div>
    </div>
    
    <!-- Grid Pattern -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.02"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('users.index') }}" class="group inline-flex items-center space-x-3 text-gray-600 hover:text-blue-600 transition-colors duration-300">
                <div class="w-10 h-10 bg-white/80 backdrop-blur-xl rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </div>
                <span class="font-semibold">Back to Users</span>
            </a>
        </div>
        
        <!-- User Profile Header -->
        <div class="relative mb-12">
            <!-- Floating Profile Card -->
            <div class="relative bg-white/90 backdrop-blur-3xl rounded-3xl p-8 border border-gray-200 shadow-2xl">
                <!-- Glowing Border Effect -->
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-r 
                    @if($user->role === 'admin') from-purple-400/20 via-indigo-500/20 to-blue-600/20
                    @else from-blue-400/20 via-cyan-500/20 to-teal-600/20
                    @endif
                    blur-sm"></div>
                
                <div class="relative z-10 flex items-center justify-between">
                    <div class="flex items-center space-x-8">
                        <!-- Profile Avatar -->
                        <div class="relative">
                            <div class="w-32 h-32 bg-gradient-to-br 
                                @if($user->role === 'admin') from-purple-400 via-indigo-500 to-blue-600
                                @else from-blue-400 via-cyan-500 to-teal-600
                                @endif
                                rounded-3xl flex items-center justify-center shadow-2xl transform hover:scale-105 transition-all duration-700 relative overflow-hidden">
                                <!-- Inner Glow -->
                                <div class="absolute inset-2 bg-gradient-to-br from-white/20 to-transparent rounded-2xl"></div>
                                <span class="text-4xl font-bold text-white relative z-10 drop-shadow-lg">{{ $user->initials() }}</span>
                            </div>
                            <!-- Status Badge -->
                            <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-emerald-400 rounded-full border-4 border-white shadow-lg flex items-center justify-center">
                                <div class="absolute inset-0 bg-emerald-400 rounded-full animate-ping opacity-40"></div>
                                <svg class="w-5 h-5 text-white relative z-10" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Profile Info -->
                        <div>
                            <div class="flex items-center space-x-4 mb-4">
                                <h1 class="text-4xl font-black text-black">{{ $user->name }}</h1>
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold
                                    @if($user->role === 'admin') bg-purple-400/20 text-purple-600 border border-purple-400/30
                                    @else bg-blue-400/20 text-blue-600 border border-blue-400/30
                                    @endif
                                    backdrop-blur-xl shadow-lg">
                                    @if($user->role === 'admin')
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                        Administrator
                                    @else
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        Regular User
                                    @endif
                                </span>
                            </div>
                            <div class="space-y-2 text-gray-600">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                    <span class="font-medium">{{ $user->email }}</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="font-medium">Member since {{ $user->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('users.edit', $user) }}" class="group relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-amber-400/20 to-orange-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                            <div class="relative bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-black px-6 py-3 rounded-2xl font-bold shadow-2xl hover:shadow-3xl transition-all duration-300 flex items-center space-x-2">
                                <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                <span class="text-black">Edit User</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Dashboard -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-400/20 to-green-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-6 border border-gray-200 text-center">
                    <div class="text-4xl font-black text-emerald-600 mb-2">{{ $user->documentations->count() }}</div>
                    <div class="text-sm text-gray-700 font-semibold uppercase tracking-wider">Documents Created</div>
                </div>
            </div>
            
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-cyan-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-6 border border-gray-200 text-center">
                    <div class="text-4xl font-black text-blue-600 mb-2">{{ $user->documentHistories->count() }}</div>
                    <div class="text-sm text-gray-700 font-semibold uppercase tracking-wider">Total Activities</div>
                </div>
            </div>
            
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-400/20 to-indigo-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-6 border border-gray-200 text-center">
                    <div class="text-4xl font-black text-purple-600 mb-2">{{ $user->documentHistories->where('action', 'Created')->count() }}</div>
                    <div class="text-sm text-gray-700 font-semibold uppercase tracking-wider">Created Actions</div>
                </div>
            </div>
            
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-amber-400/20 to-orange-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-6 border border-gray-200 text-center">
                    <div class="text-4xl font-black text-amber-600 mb-2">{{ $user->documentHistories->where('action', 'Updated')->count() }}</div>
                    <div class="text-sm text-gray-700 font-semibold uppercase tracking-wider">Updated Actions</div>
                </div>
            </div>
        </div>

        <!-- Recent Documents & Activities -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Documents -->
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400/5 to-cyan-600/5 rounded-3xl blur-xl"></div>
                <div class="relative bg-white/90 backdrop-blur-3xl rounded-3xl p-8 border border-gray-200 shadow-2xl">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-cyan-600 rounded-lg flex items-center justify-center shadow-lg">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-black">Recent Documents</h3>
                    </div>
                    
                    @if($user->documentations->count() > 0)
                        <div class="space-y-4">
                            @foreach($user->documentations->take(5) as $doc)
                                <div class="flex items-center justify-between p-4 bg-white/60 backdrop-blur-xl rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300">
                                    <div>
                                        <h4 class="font-bold text-black">{{ $doc->title }}</h4>
                                        <p class="text-sm text-gray-600">{{ $doc->created_at->diffForHumans() }}</p>
                                    </div>
                                    <a href="{{ route('docs.show', $doc->id) }}" class="text-blue-600 hover:text-blue-800 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600">No documents created yet</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-400/5 to-pink-600/5 rounded-3xl blur-xl"></div>
                <div class="relative bg-white/90 backdrop-blur-3xl rounded-3xl p-8 border border-gray-200 shadow-2xl">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-pink-600 rounded-lg flex items-center justify-center shadow-lg">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-black">Recent Activities</h3>
                    </div>
                    
                    @if($user->documentHistories->count() > 0)
                        <div class="space-y-4">
                            @foreach($user->documentHistories->take(5) as $activity)
                                <div class="flex items-start space-x-4 p-4 bg-white/60 backdrop-blur-xl rounded-xl border border-gray-200 hover:shadow-lg transition-all duration-300">
                                    <div class="w-8 h-8 bg-gradient-to-br 
                                        @if($activity->action === 'Created') from-emerald-400 to-green-600
                                        @elseif($activity->action === 'Updated') from-amber-400 to-orange-600
                                        @else from-red-400 to-pink-600
                                        @endif
                                        rounded-lg flex items-center justify-center shadow-lg flex-shrink-0">
                                        @if($activity->action === 'Created')
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                        @elseif($activity->action === 'Updated')
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="font-bold text-black">{{ $activity->action }} Document</p>
                                        <p class="text-sm text-gray-600 truncate">{{ $activity->documentation->title ?? 'Unknown Document' }}</p>
                                        <p class="text-xs text-gray-500 mt-1">{{ $activity->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600">No activities recorded yet</p>
                        </div>
                    @endif
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
    
    /* Enhanced Shadow */
    .shadow-3xl {
        box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.5);
    }
</style>
@endsection
