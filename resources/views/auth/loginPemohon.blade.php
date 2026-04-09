<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pemohon | Portal Layanan Diskominfo</title>
    <!-- Pastikan file CSS & JS terintegrasi dengan Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-diskominfo-gradient {
            /* Gradasi Biru Kominfo yang lebih modern */
            background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%);
        }

        .pattern-overlay {
            /* Menggunakan pattern dot/grid digital */
            background-image: url('https://transparenttextures.com');
            opacity: 0.05;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

    <!-- Container Utama -->
    <div
        class="max-w-5xl w-full bg-white shadow-2xl rounded-3xl overflow-hidden flex flex-col md:flex-row min-h-[650px]">

        <!-- SISI KIRI: Branding & Digital Information -->
        <div
            class="hidden md:flex md:w-1/2 bg-diskominfo-gradient relative p-12 flex-col justify-between overflow-hidden">
            <div class="pattern-overlay absolute inset-0"></div>

            <div class="relative z-10">
                <div class="flex items-center space-x-3 mb-10">
                    <!-- Logo Badge -->
                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-xl rotate-3">
                        <svg class="w-10 h-10 text-blue-900" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                        </svg>
                    </div>
                    <div class="text-white">
                        <p class="text-[10px] font-light tracking-widest uppercase opacity-80">Pemerintah Daerah</p>
                        <p class="text-lg font-bold leading-tight uppercase tracking-tighter">DISKOMINFO</p>
                    </div>
                </div>

                <h1 class="text-4xl font-bold text-white leading-tight mb-6">
                    Akses Transformasi <br><span class="text-blue-400">Digital Terpadu.</span>
                </h1>
                <p class="text-blue-100 text-lg font-light leading-relaxed opacity-90">

                </p>
            </div>

            <!-- Statistik/Trust Element -->
            <div class="relative z-10 flex space-x-6 text-white border-t border-white/20 pt-8">
                <div>
                    <p class="text-2xl font-bold">24/7</p>
                    <p class="text-[10px] uppercase opacity-60">Layanan Online</p>
                </div>
                <div class="border-l border-white/20 pl-6">
                    <p class="text-2xl font-bold">ISO</p>
                    <p class="text-[10px] uppercase opacity-60">Keamanan Data</p>
                </div>
            </div>
        </div>

        <!-- SISI KANAN: Form Login -->
        <div class="w-full md:w-1/2 p-8 lg:p-16 flex flex-col justify-center">

            <!-- Header Form -->
            <div class="mb-10 text-center md:text-left">
                <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Selamat Datang</h2>
                <p class="text-slate-500 mt-2">Silakan login untuk mengakses portal pemohon</p>
            </div>



            <!-- Kode di bawah ini adalah bagian Form yang sudah diperbarui -->
            <form action="#" class="space-y-5">
                <!-- Username / Email -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 mb-2 uppercase tracking-[0.2em]">Identitas
                        Pengguna</label>
                    <div class="relative group">
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 group-focus-within:text-blue-600 transition-colors">
                            <svg xmlns="http://w3.org" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <input type="text" placeholder="NIK atau Username"
                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:bg-white focus:border-blue-600 outline-none transition-all duration-300">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <div class="flex justify-between mb-2">
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.2em]">Kata
                            Sandi</label>
                        <a href="#"
                            class="text-xs font-semibold text-blue-600 hover:text-blue-800 transition">Lupa?</a>
                    </div>
                    <div class="relative group">
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 group-focus-within:text-blue-600 transition-colors">
                            <svg xmlns="http://w3.org" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </span>
                        <input type="password" placeholder="••••••••"
                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:bg-white focus:border-blue-600 outline-none transition-all duration-300">
                    </div>
                </div>

                <!-- BAGIAN CAPTCHA (Pilih salah satu) -->

                <!-- Opsi 1: Google reCAPTCHA (Sangat Direkomendasikan untuk Web Govt) -->
                <!-- Bagian Captcha Huruf Kapital -->
                <div class="space-y-2" x-data="captchaHandler()">
                    <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.2em]">Kode
                        Verifikasi</label>
                    <div class="flex items-center gap-2">
                        <!-- Kotak Kode -->
                        <div class="relative group">
                            <div class="bg-slate-900 text-white px-5 py-3 rounded-2xl font-black text-xl tracking-[0.3em] shadow-lg italic select-none min-w-[120px] text-center"
                                x-text="captchaText">
                                <!-- Text diisi oleh AlpineJS -->
                            </div>
                            <!-- Tombol Regenerate -->
                            <button type="button" @click="refreshCaptcha()"
                                class="absolute -top-2 -right-2 bg-blue-600 text-white p-1.5 rounded-full hover:bg-blue-700 shadow-md transition-transform active:rotate-180 duration-500">
                                <svg xmlns="http://w3.org" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </button>
                        </div>

                        <div class="text-xl font-bold text-slate-300">/</div>

                        <!-- Input Kode -->
                        <div class="flex-1 relative group">
                            <input type="text" name="captcha_input" placeholder="Ketik kode" required
                                class="w-full px-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:bg-white focus:border-blue-600 outline-none transition-all duration-300 font-bold uppercase tracking-widest placeholder:normal-case placeholder:font-normal placeholder:tracking-normal">
                        </div>
                    </div>
                    <p class="text-[10px] text-slate-400 italic font-medium">* Masukkan huruf kapital yang muncul untuk
                        verifikasi.</p>
                </div>

                <!-- Remember Me & Policy -->
                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="remember"
                        class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                    <label for="remember" class="text-xs text-slate-600">Ingat sesi saya di perangkat ini</label>
                </div>

                <!-- Button Masuk -->
                <button type="submit"
                    class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-4 rounded-2xl shadow-xl shadow-blue-200 transition-all duration-300 transform hover:scale-[1.02] active:scale-95">
                    Masuk ke Sistem
                </button>
            </form>


            <!-- Registration Footer -->
            <div class="mt-10 pt-8 border-t border-slate-100">
                <p class="text-center text-slate-500 text-sm italic">"Belum punya akun pemohon? Silakan hubungi CS atau
                    daftar mandiri melalui tombol di bawah."</p>
                <a href="{{ route('registerPage') }}"> <button
                        class="mt-4 w-full border-2 border-blue-100 text-blue-700 font-bold py-3 rounded-2xl hover:bg-blue-50 hover:border-blue-600 transition-all duration-300">
                        Pendaftaran Akun Baru
                    </button></a>
            </div>

            <!-- Footer Small Info -->
            <div class="mt-10 text-center">
                <p class="text-[9px] text-slate-400 uppercase tracking-widest leading-loose">
                    &copy; 2024 Dinas Komunikasi dan Informatika <br> Komitmen menjaga keamanan data sesuai regulasi
                    yang berlaku.
                </p>
            </div>
        </div>

    </div>

</body>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('captchaHandler', () => ({
            captchaText: '',
            init() {
                this.refreshCaptcha();
            },
            async refreshCaptcha() {
                this.captchaText = ''; // Reset teks saat loading
                try {
                    // Pastikan route '/generate-captcha' sudah ada di web.php
                    const response = await fetch('/generate-captcha');
                    const data = await response.json();
                    this.captchaText = data.captcha;
                } catch (error) {
                    this.captchaText = 'ERR';
                    console.error(
                        'Gagal memuat captcha. Pastikan route /generate-captcha sudah benar.'
                        );
                }
            }
        }))
    })
</script>

</html>
