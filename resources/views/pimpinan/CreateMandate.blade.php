@extends('pimpinan.layout.AppPimpinan')
@section('dashboard')
    <div class="p-6 lg:p-10 bg-slate-50 min-h-screen">
        <!-- Header & Breadcrumb -->
        <div class="mb-8">
            <nav class="flex mb-2 text-xs font-medium text-slate-400 uppercase tracking-widest">
                <a href="{{ route('mandate.index') }}"> <span class="hover:text-blue-600 cursor-pointer">Mandat</span>
                </a>
                <span class="mx-2">/</span>
                <span class="text-slate-900">Buat Penugasan</span>
            </nav>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Kirim Mandat Tugas</h1>
            <p class="text-slate-500 mt-1">Delegasikan instruksi penugasan kepada tim pelaksana dengan cepat.</p>
        </div>

        <div class="max-w-4xl bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <form action="{{ route('mandate.store') }}" method="POST" class="p-8 space-y-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Pilih Tiket -->
                    <div class="space-y-3">
                        <label class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                                </path>
                            </svg>
                            Tiket Referensi
                        </label>
                        <div class="space-y-2">
                            <!-- Input Search Tiket -->
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </span>
                                <input type="text" id="searchTicket" placeholder="Cari nomor tiket..."
                                    class="w-full pl-10 pr-4 py-2 bg-white border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-blue-100 focus:border-blue-400 outline-none transition-all">
                            </div>
                            @error('ticket_id')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                            <select id="ticketSelect" name="ticket_id" required
                                class="w-full bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 block p-4 outline-none transition-all appearance-none cursor-pointer">
                                <option selected disabled value="">-- Pilih No Tiket --</option>
                                @foreach ($pendingTickets as $ticket)
                                    <option value="{{ $ticket->id }}">
                                        {{ $ticket->no_ticket }} - {{ $ticket->service->nama_layanan }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <!-- Pilih Petugas -->
                    <div class="space-y-3">
                        <label class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Tambah Petugas Pelaksana
                        </label>
                        <div class="space-y-2">
                            <!-- Input Search Petugas -->
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </span>
                                <input type="text" id="searchPetugas" placeholder="Cari nama petugas..."
                                    class="w-full pl-10 pr-4 py-2 bg-white border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-blue-100 focus:border-blue-400 outline-none transition-all">
                            </div>
                            <div class="flex gap-2">
                                @error('petugas_ids')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror

                                <select id="petugasSelect"
                                    class="flex-1 bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 block p-4 outline-none transition-all appearance-none">
                                    <option selected disabled value="">Pilih nama...</option>
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

                        </div>
                    </div>
                </div>

                <!-- Display Selected Tags -->
                <div class="space-y-3">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-widest">Daftar Penugasan</label>
                    <div id="tagContainer"
                        class="min-h-[80px] border-2 border-dashed border-slate-200 rounded-2xl p-4 flex flex-wrap gap-3 bg-slate-50/50 items-center justify-start">
                        <div id="placeholder-text" class="w-full text-center py-2">
                            <p class="text-slate-400 text-sm italic">Belum ada petugas yang dipilih untuk mandat ini</p>
                        </div>
                    </div>
                </div>

                <!-- Instruksi -->
                <div class="space-y-3">
                    <label class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Instruksi Mandat Pimpinan
                    </label>
                    @error('deskripsi')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror

                    <textarea placeholder="Berikan instruksi detail terkait penyelesaian tiket..." name="deskripsi" required
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 text-sm text-slate-700 h-40 focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition-all resize-none shadow-inner"></textarea>
                </div>



                <!-- Action Buttons -->
                <div class="flex items-center justify-end gap-4 pt-6 border-t border-slate-100">
                    <a href="{{ route('mandate.index') }}"
                        class="text-slate-500 hover:text-slate-700 text-sm font-semibold px-6 py-3 transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-slate-900 hover:bg-black text-white font-bold py-3.5 px-10 rounded-xl text-sm transition-all shadow-xl hover:shadow-2xl active:scale-95">
                        Simpan & Kirim Mandat
                    </button>
                </div>
            </form>
        </div>

        <script>
            // Fungsi reusable untuk pencarian dropdown
            function setupSearch(inputId, selectId) {
                const searchInput = document.getElementById(inputId);
                const select = document.getElementById(selectId);
                const originalOptions = Array.from(select.options);

                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();

                    // Bersihkan select
                    select.innerHTML = '';

                    // Filter opsi
                    const filteredOptions = originalOptions.filter(option => {
                        return option.text.toLowerCase().includes(searchTerm) || option.value === "";
                    });

                    // Tambahkan kembali opsi yang lolos filter
                    filteredOptions.forEach(option => select.add(option));

                    // Jika ada hasil, pilih yang pertama (bukan placeholder)
                    if (filteredOptions.length > 1 && searchTerm !== "") {
                        // select.selectedIndex = 1; 
                    }
                });
            }

            // Inisialisasi pencarian
            document.addEventListener('DOMContentLoaded', () => {
                setupSearch('searchTicket', 'ticketSelect');
                setupSearch('searchPetugas', 'petugasSelect');
            });

            function addPetugasTag() {
                const select = document.getElementById('petugasSelect');
                const container = document.getElementById('tagContainer');
                const placeholder = document.getElementById('placeholder-text');

                if (!select.value) return;

                const id = select.value;
                const nama = select.options[select.selectedIndex].getAttribute('data-nama');

                if (document.querySelector(`input[value="${id}"]`)) {
                    alert('Petugas sudah masuk dalam daftar.');
                    return;
                }

                if (placeholder) placeholder.style.display = 'none';

                const tag = document.createElement('div');
                tag.className =
                    "group flex items-center gap-3 bg-white text-slate-700 border border-slate-200 pl-4 pr-2 py-2 rounded-xl text-xs font-bold shadow-sm hover:border-blue-300 transition-all animate-in fade-in zoom-in duration-200";
                tag.innerHTML = `
        <div class="w-2 h-2 rounded-full bg-blue-500"></div>
        <span>${nama}</span>
        <input type="hidden" name="petugas_ids[]" value="${id}">
        <button type="button" onclick="this.parentElement.remove(); checkPlaceholder();"
            class="ml-1 p-1 rounded-lg text-slate-300 hover:bg-red-50 hover:text-red-500 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        `;

                container.appendChild(tag);
                select.value = "";
            }

            function checkPlaceholder() {
                const container = document.getElementById('tagContainer');
                const placeholder = document.getElementById('placeholder-text');
                // Check if there are any tags besides the placeholder
                const tags = container.querySelectorAll('div[class*="group"]');
                if (tags.length === 0) {
                    placeholder.style.display = 'block';
                }
            }
        </script>
    @endsection
