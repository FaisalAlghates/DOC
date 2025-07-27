<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'DOC') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen flex flex-col">
    <header class="bg-white/80 shadow-md backdrop-blur sticky top-0 z-30">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="text-6xl font-black tracking-widest animated-gradient-text shadow-2xl" style="letter-spacing:0.22em;line-height:1.05;text-shadow:0 2px 24px #2563eb,0 1px 0 #fff;">D HUP</span>
            </div>
            <nav class="hidden md:flex gap-6 text-gray-700 font-medium">
                @include('layouts.navigation')
            </nav>
        </div>
    </header>
    <div class="flex flex-1 w-full">
        @auth
            @include('layouts.sidebar')
        @endauth
        <main class="flex-1 flex items-center justify-center py-8 ml-0 md:ml-64 transition-all duration-300">
            <div class="w-full max-w-2xl mx-auto">
                @yield('content')
            </div>
        </main>
    </div>
    <footer class="bg-white/80 text-center py-4 text-gray-500 text-sm border-t">
        &copy; {{ date('Y') }} {{ config('app.name', 'DOC') }}. جميع الحقوق محفوظة.
    </footer>
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
</style>
</html>
