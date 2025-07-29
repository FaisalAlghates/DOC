@extends('layouts.app')

@section('content')
<div class="min-h-screen transition-all duration-500 relative overflow-hidden" id="mainContainer">
    <!-- Dark Mode Toggle -->
    <div class="fixed top-6 right-6 z-50">
        <button id="darkModeToggle" class="group relative p-4 rounded-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 transition-all duration-300 shadow-lg hover:shadow-xl">
            <div class="relative w-6 h-6">
                <!-- Sun Icon -->
                <svg id="sunIcon" class="w-6 h-6 text-yellow-400 absolute inset-0 transition-all duration-300 rotate-0 scale-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <!-- Moon Icon -->
                <svg id="moonIcon" class="w-6 h-6 text-blue-300 absolute inset-0 transition-all duration-300 rotate-90 scale-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                </svg>
            </div>
        </button>
    </div>

    <!-- Animated background -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/15 via-purple-600/15 via-cyan-600/15 to-blue-600/15 animate-gradient-x"></div>
    </div>
    
    <!-- Dynamic particles -->
    <div class="absolute inset-0">
        <div class="floating-particles"></div>
    </div>
    
    <!-- Glowing orbs -->
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-gradient-radial from-blue-500/20 to-transparent rounded-full blur-3xl animate-pulse-slow"></div>
    <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-gradient-radial from-purple-500/20 to-transparent rounded-full blur-3xl animate-pulse-slow delay-1000"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-radial from-cyan-500/15 to-transparent rounded-full blur-3xl animate-pulse-slow delay-2000"></div>
    
    <!-- Glass morphism overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-white/3 via-white/1 to-white/3 backdrop-blur-sm"></div>

    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
        <!-- Main content -->
        <div class="max-w-6xl w-full">
            <!-- Hero section -->
            <div class="text-center mb-24">
                <!-- Logo with magical effect -->
                <div class="relative mb-12">
                    <div class="logo-container inline-flex items-center justify-center w-32 h-32 rounded-full relative overflow-hidden group cursor-pointer shadow-2xl">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-purple-500 to-cyan-500 rounded-full animate-spin-slow"></div>
                        <div class="absolute inset-1 logo-inner rounded-full flex items-center justify-center border-2">
                            <svg class="w-16 h-16 logo-icon group-hover:scale-110 transition-transform duration-700 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full blur-2xl opacity-60 animate-pulse"></div>
                </div>
                
                <!-- Main title with flowing animation -->
                <h1 class="text-7xl md:text-9xl font-black mb-8 relative">
                    <span class="block main-title drop-shadow-2xl leading-tight">
                        DHUP
                    </span>
                    <span class="block text-4xl md:text-6xl mt-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-purple-400 to-cyan-400 animate-shimmer-text delay-500 drop-shadow-lg">
                        Documentation Universe
                    </span>
                </h1>
                
                <!-- Subtitle with typewriter effect -->
                <div class="max-w-4xl mx-auto mb-12">
                    <p class="text-2xl md:text-3xl main-subtitle font-light leading-relaxed typewriter drop-shadow-lg">
                        Where innovation meets <span class="text-blue-400 font-semibold">elegance</span>
                    </p>
                    <p class="text-lg md:text-xl secondary-text mt-4 fade-in-up delay-1000 drop-shadow-md">
                        Transform your documentation workflow with cutting-edge technology
                    </p>
                </div>
                
                <!-- Status indicators -->
                <div class="flex justify-center items-center space-x-8 mb-16">
                    <div class="flex items-center space-x-3 px-6 py-3 rounded-full status-indicator backdrop-blur-md border shadow-lg">
                        <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse shadow-lg shadow-green-400/50"></div>
                        <span class="status-text font-medium drop-shadow-md">Live System</span>
                    </div>
                    <div class="flex items-center space-x-3 px-6 py-3 rounded-full status-indicator backdrop-blur-md border shadow-lg">
                        <div class="w-3 h-3 bg-blue-400 rounded-full animate-pulse delay-200 shadow-lg shadow-blue-400/50"></div>
                        <span class="status-text font-medium drop-shadow-md">AI Enhanced</span>
                    </div>
                    <div class="flex items-center space-x-3 px-6 py-3 rounded-full status-indicator backdrop-blur-md border shadow-lg">
                        <div class="w-3 h-3 bg-purple-400 rounded-full animate-pulse delay-400 shadow-lg shadow-purple-400/50"></div>
                        <span class="status-text font-medium drop-shadow-md">Cloud Native</span>
                    </div>
                </div>
            </div>

            <!-- Features slider -->
            <div class="relative mb-24 overflow-hidden">
                <div class="features-slider flex space-x-8 px-6 justify-center transition-transform duration-1000 ease-out" id="featuresSlider">
                    <!-- Slide 1 -->
                    <div class="group relative flex-shrink-0 w-72 h-80 overflow-hidden transform transition-all duration-500 ease-out hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/40 to-cyan-500/40 rounded-2xl transform rotate-1 group-hover:rotate-0 transition-all duration-700 ease-out"></div>
                        <div class="relative bg-white/25 backdrop-blur-xl rounded-2xl p-6 border-2 border-blue-400/60 hover:border-blue-400/90 transition-all duration-500 ease-out hover:-translate-y-3 hover:shadow-2xl shadow-xl h-full flex flex-col">
                            <div class="w-16 h-16 mb-4 relative mx-auto transform transition-all duration-700 ease-out group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-700 ease-out shadow-2xl border-2 border-white/30"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white drop-shadow-2xl font-bold transform transition-all duration-500 ease-out group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-xl font-black text-white mb-3 group-hover:text-blue-200 transition-all duration-500 ease-out drop-shadow-2xl text-center border-b border-white/30 pb-2 transform group-hover:scale-105">Quantum Speed</h3>
                            <p class="text-white leading-relaxed text-base drop-shadow-lg font-medium text-center flex-grow flex items-center transition-all duration-300 ease-out group-hover:text-blue-100">Experience instantaneous documentation creation with our next-generation processing engine.</p>
                            <div class="mt-4 flex justify-center">
                                <button class="px-4 py-2 bg-blue-500/80 hover:bg-blue-500 text-white rounded-lg font-bold border-2 border-white/50 hover:border-white transition-all duration-300 ease-out shadow-lg hover:shadow-xl backdrop-blur-sm transform hover:scale-110 hover:-translate-y-1">
                                    Learn More
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="group relative flex-shrink-0 w-72 h-80 overflow-hidden transform transition-all duration-500 ease-out hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/40 to-pink-500/40 rounded-2xl transform -rotate-1 group-hover:rotate-0 transition-all duration-700 ease-out"></div>
                        <div class="relative bg-white/25 backdrop-blur-xl rounded-2xl p-6 border-2 border-purple-400/60 hover:border-purple-400/90 transition-all duration-500 ease-out hover:-translate-y-3 hover:shadow-2xl shadow-xl h-full flex flex-col">
                            <div class="w-16 h-16 mb-4 relative mx-auto transform transition-all duration-700 ease-out group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-700 ease-out shadow-2xl border-2 border-white/30"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white drop-shadow-2xl font-bold transform transition-all duration-500 ease-out group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-xl font-black text-white mb-3 group-hover:text-purple-200 transition-all duration-500 ease-out drop-shadow-2xl text-center border-b border-white/30 pb-2 transform group-hover:scale-105">Soul Connection</h3>
                            <p class="text-white leading-relaxed text-base drop-shadow-lg font-medium text-center flex-grow flex items-center transition-all duration-300 ease-out group-hover:text-purple-100">Intuitive design that understands your workflow and adapts to your creative process.</p>
                            <div class="mt-4 flex justify-center">
                                <button class="px-4 py-2 bg-purple-500/80 hover:bg-purple-500 text-white rounded-lg font-bold border-2 border-white/50 hover:border-white transition-all duration-300 ease-out shadow-lg hover:shadow-xl backdrop-blur-sm transform hover:scale-110 hover:-translate-y-1">
                                    Explore
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="group relative flex-shrink-0 w-72 h-80 overflow-hidden transform transition-all duration-500 ease-out hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/40 to-teal-500/40 rounded-2xl transform rotate-1 group-hover:rotate-0 transition-all duration-700 ease-out"></div>
                        <div class="relative bg-white/25 backdrop-blur-xl rounded-2xl p-6 border-2 border-cyan-400/60 hover:border-cyan-400/90 transition-all duration-500 ease-out hover:-translate-y-3 hover:shadow-2xl shadow-xl h-full flex flex-col">
                            <div class="w-16 h-16 mb-4 relative mx-auto transform transition-all duration-700 ease-out group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-teal-500 rounded-xl transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-700 ease-out shadow-2xl border-2 border-white/30"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white drop-shadow-2xl font-bold transform transition-all duration-500 ease-out group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-xl font-black text-white mb-3 group-hover:text-cyan-200 transition-all duration-500 ease-out drop-shadow-2xl text-center border-b border-white/30 pb-2 transform group-hover:scale-105">Future Vision</h3>
                            <p class="text-white leading-relaxed text-base drop-shadow-lg font-medium text-center flex-grow flex items-center transition-all duration-300 ease-out group-hover:text-cyan-100">Revolutionary features that redefine what's possible in documentation technology.</p>
                            <div class="mt-4 flex justify-center">
                                <button class="px-4 py-2 bg-cyan-500/80 hover:bg-cyan-500 text-white rounded-lg font-bold border-2 border-white/50 hover:border-white transition-all duration-300 ease-out shadow-lg hover:shadow-xl backdrop-blur-sm transform hover:scale-110 hover:-translate-y-1">
                                    Discover
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Additional slides for smooth looping -->
                    <div class="group relative flex-shrink-0 w-72 h-80 overflow-hidden transform transition-all duration-500 ease-out hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/40 to-orange-500/40 rounded-2xl transform rotate-1 group-hover:rotate-0 transition-all duration-700 ease-out"></div>
                        <div class="relative bg-white/25 backdrop-blur-xl rounded-2xl p-6 border-2 border-yellow-400/60 hover:border-yellow-400/90 transition-all duration-500 ease-out hover:-translate-y-3 hover:shadow-2xl shadow-xl h-full flex flex-col">
                            <div class="w-16 h-16 mb-4 relative mx-auto transform transition-all duration-700 ease-out group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-xl transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-700 ease-out shadow-2xl border-2 border-white/30"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white drop-shadow-2xl font-bold transform transition-all duration-500 ease-out group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-xl font-black text-white mb-3 group-hover:text-yellow-200 transition-all duration-500 ease-out drop-shadow-2xl text-center border-b border-white/30 pb-2 transform group-hover:scale-105">Smart Analytics</h3>
                            <p class="text-white leading-relaxed text-base drop-shadow-lg font-medium text-center flex-grow flex items-center transition-all duration-300 ease-out group-hover:text-yellow-100">Advanced insights and analytics to optimize your documentation performance.</p>
                            <div class="mt-4 flex justify-center">
                                <button class="px-4 py-2 bg-yellow-500/80 hover:bg-yellow-500 text-white rounded-lg font-bold border-2 border-white/50 hover:border-white transition-all duration-300 ease-out shadow-lg hover:shadow-xl backdrop-blur-sm transform hover:scale-110 hover:-translate-y-1">
                                    Analyze
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="group relative flex-shrink-0 w-72 h-80 overflow-hidden transform transition-all duration-500 ease-out hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-br from-green-500/40 to-emerald-500/40 rounded-2xl transform -rotate-1 group-hover:rotate-0 transition-all duration-700 ease-out"></div>
                        <div class="relative bg-white/25 backdrop-blur-xl rounded-2xl p-6 border-2 border-green-400/60 hover:border-green-400/90 transition-all duration-500 ease-out hover:-translate-y-3 hover:shadow-2xl shadow-xl h-full flex flex-col">
                            <div class="w-16 h-16 mb-4 relative mx-auto transform transition-all duration-700 ease-out group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-700 ease-out shadow-2xl border-2 border-white/30"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white drop-shadow-2xl font-bold transform transition-all duration-500 ease-out group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-xl font-black text-white mb-3 group-hover:text-green-200 transition-all duration-500 ease-out drop-shadow-2xl text-center border-b border-white/30 pb-2 transform group-hover:scale-105">Secure Vault</h3>
                            <p class="text-white leading-relaxed text-base drop-shadow-lg font-medium text-center flex-grow flex items-center transition-all duration-300 ease-out group-hover:text-green-100">Enterprise-grade security with end-to-end encryption for your sensitive documentation.</p>
                            <div class="mt-4 flex justify-center">
                                <button class="px-4 py-2 bg-green-500/80 hover:bg-green-500 text-white rounded-lg font-bold border-2 border-white/50 hover:border-white transition-all duration-300 ease-out shadow-lg hover:shadow-xl backdrop-blur-sm transform hover:scale-110 hover:-translate-y-1">
                                    Secure
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider navigation -->
                <div class="flex justify-center mt-8 space-x-4">
                    <button class="slider-dot w-4 h-4 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-500 ease-out active border-2 border-white/60 shadow-lg hover:shadow-xl backdrop-blur-sm hover:scale-125 transform hover:rotate-45 hover:ring-4 hover:ring-white/30" data-slide="0"></button>
                    <button class="slider-dot w-4 h-4 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-500 ease-out border-2 border-white/60 shadow-lg hover:shadow-xl backdrop-blur-sm hover:scale-125 transform hover:rotate-45 hover:ring-4 hover:ring-white/30" data-slide="1"></button>
                    <button class="slider-dot w-4 h-4 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-500 ease-out border-2 border-white/60 shadow-lg hover:shadow-xl backdrop-blur-sm hover:scale-125 transform hover:rotate-45 hover:ring-4 hover:ring-white/30" data-slide="2"></button>
                    <button class="slider-dot w-4 h-4 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-500 ease-out border-2 border-white/60 shadow-lg hover:shadow-xl backdrop-blur-sm hover:scale-125 transform hover:rotate-45 hover:ring-4 hover:ring-white/30" data-slide="3"></button>
                    <button class="slider-dot w-4 h-4 rounded-full bg-white/40 hover:bg-white/70 transition-all duration-500 ease-out border-2 border-white/60 shadow-lg hover:shadow-xl backdrop-blur-sm hover:scale-125 transform hover:rotate-45 hover:ring-4 hover:ring-white/30" data-slide="4"></button>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="text-center">
                @guest
                    <div class="flex flex-col md:flex-row gap-6 justify-center items-center mb-12">
                        <!-- Get Started Button -->
                        <a href="#" onclick="document.getElementById('featuresSlider').scrollIntoView({behavior: 'smooth'})" 
                           class="group relative px-12 py-6 overflow-hidden rounded-2xl transition-all duration-700 hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-600 animate-gradient-x"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/50 to-indigo-600/50 blur-xl group-hover:blur-2xl transition-all duration-700"></div>
                            <span class="relative z-10 flex items-center space-x-3 text-white font-bold text-xl drop-shadow-lg">
                                <svg class="w-6 h-6 group-hover:rotate-12 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                                <span>Get Started</span>
                            </span>
                        </a>
                        
                        <a href="{{ route('login') }}" 
                           class="group relative px-12 py-6 overflow-hidden rounded-2xl transition-all duration-700 hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-black to-gray-900 animate-gradient-x"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-gray-800/50 to-black/50 blur-xl group-hover:blur-2xl transition-all duration-700"></div>
                            <span class="relative z-10 flex items-center space-x-3 text-white font-bold text-xl drop-shadow-lg">
                                <svg class="w-6 h-6 group-hover:rotate-12 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                <span>Sign In</span>
                            </span>
                        </a>
                        
                        <a href="{{ route('register') }}" 
                           class="group relative px-12 py-6 overflow-hidden rounded-2xl transition-all duration-700 hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-r from-pink-600 via-rose-600 to-pink-600 animate-gradient-x"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-pink-600/50 to-rose-600/50 blur-xl group-hover:blur-2xl transition-all duration-700"></div>
                            <span class="relative z-10 flex items-center space-x-3 text-white font-bold text-xl">
                                <svg class="w-6 h-6 group-hover:scale-125 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span>Sign Up</span>
                            </span>
                        </a>
                    </div>
                    
                    <!-- Social proof -->
                    <div class="relative max-w-lg mx-auto">
                        <div class="social-proof-card backdrop-blur-xl rounded-2xl p-8 border">
                            <p class="social-proof-text text-lg mb-6">
                                Trusted by <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400 font-black text-2xl">50,000+</span> visionaries worldwide
                            </p>
                            <div class="flex justify-center items-center space-x-4">
                                <div class="flex -space-x-3">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 border-2 border-white/20 animate-pulse"></div>
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-fuchsia-500 to-cyan-500 border-2 border-white/20 animate-pulse delay-200"></div>
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-cyan-500 to-violet-500 border-2 border-white/20 animate-pulse delay-400"></div>
                                    <div class="w-12 h-12 rounded-full infinity-badge border-2 border-white/20 flex items-center justify-center backdrop-blur-sm">
                                        <span class="infinity-text font-bold">∞</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('dashboard') }}" 
                       class="group relative inline-flex items-center px-16 py-8 overflow-hidden rounded-2xl transition-all duration-700 hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 via-teal-600 via-indigo-600 to-purple-600 animate-gradient-x"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-600/50 via-teal-600/50 to-purple-600/50 blur-2xl group-hover:blur-3xl transition-all duration-700"></div>
                        <span class="relative z-10 flex items-center space-x-4 text-white font-black text-3xl">
                            <span>Launch Universe</span>
                            <svg class="w-10 h-10 group-hover:translate-x-3 group-hover:scale-125 transition-all duration-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </a>
                    
                    <p class="welcome-message mt-8 text-2xl font-light">
                        Welcome back, <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400 font-bold">Creator</span>
                    </p>
                @endguest
            </div>
        </div>

        <!-- Floating elements -->
        <div class="absolute bottom-16 left-1/2 transform -translate-x-1/2">
            <div class="flex space-x-4">
                <div class="w-4 h-4 rounded-full bg-gradient-to-r from-emerald-500 to-teal-500 animate-bounce shadow-lg shadow-emerald-500/50"></div>
                <div class="w-4 h-4 rounded-full bg-gradient-to-r from-pink-500 to-rose-500 animate-bounce delay-100 shadow-lg shadow-pink-500/50"></div>
                <div class="w-4 h-4 rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 animate-bounce delay-200 shadow-lg shadow-indigo-500/50"></div>
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
    background: linear-gradient(45deg, #059669, #0891b2, #3b82f6);
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
    background: linear-gradient(to bottom, #059669, #db2777);
}

/* Features Slider Styles */
.features-slider {
    scroll-behavior: smooth;
    overflow-x: auto;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.features-slider::-webkit-scrollbar {
    display: none;
}

.slider-dot.active {
    background: rgba(255, 255, 255, 0.9) !important;
    transform: scale(1.3);
    border-color: rgba(255, 255, 255, 0.9) !important;
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.5), 0 4px 8px rgba(0, 0, 0, 0.3);
}

/* Smooth slider animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Enhanced smooth transitions */
* {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Enhanced card hover effects */
.features-slider > div {
    transform-style: preserve-3d;
    transition: all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.features-slider > div:hover {
    z-index: 10;
    transform: translateY(-15px) scale(1.05) rotateY(3deg);
    filter: brightness(1.15) saturate(1.2);
}

/* Enhanced slider dot interactions */
.slider-dot {
    transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    cursor: pointer;
    backdrop-filter: blur(10px);
    will-change: transform, background, box-shadow;
}

.slider-dot:hover {
    transform: scale(1.4) rotate(45deg);
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
    background: rgba(255, 255, 255, 0.8) !important;
}

/* Enhanced icon animations */
.group:hover .w-16 {
    animation: iconBounce 2s ease-in-out infinite;
}

@keyframes iconBounce {
    0%, 100% { transform: scale(1) rotate(0deg); }
    25% { transform: scale(1.05) rotate(2deg); }
    50% { transform: scale(1.1) rotate(-2deg); }
    75% { transform: scale(1.05) rotate(1deg); }
}

/* Title glow effect */
.group:hover h3 {
    animation: titleGlow 1.5s ease-in-out infinite alternate;
}

@keyframes titleGlow {
    from { 
        text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        transform: translateY(0);
    }
    to { 
        text-shadow: 0 0 15px rgba(255, 255, 255, 0.9), 0 0 25px rgba(255, 255, 255, 0.5);
        transform: translateY(-1px);
    }
}

/* Button float animation */
.group:hover button {
    animation: buttonFloat 2s ease-in-out infinite;
}

@keyframes buttonFloat {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-3px) scale(1.05); }
}

/* Enhanced 3D transform effects */
.group {
    transition: all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transform-style: preserve-3d;
}

.group:hover {
    transform: perspective(1000px) rotateX(3deg) rotateY(3deg) translateZ(20px);
}

/* Smooth ripple effect */
@keyframes ripple {
    0% {
        transform: scale(0);
        opacity: 1;
    }
    100% {
        transform: scale(4);
        opacity: 0;
    }
}

.slider-dot::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transform: translate(-50%, -50%) scale(0);
    transition: all 0.3s ease;
}

