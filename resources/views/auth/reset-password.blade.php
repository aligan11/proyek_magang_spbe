<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pulihkan Kata Sandi | DISKOMINFO</title>
    <style>
        @import url('https://fonts.googleapis.com');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f0f4f8]">

    <div class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
        <!-- Decor -->
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-600 rounded-full opacity-5 blur-3xl"></div>

        <div class="bg-white rounded-[2rem] shadow-2xl w-full max-w-md p-10 border border-slate-100 z-10">
            <!-- Icon & Header -->
            <div class="text-center mb-8">
                <div class="inline-flex p-4 bg-amber-50 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org" class="h-10 w-10 text-amber-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Lupa Kata Sandi?</h1>
                <p class="text-slate-500 mt-3 text-sm leading-relaxed">
                    Masukkan email kedinasan Anda. Kami akan mengirimkan tautan verifikasi untuk membuat kata sandi
                    baru.
                </p>
            </div>

            <!-- Alert Success (Jika email terkirim) -->
            @if (session('status'))
                <div
                    class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm rounded-2xl font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Gunakan struktur yang sama dengan di atas, ganti bagian Form menjadi: -->
            <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                @csrf
                <!-- Token tersembunyi dari Laravel -->
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email ?? old('email') }}">

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 ml-1">Kata Sandi Baru</label>
                    <input type="password" name="password"
                        class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-600 focus:outline-none transition-all"
                        required placeholder="••••••••">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1 font-semibold italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 ml-1">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation"
                        class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-600 focus:outline-none transition-all"
                        required placeholder="••••••••">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl shadow-xl shadow-blue-200 transition-all">
                    Perbarui Kata Sandi
                </button>
            </form>


            <!-- Back to Login -->
            <div class="mt-8 text-center">
                <a href="{{ route('login') }}"
                    class="inline-flex items-center text-sm font-bold text-slate-400 hover:text-blue-600 transition-colors">
                    <svg xmlns="http://www.w3.org" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Login
                </a>
            </div>
        </div>
    </div>

</body>

</html>
