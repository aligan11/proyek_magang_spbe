<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Executive Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/index.js') }}"></script>



    <script src="https://unpkg.com/lucide@latest"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- <script src="{{ asset('js/index.js') }}"></script> --}}
    <style>
        @import url('https://fonts.googleapis.com');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body x-data="{ sidebarOpen: false }" class="bg-[#f8fafc] text-slate-900 overflow-x-hidden">


    <div class="h-screen flex">

        <div x-cloak x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false"
            class="fixed inset-0 bg-black/40 z-40 lg:hidden">
        </div>



        <!-- Sidebar -->
        <aside class="hidden lg:flex w-72 bg-[#0f172a] flex-col shrink-0">







            <!-- logo -->
            <div class="p-6 flex items-center gap-3">
                <div class="p-2 bg-blue-500 rounded-lg">
                    <i data-lucide="layout-dashboard" class="text-white w-6 h-6"></i>
                </div>
                <span class="text-white font-bold text-xl tracking-tight">E-PIMPINAN</span>
            </div>

            <!-- nav -->
            <nav class="flex-1 px-4 space-y-2 mt-4">
                <a href="#"
                    class="flex items-center gap-3 bg-blue-600/10 text-blue-400 px-4 py-3 rounded-xl font-medium border border-blue-600/20">
                    <i data-lucide="home" class="w-5 h-5"></i> Dashboard
                </a>
                <a href="#"
                    class="flex items-center gap-3 text-slate-400 hover:bg-slate-800 hover:text-white px-4 py-3 rounded-xl">
                    <i data-lucide="bar-chart-3" class="w-5 h-5"></i> Statistik Wilayah
                </a>
                <a href="#"
                    class="flex items-center gap-3 text-slate-400 hover:bg-slate-800 hover:text-white px-4 py-3 rounded-xl">
                    <i data-lucide="users" class="w-5 h-5"></i> Manajemen Petugas
                </a>

            </nav>
            <!-- Sidebar Footer with Logout -->
            <div class="p-4 border-t border-slate-800 space-y-2">
                <div class="bg-slate-800/50 rounded-2xl p-4 mb-2">
                    <p class="text-slate-500 text-[10px] uppercase font-bold mb-1">Status Sesi</p>
                    <p class="text-emerald-400 text-xs font-medium flex items-center gap-1"> <span
                            class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span> Terhubung Aman </p>
                </div>
                <form action="{{ route('logout') }}" method="POST"> @csrf <!-- Sidebar Footer with Logout Trigger -->
                    <div class="p-4 border-t border-slate-800 space-y-2"> <!-- ... Status Sesi ... --> <button
                            type="button" onclick="toggleLogoutModal()"
                            class="cursor-pointer w-full flex items-center justify-center gap-2 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white py-3 rounded-xl text-sm font-bold transition-all border border-red-500/20 group">
                            <i data-lucide="log-out" class="w-4 h-4 group-hover:scale-110 transition"></i> Logout
                        </button> </div>
                </form>
            </div>
            <div class="p-4 border-t border-slate-800">
                <div class="bg-slate-800/50 rounded-2xl p-4">
                    <p class="text-slate-500 text-[10px] uppercase font-bold mb-2">Pusat Bantuan</p> <button
                        class="w-full bg-slate-700 text-white text-xs py-2 rounded-lg hover:bg-slate-600 transition">Hubungi
                        IT</button>
                </div>
        </aside>


        <!-- Sidebar Mobile -->
        <aside x-cloak
            class="fixed lg:hidden z-50 top-0 left-0 w-72 h-screen bg-[#0f172a] flex flex-col transform transition-transform duration-300"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">



            <!-- logo -->
            <div class="p-6 flex items-center gap-3">
                <div class="p-2 bg-blue-500 rounded-lg">
                    <i data-lucide="layout-dashboard" class="text-white w-6 h-6"></i>
                </div>
                <span class="text-white font-bold text-xl tracking-tight">E-PIMPINAN</span>
            </div>

            <!-- nav -->
            <nav class="flex-1 px-4 space-y-2 mt-4">
                <a href="#"
                    class="flex items-center gap-3 bg-blue-600/10 text-blue-400 px-4 py-3 rounded-xl font-medium border border-blue-600/20">
                    <i data-lucide="home" class="w-5 h-5"></i> Dashboard
                </a>
                <a href="#"
                    class="flex items-center gap-3 text-slate-400 hover:bg-slate-800 hover:text-white px-4 py-3 rounded-xl">
                    <i data-lucide="bar-chart-3" class="w-5 h-5"></i> Statistik Wilayah
                </a>
                <a href="#"
                    class="flex items-center gap-3 text-slate-400 hover:bg-slate-800 hover:text-white px-4 py-3 rounded-xl">
                    <i data-lucide="users" class="w-5 h-5"></i> Manajemen Petugas
                </a>
            </nav>
        </aside>

        <!-- Main -->

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden">
            <nav
                class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-30 px-4 lg:px-8 py-4 flex justify-between items-center">

                <div class="flex items-center gap-3">
                    <!-- Toggle button mobile -->
                    <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-lg hover:bg-slate-100">

                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>

                    <h2 class="font-bold text-slate-800 hidden lg:block">
                        Ringkasan Eksekutif
                    </h2>
                </div>

                <!-- Right section -->
                <!-- Right section -->
                <div class="flex items-center gap-4">
                    <i data-lucide="bell" class="text-slate-400 w-6 h-6 hidden sm:block"></i>

                    <!-- Profile Link -->
                    <a href="{{ route('pimpinan.profile') }}"
                        class="flex items-center gap-3 hover:bg-slate-50 p-2 rounded-xl transition-colors duration-200">

                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-bold text-slate-800">{{ $dataPetugas->name }}</p>
                            <p class="text-[10px] text-blue-600 font-bold uppercase">Kepala Bidang</p>
                        </div>

                        <div
                            class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center border border-blue-200">
                            <i data-lucide="user" class="text-blue-600 w-5 h-5"></i>
                        </div>
                    </a>
                </div>

            </nav>

            @yield('dashboard')

        </main>
    </div>





</body>
<!-- Logout Confirmation Modal -->
<div id="logoutModal" class="fixed inset-0 z-100 hidden overflow-y-auto">
    <!-- Overlay Backdrop -->
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center">
        <div
            class="relative transform overflow-hidden rounded-4xl bg-white p-8 text-left shadow-2xl transition-all w-full max-w-md border border-slate-100">
            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-red-50 mb-6">
                <i data-lucide="log-out" class="h-10 w-10 text-red-600"></i>
            </div>

            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-slate-900">Konfirmasi Keluar</h3>
                <p class="text-slate-500 mt-2">Apakah anda yakin ingin mengakhiri sesi
                    dashboard eksekutif ini?</p>
            </div>

            <div class="flex gap-3">
                <button type="button" onclick="toggleLogoutModal()"
                    class="cursor-pointer flex-1 rounded-xl bg-slate-100 py-3.5 text-sm font-bold text-slate-600 hover:bg-slate-200 transition-all">
                    Batal
                </button>
                <form action="{{ route('logout') }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit"
                        class="cursor-pointer w-full rounded-xl bg-red-600 py-3.5 text-sm font-bold text-white shadow-lg shadow-red-200 hover:bg-red-700 transition-all">
                        Ya, Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Initialize Lucide icons
    lucide.createIcons();
</script>

</html>
