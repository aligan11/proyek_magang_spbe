@extends('petugas.layout.app')

@section('content')
    <!-- Page Header -->
    <div class="mb-10">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tight uppercase">Daftar Mandat</h1>
                <p class="text-slate-500 font-medium mt-3">Seluruh daftar tugas verifikasi lapangan yang menjadi tanggung
                    jawab Anda.</p>
            </div>

            <div class="flex items-center gap-4">
                <div class="px-6 py-4 glass-card rounded-2xl flex items-center gap-4">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total:
                        {{ $tasks->total() }}</span>
                    <div class="w-px h-6 bg-slate-200"></div>
                    <div class="flex gap-2">
                        <span class="w-3 h-3 bg-amber-400 rounded-full shadow-lg shadow-amber-400/30" title="Pending"></span>
                        <span class="w-3 h-3 bg-emerald-500 rounded-full shadow-lg shadow-emerald-500/30"
                            title="Selesai"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Info -->
    <div class="glass rounded-[2rem] p-6 mb-8 flex flex-wrap items-center gap-4 border border-white/50">
        <div class="flex items-center gap-3">
            <i data-lucide="filter" class="w-5 h-5 text-blue-500"></i>
            <span class="text-sm font-bold text-slate-700">Ringkasan Status:</span>
        </div>
        <div class="flex gap-2 flex-wrap">
            <!-- Status Pending (Logic: Angka 1 atau NULL) -->
            <span
                class="status-pending px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                Pending ({{ $stats['pending'] }})
            </span>

            <!-- Status Selesai (Logic: Angka 2) -->
            <span
                class="status-selesai px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                Selesai ({{ $stats['selesai'] }})
            </span>

            <!-- Total Mandat -->
            <span
                class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest bg-slate-100 text-slate-500 border border-slate-200 flex items-center gap-2">
                <i data-lucide="layers" class="w-3 h-3"></i>
                Total ({{ $stats['total'] }})
            </span>
        </div>
    </div>


    <!-- Table Container -->
    <div class="glass rounded-[3rem] p-8 md:p-10 border border-white/50 shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-separate border-spacing-y-3">
                <thead>
                    <tr class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em]">
                        <th class="px-6 py-4">No. Registrasi</th>
                        <th class="px-6 py-4">Informasi Pemohon</th>
                        <th class="px-6 py-4">Kebutuhan & Tanggal</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $mandate)
                        <tr class="group transition-all duration-300 hover:shadow-xl hover:shadow-blue-500/10 rounded-2xl">
                            <td
                                class="px-6 py-8 bg-white/60 group-hover:bg-white rounded-l-[2.5rem] border-y border-l border-slate-100/50">
                                <span
                                    class="font-mono text-[10px] font-bold text-blue-600 bg-blue-50 px-5 py-2.5 rounded-xl border border-blue-100 shadow-inner">
                                    {{ $mandate->ticket->noreg ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-8 bg-white/60 group-hover:bg-white border-y border-slate-100/50">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold uppercase text-sm shadow-lg">
                                        {{ substr($mandate->ticket->nama_pemohon ?? 'U', 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-extrabold text-slate-800 leading-none">
                                            {{ $mandate->ticket->nama_pemohon ?? '-' }}
                                        </p>
                                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-2">
                                            {{ $mandate->ticket->nama_instansi ?? '-' }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-8 bg-white/60 group-hover:bg-white border-y border-slate-100/50">
                                <p class="text-sm font-bold text-slate-700 line-clamp-1 mb-2">
                                    {{ $mandate->ticket->nama_kebutuhan ?? ($mandate->ticket->kebutuhan->kebutuhan ?? 'Layanan Umum') }}
                                </p>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="calendar" class="w-3 h-3 text-slate-300"></i>
                                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">
                                        {{ $mandate->ticket->tgl_permohonan ? $mandate->ticket->tgl_permohonan->format('d M Y') : '-' }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-8 bg-white/60 group-hover:bg-white border-y border-slate-100/50 text-center">
                                @php
                                    // Mengambil status_ver dari tabel layanan_spbe melalui relasi ticket
                                    $statusVer = $mandate->ticket->status_ver;
                                @endphp

                                @if ($statusVer == 2)
                                    {{-- Status SELESAI (2) --}}
                                    <span
                                        class="status-selesai px-5 py-2.5 rounded-2xl text-[10px] font-black uppercase tracking-[0.1em] shadow-sm inline-flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Selesai
                                    </span>
                                @elseif($statusVer == 3)
                                    {{-- Status PROSES (3) --}}
                                    <span
                                        class="px-5 py-2.5 rounded-2xl text-[10px] font-black uppercase tracking-[0.1em] bg-blue-50 text-blue-600 border border-blue-100 shadow-sm inline-flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                                        Proses
                                    </span>
                                @else
                                    {{-- Status PENDING (1 atau NULL) --}}
                                    <span
                                        class="status-pending px-5 py-2.5 rounded-2xl text-[10px] font-black uppercase tracking-[0.1em] shadow-sm inline-flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Pending
                                    </span>
                                @endif
                            </td>

                            <td
                                class="px-6 py-8 bg-white/60 group-hover:bg-white rounded-r-[2.5rem] border-y border-r border-slate-100/50 text-right">
                                <a href="{{ route('petugas.show', $mandate->id) }}"
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:shadow-xl hover:shadow-blue-500/30 transition-all">
                                    <i data-lucide="eye" class="w-4 h-4"></i> Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-24 text-center">
                                <div class="flex flex-col items-center gap-8">
                                    <div
                                        class="w-32 h-32 bg-slate-50 rounded-full flex items-center justify-center text-slate-200 border-4 border-dashed border-slate-100">
                                        <i data-lucide="folder-open" class="w-16 h-16"></i>
                                    </div>
                                    <div class="max-w-md mx-auto">
                                        <h3 class="text-2xl font-black text-slate-700 tracking-tight uppercase">Belum Ada
                                            Mandat</h3>
                                        <p class="text-slate-400 text-sm font-medium mt-3">Daftar tugas Anda masih kosong.
                                            Silakan hubungi admin jika terjadi kesalahan.</p>
                                    </div>
                                    <a href="{{ route('petugas.index') }}"
                                        class="inline-flex items-center gap-2 px-6 py-3 bg-blue-50 text-blue-600 rounded-xl text-sm font-bold hover:bg-blue-600 hover:text-white transition-all">
                                        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Dashboard
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-10 px-4">
            {{ $tasks->withQueryString()->links() }}
        </div>
    </div>
@endsection
