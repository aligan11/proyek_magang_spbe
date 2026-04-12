<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Akun - Diskominfo</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .bg-government {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        /* Hilangkan spinner input number */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body class="bg-government min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md" x-data="otpHandler()">
        <div class="glass-card rounded-3xl shadow-2xl p-8 text-center">

            <!-- Icon -->
            <div class="w-20 h-20 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                    </path>
                </svg>
            </div>

            <h2 class="text-gray-800 text-2xl font-bold mb-2">Verifikasi Kode</h2>
            <p class="text-gray-500 text-sm mb-8">Masukkan 6 digit kode keamanan yang kami kirimkan ke
                <strong>Email</strong> Anda.
            </p>

            <form action="{{ route('otp.verify') }}" method="POST" @submit.prevent="verifyOtp()">
                @csrf
                <!-- OTP Inputs -->
                <div class="flex justify-between gap-2 mb-8">
                    <template x-for="(i, index) in Array.from({length: 6})">
                        <input type="number" maxlength="1"
                            class="w-12 h-14 text-center text-xl font-bold border-2 border-gray-200 rounded-xl focus:border-blue-600 focus:ring-2 focus:ring-blue-100 outline-none transition-all bg-white"
                            :class="otp.join('').length === 6 ? 'border-blue-600' : 'border-gray-200'"
                            x-model="otp[index]" @input="handleInput($event, index)"
                            @keydown.backspace="handleBackspace($event, index)" :id="'otp-' + index">
                    </template>
                </div>

                <button type="submit" :disabled="loading || otp.join('').length < 6"
                    class="w-full bg-blue-700 hover:bg-blue-800 disabled:bg-blue-300 text-white font-semibold py-3 rounded-xl shadow-lg transition-all flex items-center justify-center space-x-2">
                    <span x-show="!loading">Verifikasi Kode</span>
                    <svg x-show="loading" class="animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </button>
            </form>

            <div class="mt-8">
                <p class="text-sm text-gray-500">
                    Tidak menerima kode?
                    <button @click="resendCode()" class="text-blue-700 font-bold hover:underline disabled:opacity-50"
                        :disabled="loading">
                        Kirim Ulang
                    </button>
                </p>
            </div>
        </div>
    </div>

    <script>
        function otpHandler() {
            return {
                otp: Array(6).fill(''),
                loading: false,
                handleInput(e, index) {
                    const val = e.target.value;
                    // Hanya ambil digit terakhir jika user copypaste
                    this.otp[index] = val.substring(val.length - 1);

                    // Pindah ke input berikutnya
                    if (this.otp[index] !== '' && index < 5) {
                        document.getElementById('otp-' + (index + 1)).focus();
                    }
                },
                handleBackspace(e, index) {
                    if (e.target.value === '' && index > 0) {
                        document.getElementById('otp-' + (index - 1)).focus();
                    }
                },
                async verifyOtp() {
                    this.loading = true;
                    try {
                        const response = await fetch("{{ route('otp.verify') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                otp: this.otp
                            })
                        });
                        const result = await response.json();
                        if (response.ok) {
                            window.location.href = result.redirect;
                        } else {
                            alert(result.message || 'Kode OTP salah!');
                            this.otp = Array(6).fill('');
                            document.getElementById('otp-0').focus();
                        }
                    } catch (error) {
                        alert('Terjadi kesalahan koneksi ke server.');
                    } finally {
                        this.loading = false;
                    }
                },

                // PINDAHKAN resendCode ke dalam sini:
                async resendCode() {
                    this.loading = true;
                    try {
                        const response = await fetch("{{ route('otp.resend') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        });
                        const result = await response.json();
                        alert(result.message);
                    } catch (error) {
                        alert('Gagal mengirim ulang kode.');
                    } finally {
                        this.loading = false;
                    }
                }
            }
        }
    </script>
    <script>
        // Di dalam otpHandler() tambahkan function ini:
    </script>
</body>

</html>
