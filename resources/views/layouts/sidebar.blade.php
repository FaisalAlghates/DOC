<aside class="fixed top-20 left-0 h-[calc(100vh-5rem)] w-72 bg-gradient-to-b from-slate-900 via-blue-900 to-indigo-900 backdrop-blur-3xl border-r border-white/20 shadow-2xl z-40 flex flex-col transition-all duration-700 ease-out overflow-hidden">
    <!-- Sidebar Background Pattern -->
    <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 via-purple-600/10 to-emerald-600/10 animate-gradient-x"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="1"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    
    <!-- Sidebar Side Gradient -->
    <div class="absolute right-0 top-0 bottom-0 w-px bg-gradient-to-b from-transparent via-cyan-400 to-transparent opacity-60"></div>
    
    <!-- Navigation Header -->
    <div class="relative px-6 py-6 border-b border-white/10">
        {{-- <div class="flex items-center space-x-3">
            <div class="relative">
                <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 via-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-xl">
                    <div class="absolute inset-0 rounded-2xl border border-white/30 animate-spin-slow"></div>
                    <svg class="relative w-5 h-5 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-cyan-400 rounded-full animate-ping"></div>
            </div>
            <div>
                <h3 class="font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-purple-300 text-sm tracking-wide">Navigation</h3>
                <p class="text-xs text-cyan-200/70 font-medium">Quick access menu</p>
            </div>
        </div> --}}
    </div>
  
    <nav class="relative flex-1 px-6 py-6 pb-16 space-y-3 overflow-y-auto">
        <!-- Main Navigation Items -->
        <div class="space-y-2">
            <div class="text-xs font-bold text-cyan-200/60 uppercase tracking-widest mb-4 px-3 flex items-center">
                <svg class="w-3 h-3 mr-2 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Documentation
            </div>
            
            <a href="{{ route('docs.index') }}" class="sidebar-link group" data-tooltip="View all documentation">
                <div class="icon-container bg-gradient-to-br from-blue-500 to-blue-600">
                    <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-white' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'></path></svg>
                </div>
                <span class="link-text">Documentation</span>
                <div class="ml-auto w-2 h-2 bg-blue-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </a>

            <a href="{{ route('docs.create') }}" class="sidebar-link group" data-tooltip="Create new documentation">
                <div class="icon-container bg-gradient-to-br from-emerald-500 to-emerald-600">
                    <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-white' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'/></svg>
                </div>
                <span class="link-text">Add Documentation</span>
                <div class="ml-auto w-2 h-2 bg-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </a>
        </div>

        <!-- Testing & History Section -->
        <div class="pt-6 space-y-2">
            <div class="text-xs font-bold text-purple-200/60 uppercase tracking-widest mb-4 px-3 flex items-center">
                <svg class="w-3 h-3 mr-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Testing & History
            </div>
            
            <a href="{{ route('testing.index') }}" class="sidebar-link group" data-tooltip="Testing workspace">
                <div class="icon-container bg-gradient-to-br from-purple-500 to-purple-600">
                    <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-white' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'></path></svg>
                </div>
                <span class="link-text">Your Testing</span>
                <div class="ml-auto w-2 h-2 bg-purple-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </a>

            <a href="{{ route('history.index') }}" class="sidebar-link group" data-tooltip="View your history">
                <div class="icon-container bg-gradient-to-br from-amber-500 to-amber-600">
                    <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-white' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'/></svg>
                </div>
                <span class="link-text">Your History</span>
                <div class="ml-auto w-2 h-2 bg-amber-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </a>
        </div>

        <!-- Account Section -->
        <div class="pt-6 space-y-2">
            <div class="text-xs font-bold text-rose-200/60 uppercase tracking-widest mb-4 px-3 flex items-center">
                <svg class="w-3 h-3 mr-2 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Account
            </div>
            
            <a href="{{ route('profile.show') }}" class="sidebar-link group" data-tooltip="Manage your profile">
                <div class="icon-container bg-gradient-to-br from-rose-500 to-rose-600">
                    <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-white' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'/></svg>
                </div>
                <span class="link-text">Your Profile</span>
                <div class="ml-auto w-2 h-2 bg-rose-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </a>

            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="sidebar-link group w-full logout-btn" data-tooltip="Sign out of your account">
                    <div class="icon-container bg-gradient-to-br from-red-500 to-red-600">
                        <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-white' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M17 16l4-4m0 0l-4-4m4 4H7'/></svg>
                    </div>
                    <span class="link-text">Logout</span>
                    <div class="ml-auto w-2 h-2 bg-red-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </button>
            </form>

            @if(Auth::user()->canManageUsers())
            <a href="{{ route('users.index') }}" class="sidebar-link group" data-tooltip="Manage system users">
                <div class="icon-container bg-gradient-to-br from-indigo-500 to-indigo-600">
                    <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-white' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z'/></svg>
                </div>
                <span class="link-text">System Users</span>
                <div class="ml-auto w-2 h-2 bg-indigo-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </a>
            @endif
        </div>
    </nav>
    
    <style>
        /* Enhanced Sidebar Styles matching Header/Footer */
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            border-radius: 1rem;
            font-weight: 600;
            color: #e2e8f0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .sidebar-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s;
        }

        .sidebar-link:hover::before {
            left: 100%;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.1) 100%);
            border-color: rgba(255,255,255,0.2);
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.2), 0 0 0 1px rgba(59,130,246,0.2);
        }

        .sidebar-link:focus {
            outline: none;
            ring: 2px;
            ring-color: #3b82f6;
            ring-opacity: 0.5;
        }

        .icon-container {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            flex-shrink: 0;
            border: 1px solid rgba(255,255,255,0.2);
        }

        .sidebar-link:hover .icon-container {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 8px 15px -3px rgba(0, 0, 0, 0.4);
            border-color: rgba(255,255,255,0.3);
        }

        .link-text {
            font-size: 0.95rem;
            font-weight: 600;
            letter-spacing: -0.025em;
            transition: all 0.2s ease;
            text-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .sidebar-link:hover .link-text {
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        /* Logout button special styling */
        .logout-btn {
            background: linear-gradient(135deg, rgba(239,68,68,0.1) 0%, rgba(220,38,38,0.1) 100%);
            border-color: rgba(239,68,68,0.2);
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, rgba(239,68,68,0.2) 0%, rgba(220,38,38,0.15) 100%);
            border-color: rgba(239,68,68,0.4);
        }

        /* Scrollbar styling for dark theme */
        nav::-webkit-scrollbar {
            width: 4px;
        }

        nav::-webkit-scrollbar-track {
            background: transparent;
        }

        nav::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 2px;
        }

        nav::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Enhanced tooltip for dark theme */
        .sidebar-link[data-tooltip]:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(15, 23, 42, 0.95);
            color: white;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.75rem;
            white-space: nowrap;
            z-index: 1000;
            margin-left: 0.5rem;
            opacity: 0;
            animation: tooltipFadeIn 0.2s ease-out 0.5s forwards;
            pointer-events: none;
            border: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }

        @keyframes tooltipFadeIn {
            from {
                opacity: 0;
                transform: translateY(-50%) translateX(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(-50%) translateX(0);
            }
        }

        /* Section headers styling */
        .sidebar-link + div {
            border-top: 1px solid rgba(255,255,255,0.05);
            margin-top: 1.5rem;
            padding-top: 1.5rem;
        }

        /* Active state for current page */
        .sidebar-link.active {
            background: linear-gradient(135deg, rgba(59,130,246,0.2) 0%, rgba(147,197,253,0.1) 100%);
            border-color: rgba(59,130,246,0.4);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(59,130,246,0.2);
        }

        .sidebar-link.active .icon-container {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            box-shadow: 0 6px 20px rgba(59,130,246,0.4);
        }

        /* Gradient animations matching header */
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes gradient-x {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            aside {
                width: 16rem;
            }
        }

        /* Enhanced hover effects */
        .sidebar-link:hover {
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.08) 100%);
        }

        /* Floating particles effect for sidebar */
        aside::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 30%, rgba(59,130,246,0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 70%, rgba(147,51,234,0.1) 0%, transparent 50%),
                        radial-gradient(circle at 50% 50%, rgba(16,185,129,0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        /* Ensure content is above the background effect */
        nav {
            position: relative;
            z-index: 1;
        }
        
        .sidebar-link + .relative {
            position: relative;
            z-index: 1;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add active state to current page link
            const currentPath = window.location.pathname;
            const sidebarLinks = document.querySelectorAll('.sidebar-link');
            
            sidebarLinks.forEach(link => {
                if (link.href && link.href.includes(currentPath)) {
                    link.classList.add('active');
                }
            });

            // Add smooth scrolling for better UX
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    // Add a subtle click animation
                    this.style.transform = 'scale(0.98)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });
        });
    </script>
</aside>
