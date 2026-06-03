@extends('pimpinan.layout.AppPimpinan')
@section('dashboard')
    <div class="p-4 sm:p-6 lg:p-8">

        <!-- Welcome Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900">Halo, Pak {{ $firstname }} </h1>
                <p class="text-slate-500 mt-1">Berikut adalah pantauan progres laporan hari ini,
                    {{ now()->translatedFormat('d F Y') }}.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('pimpinan.export.pdf') }}"
                    class="bg-white border border-slate-200 text-slate-600 px-5 py-3 rounded-2xl text-xs font-bold flex items-center gap-2 hover:bg-slate-50 transition shadow-sm">
                    <i data-lucide="file-text" class="w-4 h-4 text-rose-500"></i>
                    Export PDF
                </a>
                <a href="{{ route('pimpinan.export.excel') }}"
                    class="bg-white border border-slate-200 text-slate-600 px-5 py-3 rounded-2xl text-xs font-bold flex items-center gap-2 hover:bg-slate-50 transition shadow-sm">
                    <i data-lucide="file-spreadsheet" class="w-4 h-4 text-emerald-500"></i>
                    Export Excel
                </a>
            </div>
        </div>

        <!-- Strategic Stats (Tetap Sesuai Desain Kamu) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">
            <!-- Card 1: Total Masuk (Static) -->
            <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-slate-100 relative overflow-hidden group">
                <div class="relative z-10">
                    <div
                        class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center mb-3 group-hover:bg-slate-100 transition-colors">
                        <i data-lucide="inbox" class="w-5 h-5 text-slate-400"></i>
                    </div>
                    <p class="text-slate-500 text-sm font-semibold tracking-wide">Total Masuk</p>
                    <h3 class="text-4xl font-black text-slate-900 mt-1 tracking-tight">{{ $totalTickets ?? '0' }}</h3>
                </div>
                <!-- Background Icon Dekoratif -->
                <i data-lucide="inbox"
                    class="absolute -bottom-4 -right-4 w-28 h-28 text-slate-100 opacity-40 transform group-hover:scale-110 transition-transform duration-500"></i>
            </div>

            <!-- Card 2: Belum Ditugaskan (Navigatif/Clickable) -->
            <div onclick="window.location.href='{{ route('indexMandat', ['status' => 1]) }}'"
                class="{{ $warna }} p-6 rounded-[2.5rem] shadow-lg relative overflow-hidden cursor-pointer transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl group border border-transparent">
                <div class="relative z-10">
                    <div class="flex justify-between items-start">
                        <p class="{{ $warnaText }} text-sm font-bold opacity-80 tracking-wide">Belum Ditugaskan</p>
                        <!-- Badge Pulse untuk Status Urgent -->
                        @if ($status == 1)
                            <span class="flex h-3 w-3 relative">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-500"></span>
                            </span>
                        @endif
                    </div>
                    <h3
                        class="text-4xl font-black {{ $status == 1 ? 'text-white' : 'text-amber-500' }} mt-1 tracking-tight">
                        {{ $pendingTicketsCount ?? '0' }}
                    </h3>
                    <div class="flex items-center gap-2 mt-3">
                        <span
                            class="px-2 py-1 rounded-lg bg-black/5 text-[10px] {{ $warnaText }} font-black tracking-widest uppercase">
                            Butuh Mandat Segera
                        </span>
                    </div>
                </div>
                <!-- Glow Effect -->
                <div
                    class="absolute top-0 right-0 -mr-10 -mt-10 w-32 h-32 bg-white/10 rounded-full blur-3xl group-hover:bg-white/20 transition-all">
                </div>
            </div>

            <!-- Card 3: Selesai (Navigatif/Clickable) -->
            <div onclick="window.location.href='{{ route('indexMandat', ['status' => 2]) }}'"
                class="{{ $warna2 }} p-6 rounded-[2.5rem] shadow-lg relative overflow-hidden cursor-pointer transition-all duration-300 transform hover:-translate-y-2 hover:shadow-2xl group border border-transparent">
                <div class="relative z-10">
                    <p class="{{ $warnaText2 }} text-sm font-bold opacity-80 tracking-wide">Selesai (Success)</p>
                    <h3 class="text-4xl font-black {{ $warnaText2 }} mt-1 tracking-tight">
                        {{ $completedTicketsCount ?? '0' }}</h3>
                    <div class="flex items-center gap-2 mt-3">
                        <span
                            class="px-2 py-1 rounded-lg bg-white/10 text-[10px] {{ $warnaText2 }} font-black tracking-widest uppercase">
                            Terverifikasi Sistem
                        </span>
                    </div>
                </div>
                <!-- Icon dengan Animasi Putar saat Hover -->
                <div
                    class="absolute -bottom-4 -right-4 transition-all duration-500 transform group-hover:scale-110 group-hover:-rotate-12">
                    <i data-lucide="check-circle"
                        class="w-32 h-32 {{ $status == 2 ? 'text-white' : 'text-emerald-500' }} opacity-10"></i>
                </div>
            </div>
        </div>


        <!-- Main Section: Daftar Request OPD -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

            <!-- List Request (Table Area) -->
            <div class="xl:col-span-2 bg-white rounded-4xl border border-slate-100 p-8 shadow-sm">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                    <div>
                        <h3 class="font-bold text-lg text-slate-900">Request OPD Terbaru</h3>
                        <p class="text-xs text-slate-400">Klik "Berikan Mandat" untuk menugaskan petugas</p>
                    </div>
                    <form action="{{ url()->current() }}" method="GET" class="relative w-full md:w-64">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari No. Reg..."
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-4 focus:ring-blue-100 outline-none transition-all">
                        <i data-lucide="search" class="absolute left-3 top-2.5 w-4 h-4 text-slate-400"></i>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-y-3">
                        <thead>
                            <tr class="text-slate-400 text-[10px] uppercase tracking-widest font-bold">
                                <th class="px-4 py-2">No Tiket</th>
                                <th class="px-4 py-2">Layanan</th>
                                <th class="px-4 py-2">OPD</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendingTickets as $ticket)
                                <tr class="group hover:bg-slate-50 transition-all duration-300">
                                    <td class="px-4 py-4 rounded-l-2xl border-y border-l border-slate-50 bg-slate-50/30">
                                        <span class="text-sm font-bold text-slate-700">#{{ $ticket->noreg }}</span>
                                    </td>
                                    <td class="px-4 py-4 border-y border-slate-50 bg-slate-50/30">
                                        <div class="text-sm font-bold text-slate-900">
                                            {{ $ticket->jenis_layanan->namajenis ?? '-' }}
                                        </div>
                                        <div class="text-[10px] text-slate-400 truncate w-32">{{ $ticket->nama_kebutuhan }}
                                        </div>
                                    </td>
                                    <td
                                        class="px-4 py-4 border-y border-slate-50 bg-slate-50/30 text-sm font-medium text-slate-600">
                                        {{ $ticket->inputby }}
                                    </td>

                                    <td class="px-4 py-4 rounded-r-2xl border-y border-r border-slate-50 bg-slate-50/30">
                                        <div class="flex items-center gap-2">
                                            {{-- Button Show - Selalu Ada --}}
                                            <a href="{{ route('showTicket', $ticket->noreg) }}"
                                                class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest bg-slate-900 text-white hover:bg-blue-600 transition-all shadow-lg shadow-slate-200 hover:shadow-blue-500/30 active:scale-95">
                                                <i data-lucide="eye" class="w-3.5 h-3.5"></i>
                                                Detail
                                            </a>

                                            @if ($status == 1)
                                                {{-- TOMBOL MANDAT - Muncul hanya saat status 1 --}}
                                                <a href="{{ route('pimpinan.mandat', $ticket->noreg) }}">
                                                    <button
                                                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-xl text-[10px] font-bold transition cursor-pointer flex items-center gap-1">
                                                        <i data-lucide="send" class="w-3 h-3"></i>
                                                        MANDAT
                                                    </button>
                                                </a>
                                            @else
                                                {{-- EDIT & DELETE - Muncul HANYA saat status BUKAN 1 --}}
                                                <div class="flex items-center gap-2 ml-2 pl-2 border-l border-slate-200">
                                                    {{-- Edit --}}
                                                    <a href="{{ route('pimpinan.edit', $ticket->id) }}"
                                                        class="p-2.5 bg-white text-amber-500 border border-slate-200 rounded-xl hover:bg-amber-500 hover:text-white hover:border-amber-500 transition-all shadow-sm active:scale-90">
                                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                                    </a>

                                                    {{-- Delete --}}
                                                    <button type="button" onclick="confirmDelete({{ $ticket->id }})"
                                                        class="p-2.5 bg-white text-rose-500 border border-slate-200 rounded-xl hover:bg-rose-500 hover:text-white hover:border-rose-500 transition-all shadow-sm active:scale-90 cursor-pointer">
                                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                    </button>

                                                    <form id="delete-form-{{ $ticket->id }}"
                                                        action="{{ route('pimpinan.destroy', $ticket->id) }}"
                                                        method="POST" class="hidden">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-6">
                    {{ $pendingTickets->links() }}
                </div>
            </div>

            <!-- Side Insight: Petugas Aktif -->
            <!-- Side Insight: Petugas Aktif -->
            <div class="bg-white rounded-4xl border border-slate-100 p-8 shadow-sm self-start">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-bold text-lg text-slate-900">Petugas Tersedia</h3>
                    {{-- Badge jumlah online --}}
                    <span
                        class="bg-emerald-50 text-emerald-600 text-[10px] font-bold px-2.5 py-1 rounded-lg border border-emerald-100">
                        {{ $petugasOnline->count() }} ONLINE
                    </span>
                </div>

                <div class="space-y-3">
                    @forelse ($petugasOnline as $petugas)
                        <div
                            class="flex items-center justify-between p-3 rounded-2xl border border-slate-50 hover:border-blue-100 hover:bg-blue-50/30 transition-all duration-300 group">
                            <div class="flex items-center gap-3">
                                {{-- Avatar dengan Indicator Online --}}
                                <div class="relative">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center font-bold text-slate-500 text-xs uppercase border-2 border-white shadow-sm">
                                        {{ substr($petugas->name, 0, 2) }}
                                    </div>
                                    <span
                                        class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-white rounded-full animate-pulse"></span>
                                </div>

                                <div>
                                    <p
                                        class="text-xs font-bold text-slate-800 group-hover:text-blue-700 transition-colors">
                                        {{ $petugas->name }}</p>
                                    <p class="text-[10px] text-slate-400 font-medium">
                                        {{ $petugas->jabatan ?? 'Petugas Lapangan' }}
                                    </p>
                                </div>
                            </div>

                            <i data-lucide="chevron-right"
                                class="w-4 h-4 text-slate-300 group-hover:text-blue-400 group-hover:translate-x-1 transition-all"></i>
                        </div>
                    @empty
                        {{-- Tampilan kalau KOSONG (Empty State) --}}
                        <div
                            class="flex flex-col items-center justify-center py-10 bg-slate-50/50 rounded-3xl border border-dashed border-slate-200">
                            <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mb-3">
                                <i data-lucide="users" class="w-6 h-6 text-slate-300"></i>
                            </div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Tidak ada petugas</p>
                            <p class="text-[10px] text-slate-400 mt-1">Semua petugas sedang offline</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    </div>
    </div>


    <script>
        function openMandateModal(ticketId, noTicket) {
            document.getElementById('modal_ticket_id').value = ticketId;
            document.getElementById('modal_no_ticket').innerText = 'Tiket #' + noTicket;
            document.getElementById('mandateModal').classList.remove('hidden');
        }

        function closeMandateModal() {
            document.getElementById('mandateModal').classList.add('hidden');
        }

        function confirmDelete(ticketId) {
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Yakin ingin menghapus tiket ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + ticketId).submit();
                }
            });
        }
    </script>
@endsection
