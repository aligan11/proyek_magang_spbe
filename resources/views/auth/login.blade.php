<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login Internal | DISKOMINFO</title>
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #004a99;
            background-image: radial-gradient(at 0% 0%, hsla(210, 100%, 23%, 1) 0, transparent 50%),
                radial-gradient(at 100% 100%, hsla(201, 100%, 35%, 1) 0, transparent 50%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .input-focus-effect:focus {
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes glow {

            0%,
            100% {
                box-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
            }

            50% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.6);
            }
        }


        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .animate-glow {
            animation: glow 3s ease-in-out infinite;
        }

        .animate-rotate-slow {
            animation: rotateSlow 12s linear infinite;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6 relative overflow-hidden">

    <!-- Elemen Dekoratif Background (Floating Blobs) -->
    <div
        class="absolute top-0 -left-20 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-[80px] opacity-20 animate-blob">
    </div>
    <div
        class="absolute bottom-0 -right-20 w-96 h-96 bg-cyan-400 rounded-full mix-blend-multiply filter blur-[80px] opacity-20 animate-blob animation-delay-2000">
    </div>

    <div class="w-full max-w-[480px] z-10">
        <!-- Logo/Badge Atas -->
        <div class="flex justify-center mb-8">

            <!-- Outer container -->
            <div
                class="bg-white/10 p-3 rounded-3xl backdrop-blur-md border border-white/20 
                    animate-float animate-glow transition-all duration-300 hover:scale-110">

                <!-- Inner -->
                <div
                    class="bg-white p-3 rounded-2xl shadow-lg 
                        transition duration-300 hover:shadow-2xl">

                    <!-- Icon -->
                    <svg class="h-6 w-6 text-blue-600 animate-rotate-slow hover:animate-none transition duration-300"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        <path d="M12 8v4m0 4h.01" stroke-linecap="round" />

                    </svg>
                </div>
            </div>

        </div>

        <div class="glass-card rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.2)] p-10 md:p-12">
            <!-- Header Section -->
            <div class="text-center mb-10">
                <h1 class="text-3xl font-800 text-slate-900 tracking-tight mb-2">Portal Internal</h1>
                <p class="text-slate-500 font-medium">Masuk ke Sistem Informasi Terpadu</p>
                <div class="flex justify-center mt-4">
                    <span class="h-1.5 w-12 bg-blue-600 rounded-full"></span>
                    <span class="h-1.5 w-2 bg-blue-200 rounded-full ml-1"></span>
                </div>
            </div>

            <!-- Error Session Alert -->
            @if (session('login_error') || $errors->any())
                <div class="mb-6 animate-float">
                    <div class="bg-red-50 border border-red-100 rounded-2xl p-4 flex items-start space-x-3 shadow-sm">
                        <div class="bg-red-100 p-1.5 rounded-lg flex-shrink-0">
                            <svg class="h-4 w-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xs font-bold text-red-800 uppercase tracking-wider">Akses Ditolak</h3>
                            <p class="text-sm text-red-600 mt-0.5 font-medium">
                                {{ session('login_error') ?? 'Kredensial yang Anda masukkan tidak cocok.' }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Email
                        Kedinasan</label>
                    <div class="group relative">
                        <div
                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full pl-12 pr-5 py-4 bg-slate-100/50 border border-slate-200 rounded-2xl text-slate-800 placeholder:text-slate-400 focus:bg-white focus:border-blue-600 focus:outline-none input-focus-effect transition-all duration-300"
                            placeholder="username@babelprov.go.id">
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center ml-1">
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest">Kata
                            Sandi</label>
                        <a href="{{ route('password.request') }}"
                            class="text-xs font-bold text-blue-600 hover:text-blue-800">Lupa?</a>
                    </div>
                    <div class="group relative">
                        <div
                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <input type="password" name="password" required
                            class="w-full pl-12 pr-5 py-4 bg-slate-100/50 border border-slate-200 rounded-2xl text-slate-800 placeholder:text-slate-400 focus:bg-white focus:border-blue-600 focus:outline-none input-focus-effect transition-all duration-300"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between py-2">
                    <label class="flex items-center group cursor-pointer">
                        <div class="relative">
                            <input type="checkbox" class="peer sr-only" name="remember">
                            <div
                                class="w-10 h-6 bg-slate-200 rounded-full peer peer-checked:bg-blue-600 transition-all duration-300">
                            </div>
                            <div
                                class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-4">
                            </div>
                        </div>
                        <span class="ml-3 text-sm font-semibold text-slate-600">Ingat Saya</span>
                    </label>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl shadow-[0_10px_20px_rgba(37,99,235,0.3)] transition-all duration-300 transform active:scale-95 flex items-center justify-center space-x-2">
                    <span>Masuk ke Dashboard</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M13 7l5 5m0 0l-5 5m5-5H6" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </form>
        </div>

        <!-- Footer -->
        <div class="mt-10 text-center">
            <p class="text-[11px] text-white/60 font-bold uppercase tracking-[0.3em] mb-2">DISKOMINFO PROV. KEP. BABEL
            </p>
            <div class="flex items-center justify-center space-x-4">
                <span class="h-[1px] w-8 bg-white/20"></span>
                <p class="text-[10px] text-white/40 font-medium tracking-wider italic">Protected by Secure Gateway 2.0
                </p>
                <span class="h-[1px] w-8 bg-white/20"></span>
            </div>
        </div>
    </div>

</body>

</html>
