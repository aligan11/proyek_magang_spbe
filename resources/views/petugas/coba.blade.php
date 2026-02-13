<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Executive Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">

    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="{{ asset('js/index.js') }}"></script>
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

<body class="bg-[#f8fafc] text-slate-900">
    <div class="min-h-screen flex">

        <!-- Mobile Overlay -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed lg:static z-50 inset-y-0 left-0 w-72 bg-[#0f172a] flex flex-col
                   transform -translate-x-full lg:translate-x-0 transition-transform duration-300
                   h-screen">

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
        <main class="flex-1 w-full overflow-x-hidden">

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden">
                <nav
                    class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-30 px-4 lg:px-8 py-4 flex justify-between items-center">

                    <div class="flex items-center gap-3">
                        <!-- Toggle button mobile -->
                        <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-slate-100">
                            <i data-lucide="menu" class="w-6 h-6"></i>
                        </button>

                        <h2 class="font-bold text-slate-800 hidden lg:block">
                            Ringkasan Eksekutif
                        </h2>
                    </div>

                    <!-- Right section -->
                    <div class="flex items-center gap-4">
                        <i data-lucide="bell" class="text-slate-400 w-6 h-6 hidden sm:block"></i>

                        <div class="flex items-center gap-3">
                            <div class="text-right hidden sm:block">
                                <p class="text-sm font-bold">{{ $dataPetugas->name }}</p>
                                <p class="text-[10px] text-blue-600 font-bold uppercase">Kepala Bidang</p>
                            </div>

                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <i data-lucide="user" class="text-blue-600 w-5 h-5"></i>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="p-4 sm:p-6 lg:p-8">

                    <!-- Welcome Header -->
                    <div class="mb-10">
                        <h1 class="text-3xl font-extrabold text-slate-900">Halo, Pak {{ $dataPetugas->name }} 👋</h1>
                        <p class="text-slate-500 mt-1">Berikut adalah pantauan progres laporan hari ini,
                            {{ now()->translatedFormat('d F Y') }}.</p>
                    </div>

                    <!-- Strategic Stats -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">
                        <div
                            class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 relative overflow-hidden">
                            <div class="relative z-10">
                                <p class="text-slate-400 text-sm font-medium">Total Masuk</p>
                                <h3 class="text-3xl font-black text-slate-900 mt-1">
                                    {{ $dataPetugas->laporans_count ?? '1,284' }}</h3>
                                <span class="text-emerald-500 text-xs font-bold flex items-center gap-1 mt-2">
                                    <i data-lucide="trending-up" class="w-3 h-3"></i> +12% dari kemarin
                                </span>
                            </div>
                            <i data-lucide="inbox"
                                class="absolute -bottom-2 -right-2 w-24 h-24 text-slate-50 opacity-10"></i>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100">
                            <p class="text-slate-400 text-sm font-medium">Proses Verifikasi</p>
                            <h3 class="text-3xl font-black text-amber-500 mt-1">42</h3>
                            <div class="w-full bg-slate-100 h-1.5 rounded-full mt-4">
                                <div class="bg-amber-400 h-1.5 rounded-full" style="width: 40%"></div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100">
                            <p class="text-slate-400 text-sm font-medium">Selesai (Success)</p>
                            <h3 class="text-3xl font-black text-emerald-600 mt-1">892</h3>
                            <div class="w-full bg-slate-100 h-1.5 rounded-full mt-4">
                                <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>

                        <div class="bg-blue-600 p-6 rounded-[2rem] shadow-xl shadow-blue-200">
                            <p class="text-blue-100 text-sm font-medium">Kepuasan Publik</p>
                            <h3 class="text-3xl font-black text-white mt-1">98.2%</h3>
                            <p class="text-blue-200 text-[10px] mt-2 italic font-medium">Berdasarkan data survey sistem
                            </p>
                        </div>
                    </div>

                    <!-- Secondary Section -->
                    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 lg:gap-8">
                        <!-- Chart Placeholder / Insight -->
                        <div class="lg:col-span-2 bg-white rounded-[2rem] border border-slate-100 p-8 shadow-sm">
                            <div class="flex justify-between items-center mb-8">
                                <div>
                                    <h3 class="font-bold text-lg text-slate-900">Grafik Laporan Bulanan</h3>
                                    <p class="text-xs text-slate-400">Data real-time diseluruh dinas</p>
                                </div>
                                <select
                                    class="bg-slate-50 border-none text-xs font-bold rounded-lg px-3 py-2 outline-none">
                                    <option>Tahun 2024</option>
                                    <option>Tahun 2023</option>
                                </select>
                            </div>
                            <!-- Placeholder Chart -->
                            <div
                                class="h-64 w-full bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200 flex items-center justify-center">
                                <div class="text-center">
                                    <i data-lucide="bar-chart-big" class="w-12 h-12 text-slate-300 mx-auto mb-2"></i>
                                    <p class="text-slate-400 text-sm">Visualisasi Grafik Disini</p>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div class="bg-white rounded-[2rem] border border-slate-100 p-8 shadow-sm">
                            <h3 class="font-bold text-lg text-slate-900 mb-6">Aktivitas Terbaru</h3>
                            <div class="space-y-6">
                                <div class="flex gap-4">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 shrink-0"></div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800">Laporan Masuk: Infrastruktur</p>
                                        <p class="text-xs text-slate-400">2 Menit yang lalu • Pangkalpinang</p>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="w-2 h-2 bg-emerald-500 rounded-full mt-2 shrink-0"></div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800">Verifikasi Selesai</p>
                                        <p class="text-xs text-slate-400">15 Menit yang lalu • Belitung</p>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="w-2 h-2 bg-amber-500 rounded-full mt-2 shrink-0"></div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800">Update Status: Maintenance</p>
                                        <p class="text-xs text-slate-400">1 Jam yang lalu • Diskominfo</p>
                                    </div>
                                </div>
                            </div>
                            <button
                                class="w-full mt-10 py-3 rounded-xl border border-slate-100 text-slate-500 text-xs font-bold hover:bg-slate-50 transition">Lihat
                                Log Aktivitas</button>
                        </div>
                    </div>
                </div>

            </main>
    </div>





</body>
<!-- Logout Confirmation Modal -->
<div id="logoutModal" class="fixed inset-0 z-[100] hidden overflow-y-auto">
    <!-- Overlay Backdrop -->
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center">
        <div
            class="relative transform overflow-hidden rounded-[2rem] bg-white p-8 text-left shadow-2xl transition-all w-full max-w-md border border-slate-100">
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
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        const overlay = document.getElementById("sidebarOverlay");

        sidebar.classList.toggle("-translate-x-full");
        overlay.classList.toggle("hidden");
    }

    lucide.createIcons();
</script>


</html>
