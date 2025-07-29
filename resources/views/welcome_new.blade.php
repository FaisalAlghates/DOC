@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 relative overflow-hidden">
    <!-- Animated background -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute inset-0 bg-gradient-to-r from-violet-600/20 via-fuchsia-600/20 via-cyan-600/20 to-violet-600/20 animate-gradient-x"></div>
    </div>
    
    <!-- Dynamic particles -->
    <div class="absolute inset-0">
        <div class="floating-particles"></div>
    </div>
    
    <!-- Glowing orbs -->
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-gradient-radial from-violet-500/30 to-transparent rounded-full blur-3xl animate-pulse-slow"></div>
    <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-gradient-radial from-fuchsia-500/30 to-transparent rounded-full blur-3xl animate-pulse-slow delay-1000"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-radial from-cyan-500/20 to-transparent rounded-full blur-3xl animate-pulse-slow delay-2000"></div>
    
    <!-- Glass morphism overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-white/5 via-white/2 to-white/5 backdrop-blur-sm"></div>

    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
        <!-- Main content -->
        <div class="max-w-6xl w-full">
            <!-- Hero section -->
            <div class="text-center mb-24">
                <!-- Logo with magical effect -->
                <div class="relative mb-12">
                    <div class="inline-flex items-center justify-center w-32 h-32 rounded-full relative overflow-hidden group cursor-pointer">
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-cyan-600 rounded-full animate-spin-slow"></div>
                        <div class="absolute inset-1 bg-slate-900 rounded-full flex items-center justify-center">
                            <svg class="w-16 h-16 text-white group-hover:scale-110 transition-transform duration-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-cyan-600 rounded-full blur-xl opacity-50 animate-pulse"></div>
                </div>
                
                <!-- Main title with flowing animation -->
                <h1 class="text-7xl md:text-9xl font-black mb-8 relative">
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-white via-violet-200 to-white animate-shimmer-text leading-tight">
                        DHUP
                    </span>
                    <span class="block text-4xl md:text-6xl mt-4 text-transparent bg-clip-text bg-gradient-to-r from-violet-400 via-fuchsia-400 to-cyan-400 animate-shimmer-text delay-500">
                        Documentation Universe
                    </span>
                </h1>
                
                <!-- Subtitle with typewriter effect -->
                <div class="max-w-4xl mx-auto mb-12">
                    <p class="text-2xl md:text-3xl text-gray-300 font-light leading-relaxed typewriter">
                        Where innovation meets <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-400 to-fuchsia-400 font-semibold">elegance</span>
                    </p>
                    <p class="text-lg md:text-xl text-gray-400 mt-4 fade-in-up delay-1000">
                        Transform your documentation workflow with cutting-edge technology
                    </p>
                </div>
                
                <!-- Status indicators -->
                <div class="flex justify-center items-center space-x-8 mb-16">
                    <div class="flex items-center space-x-3 px-6 py-3 rounded-full bg-white/10 backdrop-blur-md border border-white/20">
                        <div class="w-3 h-3 bg-emerald-400 rounded-full animate-pulse shadow-lg shadow-emerald-400/50"></div>
                        <span class="text-gray-200 font-medium">Live System</span>
                    </div>
                    <div class="flex items-center space-x-3 px-6 py-3 rounded-full bg-white/10 backdrop-blur-md border border-white/20">
                        <div class="w-3 h-3 bg-violet-400 rounded-full animate-pulse delay-200 shadow-lg shadow-violet-400/50"></div>
                        <span class="text-gray-200 font-medium">AI Enhanced</span>
                    </div>
                    <div class="flex items-center space-x-3 px-6 py-3 rounded-full bg-white/10 backdrop-blur-md border border-white/20">
                        <div class="w-3 h-3 bg-cyan-400 rounded-full animate-pulse delay-400 shadow-lg shadow-cyan-400/50"></div>
                        <span class="text-gray-200 font-medium">Cloud Native</span>
                    </div>
                </div>
            </div>

            <!-- Features showcase -->
            <div class="grid md:grid-cols-3 gap-8 mb-24">
                <div class="group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-violet-600/20 to-fuchsia-600/20 rounded-2xl transform rotate-1 group-hover:rotate-0 transition-transform duration-700"></div>
                    <div class="relative bg-white/10 backdrop-blur-xl rounded-2xl p-8 border border-white/20 hover:border-white/40 transition-all duration-700 hover:-translate-y-2">
                        <div class="w-16 h-16 mb-6 relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-violet-500 to-fuchsia-500 rounded-xl transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-700"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-violet-300 transition-colors duration-500">Quantum Speed</h3>
                        <p class="text-gray-300 leading-relaxed">Experience instantaneous documentation creation with our next-generation processing engine.</p>
                    </div>
                </div>

                <div class="group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-fuchsia-600/20 to-cyan-600/20 rounded-2xl transform -rotate-1 group-hover:rotate-0 transition-transform duration-700"></div>
                    <div class="relative bg-white/10 backdrop-blur-xl rounded-2xl p-8 border border-white/20 hover:border-white/40 transition-all duration-700 hover:-translate-y-2">
                        <div class="w-16 h-16 mb-6 relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-fuchsia-500 to-cyan-500 rounded-xl transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-700"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-fuchsia-300 transition-colors duration-500">Soul Connection</h3>
                        <p class="text-gray-300 leading-relaxed">Intuitive design that understands your workflow and adapts to your creative process.</p>
                    </div>
                </div>

                <div class="group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-600/20 to-violet-600/20 rounded-2xl transform rotate-1 group-hover:rotate-0 transition-transform duration-700"></div>
                    <div class="relative bg-white/10 backdrop-blur-xl rounded-2xl p-8 border border-white/20 hover:border-white/40 transition-all duration-700 hover:-translate-y-2">
                        <div class="w-16 h-16 mb-6 relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-violet-500 rounded-xl transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-700"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-cyan-300 transition-colors duration-500">Future Vision</h3>
                        <p class="text-gray-300 leading-relaxed">Revolutionary features that redefine what's possible in documentation technology.</p>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="text-center">
                @guest
                    <div class="flex flex-col md:flex-row gap-6 justify-center items-center mb-12">
                        <a href="{{ route('login') }}" 
                           class="group relative px-12 py-6 overflow-hidden rounded-2xl transition-all duration-700 hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-violet-600 animate-gradient-x"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-violet-600/50 to-fuchsia-600/50 blur-xl group-hover:blur-2xl transition-all duration-700"></div>
                            <span class="relative z-10 flex items-center space-x-3 text-white font-bold text-xl">
                                <svg class="w-6 h-6 group-hover:rotate-12 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                <span>Enter the Matrix</span>
                            </span>
                        </a>
                        
                        <a href="{{ route('register') }}" 
                           class="group relative px-12 py-6 overflow-hidden rounded-2xl transition-all duration-700 hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-r from-fuchsia-600 via-cyan-600 to-fuchsia-600 animate-gradient-x"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-fuchsia-600/50 to-cyan-600/50 blur-xl group-hover:blur-2xl transition-all duration-700"></div>
                            <span class="relative z-10 flex items-center space-x-3 text-white font-bold text-xl">
                                <svg class="w-6 h-6 group-hover:scale-125 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span>Begin Evolution</span>
                            </span>
                        </a>
                    </div>
                    
                    <!-- Social proof -->
                    <div class="relative max-w-lg mx-auto">
                        <div class="bg-white/5 backdrop-blur-xl rounded-2xl p-8 border border-white/10">
                            <p class="text-gray-300 text-lg mb-6">
                                Trusted by <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-400 to-fuchsia-400 font-black text-2xl">50,000+</span> visionaries worldwide
                            </p>
                            <div class="flex justify-center items-center space-x-4">
                                <div class="flex -space-x-3">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 border-2 border-white/20 animate-pulse"></div>
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-fuchsia-500 to-cyan-500 border-2 border-white/20 animate-pulse delay-200"></div>
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-cyan-500 to-violet-500 border-2 border-white/20 animate-pulse delay-400"></div>
                                    <div class="w-12 h-12 rounded-full bg-white/10 border-2 border-white/20 flex items-center justify-center backdrop-blur-sm">
                                        <span class="text-white font-bold">∞</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('dashboard') }}" 
                       class="group relative inline-flex items-center px-16 py-8 overflow-hidden rounded-2xl transition-all duration-700 hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600 via-fuchsia-600 via-cyan-600 to-violet-600 animate-gradient-x"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600/50 via-fuchsia-600/50 to-cyan-600/50 blur-2xl group-hover:blur-3xl transition-all duration-700"></div>
                        <span class="relative z-10 flex items-center space-x-4 text-white font-black text-3xl">
                            <span>Launch Universe</span>
                            <svg class="w-10 h-10 group-hover:translate-x-3 group-hover:scale-125 transition-all duration-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </a>
                    
                    <p class="text-gray-300 mt-8 text-2xl font-light">
                        Welcome back, <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-400 to-fuchsia-400 font-bold">Creator</span>
                    </p>
                @endguest
            </div>
        </div>

        <!-- Floating elements -->
        <div class="absolute bottom-16 left-1/2 transform -translate-x-1/2">
            <div class="flex space-x-4">
                <div class="w-4 h-4 rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 animate-bounce shadow-lg shadow-violet-500/50"></div>
                <div class="w-4 h-4 rounded-full bg-gradient-to-r from-fuchsia-500 to-cyan-500 animate-bounce delay-100 shadow-lg shadow-fuchsia-500/50"></div>
                <div class="w-4 h-4 rounded-full bg-gradient-to-r from-cyan-500 to-violet-500 animate-bounce delay-200 shadow-lg shadow-cyan-500/50"></div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes gradient-x {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

@keyframes shimmer-text {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

@keyframes spin-slow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes pulse-slow {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(1.05); }
}

@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-gradient-x {
    background-size: 200% 200%;
    animation: gradient-x 3s ease infinite;
}

.animate-shimmer-text {
    background-size: 200% 100%;
    animation: shimmer-text 3s linear infinite;
}

.animate-spin-slow {
    animation: spin-slow 20s linear infinite;
}

.animate-pulse-slow {
    animation: pulse-slow 4s ease-in-out infinite;
}

.fade-in-up {
    animation: fade-in-up 1s ease-out forwards;
}

.typewriter {
    animation: fade-in-up 2s ease-out forwards;
}

.delay-500 { animation-delay: 0.5s; }
.delay-1000 { animation-delay: 1s; }
.delay-2000 { animation-delay: 2s; }

.bg-gradient-radial {
    background: radial-gradient(circle, var(--tw-gradient-from), var(--tw-gradient-to));
}

.floating-particles {
    position: relative;
    width: 100%;
    height: 100%;
}

.floating-particles::before,
.floating-particles::after {
    content: '';
    position: absolute;
    width: 2px;
    height: 2px;
    background: linear-gradient(45deg, #8b5cf6, #ec4899, #06b6d4);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

.floating-particles::before {
    top: 20%;
    left: 20%;
    animation-delay: -2s;
}

.floating-particles::after {
    top: 60%;
    right: 20%;
    animation-delay: -4s;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px) translateX(0px);
        opacity: 0.7;
    }
    25% {
        transform: translateY(-20px) translateX(10px);
        opacity: 1;
    }
    50% {
        transform: translateY(-40px) translateX(-5px);
        opacity: 0.8;
    }
    75% {
        transform: translateY(-20px) translateX(-10px);
        opacity: 1;
    }
}

/* Scrollbar styling */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #8b5cf6, #ec4899);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #7c3aed, #db2777);
}
</style>
@endsection
