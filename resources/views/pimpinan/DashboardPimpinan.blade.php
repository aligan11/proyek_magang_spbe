@extends('pimpinan.layout.AppPimpinan')
@section('dashboard')
    <div class="p-4 sm:p-6 lg:p-8">

        <!-- Welcome Header -->
        <div class="mb-10">
            <h1 class="text-3xl font-extrabold text-slate-900">Halo, Pak {{ $firstname }} </h1>
            <p class="text-slate-500 mt-1">Berikut adalah pantauan progres laporan hari ini,
                {{ now()->translatedFormat('d F Y') }}.</p>
        </div>

        <!-- Strategic Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">
            <div class="bg-white p-6 rounded-4xl shadow-sm border border-slate-100 relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-slate-400 text-sm font-medium">Total Masuk</p>
                    <h3 class="text-3xl font-black text-slate-900 mt-1">
                        {{ $dataPetugas->laporans_count ?? '1,284' }}</h3>
                    <span class="text-emerald-500 text-xs font-bold flex items-center gap-1 mt-2">
                        <i data-lucide="trending-up" class="w-3 h-3"></i> +12% dari kemarin
                    </span>
                </div>
                <i data-lucide="inbox" class="absolute -bottom-2 -right-2 w-24 h-24 text-slate-50 opacity-10"></i>
            </div>

            <div class="bg-white p-6 rounded-4xl shadow-sm border border-slate-100">
                <p class="text-slate-400 text-sm font-medium">Proses Verifikasi</p>
                <h3 class="text-3xl font-black text-amber-500 mt-1">42</h3>
                <div class="w-full bg-slate-100 h-1.5 rounded-full mt-4">
                    <div class="bg-amber-400 h-1.5 rounded-full" style="width: 40%"></div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-4xl shadow-sm border border-slate-100">
                <p class="text-slate-400 text-sm font-medium">Selesai (Success)</p>
                <h3 class="text-3xl font-black text-emerald-600 mt-1">892</h3>
                <div class="w-full bg-slate-100 h-1.5 rounded-full mt-4">
                    <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 85%"></div>
                </div>
            </div>

            <div class="bg-blue-600 p-6 rounded-4xl shadow-xl shadow-blue-200">
                <p class="text-blue-100 text-sm font-medium">Kepuasan Publik</p>
                <h3 class="text-3xl font-black text-white mt-1">98.2%</h3>
                <p class="text-blue-200 text-[10px] mt-2 italic font-medium">Berdasarkan data survey sistem
                </p>
            </div>
        </div>

        <!-- Secondary Section -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 lg:gap-8">
            <!-- Chart Placeholder / Insight -->
            <div class="lg:col-span-2 bg-white rounded-4xl border border-slate-100 p-8 shadow-sm">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="font-bold text-lg text-slate-900">Grafik Laporan Bulanan</h3>
                        <p class="text-xs text-slate-400">Data real-time diseluruh dinas</p>
                    </div>
                    <select class="bg-slate-50 border-none text-xs font-bold rounded-lg px-3 py-2 outline-none">
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
            <div class="bg-white rounded-4xl border border-slate-100 p-8 shadow-sm">
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
@endsection
