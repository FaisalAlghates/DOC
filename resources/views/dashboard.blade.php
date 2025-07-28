@extends('layouts.app')

@section('content')

<div class="relative w-full min-h-[70vh] flex flex-col items-center justify-center overflow-hidden bg-gradient-to-br from-blue-50 via-white to-blue-100">
    <div class="absolute inset-0 w-full h-full z-0 bg-gradient-to-br from-blue-100/60 via-white/80 to-green-100/60"></div>
    <div class="relative z-10 w-full max-w-2xl mx-auto text-center py-20">
        <h1 class="text-5xl md:text-6xl font-black text-blue-700 drop-shadow-2xl mb-6 tracking-tight flex items-center justify-center gap-3 animate-dashboard-fade">
            <svg xmlns='http://www.w3.org/2000/svg' class='inline w-10 h-10 text-yellow-400 animate-spin-slow' fill='none' viewBox='0 0 24 24'><circle class='opacity-25' cx='12' cy='12' r='10' stroke='currentColor' stroke-width='4'/><path class='opacity-75' fill='currentColor' d='M4 12a8 8 0 018-8v8z'/></svg>
            لوحة التحكم
        </h1>
        <p class="text-xl md:text-2xl text-blue-600 mb-10 leading-relaxed animate-dashboard-fade-slow">
            أهلاً <span class="font-bold text-yellow-500">{{ auth()->user()->name }}</span> 👋<br>
            <span class="text-blue-400">نتمنى لك يوماً مليئاً بالإبداع والإنجازات.</span>
        </p>
        <div class="flex flex-col md:flex-row gap-6 justify-center animate-dashboard-fade-slow">
            <a href="{{ route('docs.index') }}" class="dashboard-btn bg-gradient-to-r from-blue-500 to-blue-400 hover:from-blue-600 hover:to-blue-500">
                <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6 text-white group-hover:text-yellow-200 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M8 16h8M8 12h8m-8-4h8M4 6h16'/></svg>
                عرض جميع التوثيقات
            </a>
            <a href="{{ route('docs.create') }}" class="dashboard-btn bg-gradient-to-r from-green-400 to-green-300 hover:from-green-500 hover:to-green-400">
                <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6 text-white group-hover:text-yellow-200 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'/></svg>
                إنشاء توثيق جديد
            </a>
            {{-- جميع المستخدمين لهم كامل الصلاحيات --}}
            <a href="{{ route('history.index') }}" class="dashboard-btn bg-gradient-to-r from-yellow-400 to-yellow-300 hover:from-yellow-500 hover:to-yellow-400">
                <svg xmlns='http://www.w3.org/2000/svg' class='w-6 h-6 text-white group-hover:text-blue-200 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M3 7v4a1 1 0 001 1h3m10-5v4a1 1 0 01-1 1h-3m-4 4h4m-2 0v4m0-4V7'/></svg>
                سجل العمليات
            </a>
        </div>
    </div>
</div>
<style>
@keyframes spin-slow { 100% { transform: rotate(360deg); } }
.animate-spin-slow { animation: spin-slow 3.5s linear infinite; }
@keyframes dashboard-fade { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: none; } }
.animate-dashboard-fade { animation: dashboard-fade 1s cubic-bezier(.4,0,.2,1) both; }
.animate-dashboard-fade-slow { animation: dashboard-fade 1.8s cubic-bezier(.4,0,.2,1) both; }
.dashboard-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    padding: 1.25rem 2.5rem;
    border-radius: 1.25rem;
    font-weight: 700;
    font-size: 1.25rem;
    color: #fff;
    box-shadow: 0 4px 24px 0 rgba(59,130,246,0.10);
    transition: all 0.18s cubic-bezier(.4,0,.2,1);
    position: relative;
    overflow: hidden;
    border: none;
}
.dashboard-btn::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0;
    width: 0;
    background: linear-gradient(90deg,#e0e7ff 0%,#f0fdfa 100%);
    z-index: 0;
    transition: width 0.3s cubic-bezier(.4,0,.2,1);
}
.dashboard-btn:hover::before, .dashboard-btn:focus::before {
    width: 100%;
}
.dashboard-btn > * {
    position: relative;
    z-index: 1;
}
.dashboard-btn:hover, .dashboard-btn:focus {
    color: #fff;
    box-shadow: 0 8px 32px 0 rgba(59,130,246,0.13);
    transform: translateY(-2px) scale(1.04);
}
</style>
@endsection
