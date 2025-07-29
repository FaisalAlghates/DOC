<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'DOC') }}</title>
    
    <!-- Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Base Styles -->
    <style>
        /* ==================== CORE STYLES ==================== */
        body { 
            font-family: 'Inter', 'Cairo', sans-serif;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }
        
        /* ==================== ANIMATIONS ==================== */
        @keyframes float-particles {
            0%, 100% { 
                transform: translateY(0px) rotate(0deg);
                opacity: 0.3;
            }
            50% { 
                transform: translateY(-20px) rotate(180deg);
                opacity: 0.6;
            }
        }
        
        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }
            50% {
                box-shadow: 0 0 40px rgba(59, 130, 246, 0.6);
            }
        }
        
        @keyframes gradient-move {
            0% { background-position: 0% 50%; }
            25% { background-position: 100% 50%; }
            50% { background-position: 100% 100%; }
            75% { background-position: 0% 100%; }
            100% { background-position: 0% 50%; }
        }
        
        @keyframes background-shift {
            0%, 100% { background-position: 0% 50%; }
            33% { background-position: 100% 0%; }
            66% { background-position: 0% 100%; }
        }
        
        @keyframes background-shift-dark {
            0%, 100% { background-position: 0% 50%; }
            33% { background-position: 100% 0%; }
            66% { background-position: 0% 100%; }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* ==================== PARTICLES SYSTEM ==================== */
        .floating-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }
        
        .particle {
            position: absolute;
            border-radius: 50%;
            animation: float-particles 8s ease-in-out infinite;
            opacity: 0.4;
            filter: blur(1px);
        }
        
        .particle.blue {
            background: radial-gradient(circle, #3b82f6, #1d4ed8);
        }
        
        .particle.purple {
            background: radial-gradient(circle, #8b5cf6, #5b21b6);
        }
        
        .particle.emerald {
            background: radial-gradient(circle, #10b981, #047857);
        }
        
        .particle.pink {
            background: radial-gradient(circle, #ec4899, #be185d);
        }
    </style>
</head>

<body class="min-h-screen flex flex-col transition-all duration-500 relative" id="appBody">
    <!-- ==================== FLOATING PARTICLES ==================== -->
    <div class="floating-particles" id="particles-container"></div>
    
    <!-- ==================== HEADER SECTION ==================== -->
    @if(!request()->routeIs('welcome', 'login', 'register'))
    <header class="relative bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 shadow-2xl backdrop-blur-3xl border-b border-white/20 sticky top-0 z-50 transition-all duration-700">
        <!-- Header Background Pattern -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 via-purple-600/10 to-emerald-600/10 animate-gradient-x"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="1"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        
        <div class="relative container mx-auto px-6 py-6">
            <div class="flex items-center justify-between">
                
                <!-- Enhanced Logo & Brand -->
                <div class="flex items-center gap-5 group cursor-pointer">
                    <div class="relative">
                        <!-- Main Logo Container -->
                        <div class="relative flex items-center justify-center w-16 h-16 bg-gradient-to-br from-cyan-400 via-blue-500 to-purple-600 rounded-3xl shadow-2xl group-hover:shadow-cyan-500/50 transition-all duration-500 transform group-hover:scale-110 group-hover:rotate-3">
                            <!-- Animated Ring -->
                            <div class="absolute inset-0 rounded-3xl border-2 border-white/30 animate-spin-slow"></div>
                            <!-- Inner Glow -->
                            <div class="absolute inset-0 bg-gradient-to-br from-cyan-300 to-purple-500 rounded-3xl blur-md opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                            <!-- Logo Icon -->
                            <svg class="relative w-9 h-9 text-white drop-shadow-xl transform group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <!-- Floating Particles around Logo -->
                        <div class="absolute -top-1 -right-1 w-3 h-3 bg-cyan-400 rounded-full animate-ping"></div>
                        <div class="absolute -bottom-1 -left-1 w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                    </div>
                    
                    <div class="transform group-hover:scale-105 transition-transform duration-500">
                        <h1 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-blue-300 to-purple-300 tracking-tight drop-shadow-lg animate-gradient-text">DHUP</h1>
                        <p class="text-sm text-cyan-200/90 font-bold -mt-1 drop-shadow-sm tracking-wider">Documentation Universe</p>
                    </div>
                </div>
                
                <!-- Enhanced Navigation Menu -->
                <nav class="hidden md:flex gap-10 text-white/90 font-semibold">
                    <div class="flex items-center space-x-8">
                        @include('layouts.navigation')
                        
                        <!-- Search Button -->
                        <button class="relative p-3 rounded-2xl bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/20 hover:border-white/40 transition-all duration-300 group hover-lift">
                            <svg class="w-5 h-5 text-cyan-300 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                        
                        <!-- Notifications -->
                        <button class="relative p-3 rounded-2xl bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/20 hover:border-white/40 transition-all duration-300 group hover-lift">
                            <svg class="w-5 h-5 text-purple-300 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v5l5-5H4z"></path>
                                <path d="M9 12l2 2 4-4"></path>
                            </svg>
                            <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full animate-pulse"></span>
                        </button>
                    </div>
                </nav>
                
                <!-- Enhanced Mobile Menu Button -->
                <button class="md:hidden relative p-3 rounded-2xl bg-gradient-to-r from-cyan-500/20 to-purple-500/20 backdrop-blur-sm border border-white/30 text-white shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 hover-lift">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <!-- Menu Button Glow -->
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-cyan-500 to-purple-500 opacity-20 blur-md group-hover:opacity-40 transition-opacity duration-300"></div>
                </button>
                
            </div>
        </div>
        
        <!-- Header Bottom Gradient -->
        <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-cyan-400 to-transparent opacity-60"></div>
    </header>
    @endif
    
    <!-- ==================== MAIN CONTENT AREA ==================== -->
    <div class="flex flex-1 w-full relative">
        <!-- Background Effects for Main Content -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-50 via-gray-50 to-zinc-50 dark:from-slate-900 dark:via-gray-900 dark:to-zinc-900"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23000000" fill-opacity="0.02"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-40"></div>
        
        <!-- Sidebar (for authenticated users on regular pages) -->
        @auth
            @if(!request()->routeIs('welcome', 'login', 'register'))
                @include('layouts.sidebar')
            @endif
        @endauth
        
        <!-- Main Content -->
        <main class="relative flex-1 flex items-center justify-center py-8 ml-0 {{ auth()->check() && !request()->routeIs('welcome', 'login', 'register') ? 'md:ml-64' : '' }} transition-all duration-300 min-h-screen">
            @if(auth()->check() && !request()->routeIs('welcome', 'login', 'register'))
                <!-- Authenticated Layout -->
                <div class="w-full px-8">
                    <!-- Page Header -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-slate-800 to-slate-600 dark:from-cyan-300 dark:to-blue-300 mb-2">
                                    @yield('title', 'Dashboard')
                                </h1>
                                <p class="text-slate-600 dark:text-gray-400 text-lg">
                                    @yield('description', 'Welcome to your documentation workspace')
                                </p>
                            </div>
                            <!-- Quick Actions -->
                            <div class="flex items-center space-x-3">
                                <button class="p-3 bg-white/70 dark:bg-slate-800/70 hover:bg-white dark:hover:bg-slate-700 rounded-xl backdrop-blur-sm border border-gray-200/50 dark:border-gray-700/50 transition-all duration-300 hover:scale-105 group shadow-lg">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-300 group-hover:text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                    </svg>
                                </button>
                                <button class="p-3 bg-white/70 dark:bg-slate-800/70 hover:bg-white dark:hover:bg-slate-700 rounded-xl backdrop-blur-sm border border-gray-200/50 dark:border-gray-700/50 transition-all duration-300 hover:scale-105 group shadow-lg">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-300 group-hover:text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Breadcrumb -->
                        <nav class="mt-6" aria-label="Breadcrumb">
                            <div class="flex items-center space-x-2 text-sm bg-white/50 dark:bg-slate-800/50 backdrop-blur-sm rounded-xl px-4 py-2 border border-gray-200/30 dark:border-gray-700/30">
                                <a href="{{ route('dashboard') }}" class="flex items-center text-slate-500 hover:text-cyan-600 dark:text-gray-400 dark:hover:text-cyan-400 transition-colors">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    </svg>
                                    Dashboard
                                </a>
                                @if(!request()->routeIs('dashboard'))
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="text-slate-700 dark:text-gray-300 font-medium">@yield('title', 'Current Page')</span>
                                @endif
                            </div>
                        </nav>
                    </div>
                    
                    <!-- Main Content Card -->
                    <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/20 dark:border-slate-700/50 overflow-hidden min-h-[600px]">
                        <div class="p-8">
                            @yield('content')
                        </div>
                    </div>
                </div>
            @else
                <!-- Guest Layout (Welcome, Login, Register) -->
                <div class="w-full {{ request()->routeIs('welcome', 'login', 'register') ? '' : 'max-w-2xl mx-auto' }}">
                    @yield('content')
                </div>
            @endif
        </main>
        
        <!-- Floating Background Elements -->
        <div class="absolute top-20 right-20 w-64 h-64 bg-gradient-to-br from-cyan-100/30 to-purple-100/30 dark:from-cyan-900/20 dark:to-purple-900/20 rounded-full blur-3xl animate-pulse pointer-events-none"></div>
        <div class="absolute bottom-32 left-20 w-48 h-48 bg-gradient-to-br from-blue-100/40 to-indigo-100/40 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-full blur-2xl animate-bounce pointer-events-none delay-1000"></div>
    </div>
    
    <!-- ==================== FOOTER SECTION ==================== -->
    @if(!request()->routeIs('welcome', 'login', 'register'))
    <footer class="relative bg-gradient-to-r from-slate-900 via-gray-900 to-slate-900 text-white overflow-hidden">
        <!-- Footer Background Effects -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="%23ffffff" fill-opacity="0.03"%3E%3Cpath d="M20 20c0 11.046-8.954 20-20 20v-40c11.046 0 20 8.954 20 20z"/%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        
        <!-- Animated Top Border -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 animate-gradient-x"></div>
        
        <div class="relative container mx-auto px-6 py-12">
            
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                
                <!-- Brand Section -->
                <div class="md:col-span-2 space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <div class="w-12 h-12 bg-gradient-to-br from-cyan-400 to-purple-600 rounded-2xl flex items-center justify-center shadow-xl transform hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div class="absolute -top-1 -right-1 w-3 h-3 bg-cyan-400 rounded-full animate-ping"></div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-purple-300">DHUP</h3>
                            <p class="text-gray-400 font-medium">Documentation Universe</p>
                        </div>
                    </div>
                    <p class="text-gray-300 leading-relaxed max-w-md">
                        Empowering developers with cutting-edge documentation tools and seamless collaboration features.
                    </p>
                    
                    <!-- Social Links -->
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-cyan-500/20 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110 group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-cyan-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-blue-500/20 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110 group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-purple-500/20 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110 group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.221.085.342-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="space-y-4">
                    <h4 class="text-lg font-bold text-cyan-300 border-b border-cyan-500/30 pb-2">Quick Links</h4>
                    <div class="space-y-3">
                        <a href="#" class="block text-gray-300 hover:text-cyan-300 transition-colors duration-300 hover:translate-x-2 transform">Documentation</a>
                        <a href="#" class="block text-gray-300 hover:text-cyan-300 transition-colors duration-300 hover:translate-x-2 transform">API Reference</a>
                        <a href="#" class="block text-gray-300 hover:text-cyan-300 transition-colors duration-300 hover:translate-x-2 transform">Tutorials</a>
                        <a href="#" class="block text-gray-300 hover:text-cyan-300 transition-colors duration-300 hover:translate-x-2 transform">Examples</a>
                    </div>
                </div>
                
                <!-- Support -->
                <div class="space-y-4">
                    <h4 class="text-lg font-bold text-purple-300 border-b border-purple-500/30 pb-2">Support</h4>
                    <div class="space-y-3">
                        <a href="#" class="block text-gray-300 hover:text-purple-300 transition-colors duration-300 hover:translate-x-2 transform">Help Center</a>
                        <a href="#" class="block text-gray-300 hover:text-purple-300 transition-colors duration-300 hover:translate-x-2 transform">Contact Us</a>
                        <a href="#" class="block text-gray-300 hover:text-purple-300 transition-colors duration-300 hover:translate-x-2 transform">Privacy Policy</a>
                        <a href="#" class="block text-gray-300 hover:text-purple-300 transition-colors duration-300 hover:translate-x-2 transform">Terms of Service</a>
                    </div>
                </div>
            </div>
            
            <!-- Footer Bottom -->
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="flex items-center space-x-3">
                    <div class="flex items-center space-x-2">
                        <span class="text-red-500 animate-pulse text-xl">❤️</span>
                        <p class="text-gray-400 font-medium">Built with passion for developers</p>
                    </div>
                </div>
                <div class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} {{ config('app.name', 'DOC') }}. All rights reserved.
                </div>
            </div>
            
        </div>
        
        <!-- Floating Elements -->
        <div class="absolute top-10 right-10 w-4 h-4 bg-cyan-400 rounded-full animate-bounce opacity-20"></div>
        <div class="absolute bottom-20 left-20 w-3 h-3 bg-purple-400 rounded-full animate-pulse opacity-30"></div>
    </footer>
    @endif
</body>

<!-- ==================== ENHANCED STYLING ==================== -->
<style>
/* ==================== GRADIENT TEXT ANIMATIONS ==================== */
.animated-gradient-text {
    background: linear-gradient(270deg, #2563eb, #06b6d4, #22d3ee, #a5b4fc, #f472b6, #facc15, #10b981, #2563eb);
    background-size: 400% 400%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-fill-color: transparent;
    animation: gradient-move 6s ease-in-out infinite;
}

.animate-pulse-glow {
    animation: pulse-glow 3s ease-in-out infinite;
}

/* ==================== BACKGROUND THEMES ==================== */
#appBody {
    background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 25%, #ddd6fe 50%, #f1f5f9 75%, #f8fafc 100%);
    background-size: 400% 400%;
    animation: background-shift 15s ease-in-out infinite;
    transition: all 0.8s ease;
    position: relative;
}

#appBody.dark-mode {
    background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 25%, #312e81 50%, #1e1b4b 75%, #0f172a 100%);
    background-size: 400% 400%;
    animation: background-shift-dark 15s ease-in-out infinite;
}

#appBody.light-mode {
    background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 25%, #ddd6fe 50%, #f1f5f9 75%, #f8fafc 100%);
    background-size: 400% 400%;
    animation: background-shift 15s ease-in-out infinite;
}

/* Special pages override */
body.special-page {
    background: none !important;
    animation: none !important;
}

/* ==================== ENHANCED COMPONENTS ==================== */
.sidebar-enhanced {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-right: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
}

.transition-enhanced {
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.fade-in-up {
    animation: fadeInUp 0.8s ease-out;
}

.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

/* ==================== RESPONSIVE DESIGN ==================== */
@media (max-width: 768px) {
    .floating-particles {
        opacity: 0.3;
    }
    
    #appBody {
        animation-duration: 20s;
    }
    
    .particle {
        animation-duration: 12s;
    }
}

@media (max-width: 640px) {
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .text-3xl {
        font-size: 1.875rem;
    }
}

/* ==================== ACCESSIBILITY ENHANCEMENTS ==================== */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* ==================== PRINT STYLES ==================== */
@media print {
    .floating-particles,
    .animate-pulse-glow,
    .hover-lift {
        display: none !important;
    }
    
    body {
        background: white !important;
    }
}
</style>

<!-- ==================== ENHANCED JAVASCRIPT ==================== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    
    // ==================== CORE VARIABLES ====================
    const body = document.getElementById('appBody');
    const isSpecialPage = {{ request()->routeIs('welcome', 'login', 'register') ? 'true' : 'false' }};
    
    // ==================== INITIALIZATION ====================
    initializePageType();
    initializeThemeHandling();
    initializeInteractiveElements();
    initializePerformanceOptimizations();
    
    // ==================== PAGE TYPE SETUP ====================
    function initializePageType() {
        if (isSpecialPage) {
            body.classList.add('special-page');
            createFloatingParticles();
        } else {
            const mainContent = document.querySelector('main');
            if (mainContent) {
                mainContent.classList.add('fade-in-up');
            }
        }
    }
    
    // ==================== THEME MANAGEMENT ====================
    function initializeThemeHandling() {
        if (!isSpecialPage) return;
        
        const savedTheme = localStorage.getItem('theme');
        const systemDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const currentHour = new Date().getHours();
        
        // Auto theme detection
        if (savedTheme === 'dark' || (!savedTheme && (systemDarkMode || (currentHour >= 18 || currentHour <= 6)))) {
            body.classList.add('dark-mode');
        } else {
            body.classList.add('light-mode');
        }
    }
    
    // ==================== FLOATING PARTICLES SYSTEM ====================
    function createFloatingParticles() {
        const particlesContainer = document.getElementById('particles-container');
        if (!particlesContainer) return;
        
        const colors = ['blue', 'purple', 'emerald', 'pink'];
        const particleCount = window.innerWidth < 768 ? 12 : 20;
        
        // Clear existing particles
        particlesContainer.innerHTML = '';
        
        for (let i = 0; i < particleCount; i++) {
            const particle = createParticle(colors, i);
            particlesContainer.appendChild(particle);
        }
    }
    
    function createParticle(colors, index) {
        const particle = document.createElement('div');
        const color = colors[Math.floor(Math.random() * colors.length)];
        const size = Math.random() * 8 + 4;
        
        particle.className = `particle ${color}`;
        particle.style.cssText = `
            width: ${size}px;
            height: ${size}px;
            left: ${Math.random() * 100}%;
            top: ${Math.random() * 100}%;
            animation-delay: ${Math.random() * 8}s;
            animation-duration: ${8 + Math.random() * 4}s;
        `;
        
        return particle;
    }
    
    // ==================== INTERACTIVE ELEMENTS ====================
    function initializeInteractiveElements() {
        setupHoverEffects();
        setupSmoothScrolling();
        setupFormEnhancements();
    }
    
    function setupHoverEffects() {
        const interactiveElements = document.querySelectorAll('button, a, .hover-lift');
        
        interactiveElements.forEach(element => {
            element.addEventListener('mouseenter', function() {
                if (!this.disabled) {
                    this.style.transform = 'translateY(-2px) scale(1.02)';
                }
            });
            
            element.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    }
    
    function setupSmoothScrolling() {
        const navLinks = document.querySelectorAll('nav a[href^="#"]');
        
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }
    
    function setupFormEnhancements() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn && !submitBtn.disabled) {
                    animateSubmitButton(submitBtn);
                }
            });
        });
    }
    
    function animateSubmitButton(button) {
        button.style.transform = 'scale(0.95)';
        button.style.opacity = '0.8';
        
        setTimeout(() => {
            button.style.transform = 'scale(1)';
            button.style.opacity = '1';
        }, 200);
    }
    
    // ==================== PERFORMANCE OPTIMIZATIONS ====================
    function initializePerformanceOptimizations() {
        setupResponsiveParticles();
        setupReducedMotionSupport();
        setupSlowDeviceOptimization();
    }
    
    function setupResponsiveParticles() {
        window.addEventListener('resize', debounce(() => {
            if (isSpecialPage) {
                const particles = document.querySelectorAll('.particle');
                const shouldHideParticles = window.innerWidth < 768;
                
                particles.forEach((particle, index) => {
                    if (shouldHideParticles && index > 12) {
                        particle.style.display = 'none';
                    } else {
                        particle.style.display = 'block';
                    }
                });
            }
        }, 250));
    }
    
    function setupReducedMotionSupport() {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            body.style.animation = 'none';
            document.querySelectorAll('.particle').forEach(particle => {
                particle.style.animation = 'none';
            });
        }
    }
    
    function setupSlowDeviceOptimization() {
        const isSlowDevice = navigator.hardwareConcurrency && navigator.hardwareConcurrency < 4;
        
        if (isSlowDevice) {
            body.style.animationDuration = '25s';
            document.querySelectorAll('.particle').forEach(particle => {
                particle.style.animationDuration = '15s';
            });
        }
    }
    
    // ==================== UTILITY FUNCTIONS ====================
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // ==================== ERROR HANDLING ====================
    window.addEventListener('error', function(e) {
        console.warn('Layout: Performance optimization applied');
    });
    
    // ==================== ACCESSIBILITY SUPPORT ====================
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-navigation');
        }
    });
    
    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-navigation');
    });
});
</script>

