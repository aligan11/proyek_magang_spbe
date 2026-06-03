@extends('petugas.layout.app')

@section('content')
    <div class="mb-8 sm:mb-10">
        <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight leading-none uppercase">Profil Petugas</h1>
        <p class="text-sm sm:text-base text-slate-500 font-medium mt-2">Kelola informasi personal dan pengaturan keamanan akun Anda.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-10" x-data="{ tab: 'profile' }">
        <!-- Sidebar Profile Card -->
        <div class="lg:col-span-4 space-y-6">
            <div class="glass rounded-[2rem] sm:rounded-[3rem] p-6 sm:p-10 text-center shadow-2xl border border-white/50 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-br from-blue-600 to-indigo-700"></div>
                <div class="relative z-10">
                    <div class="w-24 h-24 sm:w-32 sm:h-32 rounded-[2rem] sm:rounded-[2.5rem] bg-white p-1 shadow-2xl mx-auto mb-6">
                        <div class="w-full h-full rounded-[2.2rem] bg-gradient-to-br from-blue-100 to-indigo-100 overflow-hidden flex items-center justify-center">
                            @if ($user->avatar)
                                <img src="{{ asset('storage/avatars/' . $user->avatar) }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-4xl sm:text-5xl font-black text-blue-600">{{ substr($user->name, 0, 1) }}</span>
                            @endif
                        </div>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-black text-slate-800 tracking-tight leading-none break-words">{{ $user->name }}</h3>
                    <p class="text-blue-600 text-xs font-black uppercase tracking-widest mt-3">
                        {{ $user->jabatan ?? 'Staff Petugas' }}
                    </p>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="glass rounded-[1.75rem] sm:rounded-[2rem] p-4 sm:p-6 shadow-xl border border-white/50 space-y-3">
                <button @click="tab = 'profile'"
                    :class="tab === 'profile' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-xl shadow-blue-500/30' : 'bg-slate-50 text-slate-500 hover:bg-slate-100'"
                    class="w-full py-4 px-5 sm:px-6 rounded-2xl font-black uppercase text-[10px] tracking-widest transition-all duration-300 flex items-center gap-3 justify-center sm:justify-start">
                    <i data-lucide="user-cog" class="w-5 h-5"></i>
                    Informasi Dasar
                </button>
                <button @click="tab = 'security'"
                    :class="tab === 'security' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-xl shadow-blue-500/30' : 'bg-slate-50 text-slate-500 hover:bg-slate-100'"
                    class="w-full py-4 px-5 sm:px-6 rounded-2xl font-black uppercase text-[10px] tracking-widest transition-all duration-300 flex items-center gap-3 justify-center sm:justify-start">
                    <i data-lucide="shield-check" class="w-5 h-5"></i>
                    Keamanan Akun
                </button>
            </div>
        </div>

        <!-- Content Area -->
        <div class="lg:col-span-8">
            <!-- Tab: Profile Information -->
            <div x-show="tab === 'profile'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="glass rounded-[2rem] sm:rounded-[3rem] p-5 sm:p-10 shadow-2xl border border-white/50">
                <div class="flex items-start sm:items-center gap-4 sm:gap-5 mb-6 sm:mb-10">
                    <div class="p-3 sm:p-4 bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-2xl shadow-lg shadow-blue-500/30 shrink-0">
                        <i data-lucide="user-cog" class="w-6 h-6 sm:w-7 sm:h-7"></i>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-black text-slate-800 tracking-tight uppercase">Edit Informasi Personal</h3>
                        <p class="text-slate-400 text-sm font-medium mt-1">Perbarui data diri Anda di sini</p>
                    </div>
                </div>

                <form action="{{ route('petugas.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-8">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ $user->name }}" required
                                class="w-full px-5 sm:px-6 py-4 bg-white/60 border border-white rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700 shadow-inner">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Alamat Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" required
                                class="w-full px-5 sm:px-6 py-4 bg-white/60 border border-white rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700 shadow-inner">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nomor WhatsApp</label>
                            <input type="text" name="no_hp" value="{{ $user->no_hp ?? '' }}"
                                class="w-full px-5 sm:px-6 py-4 bg-white/60 border border-white rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700 shadow-inner">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">NIP</label>
                            <input type="text" value="{{ $user->nip ?? '-' }}" readonly
                                class="w-full px-5 sm:px-6 py-4 bg-slate-100 border border-slate-200 rounded-2xl outline-none font-bold text-slate-500 cursor-not-allowed">
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Ganti Foto Profil</label>
                        <div class="relative group">
                            <input type="file" name="avatar" accept="image/*"
                                class="w-full text-xs text-slate-500 file:mr-6 file:py-4 file:px-8 file:rounded-2xl file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-blue-600 file:text-white hover:file:bg-blue-700 file:cursor-pointer">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-4 sm:py-5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl font-black uppercase tracking-[0.16em] sm:tracking-[0.2em] shadow-xl shadow-blue-500/30 hover:shadow-2xl hover:-translate-y-1 transition-all active:scale-95 flex items-center justify-center gap-3 text-[11px] sm:text-base">
                        <i data-lucide="save" class="w-5 h-5"></i>
                        Simpan Perubahan
                    </button>
                </form>
            </div>

            <!-- Tab: Security Settings -->
            <div x-show="tab === 'security'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="glass rounded-[2rem] sm:rounded-[3rem] p-5 sm:p-10 shadow-2xl border border-white/50"
                x-data="{ show: false }">
                <div class="flex items-start sm:items-center gap-4 sm:gap-5 mb-6 sm:mb-10">
                    <div class="p-3 sm:p-4 bg-gradient-to-br from-rose-500 to-red-600 text-white rounded-2xl shadow-lg shadow-rose-500/30 shrink-0">
                        <i data-lucide="shield-check" class="w-6 h-6 sm:w-7 sm:h-7"></i>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-black text-slate-800 tracking-tight uppercase">Pengaturan Keamanan</h3>
                        <p class="text-slate-400 text-sm font-medium mt-1">Ubah password akun Anda</p>
                    </div>
                </div>

                <form action="{{ route('petugas.password.update') }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Kata Sandi Saat Ini</label>
                        <div class="relative">
                            <input :type="show ? 'text' : 'password'" name="current_password" required
                                class="w-full px-5 sm:px-6 py-4 bg-white/60 border border-white rounded-2xl focus:ring-4 focus:ring-rose-100 focus:border-rose-600 outline-none transition-all font-bold text-slate-700 shadow-inner pr-14">
                            <button type="button" @click="show = !show"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-blue-600 transition-colors">
                                <i :data-lucide="show ? 'eye-off' : 'eye'" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-8">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Kata Sandi Baru</label>
                            <input :type="show ? 'text' : 'password'" name="password" required minlength="8"
                                class="w-full px-5 sm:px-6 py-4 bg-white/60 border border-white rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700 shadow-inner">
                        </div>
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Konfirmasi Sandi Baru</label>
                            <input :type="show ? 'text' : 'password'" name="password_confirmation" required minlength="8"
                                class="w-full px-5 sm:px-6 py-4 bg-white/60 border border-white rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700 shadow-inner">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-4 sm:py-5 bg-gradient-to-r from-slate-800 to-slate-900 text-white rounded-2xl font-black uppercase tracking-[0.16em] sm:tracking-[0.2em] shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all active:scale-95 flex items-center justify-center gap-3 text-[11px] sm:text-base">
                        <i data-lucide="lock" class="w-5 h-5"></i>
                        Perbarui Kata Sandi
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
