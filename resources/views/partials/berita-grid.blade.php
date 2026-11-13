<div class="space-y-8">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        @forelse ($latestBeritaAcara as $berita)
            <article
                class="flex h-full flex-col rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl dark:border-slate-800 dark:bg-slate-900">
                <header class="mb-3">
                    <span
                        class="inline-flex items-center rounded-full bg-pink-100 px-3 py-1 text-xs font-black uppercase tracking-[0.25em] text-pink-700 dark:bg-pink-500/10 dark:text-pink-400">
                        {{ $berita->tindakLanjut?->layanan?->jenis_layanan?->namajenis ?? 'Layanan Administrasi Pemerintahan' }}
                    </span>
                </header>

                <div class="mb-4">
                    <p class="text-sm italic text-slate-500 dark:text-slate-400">
                        Sektor: {{ $berita->tindakLanjut?->layanan?->nama_instansi ?? 'Umum' }}
                    </p>
                </div>

                <div class="mb-6 flex-1">
                    <h4 class="text-xl font-black text-slate-900 dark:text-white">
                        {{ $berita->ringkasan_pekerjaan ? \Illuminate\Support\Str::limit($berita->ringkasan_pekerjaan, 80) : 'Berita Acara Pemeriksaan' }}
                    </h4>

                    <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">
                        {{ $berita->ringkasan_masalah ? \Illuminate\Support\Str::limit($berita->ringkasan_masalah, 100) : 'Deskripsi layanan dan ringkasan pemeriksaan tersedia di halaman detail.' }}
                    </p>
                </div>

                <footer class="mt-auto pt-4 border-t border-slate-100 dark:border-slate-800">
                    <div class="flex items-center justify-between gap-4">
                        <span class="text-xs font-bold uppercase tracking-[0.25em] text-slate-400">
                            {{ $berita->created_at?->locale('id')->translatedFormat('d F Y') ?? '-' }}
                        </span>

                        <a href="#"
                            class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2 text-sm font-black text-white shadow-sm transition hover:bg-blue-700">
                            🔗 Detail
                        </a>
                    </div>
                </footer>
            </article>
        @empty
            <div
                class="col-span-full rounded-[2rem] border border-dashed border-slate-300 bg-slate-50 px-8 py-16 text-center dark:border-slate-700 dark:bg-slate-900">
                <p class="text-lg font-black text-slate-800 dark:text-white">Berita Acara Tidak Ditemukan</p>
                <p class="mt-3 text-sm text-slate-500 dark:text-slate-400">
                    Coba gunakan kata kunci pencarian yang lain.
                </p>
            </div>
        @endforelse
    </div>

    <!-- Pagination Links -->
    <div class="mt-8">
        {{ $latestBeritaAcara->links() }}
    </div>
</div>
