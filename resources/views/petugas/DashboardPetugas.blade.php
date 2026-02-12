<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Portal Petugas Lapangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com');

        body {
            font-family: 'Inter', sans-serif;
        }

        .hover-card:hover {
            transform: translateY(-4px);
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-slate-50 antialiased">

    <div class="min-h-screen flex flex-col">
        <!-- Modern Navbar -->
        <nav class="bg-[#1e293b] border-b border-slate-700 shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-600 rounded-xl shadow-inner">
                            <i data-lucide="shield-check" class="text-white w-6 h-6"></i>
                        </div>
                        <div class="hidden sm:block">
                            <span class="text-white font-bold text-lg tracking-tight uppercase">Portal Petugas</span>
                            <p class="text-slate-400 text-[10px] leading-3 uppercase tracking-widest">Diskominfo Babel
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="hidden md:block text-right border-r border-slate-700 pr-4">
                            <p class="text-slate-100 text-sm font-bold">{{ $dataPetugas->name }}</p>
                            <p class="text-blue-400 text-[10px] font-bold uppercase tracking-tighter">
                                {{ $dataPetugas->jabatan ?? 'Petugas Lapangan' }}</p>
                        </div>

                        <button onclick="toggleLogoutModal()"
                            class="flex items-center gap-2 bg-red-500/10 hover:bg-red-600 text-red-500 hover:text-white px-4 py-2 rounded-xl text-sm font-bold transition-all border border-red-500/20">
                            <i data-lucide="power" class="w-4 h-4"></i>
                            <span class="hidden sm:inline">Keluar</span>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
            <!-- Header Welcome -->
            <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-black text-slate-800 tracking-tight">Dashboard Kerja</h1>
                    <p class="text-slate-500 text-sm font-medium">Pantau dan kelola laporan tugas lapangan secara
                        real-time.</p>
                </div>
                <button
                    class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-blue-200 transition-all active:scale-95">
                    <i data-lucide="plus-circle" class="w-5 h-5"></i>
                    Buat Laporan Baru
                </button>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div
                    class="hover-card bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 flex items-center gap-5">
                    <div class="p-4 bg-blue-50 text-blue-600 rounded-2xl">
                        <i data-lucide="file-text" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Total Tugas</p>
                        <h3 class="text-2xl font-black text-slate-800">{{ $dataPetugas->laporans_count ?? 0 }}</h3>
                    </div>
                </div>

                <div
                    class="hover-card bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 flex items-center gap-5">
                    <div class="p-4 bg-amber-50 text-amber-600 rounded-2xl">
                        <i data-lucide="clock" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Menunggu</p>
                        <h3 class="text-2xl font-black text-slate-800">12</h3>
                    </div>
                </div>

                <div
                    class="hover-card bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 flex items-center gap-5">
                    <div class="p-4 bg-emerald-50 text-emerald-600 rounded-2xl">
                        <i data-lucide="check-circle" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Selesai</p>
                        <h3 class="text-2xl font-black text-slate-800">128</h3>
                    </div>
                </div>

                <div class="hover-card bg-[#1e293b] p-6 rounded-[2rem] shadow-xl flex items-center gap-5">
                    <div class="p-4 bg-white/10 text-white rounded-2xl">
                        <i data-lucide="calendar" class="w-6 h-6"></i>
                    </div>
                    <div class="text-white">
                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Hari Ini</p>
                        <h3 class="text-sm font-bold">{{ now()->translatedFormat('d F Y') }}</h3>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Mini Profile -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                        <div class="h-20 bg-[#1e293b]"></div>
                        <div class="px-6 pb-6">
                            <div class="relative flex justify-center">
                                <div
                                    class="absolute -top-12 bg-white p-1 rounded-full border-4 border-slate-50 shadow-md">
                                    <div
                                        class="w-20 h-20 bg-slate-200 rounded-full flex items-center justify-center text-slate-400">
                                        <i data-lucide="user" class="w-10 h-10"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10 text-center">
                                <h4 class="text-lg font-bold text-slate-800">{{ $dataPetugas->name }}</h4>
                                <span
                                    class="text-xs bg-slate-100 text-slate-600 px-3 py-1 rounded-full font-medium">NIP:
                                    {{ $dataPetugas->nip ?? '-' }}</span>
                            </div>
                            <div class="mt-6 space-y-4 border-t border-slate-100 pt-6 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-slate-400">Unit Kerja</span>
                                    <span class="text-slate-700 font-medium">{{ $dataPetugas->unitKerja ?? '-' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-400">Wilayah</span>
                                    <span class="text-slate-700 font-medium">{{ $dataPetugas->daerah ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest Reports Table -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 overflow-hidden">
                        <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center">
                            <h3 class="font-black text-slate-800 text-lg uppercase tracking-tight">Laporan Terkini</h3>
                            <a href="#"
                                class="text-blue-600 text-xs font-bold hover:bg-blue-50 px-4 py-2 rounded-xl transition">LIHAT
                                SEMUA</a>
                        </div>
                        <div class="overflow-x-auto px-4 pb-4">
                            <table class="w-full text-left border-separate border-spacing-y-3">
                                <thead>
                                    <tr class="text-slate-400 text-[10px] font-black uppercase tracking-widest">
                                        <th class="px-4 pb-2">ID Laporan</th>
                                        <th class="px-4 pb-2">Topik / Masalah</th>
                                        <th class="px-4 pb-2 text-center">Status</th>
                                        <th class="px-4 pb-2 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-slate-50/50 hover:bg-slate-100/50 transition-colors">
                                        <td class="px-4 py-4 rounded-l-2xl text-xs font-bold text-blue-600">#LP-0921
                                        </td>
                                        <td class="px-4 py-4">
                                            <p class="text-sm font-bold text-slate-800">Gangguan Jaringan FO</p>
                                            <p class="text-[10px] text-slate-400 font-medium">Kantor Gubernur Babel</p>
                                        </td>
                                        <td class="px-4 py-4 text-center">
                                            <span
                                                class="px-3 py-1 bg-amber-100 text-amber-700 text-[10px] font-black rounded-lg">PROSES</span>
                                        </td>
                                        <td class="px-4 py-4 text-right rounded-r-2xl">
                                            <button
                                                class="p-2 hover:bg-white rounded-lg text-slate-400 hover:text-blue-600 transition shadow-sm"><i
                                                    data-lucide="eye" class="w-4 h-4"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Additional Row -->
                                    <tr class="bg-slate-50/50 hover:bg-slate-100/50 transition-colors">
                                        <td class="px-4 py-4 rounded-l-2xl text-xs font-bold text-blue-600">#LP-0920
                                        </td>
                                        <td class="px-4 py-4">
                                            <p class="text-sm font-bold text-slate-800">Instalasi Access Point</p>
                                            <p class="text-[10px] text-slate-400 font-medium">Gedung Diskominfo</p>
                                        </td>
                                        <td class="px-4 py-4 text-center">
                                            <span
                                                class="px-3 py-1 bg-emerald-100 text-emerald-700 text-[10px] font-black rounded-lg">SELESAI</span>
                                        </td>
                                        <td class="px-4 py-4 text-right rounded-r-2xl">
                                            <button
                                                class="p-2 hover:bg-white rounded-lg text-slate-400 hover:text-blue-600 transition shadow-sm"><i
                                                    data-lucide="eye" class="w-4 h-4"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Logout -->
    <div id="logoutModal" class="fixed inset-0 z-[100] hidden">
        <div class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
        <div class="flex min-h-full items-center justify-center p-4">
            <div
                class="relative bg-white rounded-[2rem] p-8 max-w-sm w-full text-center shadow-2xl border border-slate-100">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-red-50 mb-4">
                    <i data-lucide="alert-triangle" class="text-red-600 w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-black text-slate-800">Sudah Selesai Kerja?</h3>
                <p class="text-slate-500 text-sm mt-2 font-medium">Pastikan semua laporan tugas hari ini sudah Anda
                    submit sebelum keluar.</p>
                <div class="mt-8 flex gap-3">
                    <button onclick="toggleLogoutModal()"
                        class="flex-1 px-4 py-3 rounded-xl bg-slate-100 text-slate-600 font-bold text-sm hover:bg-slate-200 transition">Batal</button>
                    <form action="{{ route('logout') }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit"
                            class="w-full px-4 py-3 rounded-xl bg-red-600 text-white font-bold text-sm shadow-lg shadow-red-200 hover:bg-red-700 transition">Ya,
                            Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();

        function toggleLogoutModal() {
            const modal = document.getElementById('logoutModal');
            modal.classList.toggle('hidden');
        }
    </script>
</body>

</html>
