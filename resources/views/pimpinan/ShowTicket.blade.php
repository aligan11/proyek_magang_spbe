@extends('pimpinan.layout.AppPimpinan')

@section('dashboard')
    <div class="p-4 sm:p-6 lg:p-8">
        <!-- Header Navigasi -->
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('indexMandat', 1) }}"
                class="p-3 bg-white border border-slate-100 rounded-2xl shadow-sm hover:bg-slate-50 transition">
                <i data-lucide="arrow-left" class="w-5 h-5 text-slate-600"></i>
            </a>
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900">Detail Request</h1>
                <p class="text-xs text-slate-500 font-medium uppercase tracking-widest">Informasi Lengkap Tiket
                    #{{ $ticket->noreg }}</p>
            </div>
        </div>

        <!-- Tombol Cetak -->
        <div class="mb-6 flex justify-end">
            <a href="{{ route('pimpinan.download.pdf', $ticket->id) }}"
                class="bg-white border border-slate-200 text-slate-600 px-6 py-3 rounded-2xl text-xs font-bold flex items-center gap-2 hover:bg-slate-50 transition shadow-sm group">
                <i data-lucide="printer" class="w-4 h-4 text-rose-500 group-hover:scale-125 transition-transform"></i>
                Cetak Dokumen Permohonan
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Kolom Kiri: Detail Utama -->
            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white rounded-4xl border border-slate-100 p-8 shadow-sm">
                    <!-- Header Kartu -->
                    <div class="flex flex-wrap justify-between items-start gap-4 mb-8">
                        <div>
                            <span
                                class="px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-[10px] font-bold uppercase tracking-wider">
                                {{ $ticket->jenis_layanan->namajenis ?? 'Layanan SPBE' }}
                            </span>
                            <h2 class="text-2xl font-black text-slate-900 mt-2">{{ $ticket->nama_kebutuhan }}</h2>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] text-slate-400 font-bold uppercase">Tanggal Masuk</p>
                            <p class="text-sm font-bold text-slate-700">
                                {{ \Carbon\Carbon::parse($ticket->created_at)->translatedFormat('d F Y, H:i') }}</p>
                        </div>
                    </div>

                    <!-- Grid Info: Deskripsi & Pemohon -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest flex items-center gap-2">
                                <i data-lucide="align-left" class="w-4 h-4"></i> Deskripsi Masalah
                            </h4>
                            <p
                                class="text-slate-600 leading-relaxed text-sm bg-slate-50 p-4 rounded-3xl border border-slate-100 min-h-[120px]">
                                {{ $ticket->ket ?? 'Tidak ada deskripsi tambahan.' }}
                            </p>
                        </div>

                        <div class="space-y-4">
                            <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest flex items-center gap-2">
                                <i data-lucide="user" class="w-4 h-4"></i> Informasi Pemohon
                            </h4>
                            <div class="bg-slate-50 p-4 rounded-3xl border border-slate-100 space-y-3">
                                <div>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase">Nama Lengkap</p>
                                    <p class="text-sm font-bold text-slate-800">{{ $ticket->nama_pemohon }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase">OPD / Instansi</p>
                                    <p class="text-sm font-bold text-slate-800">{{ $ticket->nama_instansi ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase">Kontak</p>
                                    <p class="text-sm font-bold text-slate-800">{{ $ticket->nohp_penanggungjawab ?? '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bagian Informasi Mandat dari Pimpinan -->
                    <div class="mt-10 pt-8 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-6 flex items-center gap-2">
                            <i data-lucide="shield-check" class="w-4 h-4 text-indigo-500"></i> Instruksi Mandat Pimpinan
                        </h4>

                        <div class="space-y-4">
                            @forelse ($mandat as $mandate)
                                <div
                                    class="relative overflow-hidden bg-gradient-to-br from-indigo-50/50 to-white border border-indigo-100 rounded-[2.5rem] p-6 shadow-sm">
                                    <!-- Dekorasi Background -->
                                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-indigo-500/5 rounded-full blur-2xl">
                                    </div>

                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-10 h-10 bg-indigo-500 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-200">
                                                    <i data-lucide="message-square" class="w-5 h-5 text-white"></i>
                                                </div>
                                                <div>
                                                    <p
                                                        class="text-[10px] text-slate-400 font-black uppercase tracking-tighter">
                                                        Instruksi Tugas</p>
                                                    <p class="text-xs font-bold text-indigo-600">Diterbitkan pada
                                                        {{ $mandate->created_at->format('d/m/Y') }}</p>
                                                </div>
                                            </div>
                                            <!-- Status Verifikasi dari Mandat -->
                                            <span
                                                class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest border {{ $mandate->ticket?->status_ver == 2 ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-amber-50 text-amber-600 border-amber-100' }}">
                                                {{ $mandate->ticket?->status_ver == 2 ? 'Selesai' : 'Dalam Proses' }}
                                            </span>
                                        </div>

                                        <!-- Deskripsi Mandat -->
                                        <div
                                            class="bg-white/60 border border-white p-5 rounded-3xl text-slate-700 leading-relaxed text-sm italic shadow-inner">
                                            "{{ $mandate->keterangan }}"
                                        </div>

                                        <!-- List Petugas yang ditunjuk -->
                                        <div class="mt-5 flex flex-wrap items-center gap-2">
                                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mr-2">
                                                Petugas Pelaksana:
                                            </p>



                                            @foreach ($daftarPetugas as $petugas)
                                                <div
                                                    class="flex items-center gap-2 px-3 py-1.5 bg-white border border-slate-100 rounded-xl shadow-sm animate-in fade-in zoom-in duration-300">
                                                    <div
                                                        class="w-5 h-5 bg-indigo-100 rounded-lg flex items-center justify-center">
                                                        <i data-lucide="user" class="w-3 h-3 text-indigo-600"></i>
                                                    </div>
                                                    <span class="text-[11px] font-bold text-slate-600">
                                                        {{ $petugas->name }}
                                                    </span>
                                                </div>
                                            @endforeach

                                            @if ($daftarPetugas->isEmpty())
                                                <span class="text-[10px] italic text-slate-400 font-medium">Belum ada
                                                    petugas ditunjuk</span>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @empty
                                <div class="p-8 border-2 border-dashed border-slate-100 rounded-[2.5rem] text-center">
                                    <div
                                        class="w-16 h-16 bg-slate-50 rounded-3xl flex items-center justify-center mx-auto mb-4">
                                        <i data-lucide="clipboard-x" class="w-8 h-8 text-slate-300"></i>
                                    </div>
                                    <p class="text-sm font-bold text-slate-400">Belum ada mandat pimpinan yang diterbitkan
                                        untuk tiket ini.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>


                    <!-- CARD BARU: Rincian Kebutuhan SPBE (Berdasarkan json_decode di Controller) -->
                    <div class="mt-10">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                            <i data-lucide="layers" class="w-4 h-4 text-emerald-500"></i> Rincian Kebutuhan SPBE
                        </h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @forelse ($listKebutuhan as $kebutuhan)
                                <div
                                    class="flex items-center gap-3 p-4 bg-slate-50 border border-slate-100 rounded-3xl group hover:border-emerald-200 hover:bg-emerald-50/30 transition-all duration-300">
                                    <div
                                        class="w-8 h-8 bg-white rounded-xl flex items-center justify-center shadow-sm border border-slate-100 group-hover:bg-emerald-500 transition-colors">
                                        <i data-lucide="check"
                                            class="w-4 h-4 text-emerald-500 group-hover:text-white transition-colors"></i>
                                    </div>
                                    <span
                                        class="text-sm font-bold text-slate-700 tracking-tight group-hover:text-emerald-700">{{ $kebutuhan->nama_kebutuhan }}</span>
                                </div>
                            @empty
                                <div
                                    class="col-span-full p-6 bg-slate-50 rounded-3xl border border-dashed border-slate-200 text-center">
                                    <i data-lucide="alert-circle" class="w-8 h-8 text-slate-300 mx-auto mb-2"></i>
                                    <p class="text-xs text-slate-400 font-medium italic">Tidak ada item kebutuhan spesifik
                                        yang dipilih.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Bagian Lampiran Berkas -->
                    <div class="mt-10 pt-8 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                            <i data-lucide="paperclip" class="w-4 h-4"></i> Lampiran Berkas
                        </h4>

                        @if ($ticket->berkas)
                            <div
                                class="flex items-center justify-between p-4 bg-slate-50 border border-slate-200 rounded-3xl group hover:border-blue-300 hover:bg-blue-50 transition-all duration-300">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-slate-100 group-hover:scale-110 transition-transform">
                                        <i data-lucide="file-text" class="w-6 h-6 text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900 leading-none">Lihat Lampiran Dokumen</p>
                                        <p class="text-[10px] text-slate-400 mt-1 uppercase font-semibold">Format: PDF /
                                            Dokumen</p>
                                    </div>
                                </div>

                                <a href="{{ asset('storage/doc/' . $ticket->berkas) }}" target="_blank"
                                    class="bg-white hover:bg-blue-600 hover:text-white text-slate-600 px-4 py-2 rounded-xl text-xs font-bold shadow-sm border border-slate-100 transition-all flex items-center gap-2">
                                    <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                                    Buka Berkas
                                </a>
                            </div>
                        @else
                            <div class="p-6 bg-slate-50 rounded-3xl border border-dashed border-slate-200 text-center">
                                <i data-lucide="file-x" class="w-8 h-8 text-slate-200 mx-auto mb-2"></i>
                                <p class="text-xs text-slate-400 font-medium">Tidak ada lampiran berkas</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Status & Kontrol -->
            <div class="space-y-6">
                <div class="bg-white rounded-4xl border border-slate-100 p-8 shadow-sm">
                    <h3 class="font-black text-xs text-slate-400 uppercase tracking-[0.2em] mb-8">Status Verifikasi</h3>

                    <div class="flex flex-col items-center text-center">
                        @if ($status == 1)
                            {{-- Tampilan untuk Status PENDING --}}
                            <div class="relative mb-6">
                                <div
                                    class="w-24 h-24 bg-amber-50 rounded-[2.5rem] flex items-center justify-center border border-amber-100">
                                    <i data-lucide="clock" class="w-10 h-10 text-amber-500 animate-pulse"></i>
                                </div>
                                <div
                                    class="absolute -bottom-2 -right-2 w-8 h-8 bg-amber-500 rounded-xl border-4 border-white flex items-center justify-center">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full animate-ping"></span>
                                </div>
                            </div>
                            <h4 class="text-xl font-black text-slate-900 tracking-tight">Menunggu Mandat</h4>
                            <p class="text-xs text-slate-400 font-medium mt-2 mb-8 leading-relaxed px-4">
                                Tiket ini belum didelegasikan ke petugas verifikasi lapangan.
                            </p>

                            <a href="{{ route('pimpinan.mandat', $ticket->noreg) }}"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white p-5 rounded-[2rem] font-black text-xs uppercase tracking-[0.2em] transition-all flex items-center justify-center gap-3 shadow-xl shadow-blue-200 hover:scale-[1.02] active:scale-95 group">
                                <i data-lucide="send" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                                Berikan Mandat
                            </a>
                        @else
                            {{-- Tampilan untuk Status SELESAI --}}
                            <div class="relative mb-6">
                                <div
                                    class="w-24 h-24 bg-emerald-50 rounded-[2.5rem] flex items-center justify-center border border-emerald-100">
                                    <i data-lucide="shield-check" class="w-10 h-10 text-emerald-500"></i>
                                </div>
                                <div
                                    class="absolute -bottom-2 -right-2 w-8 h-8 bg-emerald-500 rounded-xl border-4 border-white flex items-center justify-center">
                                    <i data-lucide="check" class="w-4 h-4 text-white"></i>
                                </div>
                            </div>
                            <h4 class="text-xl font-black text-slate-900 tracking-tight">Tugas Selesai</h4>
                            <p class="text-xs text-emerald-600 font-bold mt-2 mb-8 bg-emerald-50 px-4 py-2 rounded-xl">
                                TERVERIFIKASI SISTEM
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Quick Log / Activity Stream -->
                <div class="bg-slate-900 rounded-4xl p-8 text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <div class="flex items-center gap-2 mb-6">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                            <h4 class="text-emerald-400 text-[10px] font-black uppercase tracking-[0.2em]">Sistem Activity
                            </h4>
                        </div>

                        <div class="space-y-6">
                            <div class="flex gap-4">
                                <div class="flex flex-col items-center">
                                    <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                                    <div class="w-0.5 h-12 bg-slate-700 mt-1"></div>
                                </div>
                                <div>
                                    <p class="text-[11px] font-bold text-slate-200 italic leading-relaxed">
                                        "Menunggu instruksi pimpinan untuk proses verifikasi."
                                    </p>
                                    <p class="text-[9px] text-slate-500 mt-2 uppercase tracking-widest font-black">
                                        {{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Watermark Icon -->
                    <i data-lucide="activity"
                        class="absolute -bottom-6 -right-6 w-32 h-32 text-white opacity-[0.03] rotate-12"></i>
                </div>
            </div>

        </div>
    </div>
@endsection
