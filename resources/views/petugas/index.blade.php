    @extends('petugas.layout.app')

    @section('content')
        <!-- Page Header -->
        <div class="mb-8 sm:mb-10">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4 sm:gap-6">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight leading-tight">
                        Selamat Datang, <span class="gradient-text">{{ explode(' ', $user->name)[0] }}</span>! 👋
                    </h1>
                    <p class="text-sm sm:text-base text-slate-500 font-medium mt-3">Berikut ringkasan performa dan mandat
                        tugas
                        terbaru Anda.</p>
                </div>
                <div class="flex items-center gap-3 self-start lg:self-auto">
                    <div class="px-4 sm:px-5 py-3 glass-card rounded-2xl flex items-center gap-3">
                        <i data-lucide="calendar" class="w-5 h-5 text-blue-500"></i>
                        <span
                            class="text-xs sm:text-sm font-semibold text-slate-700">{{ now()->translatedFormat('d M Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-8 mb-10 sm:mb-12">
            <!-- Total Tasks -->
            <div
                class="stat-card glass rounded-[2rem] sm:rounded-[2.5rem] p-6 sm:p-8 relative overflow-hidden border border-white/50">
                <div class="absolute -right-8 -bottom-8 w-40 h-40 bg-blue-500/10 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <div
                        class="p-4 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-2xl w-fit shadow-lg shadow-blue-500/30 mb-6">
                        <i data-lucide="briefcase" class="w-7 h-7"></i>
                    </div>
                    <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Total Mandat</p>
                    <h3 class="text-4xl sm:text-5xl font-black text-slate-800 tracking-tighter mt-2">{{ $stats['total'] }}
                    </h3>
                    <div class="w-full bg-slate-100 h-2 rounded-full mt-6 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full rounded-full" style="width: 100%">
                        </div>
                    </div>
                    <p class="text-blue-500 text-[10px] font-bold mt-4 flex items-center gap-2">
                        <i data-lucide="database" class="w-3 h-3"></i> Terakumulasi dalam sistem
                    </p>
                </div>
            </div>

            <!-- Pending Tasks -->
            <div
                class="stat-card glass rounded-[2rem] sm:rounded-[2.5rem] p-6 sm:p-8 relative overflow-hidden border border-white/50 glow-amber">
                <div class="absolute -right-8 -bottom-8 w-40 h-40 bg-amber-500/10 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <div
                        class="p-4 bg-gradient-to-br from-amber-400 to-amber-500 text-white rounded-2xl w-fit shadow-lg shadow-amber-500/30 mb-6">
                        <i data-lucide="clock" class="w-7 h-7"></i>
                    </div>
                    <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Perlu Diproses</p>
                    <h3 class="text-4xl sm:text-5xl font-black text-slate-800 tracking-tighter mt-2">{{ $stats['pending'] }}
                    </h3>
                    <div class="w-full bg-slate-100 h-2 rounded-full mt-6 overflow-hidden">
                        @php $perc = $stats['total'] > 0 ? ($stats['pending'] / $stats['total']) * 100 : 0; @endphp
                        <div class="bg-gradient-to-r from-amber-400 to-amber-500 h-full rounded-full transition-all duration-500"
                            style="width: {{ $perc }}%"></div>
                    </div>
                    <p class="text-amber-600 text-[10px] font-bold mt-4 flex items-center gap-2">
                        <i data-lucide="alert-circle" class="w-3 h-3"></i> Menunggu verifikasi lapangan
                    </p>
                </div>
            </div>

            <!-- Completed Tasks -->
            <div
                class="stat-card glass rounded-[2rem] sm:rounded-[2.5rem] p-6 sm:p-8 relative overflow-hidden border border-white/50 glow-emerald">
                <div class="absolute -right-8 -bottom-8 w-40 h-40 bg-emerald-500/10 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <div
                        class="p-4 bg-gradient-to-br from-emerald-500 to-emerald-600 text-white rounded-2xl w-fit shadow-lg shadow-emerald-500/30 mb-6">
                        <i data-lucide="check-circle-2" class="w-7 h-7"></i>
                    </div>
                    <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Selesai Diverifikasi</p>
                    <h3 class="text-4xl sm:text-5xl font-black text-slate-800 tracking-tighter mt-2">{{ $stats['selesai'] }}
                    </h3>
                    <div class="w-full bg-slate-100 h-2 rounded-full mt-6 overflow-hidden">
                        @php $percS = $stats['total'] > 0 ? ($stats['selesai'] / $stats['total']) * 100 : 0; @endphp
                        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 h-full rounded-full transition-all duration-500"
                            style="width: {{ $percS }}%"></div>
                    </div>
                    <p class="text-emerald-600 text-[10px] font-bold mt-4 flex items-center gap-2">
                        <i data-lucide="shield-check" class="w-3 h-3"></i> Telah diverifikasi
                    </p>
                </div>
            </div>
        </div>

        <!-- Recent Mandates Section -->
        <div class="glass rounded-[2rem] sm:rounded-[3rem] p-5 sm:p-10 overflow-hidden border border-white/50 shadow-2xl">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6 sm:mb-10">
                <div class="flex items-center gap-4">
                    <div class="w-1.5 h-10 bg-gradient-to-b from-blue-500 to-indigo-600 rounded-full"></div>
                    <h2 class="text-xl sm:text-2xl font-black text-slate-800 tracking-tight uppercase">Mandat Terbaru</h2>
                </div>
                <a href="{{ route('petugas.tugas') }}"
                    class="group w-full sm:w-auto justify-center px-6 py-3 bg-slate-50 text-slate-500 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all duration-300 flex items-center gap-2">
                    Lihat Semua
                    <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <div class="hidden lg:block overflow-x-auto">
                <table class="w-full text-left border-separate border-spacing-y-3">
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
                            <tr
                                class="group transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/10 rounded-2xl">
                                <td
                                    class="px-6 py-6 bg-white/60 group-hover:bg-white rounded-l-[2rem] border-y border-l border-slate-100/50">
                                    <span
                                        class="font-mono text-[10px] font-bold text-blue-600 bg-blue-50 px-5 py-2.5 rounded-xl border border-blue-100 shadow-sm">
                                        #{{ $mandate->ticket->noreg ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="px-6 py-6 bg-white/60 group-hover:bg-white border-y border-slate-100/50">
                                    <p class="text-sm font-extrabold text-slate-800 leading-none">
                                        {{ $mandate->ticket->inputby ?? '-' }}</p>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-2">
                                        {{ $mandate->ticket->nama_instansi ?? '-' }}
                                    </p>
                                </td>
                                <td class="px-6 py-6 bg-white/60 group-hover:bg-white border-y border-slate-100/50">
                                    <p class="text-sm font-bold text-slate-700 line-clamp-1">
                                        {{ $mandate->ticket->nama_kebutuhan ?? ($mandate->ticket->kebutuhan->kebutuhan ?? 'Layanan Umum') }}
                                    </p>
                                    <span class="text-[10px] font-bold text-blue-400 uppercase tracking-tighter">
                                        {{ $mandate->ticket->namajenis ?? 'Layanan Umum' }}
                                    </span>
                                </td>
                                <td
                                    class="px-6 py-6 bg-white/60 group-hover:bg-white border-y border-slate-100/50 text-center">
                                    @php
                                        // Ambil nilai status_ver dari tabel layanan_spbe
                                        $statusVer = $mandate->ticket->status_ver;
                                    @endphp

                                    @if ($statusVer == 2)
                                        {{-- Status SELESAI (Angka 2) --}}
                                        <span
                                            class="status-selesai px-5 py-2 rounded-2xl text-[10px] font-black uppercase tracking-widest inline-flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Selesai
                                        </span>
                                    @elseif($statusVer == 3)
                                        {{-- Status PROSES (Angka 3) --}}
                                        <span
                                            class="px-5 py-2 rounded-2xl text-[10px] font-black uppercase tracking-widest inline-flex items-center gap-2 bg-blue-50 text-blue-600 border border-blue-100">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>
                                            Proses
                                        </span>
                                    @else
                                        {{-- Status PENDING (Angka 1 atau NULL) --}}
                                        <span
                                            class="status-pending px-5 py-2 rounded-2xl text-[10px] font-black uppercase tracking-widest inline-flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                            Pending
                                        </span>
                                    @endif
                                </td>

                                <td
                                    class="px-6 py-6 bg-white/60 group-hover:bg-white rounded-r-[2rem] border-y border-r border-slate-100/50 text-right">
                                    <a href="{{ route('petugas.show', $mandate->id) }}"
                                        class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl text-[10px] font-black uppercase tracking-widest hover:shadow-xl hover:shadow-blue-500/30 transition-all">
                                        <i data-lucide="eye" class="w-4 h-4"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-20 text-center">
                                    <div class="flex flex-col items-center gap-6">
                                        <div
                                            class="w-28 h-28 bg-slate-50 rounded-full flex items-center justify-center text-slate-200 border-4 border-dashed border-slate-100">
                                            <i data-lucide="inbox" class="w-14 h-14"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-black text-slate-700 tracking-tight uppercase">Belum Ada
                                                Mandat</h3>
                                            <p class="text-slate-400 text-sm font-medium mt-2 max-w-sm">Belum ada mandat
                                                tugas
                                                yang ditugaskan kepada Anda saat ini.</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="grid grid-cols-1 gap-4 lg:hidden">
                @forelse($latestTasks as $mandate)
                    <div class="rounded-[2rem] border border-slate-200/70 bg-white/80 p-5 shadow-sm">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Registrasi</p>
                                <p
                                    class="mt-2 inline-flex rounded-xl border border-blue-100 bg-blue-50 px-3 py-2 font-mono text-[11px] font-bold text-blue-600">
                                    #{{ $mandate->ticket->noreg ?? 'N/A' }}
                                </p>
                            </div>
                            <div class="shrink-0">
                                @php $statusVer = $mandate->ticket->status_ver; @endphp
                                @if ($statusVer == 2)
                                    <span
                                        class="status-selesai px-3 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest inline-flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Selesai
                                    </span>
                                @elseif($statusVer == 3)
                                    <span
                                        class="px-3 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest inline-flex items-center gap-2 bg-blue-50 text-blue-600 border border-blue-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span>Proses
                                    </span>
                                @else
                                    <span
                                        class="status-pending px-3 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest inline-flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>Pending
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mt-4 space-y-3">
                            <div>
                                <p class="text-sm font-extrabold text-slate-800">
                                    {{ $mandate->ticket->nama_pemohon ?? '-' }}
                                </p>
                                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400 mt-1">
                                    {{ $mandate->ticket->nama_instansi ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Kebutuhan
                                    Layanan
                                </p>
                                <p class="mt-2 text-sm font-bold text-slate-700">
                                    {{ $mandate->ticket->nama_kebutuhan ?? ($mandate->ticket->kebutuhan->kebutuhan ?? 'Layanan Umum') }}
                                </p>
                                <p class="mt-1 text-[11px] font-bold uppercase tracking-wider text-blue-500">
                                    {{ $mandate->ticket->jenis_layanan->namajenis ?? 'Layanan Umum' }}</p>
                            </div>
                        </div>

                        <a href="{{ route('petugas.show', $mandate->id) }}"
                            class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-blue-500 to-indigo-600 px-5 py-3 text-[10px] font-black uppercase tracking-widest text-white shadow-lg shadow-blue-500/20">
                            <i data-lucide="eye" class="w-4 h-4"></i> Detail
                        </a>
                    </div>
                @empty
                    <div class="rounded-[2rem] border border-dashed border-slate-200 bg-white/70 px-6 py-10 text-center">
                        <div
                            class="mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-full border-4 border-dashed border-slate-100 bg-slate-50 text-slate-200">
                            <i data-lucide="inbox" class="w-10 h-10"></i>
                        </div>
                        <h3 class="text-lg font-black uppercase tracking-tight text-slate-700">Belum Ada Mandat</h3>
                        <p class="mt-2 text-sm font-medium text-slate-400">Belum ada mandat tugas yang ditugaskan kepada
                            Anda
                            saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-8 mt-8 sm:mt-10">
            <a href="{{ route('petugas.tugas') }}"
                class="group glass rounded-[2rem] sm:rounded-[2.5rem] p-6 sm:p-8 flex items-center gap-4 sm:gap-6 hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 border border-white/50">
                <div
                    class="p-4 sm:p-5 bg-blue-50 text-blue-600 rounded-2xl group-hover:scale-110 transition-transform shrink-0">
                    <i data-lucide="clipboard-list" class="w-8 h-8"></i>
                </div>
                <div class="min-w-0">
                    <h4 class="text-base sm:text-lg font-black text-slate-800">Lihat Semua Tugas</h4>
                    <p class="text-slate-400 text-sm font-medium mt-1">Akses daftar lengkap mandat verifikasi Anda</p>
                </div>
                <i data-lucide="arrow-right"
                    class="w-6 h-6 text-slate-300 ml-auto group-hover:translate-x-2 group-hover:text-blue-500 transition-all"></i>
            </a>

            <a href="{{ route('petugas.profile') }}"
                class="group glass rounded-[2rem] sm:rounded-[2.5rem] p-6 sm:p-8 flex items-center gap-4 sm:gap-6 hover:shadow-xl hover:shadow-emerald-500/10 transition-all duration-300 border border-white/50">
                <div
                    class="p-4 sm:p-5 bg-emerald-50 text-emerald-600 rounded-2xl group-hover:scale-110 transition-transform shrink-0">
                    <i data-lucide="user-circle" class="w-8 h-8"></i>
                </div>
                <div class="min-w-0">
                    <h4 class="text-base sm:text-lg font-black text-slate-800">Pengaturan Profil</h4>
                    <p class="text-slate-400 text-sm font-medium mt-1">Perbarui informasi dan password akun Anda</p>
                </div>
                <i data-lucide="arrow-right"
                    class="w-6 h-6 text-slate-300 ml-auto group-hover:translate-x-2 group-hover:text-emerald-500 transition-all"></i>
            </a>
        </div>
    @endsection
