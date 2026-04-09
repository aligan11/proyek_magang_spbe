<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- FIX: Link Alpine.js yang benar -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>Registrasi Pemohon | DISKOMINFO</title>
    <style>
        /* FIX: URL Google Fonts yang benar */
        @import url('https://googleapis.com');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #004a99;
            background-image: radial-gradient(at 0% 0%, hsla(210, 100%, 23%, 1) 0, transparent 50%),
                radial-gradient(at 100% 100%, hsla(201, 100%, 35%, 1) 0, transparent 50%);
        }

        .custom-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-[#0057ae]" x-data="{ tipe: 'internal' }">

    <div class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
        <!-- Background Decor -->
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-600 rounded-full opacity-10 blur-3xl"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-blue-800 rounded-full opacity-10 blur-3xl"></div>

        <div
            class="bg-white rounded-[2rem] shadow-2xl w-full max-w-2xl p-8 md:p-10  border border-slate-100 z-10 my-10">
            <!-- Brand Header -->
            <div class="text-center mb-6">
                <div class="inline-flex p-3 bg-blue-50 rounded-2xl mb-3">
                    <!-- FIX: SVG Namespace & Path -->
                    <svg xmlns="http://w3.org" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Daftar Akun Pemohon</h1>
                <p class="text-slate-500 mt-1 text-sm font-medium">Pilih kategori pendaftaran Anda</p>
            </div>

            <!-- Tab Selector -->
            <div class="flex p-1.5 bg-slate-100 rounded-2xl mb-8">
                <button type="button" @click="tipe = 'internal'"
                    :class="tipe === 'internal' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                    class="flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300">
                    ASN (Internal)
                </button>
                <button type="button" @click="tipe = 'eksternal'"
                    :class="tipe === 'eksternal' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                    class="flex-1 py-2.5 rounded-xl font-bold text-sm transition-all duration-300">
                    Masyarakat Umum (Eksternal)
                </button>
            </div>

            <form method="POST" class="space-y-5 custom-scroll overflow-y-auto max-h-[60vh] px-2"
                action="{{ route('registerPemohon') }}">
                @csrf
                <input type="hidden" name="tipe_user" :value="tipe">

                <!-- Baris 1: Email & Password -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700 ml-1 uppercase tracking-wider">Nama
                            Lengkap</label>
                        <input type="text" name="nama_lengkap"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600 focus:bg-white focus:outline-none transition-all"
                            placeholder="Sesuai KTP" required>
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700 ml-1 uppercase tracking-wider">NIK
                            (KTP)</label>
                        <input type="text" name="nik" maxlength="16"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600 focus:bg-white focus:outline-none transition-all"
                            placeholder="16 Digit NIK" required>
                    </div>
                </div>
                <!-- Baris 2: NIK & Nama -->


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700 ml-1 uppercase tracking-wider">Email
                            Utama</label>
                        <input type="email" name="email"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600 focus:bg-white focus:outline-none transition-all"
                            placeholder="contoh@mail.com" required>
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700 ml-1 uppercase tracking-wider">Kata
                            Sandi</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600 focus:bg-white focus:outline-none transition-all"
                            placeholder="••••••••" required>
                    </div>
                </div>



                <!-- Baris 3 Khusus Internal: NIP & Instansi -->
                <div x-show="tipe === 'internal'" x-transition class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700 ml-1 uppercase tracking-wider">NIP (18
                            Digit)</label>
                        <input type="text" name="nip" maxlength="18"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600 focus:bg-white focus:outline-none transition-all"
                            placeholder="Masukkan NIP" :required="tipe === 'internal'">
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700 ml-1 uppercase tracking-wider">Instansi /
                            OPD</label>
                        <select name="id_instansi"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600 focus:bg-white focus:outline-none transition-all"
                            :required="tipe === 'internal'">
                            <option value="">Pilih Instansi</option>
                            <option value="1">DISKOMINFO</option>
                            <option value="2">BAPPEDA</option>
                            <option value="3">DPPKAD</option>
                        </select>
                    </div>
                </div>

                <!-- Baris 4: No HP & Alamat -->
                <div class="grid grid-cols-1 gap-4">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700 ml-1 uppercase tracking-wider">No.
                            WhatsApp</label>
                        <input type="tel" name="no_hp"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600 focus:bg-white focus:outline-none transition-all"
                            placeholder="0812xxxx" required>
                    </div>
                    <!-- Tampil hanya jika Eksternal -->
                    <div x-show="tipe === 'eksternal'" x-transition class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700 ml-1 uppercase tracking-wider">Alamat
                            Lengkap</label>
                        <textarea name="alamat" rows="2"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600 focus:bg-white focus:outline-none transition-all"
                            placeholder="Alamat domisili sesuai KTP..." :required="tipe === 'eksternal'"></textarea>
                    </div>
                </div>

                <!-- CAPTCHA -->
                <div class="bg-blue-50/60 p-4 rounded-2xl border border-blue-100 flex items-center justify-between">

                    <!-- LEFT: CAPTCHA DISPLAY -->
                    <div class="flex items-center gap-3">

                        <!-- TEXT CAPTCHA -->
                        <div
                            class="bg-white px-5 py-2 rounded-xl shadow-sm border border-blue-200 font-mono font-extrabold text-blue-600 tracking-[0.35em] text-lg select-none italic">
                            {{ session('captcha') }}
                        </div>

                        <!-- REFRESH -->
                        <a href="{{ route('registerPage') }}"
                            class="p-2 rounded-lg text-blue-600 hover:bg-blue-100 transition flex items-center justify-center"
                            title="Refresh Captcha">

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </a>

                    </div>

                    <!-- RIGHT: INPUT -->
                    <div class="flex flex-col items-end">
                        <input type="text" name="captcha" placeholder="Kode"
                            class="w-32 px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-600 outline-none uppercase font-bold text-center tracking-widest"
                            required>

                        <!-- ERROR -->
                        @error('captcha')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <!-- Register Button -->
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl shadow-xl shadow-blue-200 transition-all duration-300 transform active:scale-[0.98]">
                    Daftar Sekarang
                </button>

                <p class="text-center text-sm font-medium text-slate-600">
                    Sudah memiliki akun? <a href="{{ route('loginPemohon') }}"
                        class="text-blue-600 font-bold hover:text-blue-800 transition-all">Kembali ke Login</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>
