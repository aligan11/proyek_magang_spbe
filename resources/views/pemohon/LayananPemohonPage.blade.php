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

                <!-- Input Hidden (Otomatis) -->
                <input type="hidden" name="tahunanggaran" value="{{ date('Y') }}">
                <input type="hidden" name="periode" value="{{ 'Triwulan ' . ceil(date('n') / 3) }}">

                <!-- SECTION: DETAIL LAYANAN -->
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                    <div class="bg-slate-50/50 border-b border-slate-100 px-6 py-4 flex items-center space-x-3">
                        <div class="bg-blue-600 p-2 rounded-xl text-white shadow-lg shadow-blue-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">Informasi Layanan</h2>
                    </div>

                    <div class="p-6 md:p-8 space-y-6">
                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Judul
                                Permohonan</label>
                            <input type="text" name="nama_kebutuhan" placeholder="Contoh: Pengajuan Hosting Web OPD"
                                required
                                class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:bg-white focus:border-blue-600 outline-none transition-all duration-300">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Jenis
                                    Layanan</label>
                                <select name="id_jenis_layanan" required
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none cursor-pointer">
                                    <option value="">Pilih Jenis...</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->id }}"> {{ $item->namajenis }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label
                                    class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Kebutuhan
                                    Spesifik</label>
                                <select name="id_kebutuhan" required
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none cursor-pointer">
                                    <option value="">Pilih Kebutuhan...</option>
                                    @foreach ($kebutuhan as $item)
                                        <option value="{{ $item->id }}"> {{ $item->nama_kebutuhan }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION: BERKAS & KETERANGAN -->
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                    <div class="p-6 md:p-8 space-y-6">
                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Dokumen
                                Pendukung (Proposal)</label>
                            <div
                                class="relative group border-2 border-dashed border-slate-200 rounded-3xl p-8 text-center hover:border-blue-500 hover:bg-blue-50/50 transition-all cursor-pointer">
                                <input type="file" name="berkas" required
                                    @change="fileName = $event.target.files[0].name"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                <div class="space-y-3">
                                    <div
                                        class="bg-blue-100 w-12 h-12 rounded-2xl flex items-center justify-center mx-auto text-blue-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="text-slate-600 font-medium">Klik untuk upload berkas</div>
                                    <div x-show="fileName" class="mt-2 text-blue-600 font-bold" x-text="fileName"></div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label
                                class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 ml-1">Keterangan
                                / Alasan Pengajuan</label>
                            <textarea name="ket" rows="3" placeholder="Opsional: Tambahkan catatan tambahan..."
                                class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex flex-col md:flex-row gap-4">
                    <button type="submit" :disabled="loading"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl shadow-lg transition-all flex items-center justify-center">
                        <span x-show="!loading">Kirim Sekarang</span>
                        <span x-show="loading"
                            class="animate-spin h-5 w-5 border-2 border-white border-t-transparent rounded-full"></span>
                    </button>
                    <a href="{{ route('dashboardPemohon') }}"
                        class="md:w-1/3 bg-white border border-slate-200 text-slate-600 font-bold py-4 rounded-2xl text-center">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
