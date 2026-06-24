<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Hub Layanan Terintegrasi SPBE</title>
    <script>
        (() => {
            const storedTheme = localStorage.getItem('theme');
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const isDark = storedTheme ? storedTheme === 'dark' : systemDark;

            document.documentElement.classList.toggle('dark', isDark);
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 transition-colors duration-300 dark:bg-slate-950 dark:text-slate-100">

    <!-- Topbar / Navbar -->
    <header
        class="sticky top-0 z-50 border-b border-slate-200 bg-gradient-to-r from-indigo-900 via-indigo-800 to-blue-900 backdrop-blur-xl dark:border-slate-800">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
            <div class="flex items-center gap-4">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-lg font-black text-white shadow-lg">
                    SPBE
                </div>
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.35em] text-blue-200">Kominfo</p>
                    <h1 class="text-sm font-bold text-white sm:text-base">
                        Portal Hub Layanan Terintegrasi
                    </h1>
                </div>
            </div>

            <div class="hidden items-center gap-8 lg:flex">
                <a href="#beranda" class="text-sm font-semibold text-blue-100 transition hover:text-white">Beranda</a>
                <a href="#layanan" class="text-sm font-semibold text-blue-100 transition hover:text-white">Layanan</a>
                <a href="#kontak" class="text-sm font-semibold text-blue-100 transition hover:text-white">Kontak</a>
            </div>

            <div class="flex items-center gap-3">
                <button id="theme-toggle" type="button"
                    class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200/30 bg-white/10 text-white shadow-sm transition hover:border-white/30"
                    aria-label="Toggle mode">
                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5 dark:block" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 3v2.25M12 18.75V21m9-9h-2.25M5.25 12H3m15.114 6.364-1.591-1.591M7.477 7.477 5.886 5.886m12.228 0-1.591 1.591M7.477 16.523l-1.591 1.591M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M21 12.79A9 9 0 1111.21 3c0 .214.014.425.04.632A7.5 7.5 0 0020.368 12.75c.207.026.418.04.632.04z" />
                    </svg>
                </button>

                <a href="{{ route('login') }}"
                    class="inline-flex items-center rounded-2xl bg-white px-5 py-3 text-sm font-black text-indigo-900 shadow-lg transition hover:bg-blue-50">
                    Masuk Sistem
                </a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <main>
        <section id="beranda"
            class="relative overflow-hidden bg-gradient-to-br from-indigo-50 via-blue-50 to-slate-100 dark:from-slate-950 dark:via-indigo-950 dark:to-slate-900">
            <div class="mx-auto grid max-w-7xl gap-12 px-6 py-16 lg:grid-cols-[1.1fr_0.9fr] lg:px-8 lg:py-24">
                <div class="flex flex-col justify-center">
                    <span
                        class="inline-flex w-fit items-center rounded-full border border-indigo-200 bg-indigo-100 px-4 py-2 text-xs font-black uppercase tracking-[0.3em] text-indigo-800 dark:border-indigo-500/20 dark:bg-indigo-500/10 dark:text-indigo-200">
                        Portal Resmi Pemerintah
                    </span>

                    <h2
                        class="mt-8 text-4xl font-black leading-tight text-slate-900 dark:text-white sm:text-5xl lg:text-6xl">
                        Portal Hub Layanan <span class="text-indigo-700 dark:text-indigo-400">SPBE</span> Terintegrasi
                    </h2>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600 dark:text-slate-300">
                        Sistem Informasi Berita Acara Pemeriksaan untuk mendukung tata kelola pemerintahan berbasis
                        elektronik yang transparan, akuntabel, dan terintegrasi.
                    </p>

                    <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                        <a href="#layanan"
                            class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-indigo-700 to-blue-700 px-6 py-4 text-sm font-black text-white shadow-lg transition hover:-translate-y-0.5">
                            Jelajahi Layanan
                        </a>
                        <a href="{{ route('loginPemohon') }}"
                            class="inline-flex items-center justify-center rounded-2xl border border-slate-300 bg-white px-6 py-4 text-sm font-bold text-slate-700 transition hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200">
                            Login Pemohon
                        </a>
                    </div>

                    <!-- Stats Cards -->
                    <div class="mt-12 grid gap-4 sm:grid-cols-3">
                        <div
                            class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                            <p class="text-3xl font-black text-slate-900 dark:text-white">{{ $beritaAcaraCount }}</p>
                            <p class="mt-2 text-sm font-medium text-slate-500 dark:text-slate-400">Berita Acara</p>
                        </div>
                        <div
                            class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                            <p class="text-3xl font-black text-slate-900 dark:text-white">{{ $instansiCount }}</p>
                            <p class="mt-2 text-sm font-medium text-slate-500 dark:text-slate-400">Instansi Terdaftar
                            </p>
                        </div>
                        <div
                            class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm dark:border-slate-800 dark:bg-slate-900">
                            <p class="text-3xl font-black text-slate-900 dark:text-white">
                                {{ $latestBeritaAcara->count() }}</p>
                            <p class="mt-2 text-sm font-medium text-slate-500 dark:text-slate-400">Layanan Aktif</p>
                        </div>
                    </div>
                </div>

                <div class="relative flex items-center justify-center">
                    <div
                        class="absolute inset-0 rounded-[2.5rem] bg-gradient-to-br from-indigo-500/20 to-blue-400/20 blur-3xl">
                    </div>
                    <div
                        class="relative w-full overflow-hidden rounded-[2.5rem] border border-slate-200 bg-white p-6 shadow-2xl dark:border-slate-800 dark:bg-slate-900">
                        <div class="grid gap-4 md:grid-cols-2">
                            <div
                                class="rounded-[2rem] bg-gradient-to-br from-indigo-50 to-blue-50 p-5 dark:from-indigo-900/30 dark:to-blue-900/30">
                                <p
                                    class="text-xs font-black uppercase tracking-[0.3em] text-indigo-700 dark:text-indigo-300">
                                    Dashboard Layanan</p>
                                <p class="mt-3 text-2xl font-black text-slate-900 dark:text-white">Monitoring Real-Time
                                </p>
                                <div class="mt-6 space-y-3">
                                    <div
                                        class="rounded-2xl border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-900">
                                        <p class="text-sm font-bold text-slate-800 dark:text-slate-100">Status Layanan
                                        </p>
                                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Terkini dan
                                            Terintegrasi</p>
                                    </div>
                                    <div
                                        class="rounded-2xl border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-900">
                                        <p class="text-sm font-bold text-slate-800 dark:text-slate-100">Arsip Digital
                                        </p>
                                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Dokumentasi Lengkap
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div
                                    class="rounded-[2rem] bg-gradient-to-br from-indigo-700 to-blue-700 p-5 text-white">
                                    <p class="text-xs font-black uppercase tracking-[0.25em] text-blue-100">Instansi
                                        Terkait</p>
                                    <div class="mt-4 space-y-2 text-sm font-medium">
                                        @foreach ($featuredInstansi as $instansi)
                                            <div class="rounded-2xl bg-white/10 px-4 py-3 backdrop-blur">
                                                {{ $instansi }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Layanan Cards Section -->
        <section id="layanan" class="mx-auto max-w-7xl px-6 py-16 lg:px-8">
            <div class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.3em] text-indigo-700 dark:text-indigo-300">Berita
                        Acara Pemeriksaan</p>
                    <h3 class="mt-3 text-3xl font-black text-slate-900 dark:text-white sm:text-4xl">
                        Layanan dan Layanan Terintegrasi
                    </h3>
                    <p class="mt-3 max-w-2xl text-base text-slate-600 dark:text-slate-300">
                        Daftar layanan dan berita acara pemeriksaan terbaru yang tersedia di portal SPBE.
                    </p>
                </div>
            </div>

            <!-- Grid Cards -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                @forelse ($latestBeritaAcara as $berita)
                    <article
                        class="flex h-full flex-col rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl dark:border-slate-800 dark:bg-slate-900">
                        <!-- Kategori Layanan (Header Card) -->
                        <header class="mb-3">
                            <span
                                class="inline-flex items-center rounded-full bg-pink-100 px-3 py-1 text-xs font-black uppercase tracking-[0.25em] text-pink-700 dark:bg-pink-500/10 dark:text-pink-400">
                                {{ $berita->tindakLanjut?->layanan?->jenis_layanan?->namajenis ?? 'Layanan Administrasi Pemerintahan' }}
                            </span>
                        </header>

                        <!-- Sub Header (Sektor) -->
                        <div class="mb-4">
                            <p class="text-sm italic text-slate-500 dark:text-slate-400">
                                Sektor: {{ $berita->tindakLanjut?->layanan?->nama_instansi ?? 'Umum' }}
                            </p>
                        </div>

                        <!-- Body Card -->
                        <div class="mb-6 flex-1">
                            <h4 class="text-xl font-black text-slate-900 dark:text-white">
                                {{ $berita->ringkasan_pekerjaan ? \Illuminate\Support\Str::limit($berita->ringkasan_pekerjaan, 80) : 'Berita Acara Pemeriksaan' }}
                            </h4>

                            <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">
                                {{ $berita->ringkasan_masalah ? \Illuminate\Support\Str::limit($berita->ringkasan_masalah, 100) : 'Deskripsi layanan dan ringkasan pemeriksaan tersedia di halaman detail.' }}
                            </p>
                        </div>

                        <!-- Footer Card -->
                        <footer class="mt-auto pt-4 border-t border-slate-100 dark:border-slate-800">
                            <div class="flex items-center justify-between gap-4">
                                <span class="text-xs font-bold uppercase tracking-[0.25em] text-slate-400">
                                    {{ $berita->created_at?->locale('id')->translatedFormat('d F Y') ?? '-' }}
                                </span>

                                <a href="#"
                                    class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2 text-sm font-black text-white shadow-sm transition hover:bg-blue-700">
                                    🔗 Detail
                                </a>
                            </div>
                        </footer>
                    </article>
                @empty
                    <div
                        class="col-span-full rounded-[2rem] border border-dashed border-slate-300 bg-slate-50 px-8 py-16 text-center dark:border-slate-700 dark:bg-slate-900">
                        <p class="text-lg font-black text-slate-800 dark:text-white">Belum ada layanan tersedia</p>
                        <p class="mt-3 text-sm text-slate-500 dark:text-slate-400">
                            Silakan jalankan seeder untuk memuat data layanan.
                        </p>
                    </div>
                @endforelse
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="kontak" class="border-t border-slate-200 bg-white py-12 dark:border-slate-800 dark:bg-slate-950">
        <div class="mx-auto grid max-w-7xl gap-8 px-6 lg:grid-cols-[1.1fr_0.9fr] lg:px-8">
            <div>
                <p class="text-xs font-black uppercase tracking-[0.35em] text-indigo-700 dark:text-indigo-300">Portal
                    Resmi</p>
                <h4 class="mt-3 text-2xl font-black text-slate-900 dark:text-white">
                    Dinas Komunikasi dan Informatika
                </h4>
                <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600 dark:text-slate-300">
                    Sistem Informasi Berita Acara Pemeriksaan mendukung tata kelola pemerintahan berbasis elektronik
                    melalui
                    pencatatan hasil pemeriksaan yang transparan, terdokumentasi, dan siap ditindaklanjuti.
                </p>
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <p class="text-sm font-black uppercase tracking-[0.25em] text-slate-700 dark:text-slate-200">Alamat
                        Kantor</p>
                    <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">
                        Jl. Pulau Bangka, Kompleks Perkantoran Pemerintah Daerah<br>
                        Dinas Komunikasi dan Informatika
                    </p>
                </div>
                <div>
                    <p class="text-sm font-black uppercase tracking-[0.25em] text-slate-700 dark:text-slate-200">Kontak
                    </p>
                    <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">
                        Email: diskominfo@pemdaprov.go.id<br>
                        Telepon: (0717) 123456<br>
                        Layanan: Senin - Jumat, 08.00 - 16.00 WIB
                    </p>
                </div>
            </div>
        </div>

        <div
            class="mx-auto mt-10 max-w-7xl border-t border-slate-200 px-6 pt-6 text-sm text-slate-500 dark:border-slate-800 dark:text-slate-400 lg:px-8">
            &copy; {{ now()->year }} Pemerintah Daerah. Seluruh hak cipta dilindungi.
        </div>
    </footer>

    <script>
        const themeToggle = document.getElementById('theme-toggle');

        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                const isDark = document.documentElement.classList.toggle('dark');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            });
        }
    </script>
</body>

</html>
