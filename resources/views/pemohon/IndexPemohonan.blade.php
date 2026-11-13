@extends('pemohon.layout.AppPemohon')

@section('content')
    <div :class="sidebarOpen ? 'md:ml-72' : 'md:ml-24'"
        class="transition-all duration-300 min-h-screen py-8 px-4 sm:px-6 lg:px-8" x-data="{
            search: '',
        }">

        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
                <div class="flex items-center space-x-4">
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="p-3 bg-white border border-slate-200 rounded-2xl text-slate-600 hover:text-blue-600 shadow-sm transition-all active:scale-90 flex-shrink-0">
                        <svg x-show="!sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                        <svg x-show="sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </button>

                    <div>
                        <h1
                            class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight sm:text-4xl leading-tight">
                            Riwayat <span class="text-blue-600">Permohonan</span>
                        </h1>
                        <p class="text-slate-500 mt-1 font-medium text-sm sm:text-base">Pantau status pengajuan layanan SPBE
                            Anda.</p>
                    </div>
                </div>

                <a href="{{ route('pemohon.create') }}"
                    class="group inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-xl shadow-blue-200 transition-all active:scale-95 space-x-3 w-full md:w-auto">
                    <div class="bg-white/20 p-1 rounded-lg group-hover:rotate-90 transition-transform duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <span>Buat Permohonan</span>
                </a>
            </div>

            <!-- Main Table Card -->
            <div
                class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/40 border border-slate-100 overflow-hidden transition-all">
                <div class="p-4 sm:p-6 border-b border-slate-50 bg-slate-50/30">
                    <form action="{{ route('pemohon.index') }}" method="GET" class="relative group">
                        <span
                            class="absolute inset-y-0 left-0 pl-5 flex items-center text-slate-400 group-focus-within:text-blue-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </span>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari Registrasi..."
                            class="w-full pl-14 pr-6 py-3 sm:py-4 bg-white border border-slate-200 rounded-2xl focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none transition-all font-medium text-slate-700 text-sm sm:text-base">
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[800px]">
                        <thead>
                            <tr class="bg-slate-50/50">
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                    Registrasi</th>
                                <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                    Kebutuhan & Layanan</th>
                                <th
                                    class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">
                                    Waktu</th>
                                <th
                                    class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">
                                    Status</th>
                                <th
                                    class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($permohonan as $item)
                                <tr class="hover:bg-slate-50/80 transition-all group text-left">
                                    <td class="px-8 py-6">
                                        <div
                                            class="font-mono text-xs font-bold text-blue-600 bg-blue-50 px-4 py-1.5 rounded-xl border border-blue-100 inline-block shadow-sm">
                                            {{ $item->noreg }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <!-- Nama Kebutuhan Utama -->
                                        <div
                                            class="font-bold text-slate-800 text-base group-hover:text-blue-600 transition-colors">
                                            {{ $item->nama_kebutuhan }}
                                        </div>

                                        <!-- Badge Kebutuhan (Array id_kebutuhan) -->
                                        <div class="flex flex-wrap gap-1 mt-1.5">
                                            @foreach ($item->kebutuhans as $keb)
                                                <span
                                                    class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[10px] font-bold rounded-md">
                                                    {{ $keb->nama_kebutuhan }}
                                                </span>
                                            @endforeach
                                        </div>

                                        <!-- INFORMASI TAMBAHAN: Jenis Layanan & Instansi -->
                                        <div
                                            class="flex items-center gap-2 mt-2 text-[11px] font-bold text-slate-400 uppercase tracking-tight">
                                            <!-- Jenis Layanan -->
                                            @if ($item->jenis_layanan)
                                                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 rounded">
                                                    {{ $item->jenis_layanan->namajenis }}
                                                    <!-- Sesuaikan nama kolom jenis layanan di tabelnya -->
                                                </span>
                                                <span>•</span>
                                            @endif

                                            <!-- Nama Instansi -->
                                            <span>{{ $item->nama_instansi }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-center text-sm font-bold text-slate-600">
                                        {{ $item->tglinput->format('d/m/Y') }}</td>
                                    <td class="px-8 py-6 text-center">
                                        @php
                                            // Gunakan status_ver (sesuai diskusi sebelumnya) atau tetap status jika kolomnya berbeda
                                            // Paksa ke integer agar cocok dengan match strict comparison
                                            $statusValue = (int) ($item->status_ver ?? $item->status);

                                            $stConfig = match ($statusValue) {
                                                \App\Models\Layanan_spbe::STATUS_SELESAI => [
                                                    'label' => 'selesai',
                                                    'color' => 'emerald',
                                                ],
                                                \App\Models\Layanan_spbe::STATUS_PROSES => [
                                                    'label' => 'proses',
                                                    'color' => 'blue',
                                                ],
                                                \App\Models\Layanan_spbe::STATUS_PENDING => [
                                                    'label' => 'pending',
                                                    'color' => 'amber',
                                                ],
                                                default => ['label' => 'pending', 'color' => 'amber'],
                                            };
                                        @endphp

                                        <span
                                            class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider bg-{{ $stConfig['color'] }}-100 text-{{ $stConfig['color'] }}-600 border border-{{ $stConfig['color'] }}-200">
                                            {{ $stConfig['label'] }}
                                        </span>
                                    </td>

                                    <td class="px-8 py-6 text-right">
                                        <div class="flex justify-end space-x-2">
                                            <a href="{{ route('pemohon.show', $item->id) }}"
                                                class="p-2.5 bg-white border border-slate-200 rounded-xl text-slate-400 hover:text-blue-600 hover:shadow-lg transition-all active:scale-90 shadow-sm"
                                                title="Lihat Detail">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                            </a>

                                            @if ($item->status == \App\Models\Layanan_spbe::STATUS_PENDING)
                                                <a href="{{ route('pemohon.edit', $item->id) }}"
                                                    class="p-2.5 bg-white border border-slate-200 rounded-xl text-slate-400 hover:text-amber-600 hover:border-amber-100 hover:bg-amber-50 shadow-sm transition-all active:scale-90"
                                                    title="Edit Permohonan">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                </a>

                                                <button type="button"
                                                    onclick="confirmDelete('{{ route('pemohon.destroy', $item->id) }}')"
                                                    class="p-2.5 bg-white border cursor-pointer border-slate-200 rounded-xl text-slate-400 hover:text-rose-600 hover:border-rose-100 hover:bg-rose-50 shadow-sm transition-all active:scale-90"
                                                    title="Hapus">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-20 text-center text-slate-400 font-bold italic">
                                        Belum ada permohonan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-6 bg-slate-50/50">{{ $permohonan->links() }}</div>
            </div>
        </div>

        <form id="delete-form" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: 'Hapus Permohonan?',
                text: "Data yang sudah dihapus tidak dapat dipulihkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e11d48',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'rounded-[2rem]',
                    confirmButton: 'rounded-xl font-bold py-3 px-6',
                    cancelButton: 'rounded-xl font-bold py-3 px-6'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('delete-form');
                    form.action = url;
                    form.submit();
                }
            })
        }
    </script>
@endsection
