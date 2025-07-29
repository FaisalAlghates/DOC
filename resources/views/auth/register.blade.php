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
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-600/15 via-teal-600/15 via-cyan-600/15 to-emerald-600/15 animate-gradient-x"></div>
    </div>
    
    <!-- Dynamic particles -->
    <div class="absolute inset-0">
        <div class="floating-particles"></div>
    </div>
    
    <!-- Glowing orbs -->
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-gradient-radial from-emerald-500/20 to-transparent rounded-full blur-3xl animate-pulse-slow"></div>
    <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-gradient-radial from-teal-500/20 to-transparent rounded-full blur-3xl animate-pulse-slow delay-1000"></div>
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
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 rounded-full animate-spin-slow"></div>
                        <div class="absolute inset-1 logo-inner rounded-full flex items-center justify-center border-2">
                            <svg class="w-12 h-12 logo-icon group-hover:scale-110 transition-transform duration-700 drop-shadow-lg text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500 to-cyan-500 rounded-full blur-2xl opacity-60 animate-pulse"></div>
                </div>
                
                <h2 class="text-5xl md:text-6xl font-black mb-6 text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-400 to-cyan-400 drop-shadow-2xl animate-shimmer-text">
                    Join Our Universe
                </h2>
                <p class="text-xl md:text-2xl text-white/90 font-light drop-shadow-lg mb-4">Create your account and start documenting</p>
                <p class="text-base text-white/70 font-light drop-shadow-md">Experience the future of documentation</p>
            </div>

            <!-- Form -->
            <div class="relative group">
                <!-- Glowing background -->
                <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition-all duration-700"></div>
                
                <!-- Form container -->
                <div class="relative bg-white/15 backdrop-blur-2xl shadow-2xl rounded-3xl p-10 border-2 border-white/30 hover:border-white/40 transition-all duration-500">
                    <form method="POST" action="{{ url('/register') }}" class="space-y-8">
                        @csrf
                        
                        <!-- Personal Information Section -->
                        <div class="space-y-6">
                            <div class="text-center mb-6">
                                <h3 class="text-lg font-bold text-white/90 drop-shadow-md">Personal Information</h3>
                                <div class="mt-2 h-0.5 bg-gradient-to-r from-transparent via-emerald-400 to-transparent"></div>
                            </div>
                            
                            <div class="grid grid-cols-1 gap-6">
                                <div class="transform transition-all duration-300 hover:scale-105">
                                    <label for="name" class="block text-sm font-bold text-white/90 mb-3 drop-shadow-md flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        Full Name
                                    </label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-emerald-300 group-hover:text-emerald-200 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus 
                                               class="block w-full pl-12 pr-4 py-4 border-2 border-white/30 rounded-2xl bg-white/10 backdrop-blur-sm focus:ring-4 focus:ring-emerald-400/50 focus:border-emerald-400 hover:border-white/50 transition-all duration-300 text-white placeholder-white/60 font-medium text-lg shadow-lg hover:shadow-xl"
                                               placeholder="Enter your full name">
                                    </div>
                                    @error('name')
                                        <p class="mt-3 text-sm text-red-300 flex items-center drop-shadow-md animate-pulse">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="transform transition-all duration-300 hover:scale-105">
                                    <label for="email" class="block text-sm font-bold text-white/90 mb-3 drop-shadow-md flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-teal-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                        </svg>
                                        Email Address
                                    </label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-teal-300 group-hover:text-teal-200 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                            </svg>
                                        </div>
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" required 
                                               class="block w-full pl-12 pr-4 py-4 border-2 border-white/30 rounded-2xl bg-white/10 backdrop-blur-sm focus:ring-4 focus:ring-teal-400/50 focus:border-teal-400 hover:border-white/50 transition-all duration-300 text-white placeholder-white/60 font-medium text-lg shadow-lg hover:shadow-xl"
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
                            </div>
                        </div>

                        <!-- Security Section -->
                        <div class="space-y-6">
                            <div class="text-center mb-6">
                                <h3 class="text-lg font-bold text-white/90 drop-shadow-md">Security Setup</h3>
                                <div class="mt-2 h-0.5 bg-gradient-to-r from-transparent via-cyan-400 to-transparent"></div>
                            </div>
                            
                            <div class="grid grid-cols-1 gap-6">
                                <div class="transform transition-all duration-300 hover:scale-105">
                                    <label for="password" class="block text-sm font-bold text-white/90 mb-3 drop-shadow-md flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                        </svg>
                                        Password
                                    </label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-cyan-300 group-hover:text-cyan-200 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                            </svg>
                                        </div>
                                        <input id="password" type="password" name="password" required 
                                               class="block w-full pl-12 pr-12 py-4 border-2 border-white/30 rounded-2xl bg-white/10 backdrop-blur-sm focus:ring-4 focus:ring-cyan-400/50 focus:border-cyan-400 hover:border-white/50 transition-all duration-300 text-white placeholder-white/60 font-medium text-lg shadow-lg hover:shadow-xl"
                                               placeholder="Create a strong password"
                                               onkeyup="checkPasswordStrength(this.value)">
                                        <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                            <svg id="password-eye" class="h-5 w-5 text-white/60 hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <!-- Password Strength Indicator -->
                                    <div id="password-strength" class="mt-3 hidden">
                                        <div class="flex justify-between items-center mb-2">
                                            <span class="text-sm font-medium text-white/80">Password Strength:</span>
                                            <span id="strength-text" class="text-sm font-bold"></span>
                                        </div>
                                        <div class="w-full bg-white/20 rounded-full h-2">
                                            <div id="strength-bar" class="h-2 rounded-full transition-all duration-500"></div>
                                        </div>
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

                                <div class="transform transition-all duration-300 hover:scale-105">
                                    <label for="password_confirmation" class="block text-sm font-bold text-white/90 mb-3 drop-shadow-md flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Confirm Password
                                    </label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-purple-300 group-hover:text-purple-200 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <input id="password_confirmation" type="password" name="password_confirmation" required 
                                               class="block w-full pl-12 pr-12 py-4 border-2 border-white/30 rounded-2xl bg-white/10 backdrop-blur-sm focus:ring-4 focus:ring-purple-400/50 focus:border-purple-400 hover:border-white/50 transition-all duration-300 text-white placeholder-white/60 font-medium text-lg shadow-lg hover:shadow-xl"
                                               placeholder="Confirm your password"
                                               onkeyup="checkPasswordMatch()">
                                        <button type="button" onclick="togglePassword('password_confirmation')" class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                            <svg id="password_confirmation-eye" class="h-5 w-5 text-white/60 hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <!-- Password Match Indicator -->
                                    <div id="password-match" class="mt-3 hidden">
                                        <div class="flex items-center">
                                            <svg id="match-icon" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span id="match-text" class="text-sm font-medium"></span>
                                        </div>
                                    </div>
                                    
                                    @error('password_confirmation')
                                        <p class="mt-3 text-sm text-red-300 flex items-center drop-shadow-md animate-pulse">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button Section -->
                        <div class="pt-6">
                            <button type="submit" id="register-button"
                                    onclick="showLoading()"
                                    class="group relative w-full overflow-hidden rounded-2xl transition-all duration-700 hover:scale-105 transform shadow-2xl">
                                <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-600 animate-gradient-x"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-emerald-600/50 to-teal-600/50 blur-xl group-hover:blur-2xl transition-all duration-700"></div>
                                <div class="relative flex items-center justify-center py-5 px-6 text-lg font-bold text-white drop-shadow-lg">
                                    <svg id="register-icon" class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                    </svg>
                                    <span id="register-text">Join Our Universe</span>
                                    
                                    <!-- Loading spinner (hidden by default) -->
                                    <svg id="loading-spinner" class="animate-spin -ml-1 mr-3 h-6 w-6 text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Login Link -->
                <div class="text-center mt-8 transform transition-all duration-500 hover:scale-105">
                    <p class="text-white/80 font-medium drop-shadow-md">
                        Already have an account? 
                        <a href="{{ url('/login') }}" class="font-bold text-emerald-300 hover:text-emerald-200 transition-colors duration-300 hover:drop-shadow-lg">
                            Sign In
                        </a>
                    </p>
                </div>

                        <div class="text-center pt-6">
                            <p class="text-sm text-white/90 drop-shadow-md">
                                Already have an account?
                                <a href="{{ route('login') }}" class="font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-300 to-cyan-300 hover:from-emerald-200 hover:to-cyan-200 ml-1 transition-all duration-300 hover:scale-105 inline-block">
                                    Sign in here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Login Link -->
                <div class="text-center mt-8 transform transition-all duration-500 hover:scale-105">
                    <p class="text-white/80 font-medium drop-shadow-md">
                        Already have an account? 
                        <a href="{{ url('/login') }}" class="font-bold text-emerald-300 hover:text-emerald-200 transition-colors duration-300 hover:drop-shadow-lg">
                            Sign In
                        </a>
                    </p>
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

