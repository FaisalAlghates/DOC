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

            <!-- Features section -->
            <div class="relative mb-24">
                <!-- Section title -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-xl mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Future Vision</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">Revolutionary features that redefine what's possible in documentation technology</p>
                </div>

                <!-- Features grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    <!-- Feature 1 -->
                    <div class="group relative bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-blue-200">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Quantum Speed</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Experience instantaneous documentation creation with our next-generation processing engine.</p>
                        <button class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition-colors duration-200">
                            Learn More
                        </button>
                    </div>

                    <!-- Feature 2 -->
                    <div class="group relative bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-purple-200">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Soul Connection</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Intuitive design that understands your workflow and adapts to your creative process.</p>
                        <button class="w-full py-3 px-4 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-semibold transition-colors duration-200">
                            Explore
                        </button>
                    </div>

                    <!-- Feature 3 -->
                    <div class="group relative bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-cyan-200">
                        <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">AI Enhanced</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Revolutionary features that redefine what's possible in documentation technology.</p>
                        <button class="w-full py-3 px-4 bg-cyan-600 hover:bg-cyan-700 text-white rounded-lg font-semibold transition-colors duration-200">
                            Discover
                        </button>
                    </div>

                    <!-- Feature 4 -->
                    <div class="group relative bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-green-200">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Secure Vault</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Enterprise-grade security with end-to-end encryption for your sensitive documentation.</p>
                        <button class="w-full py-3 px-4 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-colors duration-200">
                            Secure
                        </button>
                    </div>

                    <!-- Feature 5 -->
                    <div class="group relative bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-yellow-200">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Smart Analytics</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Advanced insights and analytics to optimize your documentation performance.</p>
                        <button class="w-full py-3 px-4 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg font-semibold transition-colors duration-200">
                            Analyze
                        </button>
                    </div>

                    <!-- Feature 6 -->
                    <div class="group relative bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-indigo-200">
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17v4a2 2 0 002 2h4M3 5v6h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Cloud Native</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">Built for the cloud with seamless collaboration and real-time synchronization.</p>
                        <button class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-semibold transition-colors duration-200">
                            Connect
                        </button>
                    </div>
                </div>
            </div>

            <!-- Statistics section -->
            <div class="bg-white rounded-3xl shadow-2xl p-12 mb-24 border border-gray-100">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Trusted Worldwide</h2>
                    <p class="text-xl text-gray-600">Join thousands of users who have transformed their documentation</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-blue-600 mb-2">50K+</div>
                        <div class="text-gray-600">Active Users</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-purple-600 mb-2">1M+</div>
                        <div class="text-gray-600">Documents Created</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-cyan-600 mb-2">99.9%</div>
                        <div class="text-gray-600">Uptime</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl md:text-5xl font-bold text-green-600 mb-2">24/7</div>
                        <div class="text-gray-600">Support</div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="text-center">
                @guest
                    <div class="bg-gradient-to-br from-blue-600 to-purple-700 rounded-3xl p-12 text-white shadow-2xl">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Transform Your Documentation?</h2>
                        <p class="text-xl mb-8 opacity-90">Join thousands of users who have revolutionized their workflow</p>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                            <a href="{{ route('register') }}" 
                               class="px-8 py-4 bg-white text-blue-600 rounded-xl font-bold text-lg hover:bg-gray-100 transition-colors duration-200 shadow-lg hover:shadow-xl">
                                Get Started Free
                            </a>
                            
                            <a href="{{ route('login') }}" 
                               class="px-8 py-4 border-2 border-white text-white rounded-xl font-bold text-lg hover:bg-white hover:text-blue-600 transition-all duration-200">
                                Sign In
                            </a>
                        </div>
                        
                        <div class="mt-8 text-sm opacity-75">
                            No credit card required • Free forever plan available
                        </div>
                    </div>
                @else
                    <div class="bg-gradient-to-br from-green-600 to-blue-700 rounded-3xl p-12 text-white shadow-2xl">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">Welcome Back!</h2>
                        <p class="text-xl mb-8 opacity-90">Ready to continue your documentation journey?</p>
                        
                        <a href="{{ route('dashboard') }}" 
                           class="inline-flex items-center px-8 py-4 bg-white text-green-600 rounded-xl font-bold text-lg hover:bg-gray-100 transition-colors duration-200 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                            Go to Dashboard
                        </a>
                    </div>
                @endguest
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center mt-24 pb-12">
            <div class="text-gray-600 text-sm">
                © 2024 DHUP Documentation Universe. All rights reserved.
            </div>
        </footer>
    </div>
</div>

<style>
/* Enhanced animations */
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

@keyframes pulse-slow {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(1.05); }
}

@keyframes spin-slow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes gradient-x {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

@keyframes shimmer-text {
    0% { background-position: -200% 0; }
    100% { background-position: 200% 0; }
}

.animate-pulse-slow {
    animation: pulse-slow 4s ease-in-out infinite;
}

.animate-spin-slow {
    animation: spin-slow 20s linear infinite;
}

.animate-gradient-x {
    background-size: 200% 200%;
    animation: gradient-x 3s ease infinite;
}

.animate-shimmer-text {
    background-size: 200% 100%;
    animation: shimmer-text 3s linear infinite;
}

.fade-in-up {
    animation: fadeInUp 1s ease-out forwards;
}

.typewriter {
    animation: fadeInUp 2s ease-out forwards;
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

.logo-inner {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-color: rgba(255, 255, 255, 0.3);
}

/* Enhanced transitions */
* {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Card hover effects */
.group:hover {
    transform: translateY(-5px);
}

/* Dark mode styles */
.dark-mode {
    background: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
}

.dark-mode .main-title {
    color: #ffffff;
    text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
}

.dark-mode .main-subtitle {
    color: #e2e8f0;
}

.dark-mode .secondary-text {
    color: #cbd5e0;
}

.dark-mode .status-indicator {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.2);
}

.dark-mode .status-text {
    color: #e2e8f0;
}

/* Light mode styles */
.light-mode {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.light-mode .main-title {
    color: #ffffff;
    text-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
}

.light-mode .main-subtitle {
    color: #f7fafc;
}

.light-mode .secondary-text {
    color: #e2e8f0;
}

.light-mode .status-indicator {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.3);
}

.light-mode .status-text {
    color: #ffffff;
}

/* Theme specific styles */
#mainContainer {
    background: linear-gradient(135deg, #1f2937 0%, #1e3a8a 50%, #1f2937 100%);
}

#mainContainer.dark-mode {
    background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
}

#mainContainer.light-mode {
    background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 50%, #f1f5f9 100%);
}
</style>

<script>
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
        moonIcon.style.transform = 'rotate(-90deg) scale(0)';
    }
});
</script>
@endsection