.slider-dot:active::before {
    animation: ripple 0.6s ease-out;
}

/* Enhanced responsive smooth scaling */
@media (max-width: 768px) {
    .features-slider > div:hover {
        transform: translateY(-8px) scale(1.02);
    }
    
    .slider-dot:hover {
        transform: scale(1.3) rotate(25deg);
    }
}

/* Accessibility and reduced motion */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
    
    .features-slider > div:hover {
        transform: translateY(-5px) scale(1.02);
    }
}

/* Enhanced focus styles */
.slider-dot:focus {
    outline: 3px solid rgba(255, 255, 255, 0.8);
    outline-offset: 3px;
    background: rgba(255, 255, 255, 0.9) !important;
    transform: scale(1.3);
}

button:focus {
    outline: 3px solid rgba(99, 102, 241, 0.7);
    outline-offset: 3px;
}

/* Progressive enhancement for modern browsers */
@supports (backdrop-filter: blur(10px)) {
    .slider-dot {
        backdrop-filter: blur(15px);
    }
}

/* GPU acceleration for smooth animations */
.features-slider > div,
.slider-dot,
.group {
    will-change: transform;
    transform: translateZ(0);
}

/* Smooth page loading animation */
.loading {
    opacity: 0;
    transform: translateY(30px);
    transition: all 1.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.loaded {
    opacity: 1;
    transform: translateY(0);
}
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.features-slider > div {
    animation: slideIn 0.6s ease-out;
}

/* Auto-scroll animation */
@keyframes autoScroll {
    0% { transform: translateX(0); }
    20% { transform: translateX(-340px); }
    40% { transform: translateX(-680px); }
    60% { transform: translateX(-1020px); }
    80% { transform: translateX(-1360px); }
    100% { transform: translateX(-1700px); }
}

.features-slider.auto-scroll {
    animation: autoScroll 15s infinite;
}

/* Dark Mode and Light Mode Styles */
#mainContainer {
    background: linear-gradient(135deg, #1f2937 0%, #1e3a8a 50%, #1f2937 100%);
}

#mainContainer.dark-mode {
    background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
}