.delay-500 { animation-delay: 0.5s; }
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
    background: linear-gradient(45deg, #10b981, #06b6d4, #3b82f6);
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
    box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3) !important;
}

/* Enhanced hover effects */
.group:hover input {
    border-color: rgba(255, 255, 255, 0.6) !important;
    background: rgba(255, 255, 255, 0.15) !important;
}

/* Button glow effect */
button[type="submit"]:hover {
    box-shadow: 0 0 30px rgba(16, 185, 129, 0.6), 0 10px 25px rgba(0, 0, 0, 0.3);
}

/* Form container animations */
.relative.group:hover .absolute.-inset-1 {
    opacity: 0.7 !important;
    transform: scale(1.02);
}

/* Smooth transitions for all elements */
* {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Dark Mode and Light Mode Styles */
#mainContainer {
    background: linear-gradient(135deg, #1f2937 0%, #065f46 50%, #1f2937 100%);
}

#mainContainer.dark-mode {
    background: linear-gradient(135deg, #0f172a 0%, #064e3b 50%, #0f172a 100%);
}

#mainContainer.light-mode {
    background: linear-gradient(135deg, #f0fdf4 0%, #d1fae5 50%, #ecfdf5 100%);
}

/* Dark mode text colors */
#mainContainer.dark-mode .text-white {
    color: #f8fafc !important;
}

