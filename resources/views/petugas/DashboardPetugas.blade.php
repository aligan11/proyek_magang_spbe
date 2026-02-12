<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Sistem Informasi Instansi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Tambahkan Lucide Icons untuk icon yang clean -->

    <!-- Development version -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <!-- Production version -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-slate-50 font-sans antialiased text-slate-900">

    <div class="min-h-screen flex flex-col">
        <!-- Modern Navbar -->
        <nav class="bg-[#1e293b] border-b border-slate-700 shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-600 rounded-lg">
                            <i data-lucide="shield-check" class="text-white w-6 h-6"></i>
                        </div>
                        <div>
                            <span class="text-white font-bold text-lg tracking-tight uppercase">Portal Petugas</span>
                            <p class="text-slate-400 text-[10px] leading-3 uppercase tracking-widest">Sistem Informasi
                                Terpadu</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-6">
                        <div class="hidden md:block text-right border-r border-slate-700 pr-6">
                            <p class="text-slate-200 text-sm font-semibold">{{ $dataPetugas->name }}</p>
                            <p class="text-slate-400 text-xs uppercase">
                                {{ $dataPetugas->jabatan ?? 'Petugas Lapangan' }}</p>
                        </div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all shadow-lg shadow-red-900/20">
                                <i data-lucide="log-out" class="w-4 h-4"></i>
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
            <!-- Header Welcome -->
            <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">Dashboard Utama</h1>
                    <p class="text-slate-500 text-sm">Monitor data laporan dan status tugas harian Anda.</p>
                </div>
                <div
                    class="px-4 py-2 bg-white border border-slate-200 rounded-full text-slate-600 text-xs font-medium shadow-sm flex items-center gap-2">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    Sesi Aktif: {{ now()->translatedFormat('d F Y') }}
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-10">
                <div
                    class="stat-card bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-center gap-4">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-xl">
                        <i data-lucide="file-text" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">Total Laporan</p>
                        <h3 class="text-2xl font-bold text-slate-800">{{ $dataPetugas->laporans_count ?? 0 }}</h3>
                    </div>
                </div>

                <div
                    class="stat-card bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-center gap-4">
                    <div class="p-3 bg-amber-100 text-amber-600 rounded-xl">
                        <i data-lucide="clock-3" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">Menunggu</p>
                        <h3 class="text-2xl font-bold text-slate-800">12</h3>
                    </div>
                </div>

                <div
                    class="stat-card bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-center gap-4">
                    <div class="p-3 bg-emerald-100 text-emerald-600 rounded-xl">
                        <i data-lucide="check-circle-2" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider">Selesai</p>
                        <h3 class="text-2xl font-bold text-slate-800">128</h3>
                    </div>
                </div>


            </div>

            <!-- Profile & Table Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- User Detail Card -->
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

                <!-- Main Data Table -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                        <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-white">
                            <h3 class="font-bold text-slate-800">Daftar Laporan Terbaru</h3>
                            <button class="text-blue-600 text-xs font-semibold hover:underline">Lihat Semua</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead
                                    class="bg-slate-50 text-slate-500 text-[10px] uppercase tracking-wider font-semibold">
                                    <tr>
                                        <th class="px-6 py-4">ID Laporan</th>
                                        <th class="px-6 py-4">Subjek</th>
                                        <th class="px-6 py-4">Status</th>
                                        <th class="px-6 py-4 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-sm">
                                    <!-- Contoh baris data -->
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <td class="px-6 py-4 font-mono text-xs">#LP-9921</td>
                                        <td class="px-6 py-4 text-slate-700 font-medium">Perbaikan Infrastruktur Jalan
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="px-2 py-1 bg-amber-50 text-amber-600 rounded text-[10px] font-bold uppercase">Proses</span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <button
                                                class="p-2 hover:bg-slate-100 rounded-lg text-slate-400 hover:text-blue-600 transition-colors">
                                                <i data-lucide="eye" class="w-4 h-4"></i>
                                            </button>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <!-- Tombol Tindak Lanjut -->
                                            <a href="#"
                                                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-xs font-bold transition-all shadow-md shadow-blue-200 group">
                                                Tindak Lanjut
                                                <i data-lucide="chevron-right"
                                                    class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                                            </a>
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



    <style>
        .stat-card {
            transition: all 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px -10px rgba(0, 0, 0, 0.08);
        }
    </style>
    <script>
        // Inisialisasi icon lucide
        lucide.createIcons();
    </script>
</body>

</html>
