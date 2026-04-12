@extends('pemohon.layout.AppPemohon')

@section('content')
    <div :class="sidebarOpen ? 'md:ml-72' : 'md:ml-24'"
        class="transition-all duration-300 min-h-screen py-8 px-4 sm:px-6 lg:px-8" x-data="{ search: '' }">

        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">
                        Riwayat <span class="text-blue-600">Permohonan</span>
                    </h1>
                    <p class="text-slate-500 mt-1">Pantau status pengajuan layanan SPBE Anda secara real-time.</p>
                </div>
                <a href="{{ route('pemohon.layanan') }}"
                    class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-lg shadow-blue-200 transition-all active:scale-95 space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Buat Permohonan Baru</span>
                </a>
            </div>

            <!-- Statistik Ringkas -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 flex items-center space-x-4">
                    <div class="bg-blue-100 p-3 rounded-2xl text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Total Pengajuan</p>
                        <p class="text-2xl font-bold text-slate-800">{{ $permohonan->count() }}</p>
                    </div>
                </div>
                <!-- Tambahkan statistik lain jika perlu -->
            </div>

            <!-- Filter & Search -->
            <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden mb-6">
                <div class="p-4 flex flex-col md:flex-row gap-4">
                    <div class="relative flex-1">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </span>
                        <input type="text" placeholder="Cari No. Registrasi atau Nama Kebutuhan..."
                            class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all">
                    </div>
                </div>

                <!-- Table Section -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-y border-slate-100">
                                <th class="px-6 py-4 text-[11px] font-black text-slate-400 uppercase tracking-widest">No.
                                    Registrasi</th>
                                <th class="px-6 py-4 text-[11px] font-black text-slate-400 uppercase tracking-widest">
                                    Informasi Layanan</th>
                                <th
                                    class="px-6 py-4 text-[11px] font-black text-slate-400 uppercase tracking-widest text-center">
                                    Tanggal</th>
                                <th
                                    class="px-6 py-4 text-[11px] font-black text-slate-400 uppercase tracking-widest text-center">
                                    Status</th>
                                <th
                                    class="px-6 py-4 text-[11px] font-black text-slate-400 uppercase tracking-widest text-right">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($permohonan as $item)
                                <tr class="hover:bg-blue-50/30 transition-colors group">
                                    <td class="px-6 py-5">
                                        <span
                                            class="font-mono text-sm font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-lg border border-blue-100">
                                            {{ $item->noreg }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="font-bold text-slate-800">{{ $item->nama_kebutuhan }}</div>
                                        <div class="text-xs text-slate-400 mt-1">
                                            {{ $item->jenis_layanan->nama_jenis_layanan ?? '-' }}</div>
                                    </td>
                                    <td class="px-6 py-5 text-center">
                                        <div class="text-sm font-medium text-slate-600">
                                            {{ $item->tgl_permohonan->format('d M Y') }}</div>
                                        <div class="text-[10px] text-slate-400">{{ $item->tgl_permohonan->format('H:i') }}
                                            WIB</div>
                                    </td>
                                    <td class="px-6 py-5 text-center">
                                        @if ($item->status == 1)
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-600 border border-amber-200">
                                                <span
                                                    class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-2 animate-pulse"></span>
                                                Menunggu
                                            </span>
                                        @elseif($item->status == 2)
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-600 border border-blue-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span> Diproses
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-600 border border-green-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-2"></span> Selesai
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-5 text-right">
                                        <div
                                            class="flex justify-end space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <a href="#"
                                                class="p-2 bg-white border border-slate-200 rounded-xl text-slate-500 hover:text-blue-600 hover:border-blue-200 shadow-sm transition-all"
                                                title="Detail">
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
                                    <td colspan="5" class="px-6 py-20 text-center">
                                        <div class="max-w-xs mx-auto">
                                            <div
                                                class="bg-slate-50 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                                <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                                    </path>
                                                </svg>
                                            </div>
                                            <h3 class="text-slate-800 font-bold">Belum Ada Data</h3>
                                            <p class="text-slate-500 text-sm mt-1">Anda belum pernah mengirimkan permohonan
                                                layanan.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($permohonan->hasPages())
                    <div class="p-6 border-t border-slate-100">
                        {{ $permohonan->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
