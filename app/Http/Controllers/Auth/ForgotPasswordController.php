<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    // 1. Tampilkan Halaman Input Email (Lupa Sandi)
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    // 2. Proses Kirim Email Link Reset
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Mengirim link ke email menggunakan logic bawaan Laravel
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    // 3. Tampilkan Halaman Input Password Baru
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    // 4. Proses Update Password Baru ke Database
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Eksekusi reset password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        // Jika berhasil, arahkan ke login dengan pesan sukses
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function forgotPemohon()
    {
        return view('pemohon.forgotPasswordPemohon');
    }

    public function otpPagePemohon()
    {
        return view('pemohon.VerifikasiCodeOtp');
    }


    /**
     * Menangani permintaan reset kata sandi
     */
    public function sendResetLink(Request $request)
    {
        // 1. Validasi Input berdasarkan metode yang dipilih
        $request->validate([
            'method' => 'required|in:email,whatsapp',
            'email' => 'required_if:method,email|email|nullable',
            'whatsapp' => 'required_if:method,whatsapp|numeric|nullable',
        ]);

        if ($request->method === 'email') {
            return $this->handleEmailReset($request->email);
        } else {
            return $this->handleWhatsAppReset($request->no_hp);
        }
    }

    /**
     * Logika Reset via Email
     */
    protected function handleEmailReset($email)
    {
        $user = Pemohon::where('email', $email)->first();

        if ($user) {
            // Buat 6 angka random
            $otp = rand(100000, 999999);

            // Simpan ke database
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $email],
                ['token' => $otp, 'created_at' => now()]
            );

            // Kirim ke Mailpit (Gunakan Log agar cepat dites tanpa mailable class)
            // Log::info("OTP untuk $email adalah: $otp");

            // Atau jika ingin tampil di dashboard Mailpit:
            Mail::raw("Kode verifikasi Anda: $otp", function ($message) use ($email) {
                $message->to($email)->subject('Kode Verifikasi Diskominfo');
            });
        }
        session(['reset_email' => $email]);


        return redirect()->route('otp.pemohon')->with('success', 'otp berhasil dikirim');
    }


    /**
     * Memverifikasi kode OTP yang diinput oleh user
     */

    public function verifyOtp(Request $request)
    {
        // 1. Validasi
        $request->validate([
            'otp' => 'required|array|size:6',
            'otp.*' => 'required|numeric|digits:1',
        ]);

        $inputOtp = implode('', $request->otp);
        $identifier = session('reset_email');

        // 2. Cek Session
        if (!$identifier) {
            return response()->json(['message' => 'Sesi kadaluarsa, silakan minta kode ulang.'], 419);
        }

        // 3. Cari di Database
        $otpData = DB::table('password_reset_tokens')
            ->where('email', $identifier)
            ->where('token', $inputOtp)
            ->first();

        // 4. Cek Jika Tidak Ada
        if (!$otpData) {
            return response()->json(['message' => 'Kode OTP salah atau sudah tidak berlaku.'], 422);
        }

        // 5. Cek Expired
        $isExpired = Carbon::parse($otpData->created_at)->addMinutes(5)->isPast();
        if ($isExpired) {
            return response()->json(['message' => 'Kode OTP sudah kadaluarsa.'], 422);
        }

        // 6. Jika Benar
        session(['otp_verified' => true]);

        return response()->json([
            'status' => 'success',
            'redirect' => route('password.reset', ['token' => $inputOtp, 'email' => $identifier]),
            'message' => 'Kode berhasil diverifikasi.'
        ]);
    }


    /**
     * Mengirim ulang kode OTP ke Email pemohon
     */
    public function resendOtp(Request $request)
    {
        // 1. Ambil email dari session
        $email = session('reset_email');

        if (!$email) {
            return response()->json(['message' => 'Sesi tidak ditemukan. Silakan masukkan email kembali.'], 419);
        }

        // 2. Fitur Throttle: Batasi kirim ulang (contoh: 1 kali per menit)
        $key = 'resend-otp:' . $email;
        if (RateLimiter::tooManyAttempts($key, 1)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json([
                'message' => "Mohon tunggu $seconds detik sebelum mengirim ulang kembali."
            ], 429);
        }

        // 3. Generate Kode Baru
        $newOtp = rand(100000, 999999);

        // 4. Update di Database
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            ['token' => $newOtp, 'created_at' => now()]
        );

        // 5. Kirim ke Mailpit
        // Anda bisa memanggil function handleEmailReset($email) jika kodenya ingin disentralisasi
        Log::info("OTP Baru untuk $email adalah: $newOtp");

        // Catat percobaan (untuk throttle)
        RateLimiter::hit($key, 60); // Berlaku selama 60 detik

        return response()->json([
            'status' => 'success',
            'message' => 'Kode OTP baru telah dikirim ke email Anda.'
        ]);
    }





    /**
     * Logika Reset via WhatsApp
     */
    protected function handleWhatsAppReset($noHp)
    {
        // Normalisasi nomor HP (hapus 0 di depan, ganti dengan 62)
        $formattedNumber = preg_replace('/^0/', '62', $noHp);

        // Cari user berdasarkan nomor HP di database
        $user = Pemohon::where('no_hp', $formattedNumber)->first();

        if (!$user) {
            return response()->json(['message' => 'Instruksi telah dikirim jika nomor terdaftar.']);
        }

        // Logika integrasi API WhatsApp (Contoh: Fonnte/Wablas)
        // $this->sendWhatsAppOTP($formattedNumber, "Kode OTP Anda adalah: 1234");

        return response()->json(['status' => 'success', 'message' => 'Kode OTP dikirim ke WhatsApp.']);
    }
}
