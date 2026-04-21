@extends('pimpinan.layout.AppPimpinan')

@section('dashboard')
    <div class="p-4 sm:p-6 lg:p-8">
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

        <div class="mb-6 flex justify-end">
            <a href="{{ route('pimpinan.download.pdf', $ticket->id) }}" class="bg-white border border-slate-200 text-slate-600 px-6 py-3 rounded-2xl text-xs font-bold flex items-center gap-2 hover:bg-slate-50 transition shadow-sm group">
                <i data-lucide="printer" class="w-4 h-4 text-rose-500 group-hover:scale-125 transition-transform"></i>
                Cetak Dokumen Permohonan
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white rounded-4xl border border-slate-100 p-8 shadow-sm">
                    <div class="flex flex-wrap justify-between items-start gap-4 mb-8">
                        <div>
                            <span
                                class="px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-[10px] font-bold uppercase tracking-wider">
                                {{ $ticket->jenis_layanan->namajenis }}
                            </span>
                            <h2 class="text-2xl font-black text-slate-900 mt-2">{{ $ticket->nama_kebutuhan }}</h2>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] text-slate-400 font-bold uppercase">Tanggal Masuk</p>
                            <p class="text-sm font-bold text-slate-700">
                                {{ \Carbon\Carbon::parse($ticket->created_at)->translatedFormat('d F Y, H:i') }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest flex items-center gap-2">
                                <i data-lucide="align-left" class="w-4 h-4"></i> Deskripsi Masalah
                            </h4>
                            <p
                                class="text-slate-600 leading-relaxed text-sm bg-slate-50 p-4 rounded-3xl border border-slate-100">
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
                    <div class="mt-8 pt-8 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                            <i data-lucide="paperclip" class="w-4 h-4"></i> Lampiran Berkas
                        </h4>

                        @if ($ticket->berkas)
                            {{-- Pastikan nama field di DB tetap 'foto' atau ganti sesuai kolomnya --}}
                            <div
                                class="flex items-center justify-between p-4 bg-slate-50 border border-slate-200 rounded-3xl group hover:border-blue-300 hover:bg-blue-50 transition-all duration-300">
                                <div class="flex items-center gap-4">
                                    {{-- Icon Berkas --}}
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

                                {{-- Tombol Download/Buka --}}
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

            <div class="space-y-6">
                <div class="bg-white rounded-4xl border border-slate-100 p-8 shadow-sm">
                    <h3 class="font-bold text-lg text-slate-900 mb-6">Status Tiket</h3>

                    <div class="flex items-center gap-4 mb-8">
                        @if ($status == 1)
                            {{-- Status: Menunggu (Pending) --}}
                            <div
                                class="w-12 h-12 bg-amber-100 rounded-2xl flex items-center justify-center animate-pulse shadow-sm shadow-amber-100">
                                <i data-lucide="clock" class="w-6 h-6 text-amber-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-black text-amber-600 uppercase tracking-tight">Menunggu</p>
                                <p class="text-[10px] text-slate-400 font-medium">BUTUH MANDAT SEGERA</p>
                            </div>
                        @else
                            {{-- Status: Selesai (Success) --}}
                            <div
                                class="w-12 h-12 bg-emerald-100 rounded-2xl flex items-center justify-center shadow-sm shadow-emerald-100">
                                <i data-lucide="check-circle-2" class="w-6 h-6 text-emerald-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-black text-emerald-600 uppercase tracking-tight">Selesai</p>
                                <p class="text-[10px] text-slate-400 font-medium">TERVERIFIKASI SISTEM</p>
                            </div>
                        @endif
                    </div>

                    @if ($status == 1)
                        <div class="space-y-3">
                            <a href="{{ route('pimpinan.mandat', $ticket->noreg) }}"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-2xl font-bold text-sm transition flex items-center justify-center gap-2 shadow-lg shadow-blue-100">
                                <i data-lucide="send" class="w-4 h-4"></i>
                                Berikan Mandat
                            </a>
                            <button
                                class="w-full bg-slate-50 hover:bg-slate-100 text-slate-600 p-4 rounded-2xl font-bold text-sm transition">
                                Cetak Detail
                            </button>
                        </div>
                    @else
                        <div class="space-y-3">
                            <a href="{{ route('mandate.show', $ticket->id) }}"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-2xl font-bold text-sm transition flex items-center justify-center gap-2 shadow-lg shadow-blue-100">
                                <i data-lucide="send" class="w-4 h-4"></i>
                                Cek Mandat
                            </a>
                            <button
                                class="w-full bg-slate-50 hover:bg-slate-100 text-slate-600 p-4 rounded-2xl font-bold text-sm transition">
                                Cetak Detail
                            </button>
                        </div>
                    @endif

                </div>
                @if ($status == 1)
                    <div class="bg-slate-900 rounded-4xl p-8 text-white relative overflow-hidden">
                        <div class="relative z-10">
                            <h4 class="text-emerald-400 text-[10px] font-black uppercase tracking-[0.2em] mb-4">Quick Log
                            </h4>
                            <div class="space-y-4">
                                <div class="flex gap-3">
                                    <div class="w-1 h-10 bg-emerald-500 rounded-full"></div>
                                    <div>
                                        <p class="text-xs font-bold italic">"Tiket telah diverifikasi sistem dan siap
                                            ditugaskan."</p>
                                        <p class="text-[9px] text-slate-400 mt-1">Sistem Otomatis • 12:40</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <i data-lucide="activity" class="absolute -bottom-4 -right-4 w-24 h-24 text-white opacity-5"></i>
                    </div>
                @else
                @endif

            </div>
        </div>
    </div>
@endsection