#mainContainer.light-mode {
    background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 50%, #f1f5f9 100%);
}

/* Dark mode text colors */
#mainContainer.dark-mode .text-white {
    color: #f8fafc !important;
}

#mainContainer.dark-mode .text-gray-100 {
    color: #e2e8f0 !important;
}

#mainContainer.dark-mode .text-gray-300 {
    color: #cbd5e1 !important;
}

/* Light mode text colors */
#mainContainer.light-mode .text-white {
    color: #1e293b !important;
}

#mainContainer.light-mode .text-gray-100 {
    color: #334155 !important;
}

#mainContainer.light-mode .text-gray-300 {
    color: #64748b !important;
}

/* Light mode cards */
#mainContainer.light-mode .bg-white\/20 {
    background: rgba(255, 255, 255, 0.8) !important;
    backdrop-filter: blur(20px);
}

#mainContainer.light-mode .bg-white\/10 {
    background: rgba(255, 255, 255, 0.6) !important;
}

#mainContainer.light-mode .bg-white\/5 {
    background: rgba(255, 255, 255, 0.4) !important;
}

#mainContainer.light-mode .bg-white\/15 {
    background: rgba(255, 255, 255, 0.7) !important;
}

/* Light mode borders */
#mainContainer.light-mode .border-white\/10 {
    border-color: rgba(71, 85, 105, 0.2) !important;
}

