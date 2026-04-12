<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class ForgotPasswordPemohonController extends Controller
{
    //
    public function forgotPemohon()
    {
        return view('auth.forgot-password');
    }

    public function otpPagePemohon()
    {
        return view('pemohon.VerifikasiCodeOtp');
    }
    public function updatePasswordPemohon()
    {
        return view('auth.reset-password');
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
            return response()->json([
                'status' => 'success',
                'message' => 'OTP Benar! Mengalihkan...',
                'redirect' => route('update.passwordPemohon', [
                    'token' => $inputOtp,
                    'email' => $identifier
                ])
            ]);
        }

        // 6. Jika Benar
        session(['otp_verified' => true]);

        return response()->json([
            'status' => 'success',
            'redirect' => route('password.reset', ['token' => $inputOtp, 'email' => $identifier]),
            'message' => 'Kode berhasil diverifikasi.'
        ]);
    }

    public function updatePassword(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed', // 'confirmed' otomatis mengecek input 'password_confirmation'
        ], [
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password.min' => 'Kata sandi minimal harus 8 karakter.',
        ]);

        // 2. Cek apakah user sudah melewati tahap verifikasi OTP (Security Check)
        if (!session('otp_verified')) {
            return redirect()->route('password.request')
                ->withErrors(['email' => 'Silakan lakukan verifikasi OTP terlebih dahulu.']);
        }

        // 3. Cari Data Pemohon
        $pemohon = Pemohon::where('email', $request->email)->first();

        if (!$pemohon) {
            return back()->withErrors(['email' => 'Data pemohon tidak ditemukan.']);
        }

        // 4. Update Password dengan Hashing (Wajib untuk keamanan)
        $pemohon->update([
            'password' => Hash::make($request->password)
        ]);

        // 5. Hapus token di tabel password_reset_tokens agar tidak bisa digunakan lagi
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // 6. Bersihkan Session
        session()->forget(['otp_verified', 'reset_email']);

        // 7. Redirect ke Login dengan pesan sukses
        return redirect()->route('loginPemohon')->with('success', 'Kata sandi berhasil diperbarui. Silakan masuk menggunakan kata sandi baru Anda.');
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
