@extends('pimpinan.layout.AppPimpinan')

@section('dashboard')
    <div class="min-h-screen bg-slate-50/50 py-8 px-4 sm:px-6 lg:px-8">
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

                <!-- Badge Status -->
                <div class="hidden sm:block">
                    <span
                        class="bg-emerald-50 text-emerald-600 text-xs font-bold px-4 py-2 rounded-full border border-emerald-100 uppercase tracking-widest">
                        Akun Terverifikasi
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <!-- Left Column: Profile Card -->
                <div class="lg:col-span-4 space-y-6">
                    <div
                        class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 border border-slate-100 p-8 text-center relative overflow-hidden">
                        <!-- Decorative Background -->
                        <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-br from-blue-600 to-indigo-700"></div>

                        <div class="relative z-10">
                            <div class="relative inline-block mb-5">
                                <div class="w-32 h-32 bg-white p-1 rounded-full shadow-lg">
                                    <div
                                        class="w-full h-full bg-slate-100 rounded-full flex items-center justify-center border border-slate-100 overflow-hidden">
                                        <i data-lucide="user" class="text-slate-400 w-16 h-16"></i>
                                    </div>
                                </div>
                                <div class="absolute bottom-2 right-2 w-6 h-6 bg-emerald-500 rounded-full border-4 border-white"
                                    title="Online"></div>
                            </div>

                            <h2 class="text-2xl font-black text-slate-900 tracking-tight">{{ $data->name }}</h2>
                            <div class="inline-flex items-center gap-2 mt-2 px-3 py-1 bg-blue-50 rounded-lg">
                                <i data-lucide="shield-check" class="w-3.5 h-3.5 text-blue-600"></i>
                                <span class="text-blue-700 font-bold text-[10px] uppercase tracking-wider">Kepala
                                    Bidang</span>
                            </div>

                            <div class="mt-8 space-y-3">
                                <div
                                    class="flex items-center gap-4 p-3 rounded-2xl bg-slate-50 border border-slate-100 group hover:border-blue-200 transition-colors">
                                    <div class="p-2 bg-white rounded-xl shadow-sm text-blue-600">
                                        <i data-lucide="mail" class="w-4 h-4"></i>
                                    </div>
                                    <span
                                        class="text-slate-600 text-sm font-medium truncate">{{ $data->email ?? '-' }}</span>
                                </div>
                                <div
                                    class="flex items-center gap-4 p-3 rounded-2xl bg-slate-50 border border-slate-100 group hover:border-blue-200 transition-colors">
                                    <div class="p-2 bg-white rounded-xl shadow-sm text-blue-600">
                                        <i data-lucide="phone" class="w-4 h-4"></i>
                                    </div>
                                    <span
                                        class="text-slate-600 text-sm font-medium">{{ $data->phone ?? '+62 812-3456-7890' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Brief -->
                    <div class="bg-[#0f172a] rounded-[2rem] p-6 text-white shadow-xl shadow-slate-300">
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-[0.2em] mb-4 text-center">Performa
                            Verifikasi</p>
                        <div class="flex items-center justify-around">
                            <div class="text-center">
                                <p class="text-3xl font-black">{{ $data->laporans_count ?? '0' }}</p>
                                <p class="text-[10px] text-slate-400 font-medium">Laporan</p>
                            </div>
                            <div class="w-px h-8 bg-slate-700"></div>
                            <div class="text-center">
                                <p class="text-3xl font-black text-blue-400">100%</p>
                                <p class="text-[10px] text-slate-400 font-medium">Akurasi</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Details & Settings -->
                <div class="lg:col-span-8 space-y-6">
                    <!-- Personal Info Card -->
                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 p-8 sm:p-10">
                        <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-100">
                            <h3 class="text-xl font-bold text-slate-900 flex items-center gap-3">
                                <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                                Detail Personalia
                            </h3>
                            <button class="text-blue-600 hover:text-blue-700 text-sm font-bold flex items-center gap-2">
                                <i data-lucide="edit-3" class="w-4 h-4"></i> Edit
                            </button>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                            <div class="space-y-1">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">NIP / ID
                                    Sistem</label>
                                <p class="text-lg font-bold text-slate-800">{{ $data->id }}</p>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Waktu
                                    Bergabung</label>
                                <p class="text-lg font-bold text-slate-800">
                                    {{ $data->created_at->translatedFormat('d F Y') }}</p>
                            </div>
                            <div class="sm:col-span-2">
                                <label
                                    class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 block">Hak
                                    Akses & Role</label>
                                <div class="flex flex-wrap gap-3">
                                    <div
                                        class="px-4 py-2 bg-indigo-50 border border-indigo-100 rounded-xl flex items-center gap-2">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></div>
                                        <span class="text-indigo-700 text-xs font-bold uppercase">Executive
                                            Management</span>
                                    </div>
                                    <div
                                        class="px-4 py-2 bg-slate-50 border border-slate-100 rounded-xl flex items-center gap-2">
                                        <i data-lucide="check-circle-2" class="w-4 h-4 text-slate-400"></i>
                                        <span class="text-slate-600 text-xs font-bold uppercase">Report Verifier</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security/Quick Action Card -->
                    <div
                        class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-[2.5rem] p-8 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-lg shadow-blue-200">
                        <div class="text-center sm:text-left">
                            <h4 class="text-xl font-bold italic">Keamanan Akun</h4>
                            <p class="text-blue-100 text-sm mt-1">Pastikan password Anda diperbarui secara berkala demi
                                keamanan data.</p>
                        </div>
                        <a href="#"
                            class="px-6 py-3 bg-white text-blue-600 rounded-2xl font-bold text-sm shadow-xl shadow-black/10 hover:scale-105 transition-transform">
                            Ganti Password
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
@endsection
