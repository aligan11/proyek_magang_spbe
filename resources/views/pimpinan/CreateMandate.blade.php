@extends('pimpinan.layout.AppPimpinan')

@section('dashboard')
    <div class="p-6 lg:p-10 bg-slate-50 min-h-screen">
        <div class="mb-8">
            <nav class="flex mb-2 text-xs font-medium text-slate-400 uppercase tracking-widest">
                <a href="{{ route('mandate.index') }}">
                    <span class="hover:text-blue-600 cursor-pointer transition-colors">Mandat</span>
                </a>
                <span class="mx-2">/</span>
                <span class="text-slate-900">Buat Penugasan</span>
            </nav>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Kirim Mandat Tugas</h1>
            <p class="text-slate-500 mt-1">Delegasikan instruksi penugasan kepada tim pelaksana dengan cepat.</p>
        </div>

        <div class="max-w-4xl bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
            <form action="{{ route('mandate.store') }}" method="POST" class="p-8 space-y-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-3">
                        <label class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                            <i data-lucide="ticket" class="w-4 h-4 text-blue-500"></i>
                            Tiket Referensi
                        </label>

                        <input type="hidden" name="ticket_id" value="{{ $pendingTickets->id }}">

                        <div class="relative group">
                            <div
                                class="w-full bg-blue-50/50 border-2 border-blue-100 rounded-2xl p-4 flex flex-col gap-2 transition-all group-hover:bg-blue-50">
                                <div class="flex justify-between items-start">
                                    <span
                                        class="bg-blue-600 text-white text-[10px] font-black px-2 py-1 rounded-lg shadow-sm">
                                        #{{ $pendingTickets->noreg }}
                                    </span>
                                    <span
                                        class="text-[10px] font-bold text-blue-400 uppercase tracking-wider">Terpilih</span>
                                </div>
                                <h3 class="text-sm font-bold text-slate-800 leading-tight pr-4">
                                    {{ $pendingTickets->nama_kebutuhan }}
                                </h3>
                                <p class="text-[10px] text-slate-400 font-medium italic">*Mandat akan otomatis terikat pada
                                    tiket ini.</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                            <i data-lucide="users" class="w-4 h-4 text-blue-500"></i>
                            Tambah Petugas Pelaksana
                        </label>

                        <div class="space-y-2">
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <i data-lucide="search" class="w-4 h-4 text-slate-400"></i>
                                </span>
                                <input type="text" id="searchPetugas" placeholder="Cari nama petugas..."
                                    class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs focus:ring-4 focus:ring-blue-100 focus:border-blue-400 outline-none transition-all shadow-sm">
                            </div>

                            <div class="flex gap-2">
                                <select id="petugasSelect"
                                    class="flex-1 bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 block p-3.5 outline-none transition-all appearance-none cursor-pointer">
                                    <option selected disabled value="">-- Pilih Petugas --</option>
                                    @foreach ($availablePetugas as $petugas)
                                        <option value="{{ $petugas->id }}" data-nama="{{ $petugas->name }}">
                                            {{ $petugas->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <button type="button" onclick="addPetugasTag()"
                                    class="bg-blue-600 text-white px-5 rounded-xl font-bold text-xs hover:bg-blue-700 active:scale-95 transition-all shadow-md shadow-blue-200">
                                    TAMBAH
                                </button>
                            </div>
                            @error('petugas_ids')
                                <p class="text-[10px] text-red-500 font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-widest flex items-center gap-2">
                        <i data-lucide="list-checks" class="w-4 h-4"></i> Daftar Penugasan
                    </label>
                    <div id="tagContainer"
                        class="min-h-[100px] border-2 border-dashed border-slate-100 rounded-3xl p-5 flex flex-wrap gap-3 bg-slate-50/30 items-center justify-start transition-all">
                        <div id="placeholder-text" class="w-full text-center py-4">
                            <i data-lucide="user-plus" class="w-8 h-8 text-slate-200 mx-auto mb-2"></i>
                            <p class="text-slate-400 text-sm italic">Pilih petugas pelaksana di atas</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <label class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                        <i data-lucide="message-square-quote" class="w-4 h-4 text-blue-500"></i>
                        Instruksi Mandat Pimpinan
                    </label>
                    <textarea placeholder="Tulis instruksi detail untuk petugas..." name="deskripsi" required
                        class="w-full bg-slate-50 border border-slate-200 rounded-3xl p-5 text-sm text-slate-700 h-40 focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition-all resize-none shadow-inner"></textarea>
                </div>

                <div class="flex items-center justify-end gap-4 pt-6 border-t border-slate-100">
                    <a href="{{ route('mandate.index') }}"
                        class="text-slate-500 hover:text-slate-800 text-sm font-bold px-6 py-3 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-slate-900 hover:bg-black text-white font-black py-4 px-10 rounded-2xl text-sm transition-all shadow-xl hover:shadow-2xl active:scale-95">
                        Kirim Mandat Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Fungsi pencarian dropdown petugas
        function setupSearch(inputId, selectId) {
            const searchInput = document.getElementById(inputId);
            const select = document.getElementById(selectId);
            const originalOptions = Array.from(select.options);

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                select.innerHTML = '';

                const filteredOptions = originalOptions.filter(option => {
                    return option.text.toLowerCase().includes(searchTerm) || option.value === "";
                });

                filteredOptions.forEach(option => select.add(option));
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            setupSearch('searchPetugas', 'petugasSelect');
            // Re-inisialisasi Lucide icons jika dibutuhkan
            if (typeof lucide !== 'undefined') lucide.createIcons();
        });

        function addPetugasTag() {
            const select = document.getElementById('petugasSelect');
            const container = document.getElementById('tagContainer');
            const placeholder = document.getElementById('placeholder-text');

            if (!select.value) return;

            const id = select.value;
            const nama = select.options[select.selectedIndex].getAttribute('data-nama');

            // Cek duplikasi
            if (document.querySelector(`input[value="${id}"][name="petugas_ids[]"]`)) {
                alert('Petugas ini sudah ada dalam daftar.');
                return;
            }

            if (placeholder) placeholder.style.display = 'none';

            const tag = document.createElement('div');
            tag.className =
                "group flex items-center gap-3 bg-white text-slate-700 border border-slate-200 pl-4 pr-2 py-2.5 rounded-2xl text-xs font-black shadow-sm hover:border-blue-400 transition-all animate-in zoom-in duration-200";
            tag.innerHTML = `
                <div class="w-2 h-2 rounded-full bg-blue-500 shadow-[0_0_8px_rgba(59,130,246,0.5)]"></div>
                <span>${nama}</span>
                <input type="hidden" name="petugas_ids[]" value="${id}">
                <button type="button" onclick="this.parentElement.remove(); checkPlaceholder();"
                    class="ml-2 p-1.5 rounded-xl text-slate-300 hover:bg-red-50 hover:text-red-500 transition-all">
                    <i data-lucide="x" class="w-3.5 h-3.5"></i>
                </button>
            `;

            container.appendChild(tag);
            if (typeof lucide !== 'undefined') lucide.createIcons();
            select.value = "";
        }

        function checkPlaceholder() {
            const container = document.getElementById('tagContainer');
            const placeholder = document.getElementById('placeholder-text');
            const tags = container.querySelectorAll('div[class*="group"]');
            if (tags.length === 0) placeholder.style.display = 'block';
        }
    </script>
@endsection
