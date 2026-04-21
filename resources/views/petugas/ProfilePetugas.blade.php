@extends('petugas.layout.AppPetugas')

@section('dashboard')
    <div class="min-h-screen bg-slate-50/50 py-8 px-4 sm:px-6 lg:px-8" x-data="{ tab: 'profile' }">
        <div class="max-w-5xl mx-auto">

            <!-- Header -->
            <div class="flex items-center justify-between mb-10">
                <div class="flex items-center gap-5">
                    <a href="{{ route('petugas.index') }}"
                        class="group p-3 bg-white rounded-2xl shadow-sm border border-slate-200 hover:bg-blue-600 hover:border-blue-600 transition-all duration-300">
                        <i data-lucide="arrow-left"
                            class="w-5 h-5 text-slate-600 group-hover:text-white transition-colors"></i>
                    </a>
                    <div>
                        <h1 class="text-3xl font-black text-slate-800 tracking-tight">Profil Saya</h1>
                        <p class="text-slate-500 text-sm font-medium">Kelola informasi identitas dan keamanan akun petugas.</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <!-- Left Column -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 border border-slate-100 p-8 text-center relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-24 bg-[#1e293b]"></div>

                        <div class="relative z-10">
                            <form action="{{ route('petugas.profile.update') }}" method="POST" enctype="multipart/form-data" id="avatarForm">
                                @csrf
                                @method('PUT')
                                <div class="relative inline-block mb-5 group">
                                    <div class="w-32 h-32 bg-white p-1 rounded-full shadow-lg overflow-hidden">
                                        <div class="w-full h-full bg-slate-100 rounded-full flex items-center justify-center border border-slate-100 overflow-hidden relative">
                                            @if($dataPetugas->avatar)
                                                <img src="{{ asset('storage/avatars/' . $dataPetugas->avatar) }}" class="w-full h-full object-cover">
                                            @else
                                                <i data-lucide="user" class="text-slate-400 w-16 h-16"></i>
                                            @endif
                                            <label class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                                                <i data-lucide="camera" class="text-white w-6 h-6"></i>
                                                <input type="file" name="avatar" class="hidden" onchange="document.getElementById('avatarForm').submit()">
                                            </label>
                                        </div>
                                    </div>
                                    <span class="absolute bottom-2 right-2 w-6 h-6 bg-emerald-500 rounded-full border-4 border-white animate-pulse"></span>
                                </div>
                                <input type="hidden" name="name" value="{{ $dataPetugas->name }}">
                                <input type="hidden" name="email" value="{{ $dataPetugas->email }}">
                                <input type="hidden" name="phone" value="{{ $dataPetugas->phone }}">
                            </form>

                            <h2 class="text-2xl font-black text-slate-900 tracking-tight">{{ $dataPetugas->name }}</h2>
                            <p class="text-blue-600 font-bold text-xs uppercase tracking-widest mt-1">{{ $dataPetugas->jabatan ?? 'Petugas Lapangan' }}</p>
                        </div>
                    </div>

                    <!-- Nav Menu -->
                    <div class="bg-white rounded-[2rem] p-3 shadow-sm border border-slate-100 space-y-1">
                        <button @click="tab = 'profile'" :class="tab === 'profile' ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-600 hover:bg-slate-50'" class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all duration-300">
                            <i data-lucide="user" class="w-5 h-5"></i>
                            Informasi Akun
                        </button>
                        <button @click="tab = 'security'" :class="tab === 'security' ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-600 hover:bg-slate-50'" class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all duration-300">
                            <i data-lucide="lock" class="w-5 h-5"></i>
                            Ganti Password
                        </button>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="lg:col-span-8">
                    <!-- Profile Tab -->
                    <div x-show="tab === 'profile'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 p-8 sm:p-10">
                        <h3 class="text-xl font-bold text-slate-800 mb-8 flex items-center gap-3">
                            <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                            Detail Identitas
                        </h3>

                        <form action="{{ route('petugas.profile.update') }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name', $dataPetugas->name) }}" class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Email Petugas</label>
                                    <input type="email" name="email" value="{{ old('email', $dataPetugas->email) }}" class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Nomor WhatsApp</label>
                                    <input type="text" name="phone" value="{{ old('phone', $dataPetugas->phone) }}" class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Unit Kerja</label>
                                    <input type="text" disabled value="{{ $dataPetugas->unitKerja ?? '-' }}" class="w-full px-6 py-4 bg-slate-100 border border-slate-100 rounded-2xl font-bold text-slate-400 cursor-not-allowed">
                                </div>
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-xl shadow-blue-200 transition-all active:scale-95">
                                    Simpan Profil
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Security Tab -->
                    <div x-show="tab === 'security'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 p-8 sm:p-10">
                        <h3 class="text-xl font-bold text-slate-800 mb-8 flex items-center gap-3">
                            <span class="w-1.5 h-6 bg-rose-600 rounded-full"></span>
                            Update Keamanan
                        </h3>

                        <form action="{{ route('petugas.password.update') }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')
                            <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Kata Sandi Saat Ini</label>
                                <input type="password" name="current_password" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-rose-100 focus:border-rose-600 outline-none transition-all font-bold">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Kata Sandi Baru</label>
                                    <input type="password" name="new_password" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Ulangi Kata Sandi</label>
                                    <input type="password" name="new_password_confirmation" required class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold">
                                </div>
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="px-10 py-4 bg-slate-800 hover:bg-slate-900 text-white font-bold rounded-2xl shadow-xl transition-all active:scale-95">
                                    Ganti Kata Sandi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
