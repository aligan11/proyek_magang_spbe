@extends('pemohon.layout.AppPemohon')

@section('content')
    <div :class="sidebarOpen ? 'md:ml-72' : 'md:ml-24'"
        class="transition-all duration-300 min-h-screen py-8 px-4 sm:px-6 lg:px-8 flex justify-center"
        x-data="{ loading: false, fileName: '{{ $permohonan->berkas }}' }">
        <div class="w-full max-w-4xl">

            <!-- Progress Tracker -->
            <div class="mb-10 px-4">
                <div class="flex items-center justify-between relative">
                    <div class="absolute top-1/2 left-0 w-full h-0.5 bg-slate-100 -translate-y-1/2 z-0"></div>
                    <div class="relative z-10 flex flex-col items-center">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold shadow-lg shadow-blue-200">
                            1</div>
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-2">Data Teknis</span>
                    </div>
                    <div class="relative z-10 flex flex-col items-center">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold shadow-lg shadow-blue-200">
                            2</div>
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-2">Struktural</span>
                    </div>
                    <div class="relative z-10 flex flex-col items-center">
                        <div
                            class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold">
                            3</div>
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-2">Dokumen</span>
                    </div>
                </div>
            </div>

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
                            <a href="{{ route('pemohon.index') }}"
                                class="hover:text-blue-600 transition font-medium">Riwayat</a>
                            <span>/</span>
                            <span class="text-slate-600 font-semibold">Edit Permohonan</span>
                        </nav>
                    </div>
                    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight sm:text-4xl">Edit <span
                            class="text-blue-600">Permohonan</span></h1>
                    <p class="text-slate-500 mt-2 font-medium">No. Registrasi: <span
                            class="font-bold text-blue-600">{{ $permohonan->noreg }}</span></p>
                </div>
            </div>

            <form action="{{ route('pemohon.update', $permohonan->id) }}" method="POST" enctype="multipart/form-data"
                @submit="loading = true" class="space-y-8">
                @csrf
                @method('PUT')

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
                                    value="{{ old('unitKerja', $permohonan->unitKerja) }}"
                                    placeholder="Contoh: Bidang E-Government / Seksi Infrastruktur"
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all duration-300 ">
                            </div>

                            <div>
                                <label
                                    class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">
                                    Lokasi Penggunaan / Kejadian
                                </label>
                                <input type="text" name="lokasi" value="{{ old('lokasi', $permohonan->lokasi) }}"
                                    placeholder="Alamat lengkap, Nama Gedung, atau Ruangan..." required
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all duration-300">
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Judul
                                / Perihal</label>
                            <input type="text" name="nama_kebutuhan"
                                value="{{ old('nama_kebutuhan', $permohonan->nama_kebutuhan) }}"
                                placeholder="Contoh: Perbaikan Jaringan..." required
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
                                        <option value="{{ $item->id }}"
                                            {{ $permohonan->id_jenis_layanan == $item->id ? 'selected' : '' }}>
                                            {{ $item->namajenis }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">
                                    Kebutuhan Spesifik
                                </label>
                                <select name="id_kebutuhan[]" id="kebutuhan" multiple required
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none">
                                    @foreach ($kebutuhan as $keb)
                                        <option value="{{ $keb->id }}"
                                            {{ in_array($keb->id, (array) $permohonan->id_kebutuhan) ? 'selected' : '' }}>
                                            {{ $keb->namakebutuhan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: DATA PENANGGUNG JAWAB STRUKTURAL -->
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                    <div class="bg-slate-50/80 border-b border-slate-100 px-8 py-5 flex items-center space-x-4">
                        <div class="bg-blue-600 p-2.5 rounded-xl text-white shadow-lg shadow-blue-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-800 tracking-tight">Penanggung Jawab Struktural</h2>
                        </div>
                    </div>

                    <div class="p-8 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.1em] ml-1">Nama
                                    Lengkap & Gelar</label>
                                <input type="text" name="nama_pj"
                                    value="{{ old('nama_pj', $permohonan->nama_penanggungjawab) }}" required
                                    class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all duration-300">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.1em] ml-1">Nomor
                                    Induk Pegawai (NIP)</label>
                                <input type="text" name="nip_pj"
                                    value="{{ old('nip_pj', $permohonan->nip_penanggungjawab) }}" required
                                    class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all duration-300">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.1em] ml-1">Jabatan
                                    Struktural</label>
                                <input type="text" name="jabatan_pj"
                                    value="{{ old('jabatan_pj', $permohonan->jabatan_penanggungjawab) }}" required
                                    class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all duration-300">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.1em] ml-1">Unit
                                    Kerja Pimpinan</label>
                                <input type="text" name="unitkerja_pj"
                                    value="{{ old('unitkerja_pj', $permohonan->unitkerja_penanggungjawab) }}" required
                                    class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all duration-300">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.1em] ml-1">Nomor
                                    WhatsApp / HP</label>
                                <input type="text" name="nohp_pj"
                                    value="{{ old('nohp_pj', $permohonan->nohp_penanggungjawab) }}" required
                                    class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all duration-300">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.1em] ml-1">Alamat
                                    Email Resmi</label>
                                <input type="email" name="email_pj"
                                    value="{{ old('email_pj', $permohonan->email_penanggungjawab) }}" required
                                    class="w-full px-5 py-4 bg-slate-50/50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all duration-300">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 3: BERKAS & KETERANGAN -->
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                    <div class="p-6 md:p-8 space-y-6">
                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Update
                                Dokumen (Opsional)</label>
                            <div
                                class="relative group border-2 border-dashed border-slate-200 rounded-3xl p-8 text-center hover:border-blue-500 hover:bg-blue-50/50 transition-all cursor-pointer">
                                <input type="file" name="berkas" @change="fileName = $event.target.files[0].name"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                <div class="space-y-3 text-slate-600 font-medium">
                                    <svg class="mx-auto h-12 w-12 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <div>Klik untuk ganti berkas atau tarik ke sini</div>
                                    <div class="mt-4 p-2 bg-blue-100 text-blue-700 rounded-lg text-sm font-bold"
                                        x-text="'File: ' + fileName"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Keterangan
                                Tambahan</label>
                            <textarea name="ket" rows="3"
                                class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all">{{ old('ket', $permohonan->ket) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- SUBMIT BUTTON -->
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button type="submit" :disabled="loading"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl shadow-xl shadow-blue-200 transition-all active:scale-95 flex items-center justify-center space-x-3">
                        <template x-if="!loading">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Simpan Perubahan</span>
                            </div>
                        </template>
                        <template x-if="loading">
                            <div class="flex items-center space-x-3">
                                <svg class="animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span>Menyimpan...</span>
                            </div>
                        </template>
                    </button>
                    <a href="{{ route('pemohon.index') }}"
                        class="px-8 py-4 bg-white border border-slate-200 text-slate-600 font-bold rounded-2xl hover:bg-slate-50 transition-all text-center">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#jenis_layanan').on('change', function() {
                var id_jenis = $(this).val();
                if (id_jenis) {
                    $.ajax({
                        url: '/get-kebutuhan/' + id_jenis,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#kebutuhan').empty();
                            $.each(data, function(key, value) {
                                $('#kebutuhan').append('<option value="' + value.id +
                                    '">' + value.namakebutuhan + '</option>');
                            });
                        }
                    });
                } else {
                    $('#kebutuhan').empty();
                }
            });
        });
    </script>
@endsection
