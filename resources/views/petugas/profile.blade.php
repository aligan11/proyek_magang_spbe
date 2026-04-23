@extends('petugas.layout.app')

@section('content')
    <div class="mb-10">
        <h1 class="text-4xl font-black text-slate-900 tracking-tighter leading-none uppercase">Profil Petugas</h1>
        <p class="text-slate-500 font-medium mt-2">Kelola informasi personal dan pengaturan keamanan akun Anda.</p>
        <p class="text-slate-500 font-medium text-lg ml-20">Kelola informasi personal dan pengaturan keamanan akun Anda
            secara mandiri.</p>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10" x-data="{ tab: 'profile' }">

        <div class="lg:col-span-4 space-y-8">
            <div
                class="glass rounded-[3rem] p-10 text-center shadow-2xl shadow-slate-200/40 border border-white/40 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-br from-blue-600 to-indigo-700"></div>
                class="glass rounded-[3.5rem] p-10 text-center shadow-2xl shadow-slate-200/40 border border-white relative overflow-hidden group">
                <div
                    <div class="w-32 h-32 rounded-[2.5rem] bg-white p-1 shadow-2xl mx-auto mb-6">
                        <div
                            class="w-full h-full rounded-[2.2rem] bg-slate-100 overflow-hidden flex items-center justify-center border-4 border-white">
                <div class="absolute -right-10 top-10 w-32 h-32 bg-white/10 rounded-full blur-3xl"></div>
                                <img src="{{ asset('storage/avatars/' . $user->avatar) }}" class="w-full h-full object-cover">
                    <div
                                <i data-lucide="user" class="w-16 h-16 text-slate-300"></i>
                            @if ($user->avatar)
                                <img src="{{ asset('storage/avatars/' . $user->avatar) }}"
                                    class="w-full h-full object-cover">
                    <h3 class="text-2xl font-black text-slate-800 tracking-tight leading-none">{{ $user->name }}</h3>
                    <p class="text-blue-600 text-xs font-black uppercase tracking-widest mt-3">
                        {{ $user->role ?? 'Staff Petugas' }}</p>
                        </div>
                    <div class="mt-10 flex flex-col gap-2">

                            :class="tab === 'profile' ? 'bg-blue-600 text-white shadow-xl shadow-blue-200' :
                                'bg-slate-50 text-slate-500 hover:bg-slate-100'"
                            class="w-full py-4 rounded-2xl font-black uppercase text-[10px] tracking-widest transition-all duration-300">Informasi
                            Dasar</button>
                    </div>
                            :class="tab === 'security' ? 'bg-blue-600 text-white shadow-xl shadow-blue-200' :
                                'bg-slate-50 text-slate-500 hover:bg-slate-100'"
                            class="w-full py-4 rounded-2xl font-black uppercase text-[10px] tracking-widest transition-all duration-300">Keamanan
                            Akun</button>
                            <i data-lucide="user" class="w-5 h-5 transition-transform group-hover/btn:scale-110"></i>
                            Informasi Dasar
                        </button>
                        <button @click="tab = 'security'"
                            :class="tab === 'security' ? 'bg-blue-600 text-white shadow-2xl shadow-blue-500/40 translate-x-2' :
            <div class="glass rounded-[3rem] p-10 shadow-xl shadow-slate-200/20 border border-white/40">
                <div class="flex items-center justify-between py-4 border-b border-slate-100">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Email Terdaftar</span>
                    <span class="text-xs font-bold text-slate-700">{{ $user->email }}</span>
                </div>
                <div class="flex items-center justify-between py-4 border-b border-slate-100">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">NIP Pegawai</span>
                    <span class="text-xs font-bold text-slate-700">{{ $user->nip ?? '-' }}</span>
                </div>
                <div class="flex items-center justify-between py-4">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Member Sejak</span>
                    <span class="text-xs font-bold text-slate-700">{{ $user->created_at->format('M Y') }}</span>
                    <div class="flex items-center justify-between py-4 border-b border-slate-100 group">
                        <span
                            class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] group-hover:text-blue-500 transition-colors">Email
                            Terdaftar</span>
                        <span class="text-sm font-black text-slate-800 tracking-tight">{{ $user->email }}</span>
                    </div>
                    <div class="flex items-center justify-between py-4 border-b border-slate-100 group">
            <div x-show="tab === 'profile'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="glass rounded-[3rem] p-10 md:p-12 shadow-2xl shadow-slate-200/40 border border-white/40">
                <div class="flex items-center gap-4 mb-10">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                        <i data-lucide="user-cog" class="w-6 h-6"></i>
                            Sejak</span>
                    <h3 class="text-xl font-black text-slate-800 tracking-tight uppercase">Edit Informasi Personal</h3>
                            class="text-sm font-black text-slate-800 tracking-tight">{{ $user->created_at->format('M Y') }}</span>
                    </div>
                </div>
                    class="space-y-8">
        </div>

        <!-- Content Profile -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Tab: Profile Information -->
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Nama
                                Lengkap</label>
                x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0"
                                class="w-full px-8 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700">
                <div class="absolute -right-20 -top-20 w-80 h-80 bg-blue-500/5 rounded-full blur-3xl"></div>

                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Alamat
                                Email</label>
                    <div
                                class="w-full px-8 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700">
                        <i data-lucide="edit-3" class="w-8 h-8"></i>
                    </div>
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Nomor
                                WhatsApp</label>
                    </h3>
                                class="w-full px-8 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700">

                <form action="{{ route('petugas.profile.update') }}" method="POST" enctype="multipart/form-data"
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Ganti Foto
                                Profil</label>
                            <input type="file" name="avatar"
                                class="w-full text-xs text-slate-500 file:mr-6 file:py-4 file:px-8 file:rounded-2xl file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-blue-600 file:text-white hover:file:bg-blue-700 file:cursor-pointer">
                            <input type="text" name="name" value="{{ $user->name }}" required
                                class="w-full px-10 py-6 bg-white/60 backdrop-blur-md border border-white rounded-[2rem] focus:ring-8 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700 shadow-inner">
                        </div>
                        <div class="space-y-4">
                        class="px-10 py-5 bg-blue-600 text-white rounded-2xl font-black uppercase tracking-[0.2em] shadow-xl shadow-blue-500/20 hover:bg-blue-700 transition-all active:scale-95">Simpan
                        Perubahan</button>
                        </div>
                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Nomor
                                WhatsApp</label>
            <div x-show="tab === 'security'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                class="glass rounded-[3rem] p-10 md:p-12 shadow-2xl shadow-slate-200/40 border border-white/40">
                <div class="flex items-center gap-4 mb-10">
                    <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center">
                        <i data-lucide="lock" class="w-6 h-6"></i>
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                    <h3 class="text-xl font-black text-slate-800 tracking-tight uppercase">Pengaturan Keamanan</h3>
                                    class="px-10 py-6 bg-white/60 backdrop-blur-md border border-white rounded-[2rem] flex items-center justify-between group-hover:bg-blue-50 transition-colors shadow-inner">
                                    <span
                <form action="{{ route('petugas.password.update') }}" method="POST" class="space-y-8"
                                        file gambar...</span>
                                    <i data-lucide="image"
                                        class="w-6 h-6 text-slate-300 group-hover:text-blue-500 transition-colors"></i>
                                </div>
                            </div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Kata Sandi Saat
                            Ini</label>
                        <input type="password" name="current_password" required
                            class="w-full px-8 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-rose-100 focus:border-rose-600 outline-none transition-all font-bold">
                    <button type="submit"
                        class="px-12 py-6 bg-blue-600 text-white rounded-[2rem] font-black uppercase tracking-[0.3em] shadow-2xl shadow-blue-500/40 hover:bg-blue-700 hover:-translate-y-2 transition-all active:scale-95 flex items-center justify-center gap-4 group">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        Simpan Perubahan
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Kata Sandi
                                Baru</label>
                </form>
                                class="w-full px-8 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold">

            <!-- Tab: Security Settings -->
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-2">Konfirmasi
                                Sandi Baru</label>
                x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0"
                                class="w-full px-8 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold">
                <div class="absolute -right-20 -top-20 w-80 h-80 bg-rose-500/5 rounded-full blur-3xl"></div>

                <div class="flex items-center gap-6 mb-12 relative z-10">
                    <div class="flex items-center gap-3 ml-2">
                        <input type="checkbox" id="show-pass" @change="show = !show"
                            class="w-4 h-4 rounded-md border-slate-300 text-blue-600 focus:ring-blue-500">
                        <label for="show-pass"
                            class="text-[10px] font-black text-slate-400 uppercase tracking-widest cursor-pointer">Tampilkan
                            Kata Sandi</label>

                <form action="{{ route('petugas.password.update') }}" method="POST" class="space-y-10 relative z-10"
                    x-data="{ show: false }">
                        class="px-10 py-5 bg-slate-900 text-white rounded-2xl font-black uppercase tracking-[0.2em] shadow-xl shadow-slate-900/20 hover:bg-black transition-all active:scale-95">Perbarui
                        Kata Sandi</button>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Kata Sandi Saat
                            Ini</label>
                        <input :type="show ? 'text' : 'password'" name="current_password" required
                            class="w-full px-10 py-6 bg-white/60 backdrop-blur-md border border-white rounded-[2rem] focus:ring-8 focus:ring-rose-100 focus:border-rose-600 outline-none transition-all font-bold text-slate-700 shadow-inner">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Kata Sandi
                                Baru</label>
                            <input :type="show ? 'text' : 'password'" name="new_password" required
                                class="w-full px-10 py-6 bg-white/60 backdrop-blur-md border border-white rounded-[2rem] focus:ring-8 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700 shadow-inner">
                        </div>
                        <div class="space-y-4">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Konfirmasi
                                Sandi Baru</label>
                            <input :type="show ? 'text' : 'password'" name="new_password_confirmation" required
                                class="w-full px-10 py-6 bg-white/60 backdrop-blur-md border border-white rounded-[2rem] focus:ring-8 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-bold text-slate-700 shadow-inner">
                        </div>
                    </div>

                    <div class="flex items-center gap-4 ml-4">
                        <div class="relative inline-flex items-center cursor-pointer" @click="show = !show">
                            <div class="w-12 h-6 bg-slate-200 rounded-full transition-colors duration-300 shadow-inner"
                                :class="show ? 'bg-blue-600' : ''"></div>
                            <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform duration-300 shadow-md"
                                :class="show ? 'translate-x-6' : ''"></div>
                        </div>
                        <label
                            class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] cursor-pointer">Tampilkan
                            Kata Sandi</label>
                    </div>

                    <button type="submit"
                        class="px-12 py-6 bg-slate-900 text-white rounded-[2rem] font-black uppercase tracking-[0.3em] shadow-2xl shadow-slate-900/40 hover:bg-black hover:-translate-y-2 transition-all active:scale-95 flex items-center justify-center gap-4 group">
                        <i data-lucide="shield-check" class="w-6 h-6 group-hover:scale-110 transition-transform"></i>
                        Perbarui Kata Sandi
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
