
@auth
    <div class="flex items-center space-x-8">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 px-4 py-2 text-white/80 hover:text-cyan-300 transition-colors font-medium group">
            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v1H8V5z"></path>
            </svg>
            <span>Dashboard</span>
        </a>
        
        <a href="{{ route('docs.index') }}" class="flex items-center space-x-2 px-4 py-2 text-white/80 hover:text-cyan-300 transition-colors font-medium group">
            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span>Documentation</span>
        </a>

        <div class="relative group">
            <button class="flex items-center space-x-2 px-4 py-2 text-white/80 hover:text-cyan-300 transition-colors font-medium">
                <div class="w-8 h-8 bg-gradient-to-br from-cyan-400 to-purple-500 rounded-full flex items-center justify-center text-white text-sm font-bold shadow-lg">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <span>{{ Auth::user()->name }}</span>
                <svg class="w-4 h-4 transition-transform group-hover:rotate-180 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            
            <div class="profile-dropdown absolute right-0 mt-3 w-56 bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/20 py-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 transform translate-y-2 group-hover:translate-y-0">
                <a href="{{ route('profile.show') }}" class="flex items-center space-x-3 px-5 py-3 text-slate-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 hover:text-blue-600 transition-all duration-200 group/item">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover/item:scale-110 transition-transform duration-200">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-semibold">My Profile</span>
                        <span class="text-xs text-slate-500 group-hover/item:text-blue-500">View and edit profile</span>
                    </div>
                </a>
                
                {{-- <div class="border-t border-slate-200 mx-3 my-2"></div>
                
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 px-5 py-3 text-slate-700 hover:bg-gradient-to-r hover:from-red-50 hover:to-pink-50 hover:text-red-600 transition-all duration-200 text-left group/item">
                        <div class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg group-hover/item:scale-110 transition-transform duration-200">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 3H7a2 2 0 00-2 2v14a2 2 0 002 2h8M15 9l6 3-6 3M21 12H9"></path>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-semibold">Sign Out</span>
                            <span class="text-xs text-slate-500 group-hover/item:text-red-500">Logout from account</span>
                        </div>
                    </button>
                </form> --}}
            </div>
        </div>
    </div>
@else
    <div class="flex items-center space-x-4">
        <a href="{{ route('login') }}" class="px-6 py-2 text-slate-600 hover:text-blue-600 font-medium transition-colors">
            Sign In
        </a>
        <a href="{{ route('register') }}" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white rounded-lg font-medium shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
            Get Started
        </a>
    </div>
@endauth