#mainContainer.light-mode .border-white\/20 {
    border-color: rgba(71, 85, 105, 0.3) !important;
}

#mainContainer.light-mode .border-white\/30 {
    border-color: rgba(71, 85, 105, 0.4) !important;
}

/* Light mode background elements */
#mainContainer.light-mode .bg-gradient-radial {
    opacity: 0.3;
}

#mainContainer.light-mode .floating-particles::before,
#mainContainer.light-mode .floating-particles::after {
    background: linear-gradient(45deg, #3b82f6, #8b5cf6, #ec4899);
}

/* Smooth transitions for theme switching */
#mainContainer,
#mainContainer * {
    transition: background-color 0.5s ease, color 0.5s ease, border-color 0.5s ease !important;
}

/* Dark mode toggle hover effects */
#darkModeToggle:hover {
    transform: scale(1.05);
}

/* Light mode drop shadows adjustment */
#mainContainer.light-mode .drop-shadow-lg {
    filter: drop-shadow(0 10px 8px rgba(0, 0, 0, 0.1)) drop-shadow(0 4px 3px rgba(0, 0, 0, 0.06));
}

#mainContainer.light-mode .drop-shadow-md {
    filter: drop-shadow(0 4px 3px rgba(0, 0, 0, 0.05)) drop-shadow(0 2px 2px rgba(0, 0, 0, 0.03));
}

