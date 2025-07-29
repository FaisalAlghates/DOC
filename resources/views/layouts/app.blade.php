<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'DOC') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', 'Cairo', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col transition-all duration-500" id="appBody">
    @if(!request()->routeIs('welcome', 'login', 'register'))
    <header class="bg-white/90 shadow-lg backdrop-blur-xl border-b border-white/20 sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-xl shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-indigo-800 tracking-tight">DHUP</h1>
                    <p class="text-xs text-slate-500 font-medium -mt-1">Documentation Platform</p>
                </div>
            </div>
            <nav class="hidden md:flex gap-8 text-slate-700 font-medium">
                @include('layouts.navigation')
            </nav>
        </div>
    </header>
    @endif
    <div class="flex flex-1 w-full">
        @auth
            @if(!request()->routeIs('welcome', 'login', 'register'))
                @include('layouts.sidebar')
            @endif
        @endauth
        <main class="flex-1 flex items-center justify-center py-8 ml-0 {{ auth()->check() && !request()->routeIs('welcome', 'login', 'register') ? 'md:ml-64' : '' }} transition-all duration-300">
            <div class="w-full {{ request()->routeIs('welcome', 'login', 'register') ? '' : 'max-w-2xl mx-auto' }}">
                @yield('content')
            </div>
        </main>
    </div>
    @if(!request()->routeIs('welcome', 'login', 'register'))
    <footer class="bg-white/90 backdrop-blur-xl text-center py-6 text-slate-500 text-sm border-t border-white/20 shadow-lg">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'DOC') }}. All rights reserved.</p>
                <p class="text-xs mt-2 md:mt-0">Built with ❤️ for developers</p>
            </div>
        </div>
    </footer>
    @endif
</body>
<style>
.animated-gradient-text {
  background: linear-gradient(270deg, #2563eb, #06b6d4, #22d3ee, #a5b4fc, #f472b6, #facc15, #2563eb);
  background-size: 200% 200%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  text-fill-color: transparent;
  animation: gradient-move 4s ease-in-out infinite;
}

@keyframes gradient-move {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

/* Dynamic body background */
#appBody {
    background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 50%, #f1f5f9 100%);
    transition: background 0.5s ease;
}

#appBody.dark-mode {
    background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
}

#appBody.light-mode {
    background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 50%, #f1f5f9 100%);
}

/* For special pages (welcome, login, register) - use full background */
body.special-page {
    background: none !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const body = document.getElementById('appBody');
    const isSpecialPage = {{ request()->routeIs('welcome', 'login', 'register') ? 'true' : 'false' }};
    
    if (isSpecialPage) {
        body.classList.add('special-page');
    }
    
    // Check for saved theme preference for special pages
    if (isSpecialPage) {
        const savedTheme = localStorage.getItem('theme');
        const systemDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        
        if (savedTheme === 'dark' || (!savedTheme && systemDarkMode)) {
            body.classList.add('dark-mode');
        } else {
            body.classList.add('light-mode');
        }
    }
});
</script>
</html>
