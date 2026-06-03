@extends('pimpinan.layout.AppPimpinan')

@section('dashboard')
    <div class="max-w-4xl mx-auto">
        <!-- Header Navigasi -->
        <div class="flex items-center justify-between mb-6">
            <a href="{{ route('showTicket', $mandate->ticket->noreg) }}"
                class="flex items-center gap-2 text-slate-400 hover:text-slate-600 transition-colors group">
                <i data-lucide="arrow-left" class="w-5 h-5 group-hover:-translate-x-1 transition-transform"></i>
                <span class="text-sm font-bold uppercase tracking-widest">Kembali</span>
            </a>
            <div class="flex gap-2">
                <span
                    class="px-4 py-1.5 rounded-full {{ $mandate->status == 'pending' ? 'bg-amber-50 text-amber-600 border-amber-100 animate-pulse' : 'bg-emerald-50 text-emerald-600 border-emerald-100' }} border text-[10px] font-black uppercase tracking-widest">
                    Status: {{ $mandate->status }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Kolom Kiri: Info Utama -->
            <div class="md:col-span-2 space-y-6">
                <!-- Card 1: Detail Mandat -->
                <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-slate-100 relative overflow-hidden">
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center">
                                <i data-lucide="file-text" class="w-6 h-6 text-blue-600"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-black text-slate-800 tracking-tight">Instruksi Mandat</h2>
                                <p class="text-[11px] text-slate-400 font-bold uppercase tracking-wider">Dibuat pada
                                    {{ $mandate->created_at->format('d M Y • H:i') }}</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Isi Instruksi /
                                Deskripsi</label>
                            <div class="bg-slate-50 p-6 rounded-3xl border border-slate-100">
                                <p class="text-slate-700 leading-relaxed italic text-lg">
                                    "{{ $mandate->deskripsi }}"
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Dekorasi -->
                    <i data-lucide="quote" class="absolute -top-4 -right-4 w-32 h-32 text-slate-50 opacity-50"></i>
                </div>
            </div>

            <!-- Kolom Kanan: Info Tiket & Petugas -->
            <div class="space-y-6">
                <!-- Card 2: Info Tiket -->
                <div class="bg-white rounded-[2.5rem] p-6 shadow-sm border border-slate-100">
                    <h4 class="text-xs font-black text-slate-800 uppercase tracking-widest mb-4 flex items-center gap-2">
                        <i data-lucide="ticket" class="w-4 h-4 text-emerald-500"></i> Terkait Tiket
                    </h4>
                    <div class="space-y-3">
                        <div class="p-4 bg-emerald-50 rounded-2xl border border-emerald-100">
                            <p class="text-[10px] text-emerald-600 font-black uppercase">Nomor Registrasi</p>
                            <p class="text-xl font-black text-emerald-900 mt-1">#{{ $mandate->ticket->noreg ?? 'N/A' }}</p>
                        </div>
                        <div class="px-4 py-2">
                            <p class="text-[10px] text-slate-400 font-bold uppercase">Nama Permohonan</p>
                            <p class="text-sm font-bold text-slate-700 mt-0.5">
                                {{ $mandate->ticket->nama_permohonan ?? 'Layanan SPBE' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Daftar Petugas -->
                <div class="bg-white rounded-[2.5rem] p-6 shadow-sm border border-slate-100">
                    <h4 class="text-xs font-black text-slate-800 uppercase tracking-widest mb-4 flex items-center gap-2">
                        <i data-lucide="users" class="w-4 h-4 text-blue-500"></i> Petugas Pelaksana
                    </h4>
                    <div class="space-y-3">
                        @foreach ($mandate->mandate_users as $petugas)
                            <div class="flex items-center gap-3 p-2 hover:bg-slate-50 rounded-2xl transition-colors group">
                                <div
                                    class="w-10 h-10 bg-slate-900 rounded-xl flex items-center justify-center text-white text-xs font-black group-hover:scale-110 transition-transform">
                                    {{ strtoupper(substr($petugas->name, 0, 2)) }}
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-800">{{ $petugas->name }}</p>
                                    <p class="text-[9px] text-slate-400 font-medium uppercase tracking-tighter">
                                        {{ $petugas->no_hp ?? 'No no_hp' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
