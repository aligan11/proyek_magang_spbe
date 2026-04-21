<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pemohon | DISKOMINFO</title>
    <!-- Integrasi Laravel Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://googleapis.com" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Tambahkan di head atau sebelum script -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.5.2/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.5.2/dist/js/tom-select.complete.min.js"></script>


    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-sidebar {
            background: linear-gradient(180deg, #003366 0%, #004a99 100%);
        }

        .active-nav {
            background: rgba(255, 255, 255, 0.15);
            border-left: 4px solid #60a5fa;
        }

        [x-cloak] {
            display: none !important;
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-[#f8fafc]" x-data="{ sidebarOpen: window.innerWidth > 1024 }">

    <!-- BACKDROP (Mobile Only) -->
    <div x-show="sidebarOpen && window.innerWidth < 1024" @click="sidebarOpen = false"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 lg:hidden" x-cloak>
    </div>

    <!-- SIDEBAR -->
    <aside :class="sidebarOpen ? 'translate-x-0 w-72' : '-translate-x-full lg:translate-x-0 lg:w-20'"
        class="fixed left-0 top-0 h-screen glass-sidebar text-white transition-all duration-300 z-50 overflow-hidden shadow-2xl">

        <!-- Logo & Close Button -->
        <div class="p-6 mb-4 flex items-center justify-between">
            <div class="flex items-center space-x-3 overflow-hidden">
                <div class="bg-white p-2 rounded-2xl shadow-lg flex-shrink-0">
                    <svg class="w-7 h-7 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="flex flex-col" x-show="sidebarOpen" x-transition:enter="delay-100 opacity-0"
                    x-transition:enter-end="opacity-100">
                    <span class="font-bold text-xl tracking-tighter uppercase leading-none">KOMINFO</span>
                    <span class="text-[9px] font-bold text-blue-300 uppercase tracking-[0.2em] mt-1 text-nowrap">Portal
                        Pemohon</span>
                </div>
            </div>
            <!-- Tombol Close (Mobile) -->
            <button @click="sidebarOpen = false" class="lg:hidden text-white/50 hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="px-4 space-y-1">
            <p class="text-[10px] font-bold text-blue-300/50 uppercase tracking-[0.3em] mb-4 ml-4" x-show="sidebarOpen">
                Menu Utama
            </p>

            <!-- Menu Dashboard -->
            <a href="{{ route('dashboardPemohon') }}"
                class="flex items-center space-x-3 p-4 rounded-2xl transition-all group 
        {{ request()->routeIs('dashboardPemohon')
            ? 'bg-white/10 text-white shadow-lg shadow-blue-900/20 active-nav'
            : 'text-white/60 hover:text-white hover:bg-white/5' }}">

                <svg class="w-5 h-5 flex-shrink-0 transition-colors
            {{ request()->routeIs('dashboardPemohon') ? 'text-blue-300' : 'text-blue-300/40 group-hover:text-blue-300' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
                <span x-show="sidebarOpen" class="font-semibold text-sm">Dashboard</span>
            </a>

            <!-- Menu Riwayat Permohonan (Aktif jika di index atau detail) -->
            <a href="{{ route('pemohon.index') }}"
                class="flex items-center space-x-3 p-4 rounded-2xl transition-all group 
        {{ request()->routeIs('pemohon.index') || request()->routeIs('permohonan.*')
            ? 'bg-white/10 text-white shadow-lg shadow-blue-900/20 active-nav'
            : 'text-white/60 hover:text-white hover:bg-white/5' }}">

                <svg class="w-5 h-5 flex-shrink-0 transition-colors
            {{ request()->routeIs('pemohon.index') || request()->routeIs('permohonan.*') ? 'text-blue-300' : 'text-blue-300/40 group-hover:text-blue-300' }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <span x-show="sidebarOpen" class="font-semibold text-sm">Riwayat Permohonan</span>
            </a>

            <div class="pt-6">
                <p class="text-[10px] font-bold text-blue-300/50 uppercase tracking-[0.3em] mb-4 ml-4"
                    x-show="sidebarOpen">Akun SAYA</p>

                <!-- Menu Profil -->
                <a href="{{ route('pemohon.profile') }}"
                    class="flex items-center space-x-3 p-4 rounded-2xl transition-all duration-300 group
            {{ request()->routeIs('pemohon.profile')
                ? 'bg-white/10 text-white active-nav'
                : 'text-white/60 hover:text-white hover:bg-white/5' }}">

                    <svg class="w-5 h-5 flex-shrink-0 transition-colors
                {{ request()->routeIs('pemohon.profile') ? 'text-blue-300' : 'text-blue-300/40 group-hover:text-blue-300' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span x-show="sidebarOpen" class="font-semibold text-sm">Pengaturan Profil</span>
                </a>
            </div>
        </nav>



        <!-- Logout Area -->
        <div class="absolute bottom-8 w-full px-4" x-data="{ logoutModal: false }">
            <button type="button" @click="logoutModal = true"
                class="flex items-center cursor-pointer space-x-3 p-4 w-full bg-rose-500/10 text-rose-400 rounded-2xl hover:bg-rose-600 hover:text-white transition-all group">
                <svg class="w-5 h-5 flex-shrink-0 transition-transform group-hover:-translate-x-1" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                <span x-show="sidebarOpen" class="font-bold text-xs uppercase tracking-widest text-nowrap">Logout
                    Sesi</span>
            </button>

            <!-- MODAL KONFIRMASI -->
            <template x-teleport="body">
                <div x-show="logoutModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4" x-cloak>
                    <div x-show="logoutModal" x-transition:enter="transition duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        @click="logoutModal = false" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
                    <div x-show="logoutModal" x-transition:enter="transition duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        class="relative w-full max-w-sm bg-white rounded-[2.5rem] p-8 text-center shadow-2xl border border-slate-100">
                        <div
                            class="mx-auto w-16 h-16 bg-rose-50 rounded-2xl flex items-center justify-center mb-6 text-rose-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl  font-bold text-slate-800 mb-2">Konfirmasi Keluar</h3>
                        <p class="text-xs text-slate-500 mb-8 font-medium">Apakah Anda yakin ingin mengakhiri sesi ini?
                            Anda perlu login kembali untuk mengakses layanan.</p>
                        <div class="flex flex-col space-y-3">
                            <form action="{{ route('logoutPemohon') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full bg-rose-600 cursor-pointer text-white font-bold py-4 rounded-2xl hover:bg-rose-700 transition uppercase tracking-widest text-[10px]">Ya,
                                    Keluar</button>
                            </form>
                            <button @click="logoutModal = false"
                                class="w-full bg-slate-100 text-slate-600 font-bold py-4 rounded-2xl cursor-pointer hover:bg-slate-200 transition uppercase tracking-widest text-[10px]">Batal</button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </aside>

    @yield('content')
    @include('sweetalert::alert')
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Inisialisasi Tom Select
        var kebutuhanControl = new TomSelect('#kebutuhan', {
            plugins: ['remove_button'],
            valueField: 'id', // Sesuaikan dengan primary key di database
            labelField: 'nama_kebutuhan', // Sesuaikan dengan kolom nama di database
            searchField: 'nama_kebutuhan',
            placeholder: 'Pilih satu atau lebih kebutuhan...',
            maxItems: 10,
            allowEmptyOption: true,
        });

        // 2. Event Listener untuk Jenis Layanan
        const jenisLayananSelect = document.getElementById('jenis_layanan');

        if (jenisLayananSelect) {
            jenisLayananSelect.addEventListener('change', function() {
                const idJenis = this.value;

                // Reset Tom Select setiap kali ganti jenis
                kebutuhanControl.clear();
                kebutuhanControl.clearOptions();

                if (idJenis) {
                    // Beri feedback loading
                    kebutuhanControl.addOption({
                        id: '',
                        nama_kebutuhan: 'Memuat data...'
                    });
                    kebutuhanControl.refreshOptions(false);

                    fetch(`/get-kebutuhan/${idJenis}`)
                        .then(response => {
                            if (!response.ok) throw new Error('Gagal memuat data');
                            return response.json();
                        })
                        .then(data => {
                            kebutuhanControl.clearOptions(); // Hapus tulisan loading

                            if (data.length > 0) {
                                kebutuhanControl.addOptions(data);
                                kebutuhanControl.refreshOptions(false);
                            } else {
                                kebutuhanControl.addOption({
                                    id: '',
                                    nama_kebutuhan: 'Tidak ada data untuk jenis ini'
                                });
                                kebutuhanControl.refreshOptions(false);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert("Gagal mengambil data kebutuhan.");
                        });
                }
            });
        }
    });
</script>



</html>
