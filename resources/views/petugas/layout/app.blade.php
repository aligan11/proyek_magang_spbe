<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: false, collapsed: false }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portal Petugas' }} | SPBE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .glass-dark {
            background: rgba(30, 41, 59, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        }

        .sidebar-glass {
            background: linear-gradient(180deg, rgba(30, 41, 59, 0.98) 0%, rgba(15, 23, 42, 0.98) 100%);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .nav-link {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link:hover {
            transform: translateX(4px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(99, 102, 241, 0.2) 100%);
            border-left: 3px solid #3b82f6;
        }

        .status-pending {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #b45309;
            border: 1px solid #fcd34d;
        }

        .status-selesai {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #047857;
            border: 1px solid #6ee7b7;
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 250, 252, 0.9) 100%);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        .glow-blue {
            box-shadow: 0 0 40px rgba(59, 130, 246, 0.3);
        }

        .glow-amber {
            box-shadow: 0 0 40px rgba(245, 158, 11, 0.3);
        }

        .glow-emerald {
            box-shadow: 0 0 40px rgba(16, 185, 129, 0.3);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        [x-cloak] {
            display: none !important;
        }

        @media (max-width: 1023px) {
            .mobile-safe-padding {
                padding-bottom: calc(1rem + env(safe-area-inset-bottom));
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-100 via-slate-50 to-blue-50 min-h-screen">

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside x-cloak
            :class="[
                collapsed ? 'lg:w-24' : 'lg:w-80',
                sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'
            ]"
            class="sidebar-glass fixed inset-y-0 left-0 z-50 flex min-h-screen w-[86vw] max-w-[320px] flex-col border-r border-slate-700/50 shadow-2xl transition-all duration-300 lg:sticky lg:top-0 lg:max-w-none">

            <!-- Logo Area -->
            <div class="border-b border-slate-700/50 p-5 lg:p-8">
                <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-4 min-w-0">
                        <div
                            class="p-3 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-lg shadow-blue-500/30 float-animation shrink-0">
                            <i data-lucide="shield-check" class="text-white w-7 h-7"></i>
                        </div>
                        <div x-show="!collapsed" x-transition.opacity class="min-w-0">
                            <h1 class="text-white font-extrabold text-lg tracking-tight truncate">Portal Petugas</h1>
                            <p class="text-slate-400 text-xs font-medium uppercase tracking-widest">SPBE Diskominfo</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <button @click="collapsed = !collapsed"
                            class="hidden lg:inline-flex p-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-white/10 transition-all"
                            :title="collapsed ? 'Buka sidebar' : 'Ciutkan sidebar'">
                            <i data-lucide="panel-left-close" class="w-5 h-5" x-show="!collapsed"></i>
                            <i data-lucide="panel-left-open" class="w-5 h-5" x-show="collapsed" x-cloak></i>
                        </button>
                        <button @click="sidebarOpen = false"
                            class="inline-flex lg:hidden p-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-white/10 transition-all"
                            title="Tutup sidebar">
                            <i data-lucide="x" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 lg:p-6 space-y-2 overflow-y-auto mobile-safe-padding">
                <p x-show="!collapsed" x-transition.opacity
                    class="text-slate-500 text-[10px] font-black uppercase tracking-[0.2em] mb-6 px-4">Menu Utama</p>

                <a href="{{ route('petugas.index') }}" :class="collapsed ? 'justify-center px-4' : 'px-6'"
                    class="nav-link flex items-center gap-4 py-4 rounded-2xl text-slate-300 hover:bg-white/10 hover:text-white {{ request()->routeIs('petugas.index') ? 'active text-white bg-white/10' : '' }}">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 shrink-0"></i>
                    <span x-show="!collapsed" x-transition.opacity class="font-semibold">Dashboard</span>
                </a>

                <a href="{{ route('petugas.tugas') }}" :class="collapsed ? 'justify-center px-4' : 'px-6'"
                    class="nav-link flex items-center gap-4 py-4 rounded-2xl text-slate-300 hover:bg-white/10 hover:text-white {{ request()->routeIs('petugas.tugas') || request()->routeIs('petugas.show') ? 'active text-white bg-white/10' : '' }}">
                    <i data-lucide="clipboard-list" class="w-5 h-5 shrink-0"></i>
                    <span x-show="!collapsed" x-transition.opacity class="font-semibold">Tugas Saya</span>
                </a>

                <a href="{{ route('petugas.berita-acara.create') }}" :class="collapsed ? 'justify-center px-4' : 'px-6'"
                    class="nav-link flex items-center gap-4 py-4 rounded-2xl text-slate-300 hover:bg-white/10 hover:text-white {{ request()->routeIs('petugas.berita-acara.create') ? 'active text-white bg-white/10' : '' }}">
                    <i data-lucide="file-plus-2" class="w-5 h-5 shrink-0"></i>
                    <span x-show="!collapsed" x-transition.opacity class="font-semibold">Berita Acara</span>
                </a>

                <a href="{{ route('petugas.profile') }}" :class="collapsed ? 'justify-center px-4' : 'px-6'"
                    class="nav-link flex items-center gap-4 py-4 rounded-2xl text-slate-300 hover:bg-white/10 hover:text-white {{ request()->routeIs('petugas.profile') ? 'active text-white bg-white/10' : '' }}">
                    <i data-lucide="user-circle" class="w-5 h-5 shrink-0"></i>
                    <span x-show="!collapsed" x-transition.opacity class="font-semibold">Pengaturan Akun</span>
                </a>
            </nav>

            <!-- User Info -->
            <div class="p-4 lg:p-6 border-t border-slate-700/50">
                <div :class="collapsed ? 'justify-center px-3' : 'p-4'"
                    class="flex items-center gap-4 rounded-2xl bg-white/5">
                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold text-lg shadow-lg shrink-0">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <div x-show="!collapsed" x-transition.opacity class="flex-1 min-w-0">
                        <p class="text-white font-bold text-sm truncate">{{ $user->name }}</p>
                        <p class="text-slate-400 text-xs truncate">{{ $user->jabatan ?? 'Petugas Lapangan' }}</p>
                    </div>
                    <button onclick="toggleLogoutModal()" x-show="!collapsed" x-transition.opacity
                        class="p-2 rounded-xl text-slate-400 hover:text-red-400 hover:bg-red-500/10 transition-all">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>
        </aside>

        <!-- Overlay for mobile -->
        <div x-cloak x-show="sidebarOpen" x-transition.opacity
            class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm z-40 lg:hidden" @click="sidebarOpen = false"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-h-screen min-w-0">
            <!-- Top Navbar -->
            <header class="sticky top-0 z-30 glass border-b border-slate-200/50">
                <div class="flex items-center justify-between gap-4 px-4 py-4 sm:px-6">
                    <div class="flex items-center gap-3 sm:gap-4 min-w-0">
                        <button @click="sidebarOpen = !sidebarOpen"
                            class="lg:hidden inline-flex p-3 rounded-2xl bg-white/70 border border-slate-200 text-slate-600 hover:bg-slate-100 transition-all shadow-sm shrink-0">
                            <i data-lucide="menu" class="w-6 h-6 text-slate-600"></i>
                        </button>
                        <button @click="collapsed = !collapsed"
                            class="hidden lg:inline-flex p-3 rounded-2xl bg-white/70 border border-slate-200 text-slate-600 hover:bg-slate-100 transition-all shadow-sm shrink-0"
                            :title="collapsed ? 'Buka sidebar' : 'Ciutkan sidebar'">
                            <i data-lucide="menu" class="w-5 h-5"></i>
                        </button>
                        <div class="min-w-0">
                            <h2 class="text-slate-800 font-bold text-base sm:text-lg truncate">
                                {{ $title ?? 'Dashboard' }}</h2>
                            <p class="text-slate-400 text-xs font-medium truncate">
                                {{ now()->translatedFormat('l, d M Y') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 sm:gap-4 shrink-0">
                        <!-- Notifications -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="relative p-3 rounded-2xl hover:bg-slate-100 transition-colors">
                                <i data-lucide="bell" class="w-5 h-5 text-slate-500"></i>
                                @if (isset($unreadCount) && $unreadCount > 0)
                                    <span
                                        class="absolute top-2 right-2 w-5 h-5 bg-red-500 rounded-full flex items-center justify-center text-white text-xs font-bold">
                                        {{ $unreadCount }}
                                    </span>
                                @endif
                            </button>

                            <!-- Notification Dropdown -->
                            <div x-show="open" @click.outside="open = false" x-transition
                                class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-slate-200 z-50">
                                <div class="p-4 border-b border-slate-200 flex justify-between items-center">
                                    <h3 class="font-bold text-slate-800">Notifikasi</h3>
                                    @if (isset($unreadCount) && $unreadCount > 0)
                                        <form action="{{ route('petugas.notification.read-all') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="text-xs font-bold text-blue-600 hover:text-blue-700">
                                                Tandai semua dibaca
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="max-h-80 overflow-y-auto">
                                    @if (isset($notifications) && $notifications->count() > 0)
                                        @foreach ($notifications as $notification)
                                            <form action="{{ route('petugas.notification.read', $notification->id) }}"
                                                method="POST" class="block">
                                                @csrf
                                                <button type="submit"
                                                    class="w-full p-4 hover:bg-slate-50 text-left border-b border-slate-100 last:border-0">
                                                    <div class="flex items-start gap-3">
                                                        <div
                                                            class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0">
                                                            <i data-lucide="briefcase"
                                                                class="w-5 h-5 text-blue-600"></i>
                                                        </div>
                                                        <div class="flex-1">
                                                            <p class="text-sm font-semibold text-slate-800">
                                                                {{ $notification->message }}</p>
                                                            <p class="text-xs text-slate-400 mt-1">
                                                                {{ $notification->created_at->diffForHumans() }}
                                                            </p>
                                                        </div>
                                                        @if (!$notification->is_read)
                                                            <span
                                                                class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0"></span>
                                                        @endif
                                                    </div>
                                                </button>
                                            </form>
                                        @endforeach
                                    @else
                                        <div class="p-8 text-center">
                                            <i data-lucide="inbox" class="w-12 h-12 text-slate-300 mx-auto mb-3"></i>
                                            <p class="text-sm text-slate-500">Tidak ada notifikasi baru</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Profile Dropdown -->
                        <div class="hidden sm:flex items-center gap-3 pl-4 border-l border-slate-200">
                            <div class="text-right">
                                <p class="text-sm font-bold text-slate-800">{{ $user->name }}</p>
                                <p class="text-xs text-slate-400">{{ $user->role ?? 'Petugas' }}</p>
                            </div>

                            <!-- Bagian Avatar dengan Logika Database -->
                            <div
                                class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold shadow-lg overflow-hidden">
                                @if ($user->avatar)
                                    <!-- Jika user memiliki foto avatar di database -->
                                    <img src="{{ asset('storage/avatars/' . $user->avatar) }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <!-- Jika avatar kosong, tampilkan 2 huruf pertama dari nama user -->
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-x-hidden">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="glass border-t border-slate-200/50 px-4 py-6 sm:px-8">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-slate-400 text-sm font-medium">© {{ date('Y') }} SPBE Diskominfo Bangka
                        Belitung
                    </p>
                    <div class="flex items-center gap-2 text-slate-400 text-sm">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                        <span>Sistem Normal</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Logout Modal -->
    <div id="logoutModal" class="fixed inset-0 z-[100] hidden">
        <div class="fixed inset-0 bg-slate-900/80 backdrop-blur-md" onclick="toggleLogoutModal()"></div>
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative bg-white rounded-[2rem] p-10 max-w-md w-full shadow-2xl border border-slate-100"
                onclick="event.stopPropagation()">
                <div class="absolute -top-12 left-1/2 -translate-x-1/2">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-red-500 to-rose-600 rounded-full flex items-center justify-center shadow-xl">
                        <i data-lucide="log-out" class="text-white w-10 h-10"></i>
                    </div>
                </div>

                <div class="text-center mt-8">
                    <h3 class="text-2xl font-black text-slate-800 tracking-tight">Keluar dari Sistem?</h3>
                    <p class="text-slate-500 text-sm mt-3 font-medium">Pastikan semua data pekerjaan Anda sudah
                        tersimpan
                        sebelum logout.</p>
                </div>

                <div class="mt-10 flex gap-4">
                    <button onclick="toggleLogoutModal()"
                        class="flex-1 px-6 py-4 rounded-2xl bg-slate-100 text-slate-600 font-bold text-sm hover:bg-slate-200 transition-all">
                        Batal
                    </button>
                    <form action="{{ route('logout') }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit"
                            class="w-full px-6 py-4 rounded-2xl bg-gradient-to-r from-red-500 to-rose-600 text-white font-bold text-sm shadow-lg hover:shadow-xl transition-all">
                            Ya, Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            class="fixed bottom-4 right-4 left-4 sm:left-auto sm:bottom-6 sm:right-6 z-50 glass-card rounded-2xl p-4 sm:p-5 flex items-center gap-4 shadow-xl border-l-4 border-emerald-500">
            <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center">
                <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600"></i>
            </div>
            <div>
                <p class="font-bold text-slate-800">Berhasil!</p>
                <p class="text-sm text-slate-500">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="ml-4 text-slate-400 hover:text-slate-600">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
    @endif

    <script>
        lucide.createIcons();

        function toggleLogoutModal() {
            const modal = document.getElementById('logoutModal');
            modal.classList.toggle('hidden');
        }
    </script>
</body>

</html>
