@extends('petugas.layout.app')

@section('content')
    <div class="mb-10 flex items-center gap-6">
        <a href="{{ route('petugas.tugas') }}"
            class="p-4 glass rounded-2xl text-slate-400 hover:text-blue-600 hover:shadow-xl transition-all active:scale-90">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tighter leading-none uppercase">Detail Mandat</h1>
            <p class="text-slate-500 font-medium mt-1">Registrasi: <span
                    class="font-mono font-bold text-blue-600">#{{ $task->noreg }}</span></p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        <!-- Main Info -->
        <div class="lg:col-span-8 space-y-10">
            <!-- Card: Detail Permohonan -->
            <div class="glass rounded-[3rem] p-10 shadow-2xl shadow-slate-200/40 border border-white/40">
                <div class="flex items-center gap-4 mb-10">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                        <i data-lucide="info" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-800 tracking-tight uppercase">Informasi Permohonan</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Jenis
                            Layanan</label>
                        <p
                            class="text-base font-extrabold text-slate-700 bg-slate-50 px-6 py-4 rounded-2xl border border-slate-100">
                            {{ $task->jenis_layanan->namajenis ?? '-' }}
                        </p>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama
                            Kebutuhan</label>
                        <p
                            class="text-base font-extrabold text-slate-700 bg-slate-50 px-6 py-4 rounded-2xl border border-slate-100">
                            {{ $task->nama_kebutuhan }}
                        </p>
                    </div>
                    <div class="space-y-2 md:col-span-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Keterangan /
                            Deskripsi</label>
                        <div
                            class="text-sm font-medium text-slate-600 bg-slate-50 px-6 py-4 rounded-2xl border border-slate-100 leading-relaxed italic">
                            "{{ $task->ket ?? 'Tidak ada keterangan tambahan.' }}"
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card: Penanggung Jawab -->
            <div class="glass rounded-[3rem] p-10 shadow-2xl shadow-slate-200/40 border border-white/40">
                <div class="flex items-center gap-4 mb-10">
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center">
                        <i data-lucide="users" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-800 tracking-tight uppercase">Data Penanggung Jawab</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="space-y-1">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama Lengkap</p>
                        <p class="text-lg font-black text-slate-800">{{ $task->nama_penanggungjawab }}</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">NIP</p>
                        <p class="text-lg font-black text-slate-800">{{ $task->nip_penanggungjawab ?? '-' }}</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Jabatan</p>
                        <p class="text-sm font-bold text-slate-600">{{ $task->jabatan_penanggungjawab }}</p>
                    </div>
                    <div class="space-y-1">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Kontak WhatsApp</p>
                        <a href="https://wa.me/{{ $task->nohp_penanggungjawab }}"
                            class="text-sm font-black text-blue-600 hover:underline flex items-center gap-2">
                            <i data-lucide="phone" class="w-4 h-4"></i> {{ $task->nohp_penanggungjawab }}
                        </a>
                    </div>
                </div>
            </div>

            @if ($mandate->status == 'pending')
                <!-- Jika status PENDING -->
                <!-- Form Verifikasi (Hanya Tampil Jika Belum Selesai) -->
                <div
                    class="glass rounded-[3rem] p-10 shadow-2xl shadow-blue-200/40 border border-blue-100/50 bg-blue-50/20">
                    <div class="flex items-center gap-4 mb-10">
                        <div
                            class="w-12 h-12 bg-blue-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-blue-200">
                            <i data-lucide="check-square" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-black text-slate-800 tracking-tight uppercase">Selesaikan Verifikasi</h3>
                    </div>

                    <form action="{{ route('petugas.updateStatus', $mandate->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        <input type="hidden" name="status" value="selesai">

                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Keterangan
                                Verifikasi / Hasil Lapangan</label>
                            <textarea name="ketver" rows="4" required
                                class="w-full px-8 py-6 glass border border-slate-200 rounded-[2rem] focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-medium text-slate-700"
                                placeholder="Jelaskan tindakan yang telah dilakukan atau temuan di lapangan..."></textarea>
                        </div>

                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Unggah Bukti
                                Verifikasi (Opsional)</label>
                            <div
                                class="relative group border-2 border-dashed border-slate-200 rounded-[2rem] p-10 text-center hover:border-blue-500 hover:bg-blue-50/50 transition-all cursor-pointer">
                                <input type="file" name="berkasver"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                <div class="space-y-4">
                                    <div
                                        class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mx-auto shadow-inner group-hover:scale-110 transition-transform">
                                        <i data-lucide="upload-cloud" class="w-8 h-8"></i>
                                    </div>
                                    <div class="text-sm font-bold text-slate-600">Klik atau seret file ke sini untuk
                                        mengunggah bukti</div>
                                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Format: PDF,
                                        JPG, PNG, ZIP (Max. 5MB)</p>
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full py-6 bg-blue-600 text-white rounded-[2rem] font-black uppercase tracking-[0.2em] shadow-2xl shadow-blue-500/30 hover:bg-blue-700 hover:-translate-y-1 transition-all active:scale-95 flex items-center justify-center gap-4">
                            <i data-lucide="check-circle" class="w-6 h-6"></i> Kirim Hasil Verifikasi
                        </button>
                    </form>
                </div>
            @else
                <!-- Tampilan Hasil Verifikasi Jika Sudah Selesai -->
                <div
                    class="glass rounded-[3rem] p-10 shadow-2xl shadow-emerald-200/40 border border-emerald-100/50 bg-emerald-50/20">
                    <div class="flex items-center gap-4 mb-10">
                        <div
                            class="w-12 h-12 bg-emerald-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-200">
                            <i data-lucide="verified" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-black text-slate-800 tracking-tight uppercase">Tugas Telah Selesai</h3>
                    </div>
                    <div class="space-y-6">
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Keterangan
                                Verifikasi</p>
                            <p
                                class="text-sm font-medium text-slate-700 bg-white/60 p-6 rounded-2xl border border-emerald-100">
                                {{ $task->ketver }}</p>
                        </div>
                        @if ($task->berkasver)
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Bukti
                                    Verifikasi</p>
                                <a href="{{ asset('storage/doc/' . $task->berkasver) }}" target="_blank"
                                    class="inline-flex items-center gap-3 px-6 py-4 bg-white rounded-2xl border border-emerald-100 text-emerald-600 font-bold text-sm hover:bg-emerald-600 hover:text-white transition-all">
                                    <i data-lucide="download" class="w-4 h-4"></i> Unduh Bukti
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar Info -->
        <div class="lg:col-span-4 space-y-10">
            <!-- Card: Lokasi & Instansi -->
            <div
                class="glass-dark rounded-[3rem] p-10 text-white shadow-2xl shadow-slate-900/40 border border-white/10 relative overflow-hidden group">
                <div
                    class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full blur-3xl group-hover:bg-white/10 transition-colors">
                </div>

                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-10">Lokasi & Instansi</p>

                <div class="flex items-center gap-5 mb-10">
                    <div class="p-5 bg-white/10 rounded-2xl border border-white/20 shadow-inner">
                        <i data-lucide="building-2" class="w-8 h-8 text-blue-400"></i>
                    </div>
                    <div>
                        <h4 class="text-2xl font-black tracking-tight leading-none">{{ $task->nama_instansi }}</h4>
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mt-2">{{ $task->unitKerja }}
                        </p>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="flex items-start gap-4">
                        <i data-lucide="map-pin" class="w-5 h-5 text-rose-500 mt-1"></i>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Titik Lokasi
                            </p>
                            <p class="text-sm font-bold leading-relaxed">{{ $task->lokasi }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <i data-lucide="calendar" class="w-5 h-5 text-emerald-500 mt-1"></i>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Waktu Pengajuan
                            </p>
                            <p class="text-sm font-bold leading-relaxed">
                                {{ $task->tgl_permohonan->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card: Berkas Lampiran -->
            <div class="glass rounded-[3rem] p-10 shadow-2xl shadow-slate-200/40 border border-white/40">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-10">Berkas Lampiran</p>

                @if ($task->berkas)
                    <a href="{{ asset('storage/doc/' . $task->berkas) }}" target="_blank"
                        class="group flex items-center p-6 bg-slate-50 border border-slate-200 rounded-[2rem] hover:bg-blue-600 hover:border-blue-600 hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                            <i data-lucide="file-text" class="w-8 h-8 text-blue-600"></i>
                        </div>
                        <div class="ml-6">
                            <p
                                class="text-[10px] font-black text-slate-400 uppercase tracking-widest group-hover:text-blue-200">
                                Buka Berkas</p>
                            <p class="text-sm font-black text-slate-800 group-hover:text-white line-clamp-1 mt-1">
                                {{ basename($task->berkas) }}</p>
                        </div>
                    </a>
                @else
                    <div class="p-10 bg-slate-50 rounded-[2rem] border-2 border-dashed border-slate-200 text-center">
                        <i data-lucide="file-x-2" class="w-10 h-10 text-slate-300 mx-auto mb-4"></i>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">Tidak ada berkas</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
