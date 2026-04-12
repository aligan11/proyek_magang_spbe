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


        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            20%,
            60% {
                transform: translateX(-4px);
            }

            40%,
            80% {
                transform: translateX(4px);
            }
        }

        .animate-shake {
            animation: shake 0.4s cubic-bezier(.36, .07, .19, .97) both;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

    <!-- Toast Notifikasi Pojok Kanan Atas -->
    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full opacity-0"
            x-transition:enter-end="translate-x-0 opacity-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
            class="fixed top-5 right-5 z-[9999] w-full max-w-sm">

            <div class="bg-white border-l-4 border-emerald-500 shadow-2xl rounded-2xl p-4 flex items-center space-x-4">
                <!-- Icon Success -->
                <div class="flex-shrink-0">
                    <div class="bg-emerald-100 p-2 rounded-xl text-emerald-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                </div>

                <!-- Pesan -->
                <div class="flex-1">
                    <h3 class="text-sm font-bold text-slate-800">Pendaftaran Berhasil!</h3>
                    <p class="text-xs text-slate-500 mt-0.5">{{ session('success') }}</p>
                </div>

                <!-- Tombol Close -->
                <button @click="show = false" class="text-slate-300 hover:text-slate-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <!-- Toast Notifikasi Error (Pojok Kanan Atas) -->
    @if ($errors->any())
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full opacity-0"
            x-transition:enter-end="translate-x-0 opacity-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
            class="fixed top-5 right-5 z-[9999] w-full max-w-sm">

            <div class="bg-white border-l-4 border-red-500 shadow-2xl rounded-2xl p-4 flex items-center space-x-4">
                <!-- Icon Error -->
                <div class="flex-shrink-0">
                    <div class="bg-red-100 p-2 rounded-xl text-red-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Pesan -->
                <div class="flex-1">
                    <h3 class="text-sm font-bold text-slate-800">Terjadi Kesalahan</h3>
                    <p class="text-xs text-slate-500 mt-0.5">{{ $errors->first() }}</p>
                </div>

                <!-- Tombol Close -->
                <button @click="show = false" class="text-slate-300 hover:text-slate-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    @endif



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
            <form method="POST" action="{{ route('login.pemohon') }}" class="space-y-5">
                @csrf
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
                        <input type="text" placeholder="NIK atau Username" name="email"
                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:bg-white focus:border-blue-600 outline-none transition-all duration-300">

                    </div>
                    @error('email')
                        <p class="text-[10px] text-red-500 mt-1.5 ml-2 font-medium italic">* {{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <div class="flex justify-between mb-2">
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-[0.2em]">Kata
                            Sandi</label>
                        <a href="{{ route('forgotPemohon') }}"
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
                        <input type="password" placeholder="••••••••" name="password"
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
                            <div class="bg-slate-900 text-white px-5 py-3 rounded-2xl font-black text-xl tracking-[0.3em] shadow-lg italic select-none min-w-[120px] text-center border-2 border-slate-700"
                                x-text="captchaText">
                            </div>
                            <!-- Tombol Regenerate -->
                            <button type="button" @click="refreshCaptcha()"
                                class="absolute -top-2 -right-2 bg-blue-600 text-white p-1.5 rounded-full hover:bg-blue-700 shadow-md transition-all active:rotate-180 duration-500 hover:scale-110">
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
                                class="w-full px-4 py-4 rounded-2xl outline-none transition-all duration-300 font-bold uppercase tracking-widest 
                placeholder:normal-case placeholder:font-normal placeholder:tracking-normal
                @error('captcha_input') 
                    bg-red-50 border-2 border-red-500 text-red-600 animate-shake focus:ring-4 focus:ring-red-100
                @else 
                    bg-slate-50 border border-slate-200 focus:ring-4 focus:ring-blue-100 focus:bg-white focus:border-blue-600 text-slate-700
                @enderror">

                            {{-- Icon Peringatan jika Error --}}
                            @error('captcha_input')
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- Pesan Error & Hint --}}
                    @error('captcha_input')
                        <p class="text-[11px] text-red-600 font-bold flex items-center gap-1 animate-pulse">
                            <span class="w-1.5 h-1.5 bg-red-600 rounded-full"></span>
                            {{ $message }}
                        </p>
                    @else
                        <p class="text-[10px] text-slate-400 italic font-medium">* Masukkan huruf kapital yang muncul untuk
                            verifikasi.</p>
                    @enderror
                </div>

                <!-- Remember Me & Policy -->
                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="remember" name="remember"
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
