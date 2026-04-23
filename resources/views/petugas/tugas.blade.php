@extends('petugas.layout.app')

@section('content')
    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h1 class="text-4xl font-black text-slate-900 tracking-tighter leading-none uppercase">Daftar Mandat</h1>
            <p class="text-slate-500 font-medium mt-2">Seluruh daftar tugas verifikasi lapangan yang menjadi tanggung jawab
                Anda.</p>
        </div>

        <div class="flex items-center gap-4 bg-white p-2 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Total:
                {{ $tasks->total() }}</span>
            <div class="w-px h-6 bg-slate-200"></div>
            <div class="flex gap-1">
                <span class="w-3 h-3 bg-amber-400 rounded-full" title="Pending"></span>
                <span class="w-3 h-3 bg-blue-500 rounded-full" title="Proses"></span>
                <span class="w-3 h-3 bg-emerald-500 rounded-full" title="Selesai"></span>
            </div>
        </div>
    </div>

    <!-- Table Container -->
    <div class="glass rounded-[3rem] p-8 md:p-10 border border-white/40 shadow-2xl shadow-slate-200/40">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-separate border-spacing-y-4">
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
                        <tr class="group transition-all duration-300">
                            <td
                                class="px-6 py-8 bg-white/60 group-hover:bg-white rounded-l-[2.5rem] border-y border-l border-slate-100/50">
                                <span
                                    class="font-mono text-[10px] font-bold text-blue-600 bg-blue-50 px-4 py-2 rounded-xl shadow-inner border border-blue-100">
                                    {{ $mandate->ticket->noreg }}
                                </span>
                            </td>
                            <td class="px-6 py-8 bg-white/60 group-hover:bg-white border-y border-slate-100/50">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-blue-600/5 flex items-center justify-center text-blue-600 font-bold uppercase text-xs border border-blue-100">
                                        {{ substr($mandate->ticket->nama_pemohon, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-extrabold text-slate-800 leading-none">
                                            {{ $mandate->ticket->nama_pemohon }}</p>
                                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-2">
                                            {{ $mandate->ticket->nama_instansi }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-8 bg-white/60 group-hover:bg-white border-y border-slate-100/50">
                                <p class="text-sm font-bold text-slate-700 line-clamp-1 mb-1">
                                    {{ $mandate->ticket->nama_kebutuhan }}</p>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="calendar" class="w-3 h-3 text-slate-300"></i>
                                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">
                                        {{ $mandate->ticket->tgl_permohonan->format('d M Y') }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-8 bg-white/60 group-hover:bg-white border-y border-slate-100/50 text-center">
                                @php
                                    $stColor = match ($mandate->status) {
                                        'pending' => 'text-amber-600 bg-amber-50 border-amber-100',
                                        'selesai' => 'text-emerald-600 bg-emerald-50 border-emerald-100',
                                        default => 'text-slate-500 bg-slate-50',
                                    };
                                    $stLabel = ucfirst($mandate->status);
                                @endphp
                                <span
                                    class="px-5 py-2 rounded-2xl text-[10px] font-black uppercase tracking-[0.1em] border {{ $stColor }} shadow-sm">
                                    {{ $stLabel }}
                                </span>
                            </td>
                            <td
                                class="px-6 py-8 bg-white/60 group-hover:bg-white rounded-r-[2.5rem] border-y border-r border-slate-100/50 text-right">
                                <a href="{{ route('petugas.show', $mandate->id) }}"
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-700 hover:shadow-xl hover:shadow-blue-200 transition-all active:scale-95">
                                    <i data-lucide="eye" class="w-4 h-4"></i> Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-20 text-center">
                                <div class="flex flex-col items-center gap-6">
                                    <div
                                        class="w-32 h-32 bg-slate-50 rounded-full flex items-center justify-center text-slate-200 border-4 border-dashed border-slate-100">
                                        <i data-lucide="folder-open" class="w-16 h-16"></i>
                                    </div>
                                    <div class="max-w-xs mx-auto">
                                        <h3 class="text-xl font-black text-slate-800 tracking-tight uppercase">Belum Ada
                                            Mandat</h3>
                                        <p class="text-slate-400 text-sm font-medium mt-2">Daftar tugas Anda masih kosong.
                                            Silakan hubungi admin jika terjadi kesalahan.</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-10 px-6">
            {{ $tasks->links() }}
        </div>
    </div>
@endsection
