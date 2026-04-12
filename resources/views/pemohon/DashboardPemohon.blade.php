@extends('pemohon.layout.AppPemohon')

@section('content')
    <!-- Main Content Container -->
    <!-- Logika: Di mobile margin nol, di desktop menyesuaikan sidebar -->
    <main :class="sidebarOpen ? 'md:ml-72' : 'md:ml-24'"
        class="transition-all duration-300 min-h-screen p-4 md:p-8 pt-6 bg-slate-50/50">

        <!-- Top Header -->
        <header
            class="flex justify-between items-center mb-6 md:mb-10 bg-white p-3 md:p-4 rounded-2xl md:rounded-[2.5rem] shadow-sm border border-slate-100">
            <div class="flex items-center space-x-3 md:space-x-4">
                <!-- Hamburger Button: Menampilkan Icon Berbeda Saat Buka/Tutup -->
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 text-slate-500 hover:text-blue-600 transition-colors">
                    <!-- Icon Menu (Tampil jika sidebar tertutup) -->
                    <svg x-show="!sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                    <!-- Icon Close (Tampil jika sidebar terbuka) -->
                    <svg x-show="sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

                <div class="overflow-hidden">
                    <h1 class="text-base md:text-xl font-black text-slate-800 truncate">Halo,
                        {{ explode(' ', $user->nama_lengkap)[0] }} 👋</h1>
                    <p class="text-[9px] md:text-xs text-slate-400 font-medium tracking-wide uppercase">Dashboard Pemohon
                    </p>
                </div>
            </div>

            <div class="flex items-center space-x-2 md:space-x-4">
                <!-- Status Akun: Tersembunyi di Mobile Sangat Kecil -->
                <div class="text-right hidden sm:block border-r border-slate-100 pr-3 md:pr-4">
                    <p
                        class="text-[8px] md:text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1 italic">
                        Tipe</p>
                    <span
                        class="px-2 md:px-3 py-1 rounded-full text-[8px] md:text-[9px] font-black uppercase italic {{ $user->tipe_user === 'internal' ? 'bg-blue-100 text-blue-700' : 'bg-emerald-100 text-emerald-700' }}">
                        {{ $user->tipe_user }}
                    </span>
                </div>
                <div
                    class="w-10 h-10 md:w-12 md:h-12 rounded-xl md:rounded-2xl bg-blue-600 shadow-lg shadow-blue-200 flex items-center justify-center text-white font-black text-sm md:text-base uppercase italic">
                    {{ substr($user->nama_lengkap, 0, 2) }}
                </div>
            </div>
        </header>

        <!-- Panel Profil (Responsive Grid) -->
        <div
            class="relative overflow-hidden rounded-[2rem] md:rounded-[2.5rem] p-6 md:p-10 mb-8 md:mb-10 text-white shadow-2xl {{ $user->tipe_user === 'internal' ? 'bg-blue-600 shadow-blue-200' : 'bg-emerald-600 shadow-emerald-200' }}">
            <div
                class="absolute top-0 right-0 w-64 h-64 md:w-80 md:h-80 bg-white/10 rounded-full -mr-20 -mt-20 blur-[80px] md:blur-[100px]">
            </div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                <div class="space-y-4 md:space-y-6">
                    <h2 class="text-2xl md:text-3xl font-black uppercase italic tracking-tighter leading-none">
                        {{ $user->tipe_user === 'internal' ? 'Profil Kedinasan' : 'Layanan Publik' }}
                    </h2>

                    @if ($user->tipe_user === 'internal')
                        <div class="flex flex-col sm:flex-row gap-6 sm:gap-10">
                            <div>
                                <p class="text-[10px] font-bold uppercase opacity-60 tracking-widest mb-1">NIP Pegawai</p>
                                <p class="font-bold tracking-widest text-base md:text-lg">{{ $user->nip }}</p>
                            </div>
                            <div class="sm:border-l sm:border-white/20 sm:pl-10">
                                <p class="text-[10px] font-bold uppercase opacity-60 tracking-widest mb-1">Unit Kerja / OPD
                                </p>
                                <p class="font-bold italic text-base md:text-lg leading-tight">
                                    {{ $userInstansi->instansi->nama_instansi ?? 'Instansi Tidak Terdaftar' }}
                                </p>
                            </div>
                        </div>
                    @else
                        <p class="text-emerald-100 font-medium opacity-80 max-w-2xl italic text-xs md:text-sm">
                            Selamat datang di portal layanan masyarakat. Pastikan data NIK dan Alamat Anda sudah sesuai
                            untuk mempermudah verifikasi.
                        </p>
                    @endif
                </div>

                <div class="pt-2 md:pt-0">
                    <a href="{{ route('pemohon.layanan') }}"
                        class="inline-block bg-white text-blue-700 px-6 md:px-8 py-3 md:py-4 rounded-xl md:rounded-2xl font-black text-[10px] md:text-xs uppercase tracking-widest shadow-xl hover:scale-105 active:scale-95 transition-all text-center w-full sm:w-auto">
                        Mulai Ajukan Layanan
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistik Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8 mb-10">
            <!-- Card Pengajuan Aktif -->
            <div
                class="bg-white p-6 md:p-8 rounded-[2rem] md:rounded-[2.5rem] border border-slate-100 shadow-sm group hover:border-blue-600 transition-all">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">Pengajuan Aktif</p>
                <div class="flex items-end justify-between">
                    <!-- Nilai Dinamis -->
                    <h3 class="text-4xl md:text-5xl font-black text-slate-800 tracking-tighter leading-none">
                        {{ $countAktif }}
                    </h3>
                    <div
                        class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-slate-50 flex items-center justify-center text-slate-300 group-hover:text-blue-600 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card Selesai -->
            <div
                class="bg-white p-6 md:p-8 rounded-[2rem] md:rounded-[2.5rem] border border-slate-100 shadow-sm group hover:border-emerald-500 transition-all">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">Selesai</p>
                <div class="flex items-end justify-between">
                    <!-- Nilai Dinamis -->
                    <h3 class="text-4xl md:text-5xl font-black text-slate-800 tracking-tighter leading-none">
                        {{ $countSelesai }}
                    </h3>
                    <div
                        class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-slate-50 flex items-center justify-center text-slate-300 group-hover:text-emerald-500 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Bantuan / Quick Action -->
            <div
                class="sm:col-span-2 lg:col-span-1 bg-blue-50/30 border-2 border-dashed border-blue-200 rounded-[2rem] md:rounded-[2.5rem] p-6 md:p-8 flex flex-col justify-center items-center text-center">
                <p class="text-xs font-bold text-blue-400 uppercase italic mb-3">Butuh Bantuan Layanan?</p>
                <a href="#"
                    class="w-full bg-blue-600 text-white py-4 rounded-xl md:rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-lg shadow-blue-100 hover:bg-blue-700 transition active:scale-95 text-center">
                    Cek Katalog Layanan
                </a>
            </div>
        </div>


    </main>
@endsection