/* Custom classes for theme switching */
.main-title {
    color: #ffffff;
}

#mainContainer.light-mode .main-title {
    color: #1e293b !important;
}

.main-subtitle {
    color: #e2e8f0;
}

#mainContainer.light-mode .main-subtitle {
    color: #334155 !important;
}

.secondary-text {
    color: #cbd5e1;
}

#mainContainer.light-mode .secondary-text {
    color: #64748b !important;
}

.status-indicator {
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.3);
}

#mainContainer.light-mode .status-indicator {
    background: rgba(255, 255, 255, 0.7) !important;
    border-color: rgba(71, 85, 105, 0.3) !important;
}

.status-text {
    color: #ffffff;
}

#mainContainer.light-mode .status-text {
    color: #1e293b !important;
}

/* Logo adjustments for light mode */
#mainContainer.light-mode .logo-container .absolute.inset-1 {
    background: #f8fafc !important;
    border-color: rgba(71, 85, 105, 0.2) !important;
}

#mainContainer.light-mode .logo-container svg {
    color: #1e293b !important;
}

.logo-inner {
    background: #1f2937;
    border-color: rgba(255, 255, 255, 0.1);
}

#mainContainer.light-mode .logo-inner {
    background: #f8fafc !important;
    border-color: rgba(71, 85, 105, 0.2) !important;
}

