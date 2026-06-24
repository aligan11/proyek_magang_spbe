@extends('petugas.layout.app')

@section('content')
    <div class="mx-auto max-w-5xl">
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-blue-600">Form Pemeriksaan</p>
                <h1 class="mt-2 text-3xl font-black tracking-tight text-slate-900">Tambah Berita Acara</h1>
                <p class="mt-3 max-w-2xl text-sm font-medium text-slate-500">
                    Isi hasil pemeriksaan lapangan secara ringkas dan terstruktur agar mudah ditindaklanjuti.
                </p>
            </div>
            <a href="{{ route('petugas.index') }}"
                class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-600 shadow-sm transition hover:border-slate-300 hover:bg-slate-50">
                Kembali ke Dashboard
            </a>
        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-3xl border border-red-100 bg-red-50 px-6 py-5 text-sm text-red-700 shadow-sm">
                <p class="font-bold">Data belum dapat disimpan.</p>
                <ul class="mt-2 list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="overflow-hidden rounded-[2rem] border border-white/60 bg-white/90 shadow-2xl shadow-slate-200/50">
            <div class="grid gap-0 lg:grid-cols-[1.1fr_0.9fr]">
                <div class="border-b border-slate-100 p-6 sm:p-8 lg:border-b-0 lg:border-r">
                    <div class="mb-8">
                        <h2 class="text-xl font-black text-slate-800">Informasi Berita Acara</h2>
                        <p class="mt-2 text-sm font-medium text-slate-500">
                            Lengkapi data pemeriksaan, masalah yang ditemukan, dan alternatif solusi yang disarankan.
                        </p>
                    </div>

                    <form action="{{ route('petugas.berita-acara.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="id_tindak_lanjut"
                                class="mb-2 block text-sm font-bold text-slate-700">Pilih Tindak Lanjut</label>
                            <select id="id_tindak_lanjut" name="id_tindak_lanjut"
                                class="@error('id_tindak_lanjut') border-red-300 ring-red-100 @else border-slate-200 @enderror w-full rounded-2xl border bg-slate-50 px-4 py-3 text-sm font-medium text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100">
                                <option value="">Pilih data tindak lanjut</option>
                                @foreach ($tindakLanjutOptions as $mandat)
                                    <option value="{{ $mandat->id }}" @selected(old('id_tindak_lanjut') == $mandat->id)>
                                        #{{ $mandat->id }} -
                                        {{ $mandat->ticket->noreg ?? 'Tanpa Nomor Registrasi' }} -
                                        {{ $mandat->ticket->inputby ?? 'Tanpa Pemohon' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_tindak_lanjut')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="lokasi" class="mb-2 block text-sm font-bold text-slate-700">Lokasi</label>
                            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}"
                                placeholder="Contoh: Ruang Server Dinas Kominfo"
                                class="@error('lokasi') border-red-300 ring-red-100 @else border-slate-200 @enderror w-full rounded-2xl border bg-slate-50 px-4 py-3 text-sm font-medium text-slate-700 placeholder:text-slate-400 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100">
                            @error('lokasi')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="ringkasan_pekerjaan" class="mb-2 block text-sm font-bold text-slate-700">
                                Ringkasan Pekerjaan
                            </label>
                            <textarea id="ringkasan_pekerjaan" name="ringkasan_pekerjaan" rows="5"
                                placeholder="Tulis aktivitas atau pekerjaan pemeriksaan yang telah dilakukan..."
                                class="@error('ringkasan_pekerjaan') border-red-300 ring-red-100 @else border-slate-200 @enderror w-full rounded-2xl border bg-slate-50 px-4 py-3 text-sm font-medium text-slate-700 placeholder:text-slate-400 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100">{{ old('ringkasan_pekerjaan') }}</textarea>
                            @error('ringkasan_pekerjaan')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="ringkasan_masalah" class="mb-2 block text-sm font-bold text-slate-700">
                                Ringkasan Masalah
                            </label>
                            <textarea id="ringkasan_masalah" name="ringkasan_masalah" rows="5"
                                placeholder="Jelaskan kendala, temuan, atau gap yang ditemukan saat pemeriksaan..."
                                class="@error('ringkasan_masalah') border-red-300 ring-red-100 @else border-slate-200 @enderror w-full rounded-2xl border bg-slate-50 px-4 py-3 text-sm font-medium text-slate-700 placeholder:text-slate-400 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100">{{ old('ringkasan_masalah') }}</textarea>
                            @error('ringkasan_masalah')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="alternatif_solusi" class="mb-2 block text-sm font-bold text-slate-700">
                                Alternatif Solusi
                            </label>
                            <textarea id="alternatif_solusi" name="alternatif_solusi" rows="5"
                                placeholder="Tuliskan rekomendasi perbaikan atau solusi yang dapat diterapkan..."
                                class="@error('alternatif_solusi') border-red-300 ring-red-100 @else border-slate-200 @enderror w-full rounded-2xl border bg-slate-50 px-4 py-3 text-sm font-medium text-slate-700 placeholder:text-slate-400 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100">{{ old('alternatif_solusi') }}</textarea>
                            @error('alternatif_solusi')
                                <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-3 border-t border-slate-100 pt-6 sm:flex-row">
                            <button type="submit"
                                @disabled($tindakLanjutOptions->isEmpty())
                                class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-3 text-sm font-black text-white shadow-lg shadow-blue-500/20 transition hover:scale-[1.01] disabled:cursor-not-allowed disabled:opacity-60">
                                Simpan Berita Acara
                            </button>
                            <a href="{{ route('petugas.index') }}"
                                class="inline-flex items-center justify-center rounded-2xl border border-slate-200 px-6 py-3 text-sm font-bold text-slate-600 transition hover:bg-slate-50">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>

                <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-blue-900 p-6 text-white sm:p-8">
                    <div class="rounded-[1.75rem] border border-white/10 bg-white/5 p-6 backdrop-blur">
                        <div
                            class="mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 text-white shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black tracking-tight">Catatan Pengisian</h3>
                        <div class="mt-5 space-y-4 text-sm font-medium text-slate-200">
                            <p>Pilih data tindak lanjut yang memang ditugaskan kepada akun petugas Anda.</p>
                            <p>Kolom lokasi dan ringkasan bersifat opsional, namun semakin detail akan memudahkan audit.</p>
                            <p>Setelah disimpan, sistem akan mengarahkan Anda kembali ke dashboard petugas dengan notifikasi sukses.</p>
                        </div>
                    </div>

                    <div class="mt-6 rounded-[1.75rem] border border-blue-400/20 bg-blue-400/10 p-6">
                        <p class="text-xs font-black uppercase tracking-[0.25em] text-blue-200">Data Tersedia</p>
                        <p class="mt-3 text-4xl font-black">{{ $tindakLanjutOptions->count() }}</p>
                        <p class="mt-2 text-sm font-medium text-slate-200">
                            tindak lanjut dapat dipilih untuk dibuatkan berita acara pemeriksaan.
                        </p>
                    </div>

                    @if ($tindakLanjutOptions->isEmpty())
                        <div class="mt-6 rounded-[1.75rem] border border-amber-300/20 bg-amber-300/10 p-6 text-sm text-amber-50">
                            Belum ada data tindak lanjut yang terhubung ke akun petugas Anda. Silakan pastikan penugasan
                            sudah dibuat terlebih dahulu.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
