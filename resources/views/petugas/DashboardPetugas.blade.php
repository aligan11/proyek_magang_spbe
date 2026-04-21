@extends('petugas.layout.AppPetugas')
@section('dashboard')
    <!-- Header Welcome -->
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4" x-data="{ openFinishModal: false, selectedMandateId: null, selectedNoreg: '' }">
        <div>
            <h1 class="text-3xl font-black text-slate-800 tracking-tight">Dashboard Kerja</h1>
            <p class="text-slate-500 text-sm font-medium">Pantau dan kelola laporan tugas lapangan secara
                real-time.</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="hover-card bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 flex items-center gap-5">
            <div class="p-4 bg-blue-50 text-blue-600 rounded-2xl">
                <i data-lucide="file-text" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Total Tugas</p>
                <h3 class="text-2xl font-black text-slate-800">{{ $stats['total'] }}</h3>
            </div>
        </div>

        <div class="hover-card bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 flex items-center gap-5">
            <div class="p-4 bg-amber-50 text-amber-600 rounded-2xl">
                <i data-lucide="clock" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Proses</p>
                <h3 class="text-2xl font-black text-slate-800">{{ $stats['proses'] }}</h3>
            </div>
        </div>

        <div class="hover-card bg-white p-6 rounded-[2rem] shadow-sm border border-slate-200 flex items-center gap-5">
            <div class="p-4 bg-emerald-50 text-emerald-600 rounded-2xl">
                <i data-lucide="check-circle" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Selesai</p>
                <h3 class="text-2xl font-black text-slate-800">{{ $stats['selesai'] }}</h3>
            </div>
        </div>

        <div class="hover-card bg-[#1e293b] p-6 rounded-[2rem] shadow-xl flex items-center gap-5">
            <div class="p-4 bg-white/10 text-white rounded-2xl">
                <i data-lucide="calendar" class="w-6 h-6"></i>
            </div>
            <div class="text-white">
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Hari Ini</p>
                <h3 class="text-sm font-bold">{{ now()->translatedFormat('d F Y') }}</h3>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8" x-data="{ openFinishModal: false, selectedMandateId: null, selectedNoreg: '' }">
        <!-- Mini Profile -->
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="h-20 bg-[#1e293b]"></div>
                <div class="px-6 pb-6">
                    <div class="relative flex justify-center">
                        <div class="absolute -top-12 bg-white p-1 rounded-full border-4 border-slate-50 shadow-md">
                            <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center text-blue-600 font-black text-2xl">
                                {{ substr($dataPetugas->name, 0, 1) }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 text-center">
                        <h4 class="text-lg font-bold text-slate-800">{{ $dataPetugas->name }}</h4>
                        <span class="text-xs bg-slate-100 text-slate-600 px-3 py-1 rounded-full font-medium">NIP: {{ $dataPetugas->nip ?? '-' }}</span>
                    </div>
                    <div class="mt-6 space-y-4 border-t border-slate-100 pt-6 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-400">Unit Kerja</span>
                            <span class="text-slate-700 font-medium">{{ $dataPetugas->unitKerja ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">Wilayah</span>
                            <span class="text-slate-700 font-medium">{{ $dataPetugas->daerah ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Reports Table -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-200 overflow-hidden">
                <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center">
                    <h3 class="font-black text-slate-800 text-lg uppercase tracking-tight">Tugas Mandat</h3>
                </div>
                <div class="overflow-x-auto px-4 pb-4">
                    <table class="w-full text-left border-separate border-spacing-y-3">
                        <thead>
                            <tr class="text-slate-400 text-[10px] font-black uppercase tracking-widest">
                                <th class="px-4 pb-2">ID Laporan</th>
                                <th class="px-4 pb-2">Topik / Masalah</th>
                                <th class="px-4 pb-2 text-center">Status</th>
                                <th class="px-4 pb-2 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mandates as $mandate)
                            <tr class="bg-slate-50/50 hover:bg-slate-100/50 transition-colors">
                                <td class="px-4 py-4 rounded-l-2xl text-xs font-bold text-blue-600">#{{ $mandate->ticket->noreg }}</td>
                                <td class="px-4 py-4">
                                    <p class="text-sm font-bold text-slate-800">{{ $mandate->ticket->nama_kebutuhan }}</p>
                                    <p class="text-[10px] text-slate-400 font-medium">{{ $mandate->ticket->nama_instansi }}</p>
                                </td>
                                <td class="px-4 py-4 text-center">
                                    @php
                                        $statusColor = match($mandate->status) {
                                            'proses' => 'bg-amber-100 text-amber-700',
                                            'selesai' => 'bg-emerald-100 text-emerald-700',
                                            default => 'bg-slate-100 text-slate-700'
                                        };
                                    @endphp
                                    <span class="px-3 py-1 {{ $statusColor }} text-[10px] font-black rounded-lg uppercase">{{ $mandate->status }}</span>
                                </td>
                                <td class="px-4 py-4 text-right rounded-r-2xl">
                                    <div class="flex justify-end gap-2">
                                        @if($mandate->status == 'proses')
                                        <button @click="openFinishModal = true; selectedMandateId = {{ $mandate->id }}; selectedNoreg = '{{ $mandate->ticket->noreg }}'"
                                            class="bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-2 rounded-xl text-[10px] font-bold transition shadow-sm cursor-pointer flex items-center gap-1">
                                            <i data-lucide="check" class="w-3 h-3"></i> SELESAIKAN
                                        </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-10 text-slate-400 italic font-medium">Belum ada tugas yang ditugaskan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $mandates->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Selesaikan Tugas -->
        <div x-show="openFinishModal" class="fixed inset-0 z-[100] overflow-y-auto" x-cloak>
            <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" @click="openFinishModal = false"></div>
            <div class="flex min-h-full items-center justify-center p-4">
                <div x-show="openFinishModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    class="relative transform overflow-hidden rounded-[2.5rem] bg-white p-8 shadow-2xl transition-all w-full max-w-md">
                    <div class="text-center mb-6">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 mb-4">
                            <i data-lucide="check-circle" class="w-10 h-10"></i>
                        </div>
                        <h3 class="text-xl font-black text-slate-800">Selesaikan Tugas</h3>
                        <p class="text-slate-500 text-sm font-medium">No Registrasi: <span class="text-blue-600 font-bold" x-text="selectedNoreg"></span></p>
                    </div>

                    <form :action="'/petugas/update-status/' + selectedMandateId" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <input type="hidden" name="status" value="selesai">
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Keterangan Verifikasi</label>
                            <textarea name="keterangan" rows="3" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 outline-none transition-all text-sm" placeholder="Jelaskan tindakan yang telah dilakukan..."></textarea>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Upload Bukti (Opsional)</label>
                            <input type="file" name="berkas" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-black file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                        </div>
                        <div class="pt-4 flex gap-3">
                            <button type="button" @click="openFinishModal = false" class="flex-1 px-6 py-3 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200 transition-all">Batal</button>
                            <button type="submit" class="flex-1 px-6 py-3 bg-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-emerald-200 hover:bg-emerald-700 transition-all">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
