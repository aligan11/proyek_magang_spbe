@props([
    'statusName' => 'status_kepegawaian',
    'instansiName' => 'id_instansi',
    'statusValue' => old('status_kepegawaian'),
    'instansiValue' => old('id_instansi'),
    'labelStatus' => 'Status Kepegawaian',
    'labelInstansi' => 'Pilih OPD / Instansi',
])

@php
    $componentId = 'status-instansi-' . \Illuminate\Support\Str::uuid()->toString();
@endphp

<div id="{{ $componentId }}" data-selected-instansi="{{ $instansiValue }}" class="grid gap-6">
    <div>
        <label for="{{ $componentId }}-status" class="mb-2 block text-sm font-bold text-slate-700">
            {{ $labelStatus }}
        </label>
        <select id="{{ $componentId }}-status" name="{{ $statusName }}"
            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100">
            <option value="">Pilih status kepegawaian</option>
            <option value="ASN" @selected($statusValue === 'ASN')>ASN</option>
            <option value="Non-ASN" @selected($statusValue === 'Non-ASN')>Non-ASN</option>
        </select>
    </div>

    <div id="{{ $componentId }}-instansi-wrapper" class="{{ $statusValue === 'ASN' ? '' : 'hidden' }}">
        <label for="{{ $componentId }}-instansi" class="mb-2 block text-sm font-bold text-slate-700">
            {{ $labelInstansi }}
        </label>
        <select id="{{ $componentId }}-instansi" name="{{ $instansiName }}"
            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-medium text-slate-700 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100">
            <option value="">Pilih OPD / Instansi</option>
        </select>
        <p id="{{ $componentId }}-feedback" class="mt-2 text-sm font-medium text-slate-500"></p>
    </div>
</div>

<script>
    (function() {
        const root = document.getElementById(@js($componentId));

        if (!root) {
            return;
        }

        const statusSelect = root.querySelector('[name="{{ $statusName }}"]');
        const instansiWrapper = document.getElementById(@js($componentId . '-instansi-wrapper'));
        const instansiSelect = root.querySelector('[name="{{ $instansiName }}"]');
        const feedback = document.getElementById(@js($componentId . '-feedback'));
        const selectedInstansi = root.dataset.selectedInstansi;
        let hasLoadedInstansi = false;

        const resetInstansi = () => {
            instansiSelect.innerHTML = '<option value="">Pilih OPD / Instansi</option>';
            instansiSelect.value = '';
            feedback.textContent = '';
            hasLoadedInstansi = false;
        };

        const populateInstansi = async () => {
            if (hasLoadedInstansi) {
                if (selectedInstansi) {
                    instansiSelect.value = selectedInstansi;
                }
                return;
            }

            feedback.textContent = 'Memuat data instansi...';

            try {
                const response = await fetch('/api/get-instansi', {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });

                if (!response.ok) {
                    throw new Error('Gagal mengambil data instansi.');
                }

                const payload = await response.json();
                const instansiItems = Array.isArray(payload.data) ? payload.data : [];

                instansiSelect.innerHTML = '<option value="">Pilih OPD / Instansi</option>';

                instansiItems.forEach((instansi) => {
                    const option = document.createElement('option');
                    option.value = instansi.id;
                    option.textContent = instansi.nama_instansi;
                    instansiSelect.appendChild(option);
                });

                if (selectedInstansi) {
                    instansiSelect.value = selectedInstansi;
                }

                feedback.textContent = instansiItems.length
                    ? 'Data instansi aktif berhasil dimuat.'
                    : 'Belum ada instansi aktif yang tersedia.';
                hasLoadedInstansi = true;
            } catch (error) {
                feedback.textContent = error.message || 'Terjadi kesalahan saat memuat instansi.';
            }
        };

        const toggleInstansi = async () => {
            if (statusSelect.value === 'ASN') {
                instansiWrapper.classList.remove('hidden');
                await populateInstansi();
                return;
            }

            instansiWrapper.classList.add('hidden');
            resetInstansi();
        };

        statusSelect.addEventListener('change', toggleInstansi);
        toggleInstansi();
    })();
</script>
