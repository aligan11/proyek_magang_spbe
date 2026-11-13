@extends('pemohon.layout.AppPemohon')

@section('content')
    <div :class="sidebarOpen ? 'md:ml-72' : 'md:ml-24'"
        class="transition-all duration-300 min-h-screen py-8 px-4 sm:px-6 lg:px-8 flex justify-center"
        x-data="{ loading: false, fileName: '' }">
        <div class="w-full max-w-4xl">

            <!-- Header -->
            <div class="mb-10 flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                <div class="text-center md:text-left">
                    <div class="flex items-center justify-center md:justify-start space-x-3 mb-3">
                        <button @click="sidebarOpen = !sidebarOpen"
                            class="p-2 bg-white border border-slate-200 rounded-xl shadow-sm text-slate-500 hover:text-blue-600 transition-all active:scale-90">
                            <svg x-show="!sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <svg x-show="sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        <nav class="flex text-slate-400 text-xs space-x-2">
                            <a href="{{ route('dashboardPemohon') }}"
                                class="hover:text-blue-600 transition font-medium">Dashboard</a>
                            <span>/</span>
                            <span class="text-slate-600 font-semibold">Buat Permohonan</span>
                        </nav>
                    </div>
                    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight sm:text-4xl">Formulir <span
                            class="text-blue-600">Permohonan</span></h1>
                </div>
            </div>

            <form action="{{ route('pemohon.store') }}" method="POST" enctype="multipart/form-data"
                @submit="loading = true" class="space-y-8">
                @csrf

                <!-- Input Hidden Otomatis -->
                <input type="hidden" name="tahunanggaran" value="{{ date('Y') }}">
                <input type="hidden" name="periode" value="{{ 'Triwulan ' . ceil(date('n') / 3) }}">

                <!-- SECTION 1: INFORMASI TEKNIS LAYANAN -->
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100">
                    <div class="bg-slate-50/50 border-b border-slate-100 px-6 py-4 flex items-center space-x-3">
                        <div class="bg-blue-600 p-2 rounded-xl text-white shadow-lg shadow-blue-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">Informasi Teknis</h2>
                    </div>

                    <div class="p-6 md:p-8 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">
                                    Unit Kerja Pemohon
                                </label>
                                <input type="text" name="unitKerja"
                                    value="{{ Auth::guard('pemohon')->user()->unitKerja ?? '' }}"
                                    placeholder="Contoh: Bidang E-Government / Seksi Infrastruktur"
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all duration-300 ">
                                <p class="text-[10px] text-slate-400 mt-2 ml-1 italic">
                                    *Isi dengan nama bidang atau sub-bagian instansi Anda.
                                </p>
                            </div>

                            <div>
                                <label
                                    class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">
                                    Lokasi Penggunaan / Kejadian
                                </label>
                                <input type="text" name="lokasi"
                                    placeholder="Alamat lengkap, Nama Gedung, atau Ruangan..." required
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all duration-300">
                                <p class="text-[10px] text-slate-400 mt-2 ml-1 italic">
                                    *Untuk OPD: Isi Gedung/Lantai/Ruang. Untuk Umum: Isi alamat lengkap lokasi.
                                </p>
                            </div>

                        </div>

                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Judul
                                / Perihal</label>
                            <input type="text" name="nama_kebutuhan" placeholder="Contoh: Perbaikan Jaringan..." required
                                class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Jenis
                                    Layanan</label>
                                <select name="id_jenis_layanan" id="jenis_layanan" required
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none">
                                    <option value="">Pilih Jenis...</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->id }}"> {{ $item->namajenis }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">
                                    Kebutuhan Spesifik (Bisa pilih lebih dari 1)
                                </label>
                                <!-- Tambahkan multiple dan nama array [] -->
                                <select name="id_kebutuhan[]" id="kebutuhan" multiple required
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none">
                                    <!-- Data akan diisi via JS -->
                                </select>
                            </div>

                        </div>


                    </div>
                </div>

                <!-- SECTION 2: DATA PENANGGUNG JAWAB STRUKTURAL -->
                <div
                    class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden transition-all hover:shadow-2xl hover:shadow-slate-200/60">
                    <!-- Header Section -->
                    <div class="bg-slate-50/80 border-b border-slate-100 px-8 py-5 flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="bg-blue-600 p-2.5 rounded-xl text-white shadow-lg shadow-blue-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-slate-800 tracking-tight">Penanggung Jawab Struktural</h2>
                                <p class="text-[10px] text-slate-400 font-medium uppercase tracking-wider mt-0.5">Informasi
                                    Pejabat Penandatangan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <div class="p-8 space-y-6">
                        <!-- Row 1: Nama & NIP -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.1em] ml-1">Nama
                                    Lengkap & Gelar</label>
                                <input type="text" name="nama_pj" value="{{ $penanggungJawab->name ?? '' }}" required
                                    placeholder="Masukkan nama pimpinan..."
                                    class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:bg-white focus:border-blue-600 outline-none transition-all duration-300 placeholder:text-slate-300">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.1em] ml-1">Nomor
                                    Induk Pegawai (NIP)</label>
                                <input type="text" name="nip_pj" value="{{ $penanggungJawab->nip ?? '' }}" required
                                    placeholder="Contoh: 1980xxxx xxxxx x xxx"
                                    class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:bg-white focus:border-blue-600 outline-none transition-all duration-300 placeholder:text-slate-300">
                            </div>
                        </div>

                        <!-- Row 2: Jabatan & Unit Kerja -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.1em] ml-1">Jabatan
                                    Struktural</label>
                                <input type="text" name="jabatan_pj" value="{{ $penanggungJawab->jabatan ?? '' }}"
                                    required placeholder="Contoh: Kepala Bidang..."
                                    class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:bg-white focus:border-blue-600 outline-none transition-all duration-300">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.1em] ml-1">Unit
                                    Kerja Pimpinan</label>
                                <input type="text" name="unitkerja_pj"
                                    value="{{ $penanggungJawab->unitKerja ?? '' }}" required
                                    placeholder="Contoh: Bidang Informatika..."
                                    class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:bg-white focus:border-blue-600 outline-none transition-all duration-300">
                            </div>
                        </div>

                        <!-- Row 3: Kontak & Email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.1em] ml-1">Nomor
                                    WhatsApp / HP</label>
                                <div class="relative">
                                    <span
                                        class="absolute inset-y-0 left-0 pl-5 flex items-center text-slate-400 font-medium text-sm">+62</span>
                                    <input type="text" name="nohp_pj" value="{{ $penanggungJawab->phone ?? '' }}"
                                        required placeholder="812xxxx"
                                        class="w-full pl-14 pr-5 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:bg-white focus:border-blue-600 outline-none transition-all duration-300">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.1em] ml-1">Alamat
                                    Email Resmi</label>
                                <input type="email" name="email_pj" value="{{ $penanggungJawab->email ?? '' }}"
                                    required placeholder="pimpinan@instansi.go.id"
                                    class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:bg-white focus:border-blue-600 outline-none transition-all duration-300">
                            </div>
                        </div>
                    </div>
                </div>


                <!-- SECTION 3: BERKAS & KETERANGAN -->
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                    <div class="p-6 md:p-8 space-y-6">
                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Dokumen
                                Pendukung</label>

                            <!-- PESAN ERROR MUNCUL DI ATAS KOTAK UPLOAD -->
                            @error('berkas')
                                <span class="text-red-500 text-xs block mb-2 font-semibold">{{ $message }}</span>
                            @enderror

                            <div
                                class="relative group border-2 border-dashed @error('berkas') border-red-400 bg-red-50/30 @else border-slate-200 hover:border-blue-500 hover:bg-blue-50/50 @enderror rounded-3xl p-8 text-center transition-all cursor-pointer">

                                <input type="file" name="berkas" required
                                    @change="fileName = $event.target.files[0].name"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

                                <div class="space-y-3 text-slate-600 font-medium">
                                    <svg class="mx-auto h-12 w-12 @error('berkas') text-red-500 @else text-blue-600 @enderror"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <div>Klik untuk upload berkas atau tarik ke sini</div>
                                    <div x-show="fileName"
                                        class="mt-4 p-2 bg-blue-100 text-blue-700 rounded-lg text-sm font-bold"
                                        x-text="'Terpilih: ' + fileName"></div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Keterangan
                                Tambahan</label>
                            <textarea name="ket" rows="3" placeholder="Tambahkan informasi pelengkap jika ada..."
                                class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none resize-none">{{ old('ket') }}</textarea>
                        </div>
                    </div>
                </div>


                <button type="submit" :disabled="loading"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-5 rounded-2xl shadow-lg transition-all flex items-center justify-center space-x-3">
                    <span x-show="!loading">Kirim Permohonan</span>
                    <span x-show="loading"
                        class="animate-spin h-5 w-5 border-2 border-white border-t-transparent rounded-full"></span>
                </button>
            </form>
        </div>
    </div>
@endsection
