<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Internal | Portal Berita Acara Pemeriksaan</title>
    <script>
        (() => {
            const storedTheme = localStorage.getItem('theme');
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            document.documentElement.classList.toggle('dark', storedTheme ? storedTheme === 'dark' : systemDark);
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="h-full overflow-hidden bg-gradient-to-br from-slate-50 via-blue-50 to-slate-100 text-slate-800 transition-colors duration-300 dark:from-slate-950 dark:via-blue-950 dark:to-slate-900 dark:text-slate-100">

    <!-- Container Utama: Mengunci tinggi tepat 100vh di semua perangkat -->
    <div class="flex h-screen w-screen flex-col justify-between p-4 sm:p-6 lg:p-8 overflow-hidden">

        <!-- Header / Nav: Dibuat ringkas di HP agar hemat ruang vertikal -->
        <div class="mx-auto flex w-full max-w-6xl items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 sm:gap-4 group">
                <div
                    class="flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-br from-blue-700 to-cyan-500 text-base sm:text-lg font-black text-white shadow-lg shadow-blue-500/20 transition-transform group-hover:scale-105">
                    SI
                </div>
                <div>
                    <p
                        class="text-[10px] sm:text-xs font-black uppercase tracking-[0.25em] sm:tracking-[0.35em] text-blue-700 dark:text-cyan-300">
                        Kominfo</p>
                    <p class="text-xs sm:text-sm font-bold text-slate-800 dark:text-white line-clamp-1">Portal Berita
                        Acara Pemeriksaan</p>
                </div>
            </a>

            <button id="theme-toggle" type="button"
                class="inline-flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center rounded-xl sm:rounded-2xl border border-slate-200 bg-white text-slate-600 shadow-sm transition-all hover:border-blue-300 hover:text-blue-700 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-cyan-400 dark:hover:text-cyan-300 active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5 dark:block" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M12 3v2.25M12 18.75V21m9-9h-2.25M5.25 12H3m15.114 6.364-1.591-1.591M7.477 7.477 5.886 5.886m12.228 0-1.591 1.591M7.477 16.523l-1.591 1.591M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:hidden" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M21 12.79A9 9 0 1111.21 3c0 .214.014.425.04.632A7.5 7.5 0 0020.368 12.75c.207.026.418.04.632.04z" />
                </svg>
            </button>
        </div>

        <!-- Main Login Card Container: Otomatis membagi sisa ruang vertikal secara seimbang -->
        <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center py-2 sm:py-4">

            <!-- Header Teks Form: Responsif (Mengecil di HP agar ruang kartu lebih lapang) -->
            <div class="mb-4 sm:mb-6 text-center">
                <p
                    class="text-[10px] sm:text-xs font-black uppercase tracking-[0.35em] text-blue-700 dark:text-cyan-300">
                    Akses Internal</p>
                <h2 class="mt-1 sm:mt-2 text-2xl sm:text-3xl font-black tracking-tight text-slate-900 dark:text-white">
                    Masuk ke Sistem</h2>
                <p
                    class="mt-1 sm:mt-2 text-xs sm:text-sm leading-relaxed text-slate-500 dark:text-slate-400 max-w-sm mx-auto">
                    Gunakan kredensial resmi untuk mengakses dashboard pemeriksaan dan layanan internal.
                </p>
            </div>

            <!-- Kartu Form: Menggunakan rounded yang lebih dinamis di HP (rounded-3xl ke rounded-[2.5rem]) dan padding fleksibel -->
            <div
                class="w-full rounded-3xl sm:rounded-[2.5rem] border border-slate-200/80 bg-white p-6 sm:p-8 shadow-2xl shadow-slate-200/50 dark:border-slate-800/80 dark:bg-slate-900 dark:shadow-none">

                @if (session('login_error'))
                    <div
                        class="mb-4 rounded-xl sm:rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-xs sm:text-sm text-red-700 dark:border-red-500/30 dark:bg-red-500/10 dark:text-red-300">
                        {{ session('login_error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="space-y-4 sm:space-y-5">
                    @csrf

                    <!-- Input Email -->
                    <div>
                        <label for="email"
                            class="mb-1.5 block text-xs sm:text-sm font-bold text-slate-700 dark:text-slate-200">Email
                            Kedinasan</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="w-full rounded-xl sm:rounded-2xl border border-slate-300 bg-white px-3.5 py-3 sm:px-4 sm:py-3.5 text-xs sm:text-sm text-slate-800 outline-none transition-all placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:focus:border-cyan-400 dark:focus:ring-cyan-400/10"
                            placeholder="nama@instansi.go.id">
                        @error('email')
                            <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Password -->
                    <div>
                        <div class="mb-1.5 flex items-center justify-between gap-4">
                            <label for="password"
                                class="block text-xs sm:text-sm font-bold text-slate-700 dark:text-slate-200">Kata
                                Sandi</label>
                            <a href="{{ route('password.request') }}"
                                class="text-[11px] sm:text-xs font-bold text-blue-700 hover:text-blue-800 dark:text-cyan-300 dark:hover:text-cyan-200 transition-colors">
                                Lupa Password?
                            </a>
                        </div>
                        <input id="password" type="password" name="password" required
                            class="w-full rounded-xl sm:rounded-2xl border border-slate-300 bg-white px-3.5 py-3 sm:px-4 sm:py-3.5 text-xs sm:text-sm text-slate-800 outline-none transition-all placeholder:text-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:focus:border-cyan-400 dark:focus:ring-cyan-400/10"
                            placeholder="Masukkan kata sandi">
                        @error('password')
                            <p class="mt-1.5 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Opsi Tambahan -->
                    <div class="flex items-center justify-between gap-2 pt-0.5 text-xs sm:text-sm">
                        <label
                            class="inline-flex items-center gap-2 font-medium text-slate-600 dark:text-slate-300 cursor-pointer select-none">
                            <input type="checkbox" name="remember"
                                class="h-4 w-4 rounded border-slate-300 text-blue-700 focus:ring-blue-500 dark:border-slate-600 dark:bg-slate-900 dark:text-cyan-400 dark:focus:ring-cyan-400">
                            Ingat saya
                        </label>
                        <a href="{{ route('home') }}"
                            class="font-semibold text-slate-500 hover:text-blue-700 dark:text-slate-400 dark:hover:text-cyan-300 transition-colors">
                            Kembali ke beranda
                        </a>
                    </div>

                    <!-- Tombol Submit (Diperbaiki & Ditutup dengan Benar) -->
                    <button type="submit"
                        class="inline-flex w-full items-center justify-center rounded-xl sm:rounded-2xl bg-gradient-to-r from-blue-700 to-cyan-600 px-5 py-3.5 sm:px-6 sm:py-4 text-xs sm:text-sm font-black text-white shadow-lg shadow-blue-500/20 transition-all hover:opacity-95 hover:shadow-xl hover:shadow-blue-500/30 active:scale-[0.99]">
                        Masuk ke Dashboard
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer Hak Cipta Ringkas di Bagian Paling Bawah -->
        <div class="text-center text-[10px] text-slate-400 dark:text-slate-500">
            &copy; {{ date('Y') }} Kominfo. All rights reserved.
        </div>
    </div>

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