.logo-icon {
    color: #ffffff;
}

#mainContainer.light-mode .logo-icon {
    color: #1e293b !important;
}

/* Welcome message for authenticated users */
.welcome-message {
    color: #cbd5e1;
}

#mainContainer.light-mode .welcome-message {
    color: #64748b !important;
}

/* Social proof section */
.social-proof-card {
    background: rgba(255, 255, 255, 0.05);
    border-color: rgba(255, 255, 255, 0.1);
}

#mainContainer.light-mode .social-proof-card {
    background: rgba(255, 255, 255, 0.4) !important;
    border-color: rgba(71, 85, 105, 0.2) !important;
}

.social-proof-text {
    color: #cbd5e1;
}

#mainContainer.light-mode .social-proof-text {
    color: #64748b !important;
}

.infinity-badge {
    background: rgba(255, 255, 255, 0.1);
}

#mainContainer.light-mode .infinity-badge {
    background: rgba(255, 255, 255, 0.6) !important;
    border-color: rgba(71, 85, 105, 0.3) !important;
}

.infinity-text {
    color: #ffffff;
}

#mainContainer.light-mode .infinity-text {
    color: #1e293b !important;
}

/* Slider buttons in light mode */
#mainContainer.light-mode button[class*="bg-blue-500"] {
    background: rgba(59, 130, 246, 0.9) !important;
    border-color: rgba(30, 41, 59, 0.3) !important;
    color: #ffffff !important;
}

#mainContainer.light-mode button[class*="bg-purple-500"] {
    background: rgba(139, 92, 246, 0.9) !important;
    border-color: rgba(30, 41, 59, 0.3) !important;
    color: #ffffff !important;
}

#mainContainer.light-mode button[class*="bg-cyan-500"] {
    background: rgba(6, 182, 212, 0.9) !important;
    border-color: rgba(30, 41, 59, 0.3) !important;
    color: #ffffff !important;
}

#mainContainer.light-mode button[class*="bg-yellow-500"] {
    background: rgba(234, 179, 8, 0.9) !important;
    border-color: rgba(30, 41, 59, 0.3) !important;
    color: #ffffff !important;
}

#mainContainer.light-mode button[class*="bg-green-500"] {
    background: rgba(34, 197, 94, 0.9) !important;
    border-color: rgba(30, 41, 59, 0.3) !important;
    color: #ffffff !important;
}

/* Enhanced slider dots for light mode */
#mainContainer.light-mode .slider-dot {
    background: rgba(71, 85, 105, 0.4) !important;
    border-color: rgba(71, 85, 105, 0.6) !important;
}

#mainContainer.light-mode .slider-dot:hover {
    background: rgba(71, 85, 105, 0.7) !important;
}

