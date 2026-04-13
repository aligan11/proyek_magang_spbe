@extends('pemohon.layout.AppPemohon')

@section('content')
    <div :class="sidebarOpen ? 'md:ml-72' : 'md:ml-24'"
        class="transition-all duration-300 min-h-screen py-8 px-4 sm:px-6 lg:px-8" x-data="{
            search: '',
            @if (session('success')) showSuccess: true
            @else
                showSuccess: false @endif
        }">

        <div class="max-w-6xl mx-auto">
            <!-- Toast Success -->
            <template x-if="showSuccess">
                <div x-init="setTimeout(() => showSuccess = false, 3000)"
                    class="fixed top-5 right-5 z-[99] bg-emerald-500 text-white px-6 py-4 rounded-2xl shadow-2xl shadow-emerald-200 flex items-center space-x-3"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0 opacity-100"
                    x-transition:leave-end="translate-x-full opacity-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="font-bold text-sm">{{ session('success') }}</span>
                </div>
            </template>

            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight sm:text-4xl">
                        Riwayat <span class="text-blue-600">Permohonan</span>
                    </h1>
                    <p class="text-slate-500 mt-2 font-medium">Pantau status dan detail pengajuan layanan SPBE Anda.</p>
                </div>
                <a href="{{ route('pemohon.layanan') }}"
                    class="group inline-flex items-center justify-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-xl shadow-blue-200 transition-all active:scale-95 space-x-3">
                    <div class="bg-white/20 p-1 rounded-lg group-hover:rotate-90 transition-transform duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <span>Buat Permohonan</span>
                </a>
            </div>

            <!-- Statistik Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
                <div
                    class="bg-white p-7 rounded-[2.5rem] shadow-sm border border-slate-100 flex items-center space-x-5 transition-all hover:shadow-md">
                    <div class="bg-blue-50 p-4 rounded-2xl text-blue-600">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">Total</p>
                        <p class="text-3xl font-black text-slate-800 tracking-tight">{{ $permohonan->total() }}</p>
                    </div>
                </div>
                <!-- Tambahkan filter status (Menunggu/Proses/Selesai) di sini jika perlu -->
            </div>

            <!-- Main Table Card -->
            <div
                class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/40 border border-slate-100 overflow-hidden transition-all">
                <!-- Search Bar -->
                <div class="p-6 border-b border-slate-50 bg-slate-50/30">
                    <form action="{{ route('pemohon.index') }}" method="GET" class="relative group">
                        <span
                            class="absolute inset-y-0 left-0 pl-5 flex items-center text-slate-400 group-focus-within:text-blue-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </span>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari berdasarkan No. Registrasi atau Judul Kebutuhan..."
                            class="w-full pl-14 pr-6 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-medium text-slate-700">
                    </form>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">
                                    Registrasi</th>
                                <th class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">
                                    Kebutuhan & Layanan</th>
                                <th
                                    class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">
                                    Waktu</th>
                                <th
                                    class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">
                                    Status</th>
                                <th
                                    class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($permohonan as $item)
                                <tr class="hover:bg-slate-50/80 transition-all group">
                                    <td class="px-8 py-6">
                                        <div
                                            class="font-mono text-sm font-bold text-blue-600 bg-blue-50/50 px-4 py-1.5 rounded-xl border border-blue-100 inline-block shadow-sm">
                                            {{ $item->noreg }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div
                                            class="font-bold text-slate-800 text-lg group-hover:text-blue-600 transition-colors">
                                            {{ $item->nama_kebutuhan }}</div>
                                        <div class="flex items-center mt-1.5 space-x-2 text-slate-400">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                </path>
                                            </svg>
                                            <span
                                                class="text-xs font-semibold">{{ $item->jenis_layanan->namajenis ?? '-' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-center">
                                        <div class="text-sm font-bold text-slate-700">
                                            {{ $item->tgl_permohonan->translatedFormat('d M Y') }}</div>
                                        <div class="text-[11px] font-bold text-slate-400 mt-1 uppercase">
                                            {{ $item->tgl_permohonan->format('H:i') }} WIB</div>
                                    </td>
                                    <td class="px-8 py-6 text-center">
                                        @if ($item->status == 1)
                                            <div
                                                class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest bg-amber-50 text-amber-600 border border-amber-100 shadow-sm">
                                                <span class="w-2 h-2 rounded-full bg-amber-500 mr-2 animate-pulse"></span>
                                                Menunggu
                                            </div>
                                        @elseif($item->status == 2)
                                            <div
                                                class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest bg-blue-50 text-blue-600 border border-blue-100 shadow-sm">
                                                <span class="w-2 h-2 rounded-full bg-blue-500 mr-2"></span> Diproses
                                            </div>
                                        @else
                                            <div
                                                class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest bg-emerald-50 text-emerald-600 border border-emerald-100 shadow-sm">
                                                <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2"></span> Selesai
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-8 py-6 text-right">
                                        <div class="flex justify-end space-x-2">
                                            <a class="p-3 bg-white border border-slate-200 rounded-xl text-slate-400 hover:text-blue-600 hover:border-blue-200 hover:shadow-lg transition-all active:scale-90"
                                                title="Detail Permohonan">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-32 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="bg-slate-50 p-10 rounded-full mb-6 text-slate-200">
                                                <svg class="w-20 h-20" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                                    </path>
                                                </svg>
                                            </div>
                                            <h3 class="text-2xl font-bold text-slate-800">Tidak ada data ditemukan</h3>
                                            <p class="text-slate-400 mt-2 max-w-xs mx-auto font-medium">Belum ada riwayat
                                                permohonan yang sesuai dengan kriteria Anda.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($permohonan->hasPages())
                    <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
                        {{ $permohonan->appends(request()->input())->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
