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

    <div class="relative z-10 flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <!-- Logo with magical effect -->
                <div class="relative mb-12">
                    <div class="logo-container inline-flex items-center justify-center w-24 h-24 rounded-full relative overflow-hidden group cursor-pointer shadow-2xl">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-purple-500 to-cyan-500 rounded-full animate-spin-slow"></div>
                        <div class="absolute inset-1 logo-inner rounded-full flex items-center justify-center border-2">
                            <svg class="w-12 h-12 logo-icon group-hover:scale-110 transition-transform duration-700 drop-shadow-lg text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full blur-2xl opacity-60 animate-pulse"></div>
                </div>
                
                <h2 class="text-4xl md:text-5xl font-black mb-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-purple-400 to-cyan-400 drop-shadow-2xl">
                    Welcome Back
                </h2>
                <p class="text-xl text-white/90 font-light drop-shadow-lg">Sign in to your account to continue</p>
            </div>

            <!-- Form -->
            <div class="relative group">
                <!-- Glowing background -->
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 via-purple-500 to-cyan-500 rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition-all duration-700"></div>
                
                <!-- Form container -->
                <div class="relative bg-white/15 backdrop-blur-2xl shadow-2xl rounded-3xl p-8 border-2 border-white/30 hover:border-white/40 transition-all duration-500">
                    <form method="POST" action="{{ url('/login') }}" class="space-y-6">
                        @csrf
                        
                        <div class="space-y-6">
                            <div class="transform transition-all duration-300 hover:scale-105">
                                <label for="email" class="block text-sm font-bold text-white/90 mb-3 drop-shadow-md flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                    Email Address
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-blue-300 group-hover:text-blue-200 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                        </svg>
                                    </div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                                           class="block w-full pl-12 pr-4 py-4 border-2 border-white/30 rounded-2xl bg-white/10 backdrop-blur-sm focus:ring-4 focus:ring-blue-400/50 focus:border-blue-400 hover:border-white/50 transition-all duration-300 text-white placeholder-white/60 font-medium text-lg shadow-lg hover:shadow-xl"
                                           placeholder="Enter your email">
                                </div>
                                @error('email')
                                    <p class="mt-3 text-sm text-red-300 flex items-center drop-shadow-md animate-pulse">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="transform transition-all duration-300 hover:scale-105">
                                <label for="password" class="block text-sm font-bold text-white/90 mb-3 drop-shadow-md flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    Password
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-purple-300 group-hover:text-purple-200 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                    </div>
                                    <input id="password" type="password" name="password" required 
                                           class="block w-full pl-12 pr-4 py-4 border-2 border-white/30 rounded-2xl bg-white/10 backdrop-blur-sm focus:ring-4 focus:ring-purple-400/50 focus:border-purple-400 hover:border-white/50 transition-all duration-300 text-white placeholder-white/60 font-medium text-lg shadow-lg hover:shadow-xl"
                                           placeholder="Enter your password">
                                </div>
                                @error('password')
                                    <p class="mt-3 text-sm text-red-300 flex items-center drop-shadow-md animate-pulse">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-2">
                            <label class="flex items-center group cursor-pointer">
                                <input type="checkbox" name="remember" class="h-5 w-5 text-blue-400 focus:ring-blue-400 border-white/30 rounded bg-white/20 transition-all duration-300 hover:scale-110">
                                <span class="ml-3 text-sm text-white/90 font-medium drop-shadow-md group-hover:text-white transition-colors duration-300">Remember me</span>
                            </label>
                            <a href="#" class="text-sm text-blue-300 hover:text-blue-200 font-bold transition-all duration-300 drop-shadow-md hover:scale-105 hover:drop-shadow-lg">
                                Forgot password?
                            </a>
                        </div>
                        <div class="pt-4">
                            <button type="submit" 
                                    class="group relative w-full overflow-hidden rounded-2xl transition-all duration-700 hover:scale-105 transform">
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-600 animate-gradient-x"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-600/50 to-indigo-600/50 blur-xl group-hover:blur-2xl transition-all duration-700"></div>
                                <div class="relative flex items-center justify-center py-4 px-6 text-lg font-bold text-white drop-shadow-lg">
                                    <svg class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span>Sign In to Universe</span>
                                </div>
                            </button>
                        </div>

                        <div class="text-center pt-6">
                            <p class="text-sm text-white/90 drop-shadow-md">
                                Don't have an account?
                                <a href="{{ route('register') }}" class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-cyan-300 hover:from-blue-200 hover:to-cyan-200 ml-1 transition-all duration-300 hover:scale-105 inline-block">
                                    Create one now
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes gradient-x {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

@keyframes spin-slow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes pulse-slow {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(1.05); }
}