#mainContainer.light-mode .slider-dot.active {
    background: rgba(71, 85, 105, 0.9) !important;
    border-color: rgba(71, 85, 105, 0.9) !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('featuresSlider');
    const dots = document.querySelectorAll('.slider-dot');
    let currentSlide = 0;
    let isAutoScrolling = true;
    let isScrolling = false;

    // Enhanced auto-scroll functionality with easing
    function autoScroll() {
        if (!isAutoScrolling || isScrolling) return;
        
        isScrolling = true;
        currentSlide = (currentSlide + 1) % 5;
        
        // Smooth scroll with custom easing
        smoothScrollTo(currentSlide * 320);
        updateDots();
        
        setTimeout(() => {
            isScrolling = false;
        }, 800);
    }

    // Custom smooth scrolling function
    function smoothScrollTo(targetPosition) {
        const startPosition = slider.scrollLeft;
        const distance = targetPosition - startPosition;
        const duration = 800;
        let start = null;

        function animation(currentTime) {
            if (start === null) start = currentTime;
            const timeElapsed = currentTime - start;
            const progress = Math.min(timeElapsed / duration, 1);
            
            // Cubic easing function for smoother animation
            const easeProgress = progress < 0.5 
                ? 4 * progress * progress * progress 
                : 1 - Math.pow(-2 * progress + 2, 3) / 2;

            slider.scrollLeft = startPosition + distance * easeProgress;

            if (timeElapsed < duration) {
                requestAnimationFrame(animation);
            }
        }

        requestAnimationFrame(animation);
    }

    // Enhanced dot update with smooth transitions
    function updateDots() {
        dots.forEach((dot, index) => {
            if (index === currentSlide) {
                dot.classList.add('active');
                dot.style.transform = 'scale(1.4)';
                dot.style.background = 'rgba(255, 255, 255, 0.95)';
            } else {
                dot.classList.remove('active');
                dot.style.transform = 'scale(1)';
                dot.style.background = 'rgba(255, 255, 255, 0.4)';
            }
        });
    }

    // Enhanced manual dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            if (isScrolling) return;
            
            isAutoScrolling = false;
            isScrolling = true;
            currentSlide = index;
            
            smoothScrollTo(currentSlide * 320);
            updateDots();
            
            // Add visual feedback
            dot.style.transform = 'scale(1.6)';
            setTimeout(() => {
                dot.style.transform = currentSlide === index ? 'scale(1.4)' : 'scale(1)';
                isScrolling = false;
            }, 300);
            
            // Resume auto-scroll after longer delay
            setTimeout(() => {
                isAutoScrolling = true;
            }, 7000);
        });

        // Enhanced hover effects for dots
        dot.addEventListener('mouseenter', () => {
            if (!dot.classList.contains('active')) {
                dot.style.transform = 'scale(1.2)';
                dot.style.background = 'rgba(255, 255, 255, 0.6)';
            }
        });

        dot.addEventListener('mouseleave', () => {
            if (!dot.classList.contains('active')) {
                dot.style.transform = 'scale(1)';
                dot.style.background = 'rgba(255, 255, 255, 0.4)';
            }
        });
    });

    // Enhanced pause on hover with smooth transitions
    slider.addEventListener('mouseenter', () => {
        isAutoScrolling = false;
        // Add subtle scale effect to indicate interactivity
        slider.style.transform = 'scale(1.02)';
    });

    slider.addEventListener('mouseleave', () => {
        slider.style.transform = 'scale(1)';
        setTimeout(() => {
            isAutoScrolling = true;
        }, 2000);
    });

    // Start auto-scroll with initial delay
    setTimeout(() => {
        setInterval(autoScroll, 4000);
    }, 2000);

    // Enhanced touch/swipe support with momentum
    let startX = 0;
    let currentX = 0;
    let isDragging = false;
    let velocityX = 0;
    let lastMoveTime = 0;

    slider.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        currentX = startX;
        isDragging = true;
        isAutoScrolling = false;
        lastMoveTime = Date.now();
        velocityX = 0;
    });

    slider.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        
        const newX = e.touches[0].clientX;
        const currentTime = Date.now();
        const timeDelta = currentTime - lastMoveTime;
        
        if (timeDelta > 0) {
            velocityX = (newX - currentX) / timeDelta;
        }
        
        currentX = newX;
        lastMoveTime = currentTime;
        e.preventDefault();
    });

    slider.addEventListener('touchend', () => {
        if (!isDragging) return;
        isDragging = false;
        
        const diffX = startX - currentX;
        const threshold = Math.abs(velocityX) > 0.5 ? 30 : 80;
        
        if (Math.abs(diffX) > threshold) {
            if (diffX > 0 && currentSlide < 4) {
                currentSlide++;
            } else if (diffX < 0 && currentSlide > 0) {
                currentSlide--;
            }
            
            smoothScrollTo(currentSlide * 320);
            updateDots();
        }
        
        setTimeout(() => {
            isAutoScrolling = true;
        }, 5000);
    });

    // Initialize with smooth entry animation and loading state
    updateDots();
    slider.classList.add('loading');
    
    // Progressive loading with staggered animations
    setTimeout(() => {
        slider.classList.remove('loading');
        slider.classList.add('loaded');
        
        // Stagger card entrance animations
        const cards = slider.querySelectorAll('.group');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px) scale(0.9)';
                card.style.transition = 'all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0) scale(1)';
                }, 100);
            }, index * 150);
        });
    }, 300);
    
    // Enhanced smooth scrolling with momentum
    let isScrollingSmooth = false;
    
    function smoothScrollToWithMomentum(targetPosition, duration = 1000) {
        if (isScrollingSmooth) return;
        isScrollingSmooth = true;
        
        const startPosition = slider.scrollLeft;
        const distance = targetPosition - startPosition;
        let start = null;

        function animation(currentTime) {
            if (start === null) start = currentTime;
            const timeElapsed = currentTime - start;
            const progress = Math.min(timeElapsed / duration, 1);
            
            // Enhanced easing with bounce effect
            const easeProgress = progress < 0.5 
                ? 4 * progress * progress * progress 
                : 1 - Math.pow(-2 * progress + 2, 3) / 2;

            slider.scrollLeft = startPosition + distance * easeProgress;

            if (timeElapsed < duration) {
                requestAnimationFrame(animation);
            } else {
                isScrollingSmooth = false;
                
                // Add subtle bounce effect
                const cards = slider.querySelectorAll('.group');
                cards.forEach((card, index) => {
                    if (index === currentSlide) {
                        card.style.transform = 'scale(1.02)';
                        setTimeout(() => {
                            card.style.transform = 'scale(1)';
                        }, 200);
                    }
                });
            }
        }

        requestAnimationFrame(animation);
    }
    
    // Replace original smooth scroll calls
    function autoScroll() {
        if (!isAutoScrolling || isScrolling || isScrollingSmooth) return;
        
        isScrolling = true;
        currentSlide = (currentSlide + 1) % 5;
        
        smoothScrollToWithMomentum(currentSlide * 320, 1200);
        updateDots();
        
        setTimeout(() => {
            isScrolling = false;
        }, 1200);
    }
    
    // Enhanced dot interactions with haptic feedback simulation
    dots.forEach((dot, index) => {
        // Enhanced hover effects
        dot.addEventListener('mouseenter', () => {
            if (!dot.classList.contains('active')) {
                dot.style.transform = 'scale(1.2)';
                dot.style.background = 'rgba(255, 255, 255, 0.6)';
                dot.style.boxShadow = '0 0 15px rgba(255, 255, 255, 0.4)';
            }
        });

        dot.addEventListener('mouseleave', () => {
            if (!dot.classList.contains('active')) {
                dot.style.transform = 'scale(1)';
                dot.style.background = 'rgba(255, 255, 255, 0.4)';
                dot.style.boxShadow = '';
            }
        });
        
        dot.addEventListener('click', () => {
            if (isScrolling || isScrollingSmooth) return;
            
            isAutoScrolling = false;
            isScrolling = true;
            currentSlide = index;
            
            smoothScrollToWithMomentum(currentSlide * 320, 800);
            updateDots();
            
            // Enhanced visual feedback with pulse effect
            dot.style.transform = 'scale(1.6)';
            dot.style.background = 'rgba(255, 255, 255, 0.95)';
            dot.style.boxShadow = '0 0 25px rgba(255, 255, 255, 0.7)';
            
            setTimeout(() => {
                updateDots();
                isScrolling = false;
            }, 800);
            
            // Resume auto-scroll with longer delay
            setTimeout(() => {
                isAutoScrolling = true;
            }, 8000);
        });
    });
    
    // Enhanced parallax effect on mouse move
    slider.addEventListener('mousemove', (e) => {
        const rect = slider.getBoundingClientRect();
        const x = (e.clientX - rect.left) / rect.width;
        const y = (e.clientY - rect.top) / rect.height;
        
        const cards = slider.querySelectorAll('.group');
        cards.forEach((card, index) => {
            const offsetX = (x - 0.5) * 5;
            const offsetY = (y - 0.5) * 5;
            
            if (!card.matches(':hover')) {
                card.style.transform = `translateX(${offsetX}px) translateY(${offsetY}px)`;
            }
        });
    });
    
    slider.addEventListener('mouseleave', () => {
        const cards = slider.querySelectorAll('.group');
        cards.forEach(card => {
            if (!card.matches(':hover')) {
                card.style.transform = '';
            }
        });
    });
});

