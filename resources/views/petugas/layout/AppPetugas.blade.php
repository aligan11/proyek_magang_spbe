<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Portal Petugas Lapangan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://googleapis.com" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Tambahkan di head atau sebelum script -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.5.2/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.5.2/dist/js/tom-select.complete.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com');

        body {
            font-family: 'Inter', sans-serif;
        }

        .hover-card:hover {
            transform: translateY(-4px);
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-slate-50 antialiased">

    <div class="min-h-screen flex flex-col">
        <!-- Modern Navbar -->
        <nav class="bg-[#1e293b] border-b border-slate-700 shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-600 rounded-xl shadow-inner">
                            <i data-lucide="shield-check" class="text-white w-6 h-6"></i>
                        </div>
                        <div class="hidden sm:block">
                            <span class="text-white font-bold text-lg tracking-tight uppercase">Portal Petugas</span>
                            <p class="text-slate-400 text-[10px] leading-3 uppercase tracking-widest">Diskominfo Babel
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <a href="{{ route('petugas.profile') }}"
                            class="hidden md:flex items-center gap-3 text-right border-r border-slate-700 pr-4 group">
                            <div>
                                <p class="text-slate-100 text-sm font-bold group-hover:text-blue-400 transition-colors">
                                    {{ $dataPetugas->name }}</p>
                                <p class="text-blue-400 text-[10px] font-bold uppercase tracking-tighter">
                                    {{ $dataPetugas->jabatan ?? 'Petugas Lapangan' }}</p>
                            </div>
                            <div
                                class="w-10 h-10 rounded-full bg-slate-700 border-2 border-slate-600 overflow-hidden group-hover:border-blue-500 transition-all">
                                @if ($dataPetugas->avatar)
                                    <img src="{{ asset('storage/avatars/' . $dataPetugas->avatar) }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-400">
                                        <i data-lucide="user" class="w-5 h-5"></i>
                                    </div>
                                @endif
                            </div>
                        </a>

                        <button onclick="toggleLogoutModal()"
                            class="flex items-center gap-2 bg-red-500/10 hover:bg-red-600 text-red-500 hover:text-white px-4 py-2 rounded-xl text-sm font-bold transition-all border border-red-500/20">
                            <i data-lucide="power" class="w-4 h-4"></i>
                            <span class="hidden sm:inline">Keluar</span>
                        </button>
                    </div>
                </div>
            </div>
        </nav>


        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">

            @yield('dashboard')


        </main>
    </div>

    <!-- Modal Logout -->
    <div id="logoutModal" class="fixed inset-0 z-[100] hidden">
        <div class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
        <div class="flex min-h-full items-center justify-center p-4">
            <div
                class="relative bg-white rounded-[2rem] p-8 max-w-sm w-full text-center shadow-2xl border border-slate-100">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-red-50 mb-4">
                    <i data-lucide="alert-triangle" class="text-red-600 w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-black text-slate-800">Sudah Selesai Kerja?</h3>
                <p class="text-slate-500 text-sm mt-2 font-medium">Pastikan semua laporan tugas hari ini sudah Anda
                    submit sebelum keluar.</p>
                <div class="mt-8 flex gap-3">
                    <button onclick="toggleLogoutModal()"
                        class="flex-1 px-4 py-3 rounded-xl bg-slate-100 text-slate-600 font-bold text-sm hover:bg-slate-200 transition">Batal</button>
                    <form action="{{ route('logout') }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit"
                            class="w-full px-4 py-3 rounded-xl bg-red-600 text-white font-bold text-sm shadow-lg shadow-red-200 hover:bg-red-700 transition">Ya,
                            Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        lucide.createIcons();

        function toggleLogoutModal() {
            const modal = document.getElementById('logoutModal');
            modal.classList.toggle('hidden');
        }
    </script>
    @include('sweetalert::alert')
</body>

</html>