<!-- ==================== ENHANCED GLOBAL STYLES ==================== -->
<style>
    /* =========== PERFORMANCE & ANIMATIONS =========== */
    * {
        scroll-behavior: smooth;
    }
    
    body {
        font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Enhanced Animations */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes pulseGlow {
        0%, 100% { box-shadow: 0 0 20px rgba(6, 182, 212, 0.4); }
        50% { box-shadow: 0 0 40px rgba(6, 182, 212, 0.8); }
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes floatUpDown {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    @keyframes spinSlow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* Utility Classes */
    .animate-fade-in-up { animation: fadeInUp 0.6s ease-out; }
    .animate-slide-in-right { animation: slideInRight 0.5s ease-out; }
    .animate-pulse-glow { animation: pulseGlow 2s ease-in-out infinite; }
    .animate-gradient-shift { 
        background-size: 200% 200%;
        animation: gradientShift 3s ease infinite;
    }
    .animate-float { animation: floatUpDown 3s ease-in-out infinite; }
    .animate-spin-slow { animation: spinSlow 8s linear infinite; }

    /* Glass Morphism Enhanced */
    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .glass-dark {
        background: rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Hover Effects */
    .hover-lift {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .hover-lift:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    .hover-glow:hover {
        box-shadow: 0 0 30px rgba(6, 182, 212, 0.6);
    }

    /* Text Effects */
    .text-gradient {
        background: linear-gradient(135deg, #06b6d4, #3b82f6, #8b5cf6);
        background-size: 200% 200%;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: gradientShift 3s ease infinite;
    }
    .text-glow {
        text-shadow: 0 0 20px rgba(6, 182, 212, 0.8);
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar { width: 8px; height: 8px; }
    ::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.1);
        border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(45deg, #06b6d4, #8b5cf6);
        border-radius: 4px;
        border: 2px solid transparent;
        background-clip: content-box;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(45deg, #0891b2, #7c3aed);
        background-clip: content-box;
    }

    /* Button Enhancements */
    .btn-primary {
        background: linear-gradient(135deg, #06b6d4, #3b82f6);
        border: none; color: white;
        padding: 12px 24px; border-radius: 12px;
        font-weight: 600; transition: all 0.3s ease;
        position: relative; overflow: hidden;
    }
    .btn-primary::before {
        content: ''; position: absolute;
        top: 0; left: -100%; width: 100%; height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }
    .btn-primary:hover::before { left: 100%; }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(6, 182, 212, 0.4);
    }

    /* Card Enhancements */
    .card-enhanced {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    .card-enhanced:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    /* Dark Mode */
    @media (prefers-color-scheme: dark) {
        .card-enhanced {
            background: rgba(30, 41, 59, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    }

    /* Mobile Optimizations */
    @media (max-width: 768px) {
        .hover-lift:hover { transform: none; }
        .animate-gradient-shift, .animate-pulse-glow,
        .animate-float, .animate-spin-slow { animation: none; }
    }

    /* Accessibility */
    @media (prefers-reduced-motion: reduce) {
        *, *::before, *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }

    /* Focus Enhancements */
    *:focus { outline: 2px solid #06b6d4; outline-offset: 2px; }
    button:focus, a:focus { outline: 2px solid #06b6d4; outline-offset: 2px; }

    /* Loading States */
    .loading-shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
    }
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }

    /* Performance */
    .will-change-transform { will-change: transform; }
    .transform-gpu {
        transform: translateZ(0);
        backface-visibility: hidden;
        perspective: 1000px;
    }
</style>

</html>
