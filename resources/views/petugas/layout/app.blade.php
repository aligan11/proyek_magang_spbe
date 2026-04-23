<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portal Petugas' }} | DISKOMINFO</title>

    <!-- Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Integrasi Laravel Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js & Lucide Icons -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        [x-cloak] {
            display: none !important;
        }

        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }

        .glass-dark {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-transition {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Fix scrollbar for webkit */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #cbd5e1;
        }
    </style>
</head>

<body class="bg-[#f8fafc] text-slate-900 selection:bg-blue-100 selection:text-blue-700" x-data="{ sidebarOpen: true, mobileMenu: false }">
    <!-- Animated Background Pattern -->
    <div class="fixed inset-0 z-0 pointer-events-none opacity-40">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-blue-200/50 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-indigo-200/50 blur-[120px]">
        </div>
    </div>

    <!-- Mobile Header -->
    <header
        class="lg:hidden glass fixed top-0 left-0 w-full h-16 z-[60] px-6 flex items-center justify-between border-b border-slate-200">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-blue-600 rounded-xl">
                <i data-lucide="shield-check" class="text-white w-5 h-5"></i>
            </div>
            <span class="font-extrabold text-slate-800 tracking-tight uppercase text-sm">Petugas Portal</span>
        </div>
        <button @click="mobileMenu = !mobileMenu" class="p-2 text-slate-600">
            <i data-lucide="menu" x-show="!mobileMenu"></i>
            <i data-lucide="x" x-show="mobileMenu"></i>
        </button>
    </header>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'w-72' : 'w-24'"
        class="fixed left-0 top-0 h-screen glass-dark z-[70] hidden lg:flex flex-col sidebar-transition overflow-hidden">

        <!-- Logo Area -->
        <div class="p-8 mb-4 flex items-center gap-4 overflow-hidden whitespace-nowrap">
            <div class="p-3 bg-blue-600 rounded-2xl shadow-lg shadow-blue-500/30 flex-shrink-0">
                <i data-lucide="shield-check" class="text-white w-6 h-6"></i>
            </div>
            <div :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" class="sidebar-transition">
                <span class="text-white font-extrabold tracking-tighter uppercase text-lg">DISKOMINFO</span>
                <p class="text-slate-400 text-[10px] font-bold tracking-widest uppercase">Petugas SPBE</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 space-y-2">
            <a href="{{ route('petugas.index') }}"
                class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('petugas.index') ? 'bg-blue-600 text-white shadow-xl shadow-blue-600/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                <i data-lucide="layout-grid" class="w-6 h-6 flex-shrink-0"></i>
                <span :class="sidebarOpen ? 'opacity-100' : 'opacity-0'"
                    class="font-bold text-sm sidebar-transition">Dashboard</span>
            </a>

            <a href="{{ route('petugas.tugas') }}"
                class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('petugas.tugas') ? 'bg-blue-600 text-white shadow-xl shadow-blue-600/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                <i data-lucide="clipboard-list" class="w-6 h-6 flex-shrink-0"></i>
                <span :class="sidebarOpen ? 'opacity-100' : 'opacity-0'"
                    class="font-bold text-sm sidebar-transition">Mandat Saya</span>
            </a>

            <a href="{{ route('petugas.profile') }}"
                class="flex items-center gap-4 px-4 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('petugas.profile') ? 'bg-blue-600 text-white shadow-xl shadow-blue-600/20' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                <i data-lucide="user-circle" class="w-6 h-6 flex-shrink-0"></i>
                <span :class="sidebarOpen ? 'opacity-100' : 'opacity-0'"
                    class="font-bold text-sm sidebar-transition">Profil Saya</span>
            </a>
        </nav>

        <!-- Sidebar Footer -->
        <div class="p-4">
            <button @click="sidebarOpen = !sidebarOpen"
                class="w-full flex items-center justify-center p-4 bg-white/5 rounded-2xl text-slate-400 hover:text-white transition-all">
                <i data-lucide="chevron-left" :class="!sidebarOpen ? 'rotate-180' : ''" class="sidebar-transition"></i>
            </button>
        </div>
    </aside>

    <div :class="sidebarOpen ? 'lg:ml-72' : 'lg:ml-24'"
        class="min-h-screen sidebar-transition flex flex-col pt-16 lg:pt-0 bg-transparent relative z-10">

        <!-- Topbar -->
        <header class="hidden lg:flex items-center justify-between px-10 py-6 glass sticky top-0 z-50">
            <div>
                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">{{ $title ?? 'Dashboard' }}</h2>
                <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">
                    {{ now()->translatedFormat('l, d F Y') }}</p>
            </div>

            <div class="flex items-center gap-6">
                <div class="text-right border-r border-slate-200 pr-6">
                    <p class="text-sm font-extrabold text-slate-800 leading-none">{{ $user->name }}</p>
                    <span class="text-[10px] font-black text-blue-600 uppercase tracking-tighter">Staff Petugas</span>
                </div>

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-12 h-12 rounded-2xl bg-blue-50 border-2 border-white shadow-lg overflow-hidden transition-transform active:scale-95">
                        @if ($user->avatar)
                            <img src="{{ asset('storage/avatars/' . $user->avatar) }}"
                                class="w-full h-full object-cover">
                        @else
                            <div
                                class="w-full h-full flex items-center justify-center text-blue-600 font-black uppercase italic">
                                {{ substr($user->name, 0, 2) }}
                            </div>
                        @endif
                    </button>

                    <div x-show="open" @click.outside="open = false" x-cloak
                        class="absolute right-0 mt-4 w-56 glass rounded-3xl shadow-2xl p-2 z-[100]">
                        <a href="{{ route('petugas.profile') }}"
                            class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-slate-50 text-slate-600 text-sm font-bold">
                            <i data-lucide="settings" class="w-4 h-4"></i> Pengaturan
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-rose-50 text-rose-500 text-sm font-bold">
                                <i data-lucide="log-out" class="w-4 h-4"></i> Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 px-6 lg:px-10 py-8">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="px-10 py-6 text-center text-slate-400 text-[10px] font-bold uppercase tracking-widest">
            &copy; {{ date('Y') }} DISKOMINFO - Sistem Informasi Layanan SPBE
        </footer>
    </div>

    <!-- Mobile Nav Overlay -->
    <div x-show="mobileMenu" x-cloak class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[80] lg:hidden"
        @click="mobileMenu = false"></div>
    <div x-show="mobileMenu" x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300 transform" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full" x-cloak
        class="fixed left-0 top-0 h-screen w-80 glass-dark z-[90] lg:hidden p-8 flex flex-col">

        <div class="flex items-center gap-4 mb-12">
            <div class="p-3 bg-blue-600 rounded-2xl">
                <i data-lucide="shield-check" class="text-white w-6 h-6"></i>
            </div>
            <div>
                <span class="text-white font-extrabold tracking-tighter uppercase text-lg">DISKOMINFO</span>
                <p class="text-slate-400 text-[10px] font-bold tracking-widest uppercase">Petugas Portal</p>
            </div>
        </div>

        <nav class="flex-1 space-y-4">
            <a href="{{ route('petugas.index') }}"
                class="flex items-center gap-4 px-6 py-4 rounded-2xl text-white bg-blue-600 shadow-xl shadow-blue-600/20 font-bold text-sm">
                <i data-lucide="layout-grid" class="w-6 h-6"></i> Dashboard
            </a>
            <a href="{{ route('petugas.tugas') }}"
                class="flex items-center gap-4 px-6 py-4 rounded-2xl text-slate-400 font-bold text-sm">
                <i data-lucide="clipboard-list" class="w-6 h-6"></i> Mandat Saya
            </a>
            <a href="{{ route('petugas.profile') }}"
                class="flex items-center gap-4 px-6 py-4 rounded-2xl text-slate-400 font-bold text-sm">
                <i data-lucide="user-circle" class="w-6 h-6"></i> Profil Saya
            </a>
        </nav>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center gap-3 py-4 rounded-2xl bg-rose-500 text-white font-bold text-sm shadow-xl shadow-rose-500/20">
                <i data-lucide="log-out" class="w-4 h-4"></i> Keluar
            </button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
    @include('sweetalert::alert')
</body>

</html>
