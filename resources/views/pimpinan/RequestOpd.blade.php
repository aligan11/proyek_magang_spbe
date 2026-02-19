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
            <div class="flex gap-2">
                <span class="bg-blue-50 text-blue-600 px-4 py-2 rounded-2xl text-xs font-bold flex items-center gap-2">
                    <div class="w-2 h-2 bg-blue-600 rounded-full animate-pulse"></div>
                    Sistem Aktif
                </span>
            </div>
        </div>

        <!-- Strategic Stats (Tetap Sesuai Desain Kamu) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">
            <div class="bg-white p-6 rounded-4xl shadow-sm border border-slate-100 relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-slate-400 text-sm font-medium">Total Masuk</p>
                    <h3 class="text-3xl font-black text-slate-900 mt-1">{{ $totalTickets ?? '0' }}</h3>
                </div>
                <i data-lucide="inbox" class="absolute -bottom-2 -right-2 w-24 h-24 text-slate-50 opacity-10"></i>
            </div>

            <div class="bg-white p-6 rounded-4xl shadow-sm border border-slate-100">
                <p class="text-slate-400 text-sm font-medium">Belum Ditugaskan</p>
                <h3 class="text-3xl font-black text-amber-500 mt-1">{{ $pendingTicketsCount ?? '0' }}</h3>
                <p class="text-[10px] text-slate-400 mt-2 font-bold">BUTUH MANDAT SEGERA</p>
            </div>

            <div class="bg-white p-6 rounded-4xl shadow-sm border border-slate-100">
                <p class="text-slate-400 text-sm font-medium">Sedang Proses</p>
                <h3 class="text-3xl font-black text-blue-600 mt-1">{{ $ongoingTicketsCount ?? '0' }}</h3>
            </div>

            <div class="bg-emerald-600 p-6 rounded-4xl shadow-xl shadow-emerald-100">
                <p class="text-emerald-100 text-sm font-medium">Selesai (Success)</p>
                <h3 class="text-3xl font-black text-white mt-1">{{ $completedTicketsCount ?? '0' }}</h3>
                <i data-lucide="check-circle" class="absolute -bottom-2 -right-2 w-24 h-24 text-white opacity-10"></i>
            </div>
        </div>

        <!-- Main Section: Daftar Request OPD -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

            <!-- List Request (Table Area) -->
            <div class="xl:col-span-2 bg-white rounded-4xl border border-slate-100 p-8 shadow-sm">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="font-bold text-lg text-slate-900">Request OPD Terbaru</h3>
                        <p class="text-xs text-slate-400">Klik "Berikan Mandat" untuk menugaskan petugas</p>
                    </div>
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
                                        <span class="text-sm font-bold text-slate-700">#{{ $ticket->no_ticket }}</span>
                                    </td>
                                    <td class="px-4 py-4 border-y border-slate-50 bg-slate-50/30">
                                        <div class="text-sm font-bold text-slate-900">{{ $ticket->service->nama_layanan }}
                                        </div>
                                        <div class="text-[10px] text-slate-400 truncate w-32">{{ $ticket->judul_request }}
                                        </div>
                                    </td>
                                    <td
                                        class="px-4 py-4 border-y border-slate-50 bg-slate-50/30 text-sm font-medium text-slate-600">
                                        {{ $ticket->opd->name }}
                                    </td>
                                    <td class="px-4 py-4 rounded-r-2xl border-y border-r border-slate-50 bg-slate-50/30">
                                        <a href="{{ route('mandate.create') }}">

                                            <button
                                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-[10px] font-bold transition cursor-pointer">
                                                BERIKAN MANDAT
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                                    <p class="text-xs font-bold text-slate-800 group-hover:text-blue-700 transition-colors">
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
    </script>
@endsection
