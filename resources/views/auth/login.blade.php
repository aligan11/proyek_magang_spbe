    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Login Internal | DISKOMINFO</title>
        <style>
            @import url('https://fonts.googleapis.com');

            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        </style>
    </head>

    <body class="bg-[#0057ae]">

        <div class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
            <!-- Background Decor (Circles) -->
            <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-600 rounded-full opacity-10 blur-3xl"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-blue-800 rounded-full opacity-10 blur-3xl">
            </div>

            <div class="bg-white rounded-[2rem]  shadow-2xl w-full max-w-md p-10 border border-slate-100 z-10">
                <!-- Brand Header -->
                <div class="text-center mb-10">
                    <div class="inline-flex p-4 bg-blue-50 rounded-2xl mb-4">
                        <!-- Icon Shield/Lock -->
                        <svg xmlns="http://www.w3.org" class="h-10 w-10 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">DISKOMINFO</h1>
                    <p class="text-slate-500 mt-2 font-medium">Sistem Informasi Manajemen Terpadu</p>
                    <div class="mt-4 h-1 w-12 bg-blue-600 mx-auto rounded-full"></div>
                </div>

                <!-- Form Login -->
                <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-bold text-slate-700 ml-1">Email
                            Kedinasan</label>
                        <div class="relative group">
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-600 focus:bg-white focus:outline-none transition-all duration-300 @error('email') border-red-500 @enderror"
                                placeholder="nama@babelprov.go.id" required>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1 font-semibold italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <div class="flex justify-between items-center ml-1">
                            <label for="password" class="block text-sm font-bold text-slate-700">Kata Sandi</label>
                            <a href="{{ route('password.request') }}"
                                class="text-xs font-bold text-blue-600 hover:text-blue-800 transition">Lupa
                                Sandi?</a>
                        </div>
                        <input type="password" id="password" name="password"
                            class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-blue-600 focus:bg-white focus:outline-none transition-all duration-300 @error('password') border-red-500 @enderror"
                            placeholder="••••••••" required>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1 font-semibold italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me Logika -->
                    <div class="flex items-center ml-1">
                        <label class="relative flex items-center cursor-pointer">
                            <input type="checkbox" id="remember" name="remember"
                                class="w-4 h-4 text-blue-600 bg-slate-100 border-slate-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm font-medium text-slate-600 select-none">Ingat sesi saya di
                                perangkat
                                ini</span>
                        </label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl shadow-xl shadow-blue-200 transition-all duration-300 transform active:scale-[0.98]">
                        Masuk ke Portal
                    </button>
                </form>

                <!-- Formal Footer -->
                <div class="mt-12 text-center">
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-[0.2em] mb-1">Pusat Data dan
                        Informasi
                    </p>
                    <p class="text-[10px] text-slate-400 font-medium tracking-wide">Pemerintah Provinsi Kep. Bangka
                        Belitung
                    </p>
                </div>
            </div>
        </div>

    </body>

    </html>
