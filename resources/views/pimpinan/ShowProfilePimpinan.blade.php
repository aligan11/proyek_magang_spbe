@extends('pimpinan.layout.AppPimpinan')

@section('dashboard')
    <div class="min-h-screen bg-slate-50/50 py-8 px-4 sm:px-6 lg:px-8" x-data="{ tab: 'profile' }">
        <div class="max-w-5xl mx-auto">

            <!-- Header / Navigation -->
            <div class="flex items-center justify-between mb-10">
                <div class="flex items-center gap-5">
                    <a href="{{ route('indexMandat', 1) }}"
                        class="group p-3 bg-white rounded-2xl shadow-sm border border-slate-200 hover:bg-blue-600 hover:border-blue-600 transition-all duration-300">
                        <i data-lucide="arrow-left"
                            class="w-5 h-5 text-slate-600 group-hover:text-white transition-colors"></i>
                    </a>
                    <div>
                        <h1 class="text-3xl font-black text-slate-900 tracking-tight">Profile Pimpinan</h1>
                        <p class="text-slate-500 text-sm font-medium flex items-center gap-2">
                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                            Kelola informasi akun dan otoritas sistem
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <!-- Left Column: Profile Card -->
                <div class="lg:col-span-4 space-y-6">
                    <div
                        class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 border border-slate-100 p-8 text-center relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-br from-blue-600 to-indigo-700"></div>

                        <div class="relative z-10">
                            <form action="{{ route('pimpinan.profile.update') }}" method="POST"
                                enctype="multipart/form-data" id="avatarForm">
                                @csrf
                                @method('PUT')
                                <div class="relative inline-block mb-5 group">
                                    <div class="w-32 h-32 bg-white p-1 rounded-full shadow-lg overflow-hidden">
                                        <div
                                            class="w-full h-full bg-slate-100 rounded-full flex items-center justify-center border border-slate-100 overflow-hidden relative">
                                            @if ($dataPetugas->avatar)
                                                <img src="{{ asset('storage/avatars/' . $dataPetugas->avatar) }}"
                                                    class="w-full h-full object-cover">
                                            @else
                                                <i data-lucide="user" class="text-slate-400 w-16 h-16"></i>
                                            @endif
                                            <label
                                                class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                                                <i data-lucide="camera" class="text-white w-6 h-6"></i>
                                                <input type="file" name="avatar" class="hidden"
                                                    onchange="document.getElementById('avatarForm').submit()">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="absolute bottom-2 right-2 w-6 h-6 bg-emerald-500 rounded-full border-4 border-white"
                                        title="Online"></div>
                                </div>
                                <input type="hidden" name="name" value="{{ $dataPetugas->name }}">
                                <input type="hidden" name="email" value="{{ $dataPetugas->email }}">
                                <input type="hidden" name="phone" value="{{ $dataPetugas->phone }}">
                            </form>

                            <h2 class="text-2xl font-black text-slate-900 tracking-tight">{{ $dataPetugas->name }}</h2>
                            <div class="inline-flex items-center gap-2 mt-2 px-3 py-1 bg-blue-50 rounded-lg">
                                <i data-lucide="shield-check" class="w-3.5 h-3.5 text-blue-600"></i>
                                <span
                                    class="text-blue-700 font-bold text-[10px] uppercase tracking-wider">{{ $dataPetugas->role }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Menu -->
                    <div class="bg-white rounded-[2rem] p-3 shadow-sm border border-slate-100 space-y-1">
                        <button @click="tab = 'profile'"
                            :class="tab === 'profile' ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' :
                                'text-slate-600 hover:bg-slate-50'"
                            class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all duration-300">
                            <i data-lucide="user" class="w-5 h-5"></i>
                            Data Personalia
                        </button>
                        <button @click="tab = 'security'"
                            :class="tab === 'password' ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' :
                                'text-slate-600 hover:bg-slate-50'"
                            class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all duration-300">
                            <i data-lucide="lock" class="w-5 h-5"></i>
                            Keamanan Akun
                        </button>
                    </div>
                </div>

                <!-- Right Column: Forms -->
                <div class="lg:col-span-8">
                    <!-- Profile Tab -->
                    <div x-show="tab === 'profile'" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 p-8 sm:p-10">
                        <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-100">
                            <h3 class="text-xl font-bold text-slate-900 flex items-center gap-3">
                                <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                                Detail Personalia
                            </h3>
                        </div>

                        <form action="{{ route('pimpinan.profile.update') }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Nama
                                        Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name', $dataPetugas->name) }}"
                                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Email
                                        Official</label>
                                    <input type="email" name="email" value="{{ old('email', $dataPetugas->email) }}"
                                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700">
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Nomor
                                        WhatsApp</label>
                                    <input type="text" name="phone" value="{{ old('phone', $dataPetugas->phone) }}"
                                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Unit
                                        Kerja</label>
                                    <input type="text" disabled
                                        value="{{ $dataPetugas->unitKerja ?? 'Dinas Komunikasi dan Informatika' }}"
                                        class="w-full px-6 py-4 bg-slate-100 border border-slate-100 rounded-2xl font-bold text-slate-400 cursor-not-allowed">
                                </div>
                            </div>
                            <div class="pt-4">
                                <button type="submit"
                                    class="px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-xl shadow-blue-200 transition-all active:scale-95">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Security Tab -->
                    <div x-show="tab === 'security'" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 p-8 sm:p-10">
                        <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-100">
                            <h3 class="text-xl font-bold text-slate-900 flex items-center gap-3">
                                <span class="w-1.5 h-6 bg-rose-600 rounded-full"></span>
                                Ganti Kata Sandi
                            </h3>
                        </div>

                        <form action="{{ route('pimpinan.password.update') }}" method="POST" class="space-y-6"
                            x-data="{ showOld: false, showNew: false, showConfirm: false }">
                            @csrf
                            @method('PUT')
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Kata
                                    Sandi Saat Ini</label>
                                <div class="relative">
                                    <input :type="showOld ? 'text' : 'password'" name="current_password" required
                                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-rose-100 focus:border-rose-600 outline-none transition-all font-bold">
                                    <button type="button" @click="showOld = !showOld"
                                        class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition-colors">
                                        <i :data-lucide="showOld ? 'eye-off' : 'eye'" class="w-5 h-5"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Kata
                                        Sandi Baru</label>
                                    <div class="relative">
                                        <input :type="showNew ? 'text' : 'password'" name="new_password" required
                                            class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold">
                                        <button type="button" @click="showNew = !showNew"
                                            class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition-colors">
                                            <i :data-lucide="showNew ? 'eye-off' : 'eye'" class="w-5 h-5"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Konfirmasi
                                        Kata Sandi Baru</label>
                                    <div class="relative">
                                        <input :type="showConfirm ? 'text' : 'password'" name="new_password_confirmation"
                                            required
                                            class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold">
                                        <button type="button" @click="showConfirm = !showConfirm"
                                            class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition-colors">
                                            <i :data-lucide="showConfirm ? 'eye-off' : 'eye'" class="w-5 h-5"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-4">
                                <button type="submit"
                                    class="px-10 py-4 bg-slate-900 hover:bg-black text-white font-bold rounded-2xl shadow-xl shadow-slate-200 transition-all active:scale-95">
                                    Perbarui Kata Sandi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