/* Light mode text colors */
#mainContainer.light-mode .text-white {
    color: #1e293b !important;
}

/* Light mode cards */
#mainContainer.light-mode .bg-white\/15 {
    background: rgba(255, 255, 255, 0.8) !important;
    backdrop-filter: blur(20px);
}

#mainContainer.light-mode .bg-white\/10 {
    background: rgba(255, 255, 255, 0.6) !important;
}

/* Light mode borders */
#mainContainer.light-mode .border-white\/30 {
    border-color: rgba(16, 185, 129, 0.3) !important;
}

/* Smooth transitions for theme switching */
#mainContainer,
#mainContainer * {
    transition: background-color 0.5s ease, color 0.5s ease, border-color 0.5s ease !important;
}

/* Logo adjustments for light mode */
#mainContainer.light-mode .logo-inner {
    background: #f0fdf4 !important;
    border-color: rgba(16, 185, 129, 0.2) !important;
}

#mainContainer.light-mode .logo-icon {
    color: #065f46 !important;
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

    // Enhanced Interactive Functions
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const eyeIcon = document.getElementById(inputId + '-eye');
        
        if (input.type === 'password') {
            input.type = 'text';
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
            `;
        } else {
            input.type = 'password';
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            `;
        }
    }

    function checkPasswordStrength(password) {
        const strengthIndicator = document.getElementById('password-strength');
        const strengthBar = document.getElementById('strength-bar');
        const strengthText = document.getElementById('strength-text');
        
        if (password.length === 0) {
            strengthIndicator.classList.add('hidden');
            return;
        }
        
        strengthIndicator.classList.remove('hidden');
        
        let score = 0;
        let feedback = [];
        
        // Length check
        if (password.length >= 8) score++;
        else feedback.push('at least 8 characters');
        
        // Lowercase check
        if (/[a-z]/.test(password)) score++;
        else feedback.push('lowercase letter');
        
        // Uppercase check
        if (/[A-Z]/.test(password)) score++;
        else feedback.push('uppercase letter');
        
        // Number check
        if (/\d/.test(password)) score++;
        else feedback.push('number');
        
        // Special character check
        if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) score++;
        else feedback.push('special character');
        
        const colors = ['bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-blue-500', 'bg-green-500'];
        const labels = ['Very Weak', 'Weak', 'Fair', 'Good', 'Strong'];
        const textColors = ['text-red-300', 'text-orange-300', 'text-yellow-300', 'text-blue-300', 'text-green-300'];
        
        strengthBar.className = `h-2 rounded-full transition-all duration-500 ${colors[score - 1] || 'bg-gray-500'}`;
        strengthBar.style.width = `${(score / 5) * 100}%`;
        
        strengthText.className = `text-sm font-bold ${textColors[score - 1] || 'text-gray-300'}`;
        strengthText.textContent = labels[score - 1] || 'Very Weak';
    }

    function checkPasswordMatch() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;
        const matchIndicator = document.getElementById('password-match');
        const matchIcon = document.getElementById('match-icon');
        const matchText = document.getElementById('match-text');
        
        if (confirmPassword.length === 0) {
            matchIndicator.classList.add('hidden');
            return;
        }
        
        matchIndicator.classList.remove('hidden');
        
        if (password === confirmPassword) {
            matchIcon.className = 'w-4 h-4 mr-2 text-green-400';
            matchIcon.innerHTML = '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>';
            matchText.className = 'text-sm font-medium text-green-400';
            matchText.textContent = 'Passwords match!';
        } else {
            matchIcon.className = 'w-4 h-4 mr-2 text-red-400';
            matchIcon.innerHTML = '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>';
            matchText.className = 'text-sm font-medium text-red-400';
            matchText.textContent = 'Passwords do not match';
        }
    }

    function showLoading() {
        const button = document.getElementById('register-button');
        const icon = document.getElementById('register-icon');
        const text = document.getElementById('register-text');
        const spinner = document.getElementById('loading-spinner');
        
        // Hide icon and show spinner
        icon.classList.add('hidden');
        spinner.classList.remove('hidden');
        
        // Change text
        text.textContent = 'Creating Account...';
        
        // Disable button
        button.disabled = true;
        button.classList.add('opacity-75', 'cursor-not-allowed');
    }
});
</script>
@endsection