// Dark Mode Functionality
document.addEventListener('DOMContentLoaded', function() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const mainContainer = document.getElementById('mainContainer');
    const sunIcon = document.getElementById('sunIcon');
    const moonIcon = document.getElementById('moonIcon');
    
    // Check for saved theme preference
    const savedTheme = localStorage.getItem('theme');
    const systemDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    // Set initial theme
    if (savedTheme === 'dark' || (!savedTheme && systemDarkMode)) {
        enableDarkMode();
    } else {
        enableLightMode();
    }
    
    // Toggle dark mode
    darkModeToggle.addEventListener('click', () => {
        if (mainContainer.classList.contains('dark-mode')) {
            enableLightMode();
            localStorage.setItem('theme', 'light');
        } else {
            enableDarkMode();
            localStorage.setItem('theme', 'dark');
        }
    });
    
    function enableDarkMode() {
        mainContainer.classList.add('dark-mode');
        mainContainer.classList.remove('light-mode');
        
        // Animate icons
        sunIcon.style.transform = 'rotate(-90deg) scale(0)';
        moonIcon.style.transform = 'rotate(0deg) scale(1)';
    }
    
    function enableLightMode() {
        mainContainer.classList.add('light-mode');
        mainContainer.classList.remove('dark-mode');
        
        // Animate icons
        sunIcon.style.transform = 'rotate(0deg) scale(1)';
        moonIcon.style.transform = 'rotate(90deg) scale(0)';
    }
});
</script>
@endsection
