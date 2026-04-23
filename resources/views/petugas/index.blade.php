@extends('petugas.layout.app')

@section('content')
    <!-- Welcome Header -->
    <div class="mb-10">
        <h1 class="text-4xl font-black text-slate-900 tracking-tighter leading-none">Selamat Datang,
            {{ explode(' ', $user->name)[0] }}! 👋</h1>
        <p class="text-slate-500 font-medium mt-2">Berikut adalah ringkasan performa dan mandat tugas Anda hari ini.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <!-- Total Tasks -->
        <div
            class="glass p-8 rounded-[2.5rem] relative overflow-hidden group hover:shadow-2xl hover:shadow-blue-200/50 transition-all duration-500">
            <div
                class="absolute -right-6 -bottom-6 w-32 h-32 bg-blue-500/5 rounded-full group-hover:scale-150 transition-transform duration-700">
            </div>
            <div class="relative z-10">
                <div class="p-4 bg-blue-50 text-blue-600 rounded-2xl w-fit mb-6 shadow-inner">
                    <i data-lucide="briefcase" class="w-6 h-6"></i>
                </div>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Total Mandat</p>
                <h3 class="text-5xl font-black text-slate-800 tracking-tighter mt-1">{{ $stats['total'] }}</h3>
                <p class="text-blue-500 text-[10px] font-bold mt-4 flex items-center gap-1">
                    <i data-lucide="trending-up" class="w-3 h-3"></i> Terakumulasi dalam sistem
                </p>
            </div>
        </div>

        <!-- Pending Tasks -->
        <div
            class="glass p-8 rounded-[2.5rem] relative overflow-hidden group hover:shadow-2xl hover:shadow-amber-200/50 transition-all duration-500">
            <div
                class="absolute -right-6 -bottom-6 w-32 h-32 bg-amber-500/5 rounded-full group-hover:scale-150 transition-transform duration-700">
            </div>
            <div class="relative z-10">
                <div class="p-4 bg-amber-50 text-amber-600 rounded-2xl w-fit mb-6 shadow-inner">
                    <i data-lucide="clock" class="w-6 h-6"></i>
                </div>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Perlu Diproses</p>
                <h3 class="text-5xl font-black text-slate-800 tracking-tighter mt-1">{{ $stats['pending'] }}</h3>
                <div class="w-full bg-slate-100 h-1.5 rounded-full mt-6 overflow-hidden">
                    @php $perc = $stats['total'] > 0 ? ($stats['pending'] / $stats['total']) * 100 : 0; @endphp
                    <div class="bg-amber-400 h-full rounded-full" style="width: {{ $perc }}%"></div>
                </div>
            </div>
        </div>

        <!-- Completed Tasks -->
        <div
            class="glass p-8 rounded-[2.5rem] relative overflow-hidden group hover:shadow-2xl hover:shadow-emerald-200/50 transition-all duration-500">
            <div
                class="absolute -right-6 -bottom-6 w-32 h-32 bg-emerald-500/5 rounded-full group-hover:scale-150 transition-transform duration-700">
            </div>
            <div class="relative z-10">
                <div class="p-4 bg-emerald-50 text-emerald-600 rounded-2xl w-fit mb-6 shadow-inner">
                    <i data-lucide="check-circle-2" class="w-6 h-6"></i>
                </div>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Selesai Diverifikasi</p>
                <h3 class="text-5xl font-black text-slate-800 tracking-tighter mt-1">{{ $stats['selesai'] }}</h3>
                <div class="w-full bg-slate-100 h-1.5 rounded-full mt-6 overflow-hidden">
                    @php $percS = $stats['total'] > 0 ? ($stats['selesai'] / $stats['total']) * 100 : 0; @endphp
                    <div class="bg-emerald-500 h-full rounded-full" style="width: {{ $percS }}%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Mandates Section -->
    <div class="glass rounded-[3rem] p-10 overflow-hidden border border-white/40 shadow-2xl shadow-slate-200/40">
        <div class="flex items-center justify-between mb-10">
            <div class="flex items-center gap-4">
                <div class="w-1.5 h-8 bg-blue-600 rounded-full"></div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase">Mandat Terbaru</h2>
            </div>
            <a href="{{ route('petugas.tugas') }}"
                class="px-6 py-3 bg-slate-50 text-slate-500 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all duration-300">Lihat
                Semua</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-separate border-spacing-y-4">
                <thead>
                    <tr class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em]">
                        <th class="px-6 py-4">ID Registrasi</th>
                        <th class="px-6 py-4">Pemohon</th>
                        <th class="px-6 py-4">Kebutuhan Layanan</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestTasks as $mandate)
                        <tr class="group transition-all duration-300">
                            <td
                                class="px-6 py-6 bg-white/60 group-hover:bg-white rounded-l-[2rem] border-y border-l border-slate-100/50">
                                <span
                                    class="font-mono text-[10px] font-bold text-blue-600 bg-blue-50 px-4 py-2 rounded-xl border border-blue-100 shadow-sm">#{{ $mandate->ticket->noreg }}</span>
                            </td>
                            <td class="px-6 py-6 bg-white/60 group-hover:bg-white border-y border-slate-100/50">
                                <p class="text-sm font-extrabold text-slate-800 leading-none">
                                    {{ $mandate->ticket->nama_pemohon }}</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-2">
                                    {{ $mandate->ticket->nama_instansi }}</p>
                            </td>
                            <td class="px-6 py-6 bg-white/60 group-hover:bg-white border-y border-slate-100/50">
                                <p class="text-sm font-bold text-slate-700 line-clamp-1">
                                    {{ $mandate->ticket->nama_kebutuhan }}</p>
                                <span
                                    class="text-[10px] font-bold text-blue-400 uppercase tracking-tighter">{{ $mandate->ticket->jenis_layanan->namajenis ?? 'Layanan Umum' }}</span>
                            </td>
                            <td class="px-6 py-6 bg-white/60 group-hover:bg-white border-y border-slate-100/50 text-center">
                                @php
                                    $stColor = match ($mandate->status) {
                                        'pending' => 'text-amber-600 bg-amber-50 border-amber-100',
                                        'selesai' => 'text-emerald-600 bg-emerald-50 border-emerald-100',
                                        default => 'text-slate-500 bg-slate-50',
                                    };
                                    $stLabel = ucfirst($mandate->status);
                                @endphp
                                <span
                                    class="px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest border {{ $stColor }}">
                                    {{ $stLabel }}
                                </span>
                            </td>
                            <td
                                class="px-6 py-6 bg-white/60 group-hover:bg-white rounded-r-[2rem] border-y border-r border-slate-100/50 text-right">
                                <a href="{{ route('petugas.show', $mandate->id) }}"
                                    class="p-3 bg-white border border-slate-100 text-slate-400 rounded-xl hover:bg-blue-600 hover:text-white hover:border-blue-600 shadow-sm transition-all inline-block">
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-20 text-center">
                                <div class="flex flex-col items-center gap-4">
                                    <div
                                        class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center text-slate-200">
                                        <i data-lucide="inbox" class="w-12 h-12"></i>
                                    </div>
                                    <p class="text-slate-400 font-bold italic">Belum ada mandat tugas yang ditugaskan kepada
                                        Anda.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
