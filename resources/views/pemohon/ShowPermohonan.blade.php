@extends('pemohon.layout.AppPemohon')

@section('content')
    <div :class="sidebarOpen ? 'md:ml-72' : 'md:ml-24'"
        class="transition-all duration-300 min-h-screen py-8 px-4 sm:px-6 lg:px-8" x-data="{ showDetail: false }"
        x-init="setTimeout(() => showDetail = true, 50)">

        <div class="max-w-6xl mx-auto" x-show="showDetail" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">

            <!-- Header & Action Section -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
                <div class="flex items-center space-x-4">
                    <!-- Tombol Toggle Sidebar (Responsif) -->
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="p-3 bg-white border border-slate-200 rounded-2xl text-slate-600 hover:text-blue-600 shadow-sm transition-all active:scale-90 flex-shrink-0">
                        <!-- Icon Hamburger (jika tutup) -->
                        <svg x-show="!sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                        <!-- Icon Close/Arrow (jika buka) -->
                        <svg x-show="sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </button>

                    <div>
                        <div class="flex flex-wrap items-center gap-3 mb-2">
                            <a href="{{ route('pemohon.index') }}"
                                class="p-2 text-slate-400 hover:text-blue-600 transition-all active:scale-90">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </a>
                            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Detail <span
                                    class="text-blue-600">Permohonan</span></h1>
                        </div>
                        <p class="text-slate-500 font-medium text-sm sm:text-base">
                            No. Registrasi: <span
                                class="font-mono font-bold text-blue-600 underline decoration-blue-200 underline-offset-4">{{ $detail->noreg }}</span>
                        </p>
                    </div>
                </div>

                <!-- Status & Print (Responsive grid/flex) -->
                <div class="flex items-center space-x-3 w-full md:w-auto">
                    @php
                        // Pastikan status dipaksa menjadi integer untuk mencocokkan konstanta
                        $statusValue = (int) ($detail->status_ver ?? $detail->status);

                        $statusStyles =
                            [
                                1 => 'bg-amber-500 shadow-amber-200', // PENDING
                                3 => 'bg-blue-500 shadow-blue-200', // PROSES
                                2 => 'bg-emerald-500 shadow-emerald-200', // SELESAI
                            ][$statusValue] ?? 'bg-slate-500 shadow-slate-200';

                        // Label fallback jika status_label dari controller kosong
                        $displayLabel =
                            $detail->status_label ??
                            match ($statusValue) {
                                2 => 'Selesai',
                                3 => 'Proses',
                                default => 'Pending',
                            };
                    @endphp

                    <div
                        class="{{ $statusStyles }} flex-1 md:flex-none text-white px-6 py-3 rounded-2xl shadow-xl flex items-center justify-center space-x-2">
                        <span class="relative flex h-2 w-2">
                            {{-- Efek ping hanya untuk status yang belum selesai (Pending/Proses) --}}
                            @if ($statusValue != 2)
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                            @endif
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
                        </span>
                        <span class="font-bold text-sm uppercase tracking-wider">{{ $displayLabel }}</span>
                    </div>

                    <a href="{{ route('pemohon.download.pdf', $detail->id) }}"
                        class="p-3 bg-white border border-slate-200 rounded-2xl text-slate-600 hover:text-rose-600 shadow-sm transition-all active:scale-95 group flex items-center gap-2">
                        <i data-lucide="file-text" class="w-5 h-5 group-hover:animate-bounce"></i>
                        <span class="hidden sm:inline font-bold text-xs uppercase tracking-widest">Cetak PDF</span>
                    </a>
                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Kolom Kiri: Informasi Utama -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Card: Detail Layanan -->
                    <div
                        class="bg-white rounded-[2rem] sm:rounded-[2.5rem] shadow-xl shadow-slate-200/40 border border-slate-100 overflow-hidden">
                        <div class="p-6 sm:p-8 text-left">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4">
                                <div class="flex items-center space-x-4">
                                    <div class="bg-blue-50 p-3 rounded-2xl text-blue-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <h2 class="text-lg sm:text-xl font-black text-slate-800 tracking-tight uppercase">
                                        Informasi Kebutuhan</h2>
                                </div>
                                <span
                                    class="w-fit bg-slate-100 text-slate-500 px-4 py-1 rounded-xl text-xs font-bold uppercase tracking-wider">Tahun
                                    {{ $detail->tahunanggaran }}</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="space-y-1">
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em]">Jenis
                                        Layanan</p>
                                    <p class="text-base sm:text-lg font-bold text-slate-700 leading-tight">
                                        {{ $detail->id_jenis_layanan }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em]">Nama
                                        Kebutuhan</p>
                                    <p class="text-base sm:text-lg font-bold text-slate-700 leading-tight">
                                        {{ $detail->nama_kebutuhan }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em]">Periode /
                                        Waktu</p>
                                    <p class="text-base sm:text-lg font-bold text-slate-700 leading-tight">
                                        {{ $detail->periode }}</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em]">Tipe
                                        Pemohon</p>
                                    <span
                                        class="inline-flex px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-xs font-bold">{{ $detail->is_eksternal ? 'EKSTERNAL' : 'INTERNAL' }}</span>
                                </div>
                                <div class="md:col-span-2 p-5 bg-slate-50 rounded-[1.5rem] border border-slate-100">
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] mb-2">
                                        Keterangan</p>
                                    <p class="text-slate-600 font-medium leading-relaxed italic text-sm sm:text-base">
                                        "{{ $detail->ket ?? 'Tidak ada deskripsi tambahan' }}"</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card: Instansi -->
                    <div
                        class="bg-white rounded-[2rem] sm:rounded-[2.5rem] shadow-xl shadow-slate-200/40 border border-slate-100 overflow-hidden transition-all group">
                        <div
                            class="p-6 sm:p-8 flex flex-col sm:flex-row items-start space-y-4 sm:space-y-0 sm:space-x-6 text-left">
                            <div
                                class="bg-indigo-50 p-5 rounded-2xl text-indigo-600 group-hover:scale-105 transition-transform duration-500 shadow-inner">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] mb-1">Unit Kerja
                                    & Lokasi</p>
                                <h3 class="text-xl sm:text-2xl font-black text-slate-800 leading-tight">
                                    {{ $detail->nama_instansi }}</h3>
                                <p class="text-slate-500 font-bold mt-1 text-sm sm:text-base">{{ $detail->unitkerja }}</p>
                                <div class="flex items-center mt-4 text-rose-500 space-x-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-xs sm:text-sm font-bold tracking-tight">{{ $detail->lokasi }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Sidebar & Meta -->
                <div class="space-y-8">
                    <!-- Penanggung Jawab -->
                    <div
                        class="bg-slate-900 rounded-[2.5rem] p-6 sm:p-8 text-left text-white shadow-2xl shadow-slate-900/20 relative overflow-hidden group">
                        <div
                            class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full blur-3xl group-hover:bg-white/10 transition-colors">
                        </div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-6 relative z-10">
                            Penanggung Jawab</p>
                        <div class="flex items-center space-x-4 mb-8 relative z-10">
                            <div
                                class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-blue-600 flex items-center justify-center text-xl sm:text-2xl font-black shadow-lg border-2 border-blue-400">
                                {{ strtoupper(substr($detail->nama_penanggungjawab, 0, 1)) }}
                            </div>
                            <div>
                                <h4 class="text-lg sm:text-xl font-bold tracking-tight">
                                    {{ $detail->nama_penanggungjawab }}</h4>
                                <p class="text-blue-400 text-[11px] font-bold font-mono tracking-tighter">NIP.
                                    {{ $detail->nip_penanggungjawab }}</p>
                            </div>
                        </div>
                        <div class="space-y-4 font-medium text-xs sm:text-sm relative z-10">
                            <div class="flex justify-between items-start text-slate-400 border-b border-white/10 pb-4">
                                <span class="flex-shrink-0">Jabatan</span>
                                <span
                                    class="text-white text-right ml-4 leading-tight">{{ $detail->jabatan_penanggungjawab }}</span>
                            </div>
                            <div class="flex justify-between items-center text-slate-400 border-b border-white/10 pb-4">
                                <span>WhatsApp</span>
                                <a href="https://wa.me{{ $detail->nohp_penanggungjawab }}"
                                    class="text-blue-400 font-black">{{ $detail->nohp_penanggungjawab }}</a>
                            </div>
                            <div class="flex justify-between items-center text-slate-400">
                                <span>Email</span>
                                <span
                                    class="text-white truncate ml-4 w-32 sm:w-auto text-right">{{ $detail->email_penanggungjawab }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Berkas Dokumen -->
                    <div
                        class="bg-white rounded-[2.5rem] p-6 sm:p-8 shadow-xl shadow-slate-200/40 border border-slate-100 text-left">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6">Lampiran Berkas</p>
                        @if ($detail->berkas)
                            <a href="{{ asset('storage/doc/' . $detail->berkas) }}" target="_blank"
                                class="group flex items-center p-4 bg-slate-50 border border-slate-200 rounded-3xl hover:border-blue-600 hover:bg-blue-50 transition-all duration-300">
                                <div
                                    class="w-10 h-10 sm:w-12 sm:h-12 bg-white rounded-2xl shadow-sm flex items-center justify-center text-xl group-hover:scale-105 transition-transform">
                                    📄</div>
                                <div class="ml-4 overflow-hidden">
                                    <p class="text-xs font-black text-slate-700 truncate uppercase tracking-tighter">
                                        {{ basename($detail->berkas) }}</p>
                                    <p class="text-[10px] text-blue-600 font-bold uppercase mt-0.5">Buka Dokumen</p>
                                </div>
                            </a>
                        @else
                            <div class="text-center py-6 border-2 border-dashed border-slate-100 rounded-3xl">
                                <p class="text-[10px] font-black text-slate-300 italic uppercase">Berkas Kosong</p>
                            </div>
                        @endif

                        <div class="mt-8 pt-6 border-t border-slate-50 space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-[9px] font-black text-slate-400 uppercase">Operator</span>
                                <span class="text-[11px] font-bold text-slate-700">{{ $detail->inputby }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-[9px] font-black text-slate-400 uppercase">Input Pada</span>
                                <span
                                    class="text-[11px] font-bold text-slate-700 font-mono">{{ $detail->tglinput->format('d/m/y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
