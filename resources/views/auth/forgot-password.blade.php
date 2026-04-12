<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi - Portal Pemohon Diskominfo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://unpkg.com/lucide@latest"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .bg-government {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #1d4ed8 100%);
        }
    </style>
</head>

<body class="bg-government min-h-screen flex items-center justify-center p-4">

    <!-- Ornamen Latar Belakang -->
    <div class="fixed top-0 left-0 w-64 h-64 bg-blue-400 opacity-10 rounded-full -translate-x-1/2 -translate-y-1/2">
    </div>
    <div class="fixed bottom-0 right-0 w-96 h-96 bg-yellow-400 opacity-10 rounded-full translate-x-1/3 translate-y-1/3">
    </div>

    <div class="w-full max-w-md z-10" x-data="{ method: 'email', loading: false, sent: false }">

        <!-- Logo & Header -->
        <div class="text-center mb-8">
            <div class="inline-block p-3 bg-white rounded-2xl shadow-lg mb-4">
                <!-- Placeholder Logo Diskominfo -->
                <svg class="w-12 h-12 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                </svg>
            </div>
            <h1 class="text-white text-2xl font-bold tracking-tight">Portal Pemohon</h1>
            <p class="text-blue-100 text-sm opacity-80">Dinas Komunikasi dan Informatika</p>
        </div>

        <!-- Main Card -->
        <div class="glass-card rounded-3xl shadow-2xl overflow-hidden p-8">

            <!-- Keadaan Sebelum Terkirim -->
            <div x-show="!sent" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95">
                <h2 class="text-gray-800 text-xl font-semibold mb-2">Lupa Kata Sandi?</h2>
                <p class="text-gray-500 text-sm mb-6">Pilih metode verifikasi untuk mengatur ulang kata sandi Anda.</p>

                <!-- Tab Dinamis -->
                <div class="flex bg-gray-100 p-1 rounded-xl mb-6">
                    <button @click="method = 'email'"
                        :class="method === 'email' ? 'bg-white shadow-sm text-blue-700' : 'text-gray-500'"
                        class="flex-1 py-2 text-sm font-medium rounded-lg transition-all">Email</button>
                    <button @click="method = 'whatsapp'"
                        :class="method === 'whatsapp' ? 'bg-white shadow-sm text-blue-700' : 'text-gray-500'"
                        class="flex-1 py-2 text-sm font-medium rounded-lg transition-all">WhatsApp</button>
                </div>
                <form method="POST" action="{{ route('password.email') }}" @submit="loading = true">
                    @csrf

                    <!-- Input Email -->
                    <div x-show="method === 'email'" class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700">Email Terdaftar</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </span>
                            <!-- WAJIB ADA name="email" -->
                            <input type="email" name="email" :required="method === 'email'"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
                                placeholder="contoh@email.com">
                        </div>
                    </div>

                    <!-- Input WhatsApp -->
                    <div x-show="method === 'whatsapp'" class="space-y-4">
                        <label class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <span class="text-sm font-bold">+62</span>
                            </span>
                            <!-- WAJIB ADA name="whatsapp" -->
                            <input type="tel" name="whatsapp" :required="method === 'whatsapp'"
                                class="block w-full pl-12 pr-3 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
                                placeholder="812345678xx">
                        </div>
                    </div>

                    <!-- Tambahkan input hidden untuk mengirimkan 'method' ke controller -->
                    <input type="hidden" name="method" :value="method">

                    <button type="submit" :disabled="loading"
                        class="w-full mt-8 bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 rounded-xl shadow-lg transition-all flex items-center justify-center space-x-2">
                        <template x-if="!loading">
                            <span>Kirim Kode Verifikasi</span>
                        </template>
                        <template x-if="loading">
                            <div class="flex items-center">
                                <svg class="animate-spin h-5 w-5 mr-2 text-white" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span>Memproses...</span>
                            </div>
                        </template>
                    </button>
                </form>

            </div>

            <!-- Keadaan Setelah Berhasil Terkirim -->
            <div x-show="sent" class="text-center py-4" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95">
                <div
                    class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h2 class="text-gray-800 text-xl font-semibold mb-2">Instruksi Terkirim!</h2>
                <p class="text-gray-500 text-sm mb-8">Silakan periksa <span class="font-bold" x-text="method"></span>
                    Anda untuk instruksi pengaturan ulang kata sandi.</p>
                <button @click="sent = false" class="text-blue-700 font-medium hover:underline">Tidak menerima pesan?
                    Kirim ulang</button>
            </div>

            <!-- Navigasi Bawah -->
            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <a href="{{ route('loginPemohon') }}"
                    class="text-gray-400 text-sm hover:text-blue-700 transition-colors flex items-center justify-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span>Kembali ke Login</span>
                </a>
            </div>
        </div>

        <!-- Info Bantuan -->
        <p class="text-center text-blue-200 text-xs mt-8 opacity-70">
            Butuh bantuan teknis? Hubungi <a href="#" class="underline hover:text-white">Helpdesk Diskominfo</a>
        </p>
    </div>

</body>

</html>
