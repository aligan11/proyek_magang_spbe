@extends('pimpinan.layout.AppPimpinan')

@section('dashboard')
    <div class="p-4 sm:p-6 lg:p-8">
        <div x-data="{ loading: false }">
            <div class="mb-10">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-extrabold text-slate-900">Edit Deskripsi</h1>
                        <!-- Menggunakan optional() atau relasi aman bawaan laravel -->
                        <p class="text-slate-500 mt-1">No. Registrasi: <span
                                class="font-bold text-blue-600">#{{ $permohonan->layanan->noreg ?? '-' }}</span></p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 p-8">
                <form action="{{ route('pimpinan.update', $permohonan->id) }}" method="POST" @submit="loading = true">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-3">
                            <i data-lucide="file-text" class="inline w-4 h-4 mr-2"></i> Keterangan / Deskripsi
                        </label>

                        <!-- PERBAIKAN 2: Mengubah $permohonan->ket menjadi $permohonan->keterangan sesuai tabel database -->
                        <textarea name="ket" rows="6" required
                            class="w-full px-5 py-4 bg-slate-50 border @error('ket') border-rose-300 bg-rose-50/10 @else border-slate-200 @enderror rounded-2xl focus:ring-4 focus:ring-blue-100 outline-none transition-all shadow-inner">{{ old('ket', $permohonan->keterangan) }}</textarea>

                        @error('ket')
                            <p class="text-xs text-rose-500 font-bold mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button type="submit" :disabled="loading"
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl shadow-xl shadow-blue-200 transition-all active:scale-95 flex items-center justify-center space-x-3">
                            <template x-if="!loading">
                                <div class="flex items-center space-x-3">
                                    <i data-lucide="check" class="w-5 h-5"></i>
                                    <span>Simpan Perubahan</span>
                                </div>
                            </template>
                            <template x-if="loading">
                                <div class="flex items-center space-x-3">
                                    <i data-lucide="loader-2" class="animate-spin h-5 w-5 text-white"></i>
                                    <span>Menyimpan...</span>
                                </div>
                            </template>
                        </button>
                        <a href="{{ route('indexMandat', 1) }}"
                            class="px-8 py-4 bg-white border border-slate-200 text-slate-600 font-bold rounded-2xl hover:bg-slate-50 transition-all text-center flex items-center justify-center">
                            <i data-lucide="x" class="inline w-4 h-4 mr-2"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
