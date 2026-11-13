@extends('pemohon.layout.AppPemohon')

@section('content')
    {{-- Ambil data user agar lebih ringkas --}}
    @php $user = Auth::guard('pemohon')->user(); @endphp

    <div :class="sidebarOpen ? 'md:ml-72' : 'md:ml-24'"
        class="transition-all duration-300 min-h-screen py-8 px-4 sm:px-6 lg:px-8" x-data="{
            tab: '{{ $errors->has('current_password') || $errors->has('new_password') ? 'password' : 'profile' }}',
            @if (session('success')) showSuccess: true @else showSuccess: false @endif
        }">

        <div class="max-w-5xl mx-auto">
            <!-- Toast Success -->
            <template x-if="showSuccess">
                <div x-init="setTimeout(() => showSuccess = false, 3000)"
                    class="fixed top-5 right-5 z-[99] bg-emerald-500 text-white px-6 py-4 rounded-2xl shadow-2xl shadow-emerald-200 flex items-center space-x-3"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
                    x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0 opacity-100"
                    x-transition:leave-end="translate-x-full opacity-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="font-bold text-sm">{{ session('success') }}</span>
                </div>
            </template>

            <!-- Header Section -->
            <div class="flex items-center space-x-4 mb-10 text-left">
                <button @click="sidebarOpen = !sidebarOpen"
                    class="p-3 bg-white border border-slate-200 rounded-2xl text-slate-600 hover:text-blue-600 shadow-sm transition-all active:scale-90 flex-shrink-0">
                    <svg x-show="!sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7">
                        </path>
                    </svg>
                    <svg x-show="sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </button>
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Pengaturan <span
                            class="text-blue-600">Profil</span></h1>
                    <p class="text-slate-500 font-medium mt-1">Kelola informasi pribadi dan keamanan akun Anda.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Sidebar Menu Navigasi -->
                <div class="lg:col-span-1 space-y-2">
                    <button @click="tab = 'profile'"
                        :class="tab === 'profile' ? 'bg-blue-600 text-white shadow-xl shadow-blue-200' :
                            'bg-white text-slate-500 hover:bg-slate-50'"
                        class="w-full flex items-center space-x-4 px-6 py-4 rounded-2xl font-bold transition-all duration-300 group">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span>Data Profil</span>
                    </button>
                    <button @click="tab = 'password'"
                        :class="tab === 'password' ? 'bg-blue-600 text-white shadow-xl shadow-blue-200' :
                            'bg-white text-slate-500 hover:bg-slate-50'"
                        class="w-full flex items-center space-x-4 px-6 py-4 rounded-2xl font-bold transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                        <span>Keamanan</span>
                    </button>
                </div>

                <!-- Main Content Panel -->
                <div class="lg:col-span-3">
                    <div
                        class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/40 border border-slate-100 overflow-hidden">

                        <!-- Tab: Edit Profile -->
                        <div x-show="tab === 'profile'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0" class="p-8 sm:p-12 text-left">

                            <form action="{{ route('pemohon.profile.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="flex flex-col md:flex-row items-center gap-8 mb-12">
                                    <div class="relative group" x-data="{ photoPreview: '{{ $user->avatar ? asset('storage/avatars/' . $user->avatar) : null }}' }">
                                        <div
                                            class="w-32 h-32 rounded-3xl bg-slate-100 overflow-hidden border-4 border-white shadow-xl">
                                            <template x-if="photoPreview">
                                                <img :src="photoPreview" class="w-full h-full object-cover">
                                            </template>
                                            <template x-if="!photoPreview">
                                                <div class="w-full h-full flex items-center justify-center text-slate-300">
                                                    <svg class="w-12 h-12" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </template>
                                        </div>
                                        <label
                                            class="absolute -bottom-2 -right-2 bg-blue-600 p-2 rounded-xl text-white shadow-lg cursor-pointer hover:bg-blue-700 transition-all active:scale-90">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <input type="file" name="avatar" class="hidden"
                                                @change="
                                                const file = $event.target.files[0];
                                                if (file) {
                                                    const reader = new FileReader();
                                                    reader.onload = (e) => { photoPreview = e.target.result; };
                                                    reader.readAsDataURL(file);
                                                }
                                            ">
                                        </label>
                                    </div>
                                    <div>
                                        <h2 class="text-xl font-black text-slate-800 tracking-tight uppercase">Foto Profil
                                        </h2>
                                        <p class="text-slate-400 text-xs mt-1">Gunakan foto formal format JPG atau PNG
                                            (Max. 2MB)</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-4 mb-8">
                                    <div class="bg-blue-50 p-3 rounded-2xl text-blue-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h2 class="text-xl font-black text-slate-800 tracking-tight uppercase">Data Pribadi
                                    </h2>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label
                                            class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Nama
                                            Lengkap</label>
                                        <input type="text" name="nama"
                                            value="{{ old('nama', $user->nama_lengkap) }}"
                                            class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700 @error('nama') border-rose-300 @enderror">
                                        @error('nama')
                                            <p class="text-rose-500 text-[10px] font-bold mt-1 ml-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="space-y-2">
                                        <label
                                            class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">NIP
                                            / Identitas</label>
                                        <input type="text" name="nip"
                                            value="{{ old('nip', $user->nip ?? $user->nik) }}"
                                            class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700 @error('nip') border-rose-300 @enderror">
                                        @error('nip')
                                            <p class="text-rose-500 text-[10px] font-bold mt-1 ml-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="space-y-2 md:col-span-2">
                                        <label
                                            class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Email</label>
                                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                            class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700 @error('email') border-rose-300 @enderror">
                                        @error('email')
                                            <p class="text-rose-500 text-[10px] font-bold mt-1 ml-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="space-y-2 md:col-span-2">
                                        <label
                                            class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Nama
                                            Instansi</label>
                                        <input type="text" disabled
                                            value="{{ $user->instansi->nama_instansi ?? '-' }}"
                                            class="w-full px-6 py-4 bg-slate-100 border border-slate-200 rounded-2xl font-bold text-slate-400 cursor-not-allowed italic">
                                    </div>
                                </div>

                                <div class="mt-12">
                                    <button type="submit"
                                        class="w-full sm:w-auto px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-xl shadow-blue-200 transition-all active:scale-95">
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Tab: Keamanan -->
                        <div x-show="tab === 'password'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0" class="p-8 sm:p-12 text-left">

                            <div class="flex items-center space-x-4 mb-8">
                                <div class="bg-rose-50 p-3 rounded-2xl text-rose-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                </div>
                                <h2 class="text-xl font-black text-slate-800 tracking-tight uppercase">Ganti Kata Sandi
                                </h2>
                            </div>

                            <form action="{{ route('pemohon.password.update') }}" method="POST" class="space-y-6">
                                @csrf
                                @method('PUT')

                                <div class="space-y-2">
                                    <label
                                        class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Kata
                                        Sandi Saat Ini</label>
                                    <input type="password" name="current_password"
                                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all @error('current_password') border-rose-300 @enderror">
                                    @error('current_password')
                                        <p class="text-rose-500 text-[10px] font-bold mt-1 ml-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Kata
                                        Sandi Baru</label>
                                    <input type="password" name="new_password"
                                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all @error('new_password') border-rose-300 @enderror">
                                    @error('new_password')
                                        <p class="text-rose-500 text-[10px] font-bold mt-1 ml-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Konfirmasi
                                        Kata Sandi Baru</label>
                                    <input type="password" name="new_password_confirmation"
                                        class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all">
                                </div>

                                <div class="mt-12">
                                    <button type="submit"
                                        class="w-full sm:w-auto px-10 py-4 bg-slate-900 hover:bg-black text-white font-bold rounded-2xl shadow-xl shadow-slate-200 transition-all active:scale-95">
                                        Perbarui Kata Sandi
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
