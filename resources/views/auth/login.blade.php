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
    class="h-full bg-gradient-to-br from-slate-50 via-blue-50 to-slate-100 text-slate-800 transition-colors duration-300 dark:from-slate-950 dark:via-blue-950 dark:to-slate-900 dark:text-slate-100">
    <div class="min-h-screen px-4 py-6 lg:px-8">
        <div class="mx-auto flex max-w-6xl items-center justify-between pb-8">
            <a href="{{ route('home') }}" class="flex items-center gap-4">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-700 to-cyan-500 text-lg font-black text-white shadow-lg shadow-blue-500/20">
                    SI
                </div>
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.35em] text-blue-700 dark:text-cyan-300">Kominfo
                    </p>
                    <p class="text-sm font-bold text-slate-800 dark:text-white">Portal Berita Acara Pemeriksaan</p>
                </div>
            </a>

            <button id="theme-toggle" type="button"
                class="inline-flex h-12 w-12 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:border-blue-300 hover:text-blue-700 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-200 dark:hover:border-cyan-400 dark:hover:text-cyan-300">
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

        <div class="mx-auto flex min-h-[calc(100vh-10rem)] max-w-md items-center justify-center">
            <p class="text-xs font-black uppercase tracking-[0.35em] text-blue-700 dark:text-cyan-300">Akses
                Internal</p>
            <h2 class="mt-3 text-3xl font-black text-slate-900 dark:text-white">Masuk ke Sistem</h2>
            <p class="mt-3 text-sm leading-7 text-slate-500 dark:text-slate-400">
                Gunakan kredensial resmi untuk mengakses dashboard p
            <div
                class="w-full rounded-[2.5rem] border border-slate-200 bg-white p-8 shadow-2xl dark:border-slate-800 dark:bg-slate-900">
                <div class="mb-8">
                    emeriksaan dan layanan internal.
                    </p>
                </div>


                @if (session('login_error'))
                    <div
                        class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-4 text-sm text-red-700 dark:border-red-500/30 dark:bg-red-500/10 dark:text-red-300">
                        {{ session('login_error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email"
                            class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">Email
                            Kedinasan</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:focus:border-cyan-400 dark:focus:ring-cyan-400"
                            placeholder="nama@instansi.go.id">
                        @error('email')
                            <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="mb-2 flex items-center justify-between gap-4">
                            <label for="password"
                                class="block text-sm font-bold text-slate-700 dark:text-slate-200">Kata Sandi</label>
                            <a href="{{ route('password.request') }}"
                                class="text-xs font-bold text-blue-700 hover:text-blue-800 dark:text-cyan-300 dark:hover:text-cyan-200">
                                Lupa Password?
                            </a>
                        </div>
                        <input id="password" type="password" name="password" required
                            class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:focus:border-cyan-400 dark:focus:ring-cyan-400"
                            placeholder="Masukkan kata sandi">
                        @error('password')
                            <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <label
                            class="inline-flex items-center gap-3 text-sm font-medium text-slate-600 dark:text-slate-300">
                            <input type="checkbox" name="remember"
                                class="h-4 w-4 rounded border-slate-300 text-blue-700 focus:ring-blue-500 dark:border-slate-600 dark:bg-slate-900 dark:text-cyan-400 dark:focus:ring-cyan-400">
                            Ingat saya
                        </label>
                        <a href="{{ route('home') }}"
                            class="text-sm font-semibold text-slate-500 hover:text-blue-700 dark:text-slate-400 dark:hover:text-cyan-300">
                            Kembali ke beranda
                        </a>
                    </div>

                    <button type="submit"
                        class="inline-flex w-full items-center justify-center rounded-2xl bg-gradient-to-r from-blue-700 to-cyan-600 px-6 py-4 text-sm font-black text-white shadow-lg shadow-blue-500/20 transition hover:translate-y-[-1px]">
                        Masuk ke Dashboard
                    </button>
                </form>
            </div>
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
