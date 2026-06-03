@extends('petugas.layout.app')

@section('content')
    <!-- Page Header -->
    <div class="mb-8 sm:mb-10 flex items-start sm:items-center gap-4 sm:gap-6">
        <a href="{{ route('petugas.tugas') }}"
            class="p-3 sm:p-4 glass rounded-2xl text-slate-400 hover:text-blue-600 hover:shadow-xl transition-all active:scale-90 border border-white/50 shrink-0">
            <i data-lucide="arrow-left" class="w-5 h-5 sm:w-6 sm:h-6"></i>
        </a>
        <div>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight uppercase">Detail Mandat</h1>
            <p class="text-sm sm:text-base text-slate-500 font-medium mt-1">
                Registrasi: <span class="font-mono font-bold text-blue-600">#{{ $task->noreg ?? 'N/A' }}</span>
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-10">
        <!-- Main Content -->
        <div class="lg:col-span-8 space-y-6 sm:space-y-10">
            <!-- Info Card: Detail Permohonan -->
            <div class="glass rounded-[2rem] sm:rounded-[3rem] p-5 sm:p-10 border border-white/50 shadow-2xl">
                <div class="flex items-start sm:items-center gap-4 sm:gap-5 mb-6 sm:mb-10">
                    <div
                        class="p-3 sm:p-4 bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-2xl shadow-lg shadow-blue-500/30 shrink-0">
                        <i data-lucide="file-text" class="w-6 h-6 sm:w-7 sm:h-7"></i>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-black text-slate-800 tracking-tight uppercase">Informasi
                            Permohonan</h3>
                        <p class="text-slate-400 text-sm font-medium mt-1">Detail lengkap permintaan layanan</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-8">
                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Jenis
                            Layanan</label>
                        <p
                            class="text-sm sm:text-base font-extrabold text-slate-700 bg-gradient-to-r from-blue-50 to-indigo-50 px-5 sm:px-6 py-4 rounded-2xl border border-blue-100">
                            {{ $task->jenis_layanan->namajenis ?? 'Layanan Umum' }}
                        </p>
                    </div>
                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama
                            Kebutuhan</label>
                        <p
                            class="text-sm sm:text-base font-extrabold text-slate-700 bg-gradient-to-r from-blue-50 to-indigo-50 px-5 sm:px-6 py-4 rounded-2xl border border-blue-100">
                            {{ $task->nama_kebutuhan ?? '-' }}
                        </p>
                    </div>
                    <div class="space-y-3 md:col-span-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Keterangan /
                            Deskripsi</label>
                        <div
                            class="text-sm font-medium text-slate-600 bg-slate-50 px-5 sm:px-6 py-5 rounded-2xl border border-slate-100 leading-relaxed">
                            "{{ $task->ket ?? 'Tidak ada keterangan tambahan.' }}"
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Card: Penanggung Jawab -->
            <div class="glass rounded-[2rem] sm:rounded-[3rem] p-5 sm:p-10 border border-white/50 shadow-2xl">
                <div class="flex items-start sm:items-center gap-4 sm:gap-5 mb-6 sm:mb-10">
                    <div
                        class="p-3 sm:p-4 bg-gradient-to-br from-emerald-500 to-emerald-600 text-white rounded-2xl shadow-lg shadow-emerald-500/30 shrink-0">
                        <i data-lucide="users" class="w-6 h-6 sm:w-7 sm:h-7"></i>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-black text-slate-800 tracking-tight uppercase">Data Penanggung
                            Jawab</h3>
                        <p class="text-slate-400 text-sm font-medium mt-1">Orang yang bertanggung jawab di lokasi</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-8">
                    <div class="space-y-2">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama Lengkap</p>
                        <p class="text-lg font-black text-slate-800">{{ $task->nama_penanggungjawab ?? '-' }}</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">NIP</p>
                        <p class="text-lg font-black text-slate-800">{{ $task->nip_penanggungjawab ?? '-' }}</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Jabatan</p>
                        <p class="text-sm font-bold text-slate-600">{{ $task->jabatan_penanggungjawab ?? '-' }}</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Kontak WhatsApp</p>
                        @if ($task->nohp_penanggungjawab)
                            <a href="https://wa.me/{{ $task->nohp_penanggungjawab }}"
                                class="text-sm font-black text-blue-600 hover:underline flex items-center gap-2">
                                <i data-lucide="phone" class="w-4 h-4"></i> {{ $task->nohp_penanggungjawab }}
                            </a>
                        @else
                            <p class="text-sm font-bold text-slate-400">-</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Verification Form or Result -->
            @if ($task->status_ver != 2)
                <!-- Form Verifikasi -->
                <div
                    class="glass rounded-[2rem] sm:rounded-[3rem] p-5 sm:p-10 border border-blue-200/50 shadow-2xl shadow-blue-200/40 bg-gradient-to-br from-blue-50/50 to-indigo-50/50">
                    <div class="flex items-start sm:items-center gap-4 sm:gap-5 mb-6 sm:mb-10">
                        <div
                            class="p-3 sm:p-4 bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-2xl shadow-lg shadow-blue-500/30 shrink-0">
                            <i data-lucide="check-square" class="w-6 h-6 sm:w-7 sm:h-7"></i>
                        </div>
                        <div>
                            <h3 class="text-lg sm:text-xl font-black text-slate-800 tracking-tight uppercase">Selesaikan
                                Verifikasi
                            </h3>
                            <p class="text-slate-400 text-sm font-medium mt-1">Isi form untuk menyelesaikan mandat</p>
                        </div>
                    </div>

                    <form action="{{ route('petugas.updateStatus', $mandate->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        <input type="hidden" name="status" value="selesai">

                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">
                                Keterangan Verifikasi / Hasil Lapangan <span class="text-red-500">*</span>
                            </label>
                            <textarea name="ketver" rows="5" required
                                class="w-full px-5 sm:px-8 py-5 sm:py-6 glass border border-slate-200 rounded-[1.5rem] sm:rounded-[2rem] focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-medium text-slate-700 bg-white/80"
                                placeholder="Jelaskan tindakan yang telah dilakukan atau temuan di lapangan..."></textarea>
                        </div>

                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">
                                Unggah Bukti Verifikasi <span class="text-slate-400 font-normal">(Opsional)</span>
                            </label>
                            <div
                                class="relative group border-2 border-dashed border-slate-200 rounded-[1.5rem] sm:rounded-[2rem] p-6 sm:p-10 text-center hover:border-blue-500 hover:bg-blue-50/50 transition-all cursor-pointer bg-white/50">
                                <input type="file" name="berkasver" id="berkasver"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                    onchange="updateFileName(this)">
                                <div class="space-y-4" id="fileUploadArea">
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
                            class="w-full py-4 sm:py-6 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-[1.5rem] sm:rounded-[2rem] font-black uppercase tracking-[0.16em] sm:tracking-[0.2em] shadow-2xl shadow-blue-500/30 hover:shadow-xl hover:-translate-y-1 transition-all active:scale-95 flex items-center justify-center gap-3 sm:gap-4 text-[11px] sm:text-base">
                            <i data-lucide="check-circle" class="w-5 h-5 sm:w-6 sm:h-6"></i> Kirim Hasil Verifikasi
                        </button>
                    </form>
                </div>
            @else
                <!-- Hasil Verifikasi -->
                <div
                    class="glass rounded-[2rem] sm:rounded-[3rem] p-5 sm:p-10 border border-emerald-200/50 shadow-2xl shadow-emerald-200/40 bg-gradient-to-br from-emerald-50/50 to-green-50/50">
                    <div class="flex items-start sm:items-center gap-4 sm:gap-5 mb-6 sm:mb-10">
                        <div
                            class="p-3 sm:p-4 bg-gradient-to-br from-emerald-500 to-emerald-600 text-white rounded-2xl shadow-lg shadow-emerald-500/30 shrink-0">
                            <i data-lucide="verified" class="w-6 h-6 sm:w-7 sm:h-7"></i>
                        </div>
                        <div>
                            <h3 class="text-lg sm:text-xl font-black text-slate-800 tracking-tight uppercase">Tugas Telah
                                Selesai</h3>
                            <p class="text-emerald-600 text-sm font-medium mt-1">Mandat telah diverifikasi</p>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 ml-1">Keterangan
                                Verifikasi</p>
                            <p
                                class="text-sm font-medium text-slate-700 bg-white/80 p-5 sm:p-6 rounded-2xl border border-emerald-100">
                                {{ $task->ketver ?? '-' }}
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">
                                    Diverifikasi Oleh</p>
                                <p class="text-sm font-bold text-slate-700 flex items-center gap-2">
                                    <i data-lucide="user-check" class="w-4 h-4 text-emerald-500"></i>
                                    {{ $task->verby ?? '-' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">
                                    Tanggal Verifikasi</p>
                                <p class="text-sm font-bold text-slate-700 flex items-center gap-2">
                                    <i data-lucide="calendar-check" class="w-4 h-4 text-emerald-500"></i>
                                    {{ $task->tglver ? \Carbon\Carbon::parse($task->tglver)->translatedFormat('d F Y') : '-' }}
                                </p>
                            </div>
                        </div>

                        @if ($task->berkasver)
                            <div>
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 ml-1">Bukti
                                    Verifikasi</p>
                                <a href="{{ asset('storage/doc/' . $task->berkasver) }}" target="_blank"
                                    class="inline-flex w-full sm:w-auto items-center justify-center gap-3 px-6 py-4 bg-white rounded-2xl border border-emerald-100 text-emerald-600 font-bold text-sm hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition-all shadow-sm">
                                    <i data-lucide="download" class="w-5 h-5"></i> Unduh Bukti Verifikasi
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-4 space-y-6 sm:space-y-8">
            <!-- Status Card -->
            <div class="glass rounded-[2rem] sm:rounded-[3rem] p-6 sm:p-8 border border-white/50 shadow-2xl text-center">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4">Status Mandat</p>

                @php
                    $statusVer = $task->status_ver;
                @endphp

                @if ($statusVer == 2)
                    {{-- Status SELESAI --}}
                    <span
                        class="status-selesai px-6 py-3 rounded-2xl text-sm font-black uppercase tracking-widest inline-flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Selesai
                    </span>
                @elseif ($statusVer == 3)
                    {{-- Status PROSES --}}
                    <span
                        class="px-6 py-3 rounded-2xl text-sm font-black uppercase tracking-widest inline-flex items-center gap-3 bg-blue-50 text-blue-600 border border-blue-100">
                        <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                        Proses
                    </span>
                @else
                    {{-- Status PENDING (1 atau NULL) --}}
                    <span
                        class="status-pending px-6 py-3 rounded-2xl text-sm font-black uppercase tracking-widest inline-flex items-center gap-3">
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                        Pending
                    </span>
                @endif
            </div>

            <!-- Location Card -->
            <div
                class="glass-dark rounded-[2rem] sm:rounded-[3rem] p-6 sm:p-10 text-white shadow-2xl border border-white/10 relative overflow-hidden">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full blur-3xl"></div>

                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-8">Lokasi & Instansi</p>

                <div class="flex items-start sm:items-center gap-4 sm:gap-5 mb-6 sm:mb-10">
                    <div class="p-4 sm:p-5 bg-white/10 rounded-2xl border border-white/20 shadow-inner shrink-0">
                        <i data-lucide="building-2" class="w-8 h-8 text-blue-400"></i>
                    </div>
                    <div>
                        <h4 class="text-lg sm:text-xl font-black tracking-tight leading-none">
                            {{ $task->nama_instansi ?? '-' }}</h4>
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mt-2">
                            {{ $task->unitkerja ?? '-' }}</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <i data-lucide="map-pin" class="w-5 h-5 text-rose-400 mt-1"></i>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Titik Lokasi
                            </p>
                            <p class="text-sm font-bold leading-relaxed">{{ $task->lokasi ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <i data-lucide="calendar" class="w-5 h-5 text-emerald-400 mt-1"></i>
                        <div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Waktu Pengajuan
                            </p>
                            <p class="text-sm font-bold leading-relaxed">
                                {{ $task->tgl_permohonan ? \Carbon\Carbon::parse($task->tgl_permohonan)->translatedFormat('d F Y') : '-' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attachment Card -->
            <div class="glass rounded-[2rem] sm:rounded-[3rem] p-6 sm:p-8 border border-white/50 shadow-2xl">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6">Berkas Lampiran</p>

                @if ($task->berkas)
                    <a href="{{ asset('storage/doc/' . $task->berkas) }}" target="_blank"
                        class="group flex items-center p-4 sm:p-6 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-100 rounded-[1.5rem] sm:rounded-[2rem] hover:from-blue-600 hover:to-indigo-600 hover:border-blue-600 hover:shadow-xl transition-all duration-300">
                        <div
                            class="w-12 h-12 sm:w-14 sm:h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center group-hover:scale-110 transition-transform shrink-0">
                            <i data-lucide="file-text" class="w-7 h-7 text-blue-600 group-hover:text-white"></i>
                        </div>
                        <div class="ml-4 sm:ml-5 flex-1 min-w-0">
                            <p
                                class="text-[10px] font-black text-slate-400 uppercase tracking-widest group-hover:text-blue-200 mb-1">
                                Buka Berkas</p>
                            <p class="text-sm font-black text-slate-800 group-hover:text-white line-clamp-1 break-all">
                                {{ basename($task->berkas) }}
                            </p>
                        </div>
                        <i data-lucide="external-link"
                            class="w-5 h-5 text-slate-300 group-hover:text-white transition-colors"></i>
                    </a>
                @else
                    <div
                        class="p-8 sm:p-10 bg-slate-50 rounded-[2rem] border-2 border-dashed border-slate-200 text-center">
                        <i data-lucide="file-x-2" class="w-10 h-10 text-slate-300 mx-auto mb-4"></i>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">Tidak ada berkas</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function updateFileName(input) {
            const fileName = input.files[0]?.name || 'Pilih file...';
            const area = document.getElementById('fileUploadArea');
            if (input.files[0]) {
                area.innerHTML = `
                    <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 mx-auto shadow-inner">
                        <i data-lucide="check-circle" class="w-8 h-8"></i>
                    </div>
                    <div class="text-sm font-bold text-emerald-600">${fileName}</div>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Klik untuk mengganti file</p>
                `;
                lucide.createIcons();
            }
        }
    </script>
@endsection
