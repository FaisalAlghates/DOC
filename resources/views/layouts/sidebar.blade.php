<aside class="fixed top-20 left-0 h-[calc(100vh-5rem)] w-64 bg-white border-r border-blue-100 shadow-lg z-40 flex flex-col transition-transform duration-300">
  
    <nav class="flex-1 px-4 py-6 space-y-2">
        {{-- <a href="{{ route('dashboard') }}" class="sidebar-link group">
            <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-indigo-600 group-hover:text-indigo-800 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z'/><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M8 5v4m8-4v4'/></svg>
            <span>Dashboard</span>
        </a> --}}
        
        <a href="{{ route('docs.index') }}" class="sidebar-link group">
            <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-blue-600 group-hover:text-blue-800 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'></path></svg>
            <span>Documentation</span>


        {{-- <a href="{{ route('docs.index') }}" class="sidebar-link group">
            <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-blue-600 group-hover:text-blue-800 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M8 16h8M8 12h8m-8-4h8M4 6h16'/></svg>
            <span>Documentation</span>
        </a> --}}

        

        <a href="{{ route('docs.create') }}" class="sidebar-link group">
            <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-green-600 group-hover:text-green-800 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4v16m8-8H4'/></svg>
            <span>Add Documentation</span>
        </a>


        <a href="{{ route('testing.index') }}" class="sidebar-link group">
            <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-purple-600 group-hover:text-purple-800 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 17v-2a4 4 0 014-4h2a4 4 0 014 4v2M9 17H7a2 2 0 01-2-2v-2a6 6 0 016-6h2a6 6 0 016 6v2a2 2 0 01-2 2h-2'></path></svg>
            <span>Your Testing</span>
        </a>

        <a href="{{ route('history.index') }}" class="sidebar-link group">
            <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-teal-600 group-hover:text-teal-800 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'/></svg>
            <span>Your History</span>
        </a>

        <a href="{{ route('profile.show') }}" class="sidebar-link group">
            <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-pink-600 group-hover:text-pink-800 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'/></svg>
            <span>Your Profile</span>
        </a>

        @if(Auth::user()->canManageUsers())
        <a href="{{ route('users.index') }}" class="sidebar-link group">
            <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-indigo-600 group-hover:text-indigo-800 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z'/></svg>
            <span>System Users</span>
        </a>
        @endif

        <form method="POST" action="{{ route('logout') }}" class="mt-8">
            @csrf
            <button type="submit" class="sidebar-link group w-full">
                <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-red-600 group-hover:text-red-800 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M17 16l4-4m0 0l-4-4m4 4H7'/></svg>
                <span>Logout</span>
            </button>
        </form>
    </nav>
    <style>
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            font-weight: 600;
            color: #000000 !important;
            background: linear-gradient(90deg,rgba(255,255,255,0.7),rgba(245,245,255,0.7));
            box-shadow: 0 1px 4px 0 rgba(0,0,0,0.03);
            transition: all 0.18s cubic-bezier(.4,0,.2,1);
            position: relative;
            overflow: hidden;
        }
        .sidebar-link svg {
            flex-shrink: 0;
            width: 20px !important;
            height: 20px !important;
            stroke-width: 2.5;
            filter: drop-shadow(0 1px 2px rgba(0,0,0,0.1));
        }
        .sidebar-link::before {
            content: '';
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 0;
            background: linear-gradient(90deg,#e0e7ff 0%,#f0fdfa 100%);
            z-index: 0;
            transition: width 0.3s cubic-bezier(.4,0,.2,1);
        }
        .sidebar-link:hover::before, .sidebar-link:focus::before {
            width: 100%;
        }
        .sidebar-link > * {
            position: relative;
            z-index: 1;
        }
        .sidebar-link:hover, .sidebar-link:focus {
            color: #1e40af;
            box-shadow: 0 4px 16px 0 rgba(59,130,246,0.08);
            transform: translateY(-2px) scale(1.03);
        }
    </style>
</aside>
