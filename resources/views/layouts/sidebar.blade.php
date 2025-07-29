<aside class="fixed top-20 left-0 h-[calc(100vh-5rem)] w-64 bg-white border-r border-blue-100 shadow-lg z-40 flex flex-col transition-transform duration-300">
  
    <nav class="flex-1 px-4 py-6 space-y-2">
        {{-- <a href="{{ route('dashboard') }}" class="sidebar-link group">
            <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-indigo-600 group-hover:text-indigo-800 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z'/><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M8 5v4m8-4v4'/></svg>
            <span>Dashboard</span>
        </a> --}}
        <a href="{{ route('profile.edit') }}" class="sidebar-link group">
            <svg xmlns='http://www.w3.org/2000/svg' class='w-5 h-5 text-yellow-600 group-hover:text-yellow-800 transition' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.657 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z'/></svg>
            <span>Profile</span>
        </a>
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
            <span>Testing</span>
        </a>
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
            color: #374151;
            background: linear-gradient(90deg,rgba(255,255,255,0.7),rgba(245,245,255,0.7));
            box-shadow: 0 1px 4px 0 rgba(0,0,0,0.03);
            transition: all 0.18s cubic-bezier(.4,0,.2,1);
            position: relative;
            overflow: hidden;
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
