@extends('pimpinan.layout.AppPimpinan')
@section('dashboard')
    <div class="p-4 sm:p-6 lg:p-8">

        <!-- Welcome Header -->
        <div class="mb-10">
            <h1 class="text-3xl font-extrabold text-slate-900">Halo, Pak {{ $firstname }} </h1>
            <p class="text-slate-500 mt-1">Berikut adalah pantauan progres laporan hari ini,
                {{ now()->translatedFormat('d F Y') }}.</p>
        </div>

        <!-- Strategic Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">
            <div class="bg-white p-6 rounded-4xl shadow-sm border border-slate-100 relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-slate-400 text-sm font-medium">Total Masuk</p>
                    <h3 class="text-3xl font-black text-slate-900 mt-1">
                        {{ number_format($stats['total']) }}</h3>
                    <span class="text-emerald-500 text-xs font-bold flex items-center gap-1 mt-2">
                        <i data-lucide="trending-up" class="w-3 h-3"></i> Real-time data
                    </span>
                </div>
                <i data-lucide="inbox" class="absolute -bottom-2 -right-2 w-24 h-24 text-slate-50 opacity-10"></i>
            </div>

            <div class="bg-white p-6 rounded-4xl shadow-sm border border-slate-100">
                <p class="text-slate-400 text-sm font-medium">Menunggu Verifikasi</p>
                <h3 class="text-3xl font-black text-amber-500 mt-1">{{ $stats['pending'] }}</h3>
                <div class="w-full bg-slate-100 h-1.5 rounded-full mt-4">
                    @php
                        $pendingPerc = $stats['total'] > 0 ? ($stats['pending'] / $stats['total']) * 100 : 0;
                    @endphp
                    <div class="bg-amber-400 h-1.5 rounded-full" style="width: {{ $pendingPerc }}%"></div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-4xl shadow-sm border border-slate-100">
                <p class="text-slate-400 text-sm font-medium">Dalam Proses</p>
                <h3 class="text-3xl font-black text-blue-500 mt-1">{{ $stats['proses'] }}</h3>
                <div class="w-full bg-slate-100 h-1.5 rounded-full mt-4">
                    @php
                        $prosesPerc = $stats['total'] > 0 ? ($stats['proses'] / $stats['total']) * 100 : 0;
                    @endphp
                    <div class="bg-blue-500 h-1.5 rounded-full" style="width: {{ $prosesPerc }}%"></div>
                </div>
            </div>

            <div class="bg-emerald-600 p-6 rounded-4xl shadow-xl shadow-emerald-200">
                <p class="text-emerald-100 text-sm font-medium">Selesai (Success)</p>
                <h3 class="text-3xl font-black text-white mt-1">{{ $stats['selesai'] }}</h3>
                <div class="w-full bg-white/20 h-1.5 rounded-full mt-4">
                    @php
                        $selesaiPerc = $stats['total'] > 0 ? ($stats['selesai'] / $stats['total']) * 100 : 0;
                    @endphp
                    <div class="bg-white h-1.5 rounded-full" style="width: {{ $selesaiPerc }}%"></div>
                </div>
            </div>
        </div>

        <!-- Secondary Section -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 lg:gap-8">
            <!-- Chart Section -->
            <div class="lg:col-span-2 bg-white rounded-4xl border border-slate-100 p-8 shadow-sm">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="font-bold text-lg text-slate-900">Statistik Layanan</h3>
                        <p class="text-xs text-slate-400">Distribusi status permohonan saat ini</p>
                    </div>
                </div>
                <div class="h-64">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>

            <!-- Profile Info / Quick Access -->
            <div class="bg-white rounded-4xl border border-slate-100 p-8 shadow-sm flex flex-col items-center text-center">
                <div
                    class="w-24 h-24 bg-blue-50 rounded-full flex items-center justify-center mb-4 border-4 border-white shadow-lg overflow-hidden">
                    @if ($dataPetugas->avatar)
                        <img src="{{ asset('storage/avatars/' . $dataPetugas->avatar) }}"
                            class="w-full h-full object-cover">
                    @else
                        <span class="text-3xl font-black text-blue-600">{{ substr($firstname, 0, 1) }}</span>
                    @endif
                </div>
                <h3 class="font-bold text-lg text-slate-900">{{ $dataPetugas->name }}</h3>
                <p class="text-xs text-slate-400 uppercase tracking-widest font-bold mt-1">{{ $dataPetugas->role }}</p>
                <div class="mt-6 w-full space-y-3">
                    <a href="{{ route('pimpinan.profile') }}"
                        class="block w-full py-3 bg-slate-50 hover:bg-slate-100 rounded-xl text-slate-700 text-xs font-bold transition">Pengaturan
                        Profil</a>


                    <!-- Sidebar Footer with Logout Trigger -->
                    <button type="submit" onclick="toggleLogoutModal()"
                        class="w-full py-3 text-rose-500 text-xs font-bold hover:bg-rose-50 rounded-xl transition">Keluar
                        Sistem</button>

                </div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="mt-8 bg-white rounded-4xl border border-slate-100 p-8 shadow-sm">
            <h3 class="font-bold text-lg text-slate-900 mb-6">Aktivitas Terbaru</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($recentActivities as $activity)
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 flex gap-4 items-start">
                        @php
                            $color = match ($activity->status) {
                                1 => 'bg-amber-500',
                                2 => 'bg-blue-500',
                                3 => 'bg-emerald-500',
                                default => 'bg-slate-500',
                            };
                        @endphp
                        <div class="w-3 h-3 {{ $color }} rounded-full mt-1.5 shrink-0"></div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-slate-800 line-clamp-1">{{ $activity->nama_kebutuhan }}</p>
                            <p class="text-[10px] text-slate-500 mt-0.5">{{ $activity->nama_instansi }}</p>
                            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-wider mt-2">
                                {{ $activity->tglinput->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-slate-400 italic text-center py-10 col-span-full">Belum ada aktivitas terbaru.</p>
                @endforelse
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('statusChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Pending', 'Proses', 'Selesai'],
                        datasets: [{
                            label: 'Jumlah Permohonan',
                            data: [{{ $stats['pending'] }}, {{ $stats['proses'] }},
                                {{ $stats['selesai'] }}
                            ],
                            backgroundColor: [
                                'rgba(245, 158, 11, 0.2)', // amber
                                'rgba(59, 130, 246, 0.2)', // blue
                                'rgba(16, 185, 129, 0.2)' // emerald
                            ],
                            borderColor: [
                                'rgb(245, 158, 11)',
                                'rgb(59, 130, 246)',
                                'rgb(16, 185, 129)'
                            ],
                            borderWidth: 2,
                            borderRadius: 12,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    font: {
                                        weight: 'bold'
                                    }
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    font: {
                                        weight: 'bold'
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    </div>
@endsection
