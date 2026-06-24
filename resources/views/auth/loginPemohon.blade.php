<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pemohon | Portal Berita Acara Pemeriksaan</title>
    <script>
        (() => {
            const storedTheme = localStorage.getItem('theme');
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            document.documentElement.classList.toggle('dark', storedTheme ? storedTheme === 'dark' : systemDark);
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full bg-slate-100 text-slate-800 transition-colors duration-300 dark:bg-slate-950 dark:text-slate-100">
    <div class="min-h-screen px-4 py-6 lg:px-6">
        <div class="mx-auto flex max-w-7xl items-center justify-between pb-6">
            <a href="{{ route('home') }}" class="flex items-center gap-4">
                <div
                    class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-700 to-cyan-500 text-lg font-black text-white shadow-lg shadow-blue-500/20">
                    SI
                </div>
                <div>
                    <p class="text-xs font-black uppercase tracking-[0.35em] text-blue-700 dark:text-cyan-300">Pemohon
                    </p>
                    <p class="text-sm font-bold text-slate-800 dark:text-white">Portal Layanan Berita Acara</p>
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

        <div
            class="mx-auto grid min-h-[calc(100vh-7rem)] max-w-7xl overflow-hidden rounded-[2.5rem] border border-slate-200 bg-white shadow-2xl dark:border-slate-800 dark:bg-slate-900 lg:grid-cols-[1.02fr_0.98fr]">
            <section class="relative hidden overflow-hidden lg:flex">
                <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-800 to-blue-600"></div>
                <div
                    class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(255,255,255,0.2),transparent_22%),radial-gradient(circle_at_bottom_right,rgba(255,255,255,0.18),transparent_24%)]">
                </div>

                <div class="relative z-10 flex w-full flex-col justify-between p-12 text-white">
                    <div>
                        <div
                            class="inline-flex items-center rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-black uppercase tracking-[0.3em] backdrop-blur">
                            Layanan Pemohon
                        </div>
                        <h1 class="mt-8 text-5xl font-black leading-tight">
                            Portal Berita Acara Pemeriksaan
                        </h1>
                        <p class="mt-6 max-w-xl text-lg leading-8 text-blue-50/90">
                            Sistem Informasi Pemerintah Berbasis Elektronik (SPBE) untuk pengelolaan berita acara
                            pemeriksaan dan layanan publik yang terintegrasi.
                        </p>
                    </div>

                    <div class="rounded-[2rem] border border-white/15 bg-white/10 p-6 backdrop-blur">
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl bg-white/10 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.25em] text-cyan-100">Akses Online</p>
                                <p class="mt-3 text-3xl font-black">24/7</p>
                                <p class="mt-2 text-sm text-blue-50/80">Informasi tersedia secara daring</p>
                            </div>
                            <div class="rounded-2xl bg-white/10 p-5">
                                <p class="text-xs font-black uppercase tracking-[0.25em] text-cyan-100">Keamanan</p>
                                <p class="mt-3 text-3xl font-black">Terverifikasi</p>
                                <p class="mt-2 text-sm text-blue-50/80">Dilengkapi validasi akun dan captcha</p>
                            </div>
                        </div>


                    </div>
                </div>
            </section>

            <section class="flex items-center justify-center px-6 py-10 sm:px-10 lg:px-14">
                <div class="w-full max-w-xl">
                    <div class="mb-8">
                        <p class="text-xs font-black uppercase tracking-[0.35em] text-blue-700 dark:text-cyan-300">Login
                            Pemohon</p>
                        <h2 class="mt-3 text-3xl font-black text-slate-900 dark:text-white">Selamat datang</h2>
                        <p class="mt-3 text-sm leading-7 text-slate-500 dark:text-slate-400">
                            Masukkan kredensial Anda untuk mengakses portal layanan.
                        </p>
                    </div>

                    @if (session('success'))
                        <div
                            class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-4 text-sm text-emerald-700 dark:border-emerald-500/30 dark:bg-emerald-500/10 dark:text-emerald-300">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div
                            class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-4 text-sm text-red-700 dark:border-red-500/30 dark:bg-red-500/10 dark:text-red-300">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.pemohon') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="email"
                                class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:focus:border-cyan-400 dark:focus:ring-cyan-400"
                                placeholder="nama@email.com">
                            @error('email')
                                <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="mb-2 flex items-center justify-between gap-4">
                                <label for="password"
                                    class="block text-sm font-bold text-slate-700 dark:text-slate-200">Kata
                                    Sandi</label>
                                <a href="{{ route('forgotPemohon') }}"
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

                        <!-- Math Captcha -->
                        <div>
                            <div class="mb-2 flex items-center justify-between gap-4">
                                <label for="captcha_input"
                                    class="block text-sm font-bold text-slate-700 dark:text-slate-200">Hitung
                                    Jawaban</label>
                                <button type="button" id="refresh-captcha"
                                    class="text-xs font-black uppercase tracking-[0.25em] text-blue-700 hover:text-blue-800 dark:text-cyan-300 dark:hover:text-cyan-200">
                                    Muat Ulang
                                </button>
                            </div>

                            <div class="mb-3 flex items-center gap-3">
                                <div id="captcha-box"
                                    class="min-w-[132px] rounded-2xl bg-slate-900 px-5 py-4 text-center text-xl font-black text-white dark:bg-slate-800">
                                    ....
                                </div>
                                <p class="text-xs text-slate-500 dark:text-slate-400">
                                    Masukkan hasil perhitungan di atas.
                                </p>
                            </div>

                            <input id="captcha_input" type="number" name="captcha_input"
                                value="{{ old('captcha_input') }}" required
                                class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-100 dark:focus:border-cyan-400 dark:focus:ring-cyan-400"
                                placeholder="Jawaban">
                            @error('captcha_input')
                                <p class="mt-2 text-sm font-medium text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <label
                                class="inline-flex items-center gap-3 text-sm font-medium text-slate-600 dark:text-slate-300">
                                <input type="checkbox" id="remember" name="remember"
                                    class="h-4 w-4 rounded border-slate-300 text-blue-700 focus:ring-blue-500 dark:border-slate-600 dark:bg-slate-900 dark:text-cyan-400 dark:focus:ring-cyan-400">
                                Ingat sesi saya
                            </label>
                            <a href="{{ route('home') }}"
                                class="text-sm font-semibold text-slate-500 hover:text-blue-700 dark:text-slate-400 dark:hover:text-cyan-300">
                                Kembali ke beranda
                            </a>
                        </div>

                        <button type="submit"
                            class="inline-flex w-full items-center justify-center rounded-2xl bg-gradient-to-r from-blue-700 to-cyan-600 px-6 py-4 text-sm font-black text-white shadow-lg shadow-blue-500/20 transition hover:translate-y-[-1px]">
                            Masuk ke Sistem
                        </button>
                    </form>

                    <div class="mt-8 border-t border-slate-200 pt-6 dark:border-slate-800">
                        <p class="text-center text-sm text-slate-500 dark:text-slate-400">
                            Belum memiliki akun pemohon?
                        </p>
                        <a href="{{ route('registerPage') }}"
                            class="mt-4 inline-flex w-full items-center justify-center rounded-2xl border border-slate-300 px-6 py-4 text-sm font-bold text-slate-700 transition hover:bg-slate-100 dark:border-slate-700 dark:text-slate-200 dark:hover:bg-slate-900">
                            Daftar Akun Baru
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const captchaBox = document.getElementById('captcha-box');
        const refreshCaptchaButton = document.getElementById('refresh-captcha');

        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                const isDark = document.documentElement.classList.toggle('dark');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            });
        }

        // Math Captcha
        let currentAnswer = 0;
        const loadCaptcha = () => {
            const num1 = Math.floor(Math.random() * 20) + 1;
            const num2 = Math.floor(Math.random() * 20) + 1;
            const operations = ['+', '-', '×'];
            const operation = operations[Math.floor(Math.random() * operations.length)];
            let answer;

            if (operation === '+') {
                answer = num1 + num2;
            } else if (operation === '-') {
                // Make sure num1 is bigger to avoid negative numbers
                if (num1 < num2) {
                    [num1, num2] = [num2, num1];
                }
                answer = num1 - num2;
            } else { // multiplication
                const smallNum1 = Math.floor(Math.random() * 10) + 1;
                const smallNum2 = Math.floor(Math.random() * 10) + 1;
                captchaBox.textContent = `${smallNum1} × ${smallNum2} = ?`;
                currentAnswer = smallNum1 * smallNum2;
                // Store in session via AJAX
                fetch('/generate-math-captcha', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                            '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        answer: currentAnswer
                    })
                });
                return;
            }

            captchaBox.textContent = `${num1} ${operation} ${num2} = ?`;
            currentAnswer = answer;

            // Store in session via AJAX
            fetch('/generate-math-captcha', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ||
                        '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    answer: currentAnswer
                })
            });
        };

        if (refreshCaptchaButton) {
            refreshCaptchaButton.addEventListener('click', loadCaptcha);
        }

        loadCaptcha();
    </script>
</body>

</html>
