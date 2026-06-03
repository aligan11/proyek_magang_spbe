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
                <!-- Notification Bell -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="relative p-3 rounded-xl md:rounded-2xl hover:bg-slate-100 transition-colors">
                        <i data-lucide="bell"
                            class="w-5 h-5 transform group-hover:rotate-12 transition-transform duration-300"></i>
                        @if (isset($unreadCount) && $unreadCount > 0)
                            <span
                                class="absolute top-1 right-1 w-5 h-5 bg-red-500 rounded-full flex items-center justify-center text-white text-xs font-bold">
                                {{ $unreadCount }}
                            </span>
                        @endif
                    </button>
                    <!-- Notification Dropdown -->
                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-slate-200 z-50">
                        <div class="p-4 border-b border-slate-200 flex justify-between items-center">
                            <h3 class="font-bold text-slate-800">Notifikasi</h3>
                            @if (isset($unreadCount) && $unreadCount > 0)
                                <form action="{{ route('pemohon.notification.read-all') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-xs font-bold text-blue-600 hover:text-blue-700">
                                        Tandai semua dibaca
                                    </button>
                                </form>
                            @endif
                        </div>
                        <div class="max-h-80 overflow-y-auto">
                            @if (isset($notifications) && $notifications->count() > 0)
                                @foreach ($notifications as $notification)
                                    <form action="{{ route('pemohon.notification.read', $notification->id) }}"
                                        method="POST" class="block">
                                        @csrf
                                        <button type="submit"
                                            class="w-full p-4 hover:bg-slate-50 text-left border-b border-slate-100 last:border-0">
                                            <div class="flex items-start gap-3">
                                                <div
                                                    class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15.75 8.25v7.5h-7.5v-7.5h7.5zm0-2.25h-7.5a2.25 2.25 0 00-2.25 2.25v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25z" />
                                                    </svg>
                                                </div>
                                                <div class="flex-1">
                                                    <p class="text-sm font-semibold text-slate-800">
                                                        {{ $notification->message }}</p>
                                                    <p class="text-xs text-slate-400 mt-1">
                                                        {{ $notification->created_at->diffForHumans() }}
                                                    </p>
                                                </div>
                                                @if (!$notification->is_read)
                                                    <span class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0"></span>
                                                @endif
                                            </div>
                                        </button>
                                    </form>
                                @endforeach
                            @else
                                <div class="p-8 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto mb-3 text-slate-300"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.857 17.082a9 9 0 0 0 5.141 0M6.043 17.082a9 9 0 0 1-5.141 0M15 17a3 3 0 0 1-6 0M12 9V12.75V15" />
                                    </svg>
                                    <p class="text-sm text-slate-500">Tidak ada notifikasi baru</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Status Akun: Tersembunyi di Mobile Sangat Kecil -->
                <div class="text-right hidden sm:block border-r border-slate-100 pr-3 md:pr-4">
                    <p
                        class="text-[8px] md:text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1 italic">
                        Tipe Akun</p>
                    <span
                        class="px-2 md:px-3 py-1 rounded-full text-[8px] md:text-[9px] font-black uppercase italic {{ $user->jenis_pemohon === 'internal' ? 'bg-blue-100 text-blue-700' : 'bg-emerald-100 text-emerald-700' }}">
                        {{ $user->jenis_pemohon }}
                    </span>
                </div>
                <a href="{{ route('pemohon.profile') }}" class="group">
                    <div
                        class="w-10 h-10 md:w-12 md:h-12 rounded-xl md:rounded-2xl bg-blue-600 shadow-lg shadow-blue-200 flex items-center justify-center text-white font-black text-sm md:text-base overflow-hidden border-2 border-transparent group-hover:border-blue-600 transition-all">
                        @if ($user->avatar)
                            <img src="{{ asset('storage/avatars/' . $user->avatar) }}" class="w-full h-full object-cover">
                        @else
                            {{ substr($user->nama_lengkap, 0, 2) }}
                        @endif
                    </div>
                </a>
            </div>
        </header>

        <!-- Panel Profil (Responsive Grid) -->
        <div
            class="relative overflow-hidden rounded-[2rem] md:rounded-[2.5rem] p-6 md:p-10 mb-8 md:mb-10 text-white shadow-2xl {{ $user->jenis_pemohon === 'internal' ? 'bg-blue-600 shadow-blue-200' : 'bg-emerald-600 shadow-emerald-200' }}">
            <div
                class="absolute top-0 right-0 w-64 h-64 md:w-80 md:h-80 bg-white/10 rounded-full -mr-20 -mt-20 blur-[80px] md:blur-[100px]">
            </div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                <div class="space-y-4 md:space-y-6">
                    <h2 class="text-2xl md:text-3xl font-black uppercase italic tracking-tighter leading-none">
                        {{ $user->jenis_pemohon === 'internal' ? 'Profil Kedinasan' : 'Layanan Publik' }}
                    </h2>

                    @if ($user->jenis_pemohon === 'internal')
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
                    <a href="{{ route('pemohon.create') }}"
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

        <!-- Latest History Section -->
        <div class="bg-white rounded-[2.5rem] p-6 md:p-10 border border-slate-100 shadow-sm">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h3 class="text-xl font-black text-slate-800 tracking-tight uppercase">Riwayat Terakhir</h3>
                    <p class="text-xs text-slate-400 font-bold mt-1">Status pengajuan terbaru Anda</p>
                </div>
                <a href="{{ route('pemohon.index') }}"
                    class="text-blue-600 text-xs font-black uppercase tracking-widest hover:underline">Lihat Semua</a>
            </div>

            <div class="space-y-4">
                @forelse($latestRequests as $req)
                    <div
                        class="flex items-center justify-between p-4 md:p-5 rounded-3xl bg-slate-50/50 hover:bg-slate-50 transition border border-transparent hover:border-slate-100">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-2xl bg-white shadow-sm flex items-center justify-center text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-black text-slate-800 tracking-tight">{{ $req->nama_kebutuhan }}</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">
                                    #{{ $req->noreg }} • {{ $req->tglinput->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            @php
                                // PERBAIKAN: Mengubah acuan data dari 'status' ke 'status_ver'
                                $statusLabel = match ((int) $req->status_ver) {
                                    1 => 'Proses',
                                    2 => 'Selesai',
                                    default => 'Selesai', // Menyamakan kondisi jika status_ver berupa string "selesai"
                                };

                                // PERBAIKAN: Menyesuaikan warna agar status Selesai (2) berwarna hijau/emerald estetik
                                $statusColor = match ((int) $req->status_ver) {
                                    1 => 'text-amber-600 bg-amber-50 border-amber-100',
                                    2 => 'text-emerald-600 bg-emerald-50 border-emerald-100',
                                    default => 'text-emerald-600 bg-emerald-50 border-emerald-100',
                                };
                            @endphp

                            <span
                                class="px-3 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-wider border {{ $statusColor }}">
                                {{ $statusLabel }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10">
                        <p class="text-slate-400 font-bold italic text-sm">Belum ada riwayat pengajuan.</p>
                    </div>
                @endforelse
            </div>
        </div>


    </main>
@endsection
