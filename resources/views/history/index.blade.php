@extends('layouts.app')

@section('content')
<!-- ===================== ULTRA PREMIUM HISTORY PAGE ===================== -->
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-10 left-10 w-72 h-72 bg-cyan-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
        <div class="absolute top-0 right-4 w-96 h-96 bg-purple-400/10 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
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
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-r from-cyan-400/20 via-blue-500/20 to-purple-600/20 blur-sm"></div>
                
                <div class="relative z-10 flex items-center justify-between">
                    <div class="flex items-center space-x-8">
                        <!-- 3D Floating Icon -->
                        <div class="relative">
                            <div class="w-24 h-24 bg-gradient-to-br from-cyan-400 via-blue-500 to-purple-600 rounded-3xl flex items-center justify-center shadow-2xl transform hover:scale-110 hover:rotate-6 transition-all duration-700 relative overflow-hidden">
                                <!-- Inner Glow -->
                                <div class="absolute inset-1 bg-gradient-to-br from-white/20 to-transparent rounded-2xl"></div>
                                <svg class="w-12 h-12 text-white relative z-10 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <!-- Floating Rings -->
                            <div class="absolute -inset-4 bg-gradient-to-r from-cyan-300 via-blue-400 to-purple-500 rounded-3xl opacity-30 animate-spin-slow blur-md"></div>
                            <div class="absolute -top-3 -right-3 w-8 h-8 bg-emerald-400 rounded-full animate-bounce shadow-lg">
                                <div class="absolute inset-0 bg-emerald-400 rounded-full animate-ping opacity-40"></div>
                            </div>
                        </div>
                        
                        <!-- Title Section -->
                        <div>
                            <h1 class="text-5xl font-black text-black mb-3">
                                Activity Timeline
                            </h1>
                            <p class="text-xl text-gray-800 font-medium leading-relaxed max-w-2xl">
                                Real-time monitoring of all documentation operations with advanced tracking and insights
                            </p>
                        </div>
                    </div>
                    
                    <!-- Advanced Stats Dashboard -->
                    <div class="hidden lg:flex items-center space-x-8">
                        <div class="group relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-emerald-400/20 to-green-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                            <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-6 border border-gray-200 text-center">
                                <div class="text-4xl font-black text-emerald-600 mb-2 total-events-count">{{ $histories->count() }}</div>
                                <div class="text-sm text-gray-700 font-semibold uppercase tracking-wider">Total Events</div>
                            </div>
                        </div>
                        
                        {{-- <div class="group relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-indigo-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                            <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-6 border border-gray-200 text-center">
                                <div class="text-4xl font-black text-blue-600 mb-2">{{ $histories->where('action', 'Created')->count() }}</div>
                                <div class="text-sm text-gray-700 font-semibold uppercase tracking-wider">Created</div>
                            </div>
                        </div>
                        
                        <div class="group relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-amber-400/20 to-orange-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                            <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-6 border border-gray-200 text-center">
                                <div class="text-4xl font-black text-amber-600 mb-2">{{ $histories->where('action', 'Updated')->count() }}</div>
                                <div class="text-sm text-gray-700 font-semibold uppercase tracking-wider">Updated</div>
                            </div> --}}
                        </div>
                        
                        <!-- Advanced Time Filter -->
                        <div class="group relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-400/20 to-pink-600/20 rounded-2xl blur-lg group-hover:blur-xl transition-all"></div>
                            <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-6 border border-gray-200">
                                <div class="flex items-center space-x-3 mb-4">
                                    <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center shadow-lg">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-lg font-bold text-black">Time Filter</span>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                    <button onclick="filterByTime('1h')" class="filter-btn bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-4 py-3 rounded-xl font-semibold text-sm shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Last Hour</span>
                                    </button>
                                    <button onclick="filterByTime('6h')" class="filter-btn bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white px-4 py-3 rounded-xl font-semibold text-sm shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Last 6 Hours</span>
                                    </button>
                                    <button onclick="filterByTime('1d')" class="filter-btn bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white px-4 py-3 rounded-xl font-semibold text-sm shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Last Day</span>
                                    </button>
                                    <button onclick="filterByTime('1w')" class="filter-btn bg-gradient-to-r from-purple-500 to-indigo-500 hover:from-purple-600 hover:to-indigo-600 text-white px-4 py-3 rounded-xl font-semibold text-sm shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Last Week</span>
                                    </button>
                                    <button onclick="filterByTime('1m')" class="filter-btn bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white px-4 py-3 rounded-xl font-semibold text-sm shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Last Month</span>
                                    </button>
                                    <button onclick="filterByTime('all')" class="filter-btn bg-gradient-to-r from-gray-500 to-slate-500 hover:from-gray-600 hover:to-slate-600 text-white px-4 py-3 rounded-xl font-semibold text-sm shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2 active">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                        <span>All Activities</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline Container -->
        <div class="relative" id="timeline-container">
            <!-- Central Timeline Line -->
            <div class="absolute left-8 top-0 bottom-0 w-1 bg-gradient-to-b from-cyan-400 via-blue-500 to-purple-600 rounded-full shadow-lg"></div>
            
            <!-- Activity Cards -->
            <div class="space-y-8">
                @forelse($histories as $index => $history)
                    <div class="relative group activity-card" data-date="{{ $history->created_at->toISOString() }}">
                        <!-- Timeline Node -->
                        <div class="absolute left-6 w-5 h-5 bg-gradient-to-br 
                            @if($history->action == 'Created') from-emerald-400 to-green-600
                            @elseif($history->action == 'Updated') from-amber-400 to-orange-600
                            @elseif($history->action == 'Deleted') from-red-400 to-pink-600
                            @else from-blue-400 to-indigo-600
                            @endif
                            rounded-full border-4 border-slate-900 shadow-lg z-20">
                            <div class="absolute inset-0 rounded-full
                                @if($history->action == 'Created') bg-emerald-400
                                @elseif($history->action == 'Updated') bg-amber-400
                                @elseif($history->action == 'Deleted') bg-red-400
                                @else bg-blue-400
                                @endif
                                animate-ping opacity-40"></div>
                        </div>
                        
                        <!-- Activity Card -->
                        <div class="ml-20 group relative">
                            <!-- Floating Background Effects -->
                            <div class="absolute inset-0 bg-gradient-to-r 
                                @if($history->action == 'Created') from-emerald-400/5 to-green-600/5
                                @elseif($history->action == 'Updated') from-amber-400/5 to-orange-600/5
                                @elseif($history->action == 'Deleted') from-red-400/5 to-pink-600/5
                                @else from-blue-400/5 to-indigo-600/5
                                @endif
                                rounded-3xl blur-xl group-hover:blur-2xl transition-all duration-700"></div>
                            
                            <!-- Main Card -->
                            <div class="relative bg-white/90 backdrop-blur-3xl rounded-3xl p-8 border border-gray-200 shadow-2xl hover:shadow-3xl transition-all duration-700 hover:scale-[1.02] group-hover:bg-white/95">
                                <!-- Date Badge in Top Right -->
                                <div class="absolute -top-3 -right-3 flex items-center space-x-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-full shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-sm font-bold">{{ $history->created_at->format('M d') }}</span>
                                </div>
                                <!-- Glow Border Effect -->
                                <div class="absolute inset-0 rounded-3xl bg-gradient-to-r 
                                    @if($history->action == 'Created') from-emerald-400/20 to-green-600/20
                                    @elseif($history->action == 'Updated') from-amber-400/20 to-orange-600/20
                                    @elseif($history->action == 'Deleted') from-red-400/20 to-pink-600/20
                                    @else from-blue-400/20 to-indigo-600/20
                                    @endif
                                    opacity-0 group-hover:opacity-100 transition-opacity duration-700 blur-sm"></div>
                                
                                <div class="relative z-10">
                                    <div class="flex items-start justify-between mb-6">
                                        <!-- Activity Icon & Info -->
                                        <div class="flex items-start space-x-6 flex-1">
                                            <!-- Premium 3D Icon -->
                                            <div class="relative">
                                                @if($history->action == 'Created')
                                                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-green-600 rounded-2xl flex items-center justify-center shadow-2xl transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-700">
                                                @elseif($history->action == 'Updated')
                                                    <div class="w-16 h-16 bg-gradient-to-br from-amber-400 to-orange-600 rounded-2xl flex items-center justify-center shadow-2xl transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-700">
                                                @elseif($history->action == 'Deleted')
                                                    <div class="w-16 h-16 bg-gradient-to-br from-red-400 to-pink-600 rounded-2xl flex items-center justify-center shadow-2xl transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-700">
                                                @else
                                                    <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-2xl flex items-center justify-center shadow-2xl transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-700">
                                                @endif
                                                    <!-- Inner Glow -->
                                                    <div class="absolute inset-1 bg-gradient-to-br from-white/20 to-transparent rounded-xl"></div>
                                                    
                                                    @if($history->action == 'Created')
                                                        <svg class="w-8 h-8 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                                                        </svg>
                                                    @elseif($history->action == 'Updated')
                                                        <svg class="w-8 h-8 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    @elseif($history->action == 'Deleted')
                                                        <svg class="w-8 h-8 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    @else
                                                        <svg class="w-8 h-8 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                        </svg>
                                                    @endif
                                                </div>
                                                <!-- Floating Sparkles -->
                                                <div class="absolute -top-2 -right-2 w-4 h-4 bg-white/80 rounded-full animate-ping"></div>
                                                <div class="absolute -bottom-2 -left-2 w-3 h-3 bg-cyan-300/80 rounded-full animate-bounce delay-300"></div>
                                            </div>
                                            
                                            <!-- Content -->
                                            <div class="flex-1 min-w-0">
                                                <!-- Title & Badge -->
                                                <div class="flex items-center space-x-4 mb-4">
                                                    <!-- Document Icon -->
                                                    <div class="flex items-center space-x-3">
                                                        <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg">
                                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                            </svg>
                                                        </div>
                                                        <h3 class="text-2xl font-bold text-black transition-colors duration-500 truncate">
                                                            {{ $history->documentation->title ?? 'Unknown Document' }}
                                                        </h3>
                                                    </div>
                                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold
                                                        @if($history->action == 'Created') bg-emerald-400/20 text-emerald-300 border border-emerald-400/30
                                                        @elseif($history->action == 'Updated') bg-amber-400/20 text-amber-300 border border-amber-400/30
                                                        @elseif($history->action == 'Deleted') bg-red-400/20 text-red-300 border border-red-400/30
                                                        @else bg-blue-400/20 text-blue-300 border border-blue-400/30
                                                        @endif
                                                        backdrop-blur-xl shadow-lg">
                                                        {{ $history->action }}
                                                    </span>
                                                </div>
                                                
                                                <!-- Meta Info -->
                                                <div class="flex items-center space-x-8 mb-6">
                                                    <!-- User Info -->
                                                    <div class="flex items-center space-x-3">
                                                        <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full flex items-center justify-center shadow-lg">
                                                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <div class="font-bold text-black">{{ $history->user->name ?? 'Unknown User' }}</div>
                                                            <div class="text-sm text-gray-600">Performed action</div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Time Info -->
                                                    <div class="flex items-center space-x-3">
                                                        <div class="w-12 h-12 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-xl flex items-center justify-center shadow-lg">
                                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <div class="font-bold text-black flex items-center space-x-2">
                                                                <span>{{ $history->created_at->format('M d, Y') }}</span>
                                                                <span class="text-lg">📅</span>
                                                            </div>
                                                            <div class="text-sm text-gray-600 flex items-center space-x-2">
                                                                <span>{{ $history->created_at->format('H:i') }}</span>
                                                                <span>🕐</span>
                                                                <span>{{ $history->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Changes Section -->
                                                @if($history->changes && $history->changes !== 'null')
                                                    <div class="relative">
                                                        <div class="bg-gray-100 backdrop-blur-xl rounded-2xl p-6 border border-gray-200 shadow-inner">
                                                            <div class="flex items-center space-x-3 mb-4">
                                                                <div class="w-6 h-6 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-lg flex items-center justify-center">
                                                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                                    </svg>
                                                                </div>
                                                                <span class="text-lg font-bold text-black">Changes Details</span>
                                                            </div>
                                                            <div class="bg-white rounded-xl p-4 border border-gray-200">
                                                                <code class="text-sm text-gray-800 font-mono leading-relaxed block max-h-40 overflow-y-auto custom-scrollbar">{{ Str::limit($history->changes, 400) }}</code>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <!-- Timeline Number -->
                                        <div class="flex-shrink-0 text-right">
                                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center border-2 border-gray-300 shadow-lg">
                                                <span class="text-lg font-bold text-black timeline-number">{{ $index + 1 }}</span>
                                            </div>
                                            <div class="text-xs text-gray-600 mt-2 font-medium">{{ $history->created_at->diffForHumans() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Premium Empty State -->
                    <div class="relative text-center py-32" id="empty-state">
                        <div class="relative inline-block">
                            <div class="w-48 h-48 bg-gradient-to-br from-gray-300 to-gray-500 rounded-full flex items-center justify-center mx-auto mb-12 shadow-2xl">
                                <div class="absolute inset-4 bg-gradient-to-br from-white/30 to-transparent rounded-full"></div>
                                <svg class="w-24 h-24 text-gray-600 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="absolute -inset-8 bg-gradient-to-r from-cyan-400/20 via-blue-500/20 to-purple-600/20 rounded-full blur-2xl animate-pulse"></div>
                        </div>
                        <h3 class="text-4xl font-bold text-black mb-6">No Activity Timeline Yet</h3>
                        <p class="text-xl text-gray-700 max-w-2xl mx-auto leading-relaxed">Start creating and managing your documentation to build your activity timeline and track all changes.</p>
                    </div>
                @endforelse
            </div>
        </div>
        
        <!-- Premium Footer -->
        <div class="mt-24 text-center">
            <div class="relative inline-block">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-400/20 via-cyan-400/20 to-blue-500/20 rounded-2xl blur-xl"></div>
                <div class="relative bg-white/90 backdrop-blur-3xl rounded-2xl px-8 py-6 border border-gray-200 shadow-2xl">
                    <div class="flex items-center justify-center space-x-4">
                        <div class="w-8 h-8 bg-gradient-to-br from-emerald-400 to-green-600 rounded-lg flex items-center justify-center shadow-lg">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="text-lg font-bold text-black">Real-time tracking • Secure logging • Advanced analytics</span>
                    </div>
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
    
    /* Text Glow */
    @keyframes text-glow {
        0%, 100% { text-shadow: 0 0 20px rgba(6, 182, 212, 0.5); }
        50% { text-shadow: 0 0 30px rgba(6, 182, 212, 0.8), 0 0 40px rgba(168, 85, 247, 0.5); }
    }
    .animate-text-glow { animation: text-glow 3s ease-in-out infinite; }
    
    /* Custom Scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.2);
        border-radius: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, #06b6d4, #8b5cf6);
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(180deg, #0891b2, #7c3aed);
    }
    
    /* Enhanced Shadow */
    .shadow-3xl {
        box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.5);
    }
    
    /* Delay Animations */
    .delay-300 { animation-delay: 300ms; }
    
    /* Filter Button Styles */
    .filter-btn.active {
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        position: relative;
    }
    
    .filter-btn.active::after {
        content: '';
        position: absolute;
        inset: -2px;
        background: linear-gradient(45deg, #3b82f6, #8b5cf6, #06b6d4, #10b981);
        border-radius: inherit;
        z-index: -1;
        animation: gradientRotate 3s linear infinite;
    }
    
    @keyframes gradientRotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .fade-out {
        opacity: 0.3;
        transform: scale(0.95);
        transition: all 0.3s ease;
    }
    
    .fade-in {
        opacity: 1;
        transform: scale(1);
        transition: all 0.3s ease;
    }
</style>

<script>
let currentFilter = 'all';

function filterByTime(timeRange) {
    // Update active button
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.closest('.filter-btn').classList.add('active');
    
    currentFilter = timeRange;
    
    // Get current date
    const now = new Date();
    let cutoffDate;
    
    // Calculate cutoff date based on filter
    switch(timeRange) {
        case '1h':
            cutoffDate = new Date(now - 60 * 60 * 1000); // 1 hour ago
            break;
        case '6h':
            cutoffDate = new Date(now - 6 * 60 * 60 * 1000); // 6 hours ago
            break;
        case '1d':
            cutoffDate = new Date(now - 24 * 60 * 60 * 1000); // 1 day ago
            break;
        case '1w':
            cutoffDate = new Date(now - 7 * 24 * 60 * 60 * 1000); // 1 week ago
            break;
        case '1m':
            cutoffDate = new Date(now - 30 * 24 * 60 * 60 * 1000); // 1 month ago
            break;
        case 'all':
        default:
            cutoffDate = null;
            break;
    }
    
    // Filter activities
    const activityCards = document.querySelectorAll('.activity-card');
    let visibleCount = 0;
    
    activityCards.forEach((card, index) => {
        const cardDate = new Date(card.dataset.date);
        const shouldShow = !cutoffDate || cardDate >= cutoffDate;
        
        if (shouldShow) {
            card.style.display = 'block';
            card.classList.remove('fade-out');
            card.classList.add('fade-in');
            
            // Update timeline number for visible cards
            const timelineNumber = card.querySelector('.timeline-number');
            if (timelineNumber) {
                timelineNumber.textContent = ++visibleCount;
            }
        } else {
            card.classList.add('fade-out');
            setTimeout(() => {
                if (card.classList.contains('fade-out')) {
                    card.style.display = 'none';
                }
            }, 300);
        }
    });
    
    // Update total count
    updateTotalCount(visibleCount);
    
    // Show/hide empty state
    const emptyState = document.getElementById('empty-state');
    const timelineContainer = document.getElementById('timeline-container');
    
    if (visibleCount === 0) {
        timelineContainer.style.display = 'none';
        emptyState.style.display = 'block';
        emptyState.querySelector('h3').textContent = getEmptyStateMessage(timeRange);
    } else {
        timelineContainer.style.display = 'block';
        emptyState.style.display = 'none';
    }
}

function updateTotalCount(count) {
    const totalEventElement = document.querySelector('.total-events-count');
    if (totalEventElement) {
        totalEventElement.textContent = count;
    }
}

function getEmptyStateMessage(timeRange) {
    const messages = {
        '1h': 'No activities in the last hour',
        '6h': 'No activities in the last 6 hours',
        '1d': 'No activities in the last day',
        '1w': 'No activities in the last week',
        '1m': 'No activities in the last month',
        'all': 'No activities yet'
    };
    return messages[timeRange] || messages['all'];
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Set default active filter
    const defaultBtn = document.querySelector('[onclick="filterByTime(\'all\')"]');
    if (defaultBtn) {
        defaultBtn.classList.add('active');
    }
});
</script>
@endsection