.animate-gradient-x {
    background-size: 200% 200%;
    animation: gradient-x 3s ease infinite;
}

.animate-spin-slow {
    animation: spin-slow 20s linear infinite;
}

.animate-pulse-slow {
    animation: pulse-slow 4s ease-in-out infinite;
}

.delay-1000 { animation-delay: 1s; }
.delay-2000 { animation-delay: 2s; }

.bg-gradient-radial {
    background: radial-gradient(circle, var(--tw-gradient-from), var(--tw-gradient-to));
}

/* Enhanced form styling */
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

/* Enhanced input focus effects */
input:focus {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3) !important;
}

/* Enhanced hover effects */
.group:hover input {
    border-color: rgba(255, 255, 255, 0.6) !important;
    background: rgba(255, 255, 255, 0.15) !important;
}

/* Button glow effect */
button[type="submit"]:hover {
    box-shadow: 0 0 30px rgba(59, 130, 246, 0.6), 0 10px 25px rgba(0, 0, 0, 0.3);
}

/* Form container animations */
.relative.group:hover .absolute.-inset-1 {
    opacity: 0.7 !important;
    transform: scale(1.02);
}

/* Enhanced checkbox styling */
input[type="checkbox"]:checked {
    background: linear-gradient(45deg, #3b82f6, #8b5cf6) !important;
    border-color: #3b82f6 !important;
}

/* Smooth transitions for all elements */
* {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const sunIcon = document.getElementById('sunIcon');
    const moonIcon = document.getElementById('moonIcon');
    const mainContainer = document.getElementById('mainContainer');
    
    // Check for saved theme preference or system preference
    const savedTheme = localStorage.getItem('theme');
    const systemDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    // Apply initial theme
    if (savedTheme === 'dark' || (!savedTheme && systemDarkMode)) {
        enableDarkMode();
    } else {
        enableLightMode();
    }
    
    darkModeToggle.addEventListener('click', function() {
        if (mainContainer.classList.contains('dark-mode')) {
            enableLightMode();
        } else {
            enableDarkMode();
        }
    });
    
    function enableDarkMode() {
        mainContainer.classList.remove('light-mode');
        mainContainer.classList.add('dark-mode');
        sunIcon.style.transform = 'rotate(90deg) scale(0)';
        moonIcon.style.transform = 'rotate(0deg) scale(1)';
        localStorage.setItem('theme', 'dark');
    }
    
    function enableLightMode() {
        mainContainer.classList.remove('dark-mode');
        mainContainer.classList.add('light-mode');
        sunIcon.style.transform = 'rotate(0deg) scale(1)';
        moonIcon.style.transform = 'rotate(90deg) scale(0)';
        localStorage.setItem('theme', 'light');
    }

    // Add form interaction enhancements
    const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });

    // Add loading state to submit button
    const submitBtn = document.querySelector('button[type="submit"]');
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function() {
        submitBtn.innerHTML = `
            <svg class="w-6 h-6 mr-3 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            <span>Signing In...</span>
        `;
        submitBtn.disabled = true;
    });
});
</script>
@endsection
