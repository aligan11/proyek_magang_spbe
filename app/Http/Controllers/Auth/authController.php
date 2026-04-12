<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Pemohon;
use App\Models\Petugas;
use App\Rules\loginCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function generateCaptcha()
    {
        // Membuat 4 huruf kapital acak
        $captcha = strtoupper(Str::random(4));

        // Simpan ke session untuk divalidasi nanti
        session(['captcha_code' => $captcha]);

        return response()->json(['captcha' => $captcha]);
    }

    public function loginPemohon(Request $request)
    {

        // dd($request->all());
        // 1. Validasi Input Dasar
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha_input' => 'required'
        ]);

        // 2. Validasi Captcha
        if (strtoupper($request->captcha_input) !== session('captcha_code')) {
            return back()->withErrors(['captcha_input' => 'Kode verifikasi salah!'])->withInput();
        }

        // 3. Logika Login (Contoh Auth Laravel)
        $credentials = $request->only('email', 'password');

        $remember = $request->has('remember');


        if (FacadesAuth::guard('pemohon')->attempt($credentials, $remember)) {

            $request->session()->regenerate();
            // Hapus captcha setelah berhasil login
            session()->forget('captcha_code');

            return redirect()->intended('dashboard-pemohon');
        }

        return back()->withErrors([
            'email' => 'Email atau password tidak terdaftar.',
        ])->withInput();
    }

    public function showLoginPemohon()
    {
        return view('auth.loginPemohon  ');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => ['required', new loginCheck($request)],
        ]);

        $credentials = $request->only('email', 'password');

        $remember = $request->has('remember');


        if (FacadesAuth::guard('petugas')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = FacadesAuth::user();
            $role = $user->role;


            if ($role == 'kabid') {
                return redirect()->route('pimpinan.index');
            } elseif ($role == 'staff') {
                return redirect()->route('petugas.index');
            } else {
            }
        }
    }


    public function registerPemohon(Request $request)
    {

        // dd($request->all());
        // ✅ rules dasar
        $rules = [
            'tipe_user' => 'required|in:internal,eksternal',
            'nik' => 'required|digits:16|unique:pemohon,nik',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:pemohon,email',
            'password' => 'required|min:6',
            'no_hp' => 'required',
            'captcha' => 'required'
        ];

        // ✅ tambahan berdasarkan tipe
        if ($request->tipe_user === 'internal') {
            $rules['nip'] = 'required|digits:18|unique:pemohon,nip';
            $rules['id_instansi'] = 'required|exists:instansi,id';
        }

        if ($request->tipe_user === 'eksternal') {
            $rules['alamat'] = 'required|string';
        }

        $validated = $request->validate($rules);

        // 🔐 VALIDASI CAPTCHA (SESSION)
        if (strtoupper($request->captcha) !== session('captcha')) {
            return back()->withErrors([
                'captcha' => 'Captcha tidak sesuai'
            ])->withInput();
        }

        // ✅ hash password
        $validated['password'] = Hash::make($validated['password']);

        // ✅ normalisasi data (opsional tapi bagus)
        $validated['nik'] = trim($validated['nik']);
        $validated['email'] = strtolower($validated['email']);

        // ✅ simpan
        Pemohon::create($validated);

        // 🔄 hapus captcha biar tidak reuse
        session()->forget('captcha');

        return redirect()
            ->route('loginPemohon')
            ->with('success', 'Akun berhasil didaftarkan');
    }

    public function registerPemohonPage()
    {
        $captcha = strtoupper(Str::random(5));

        session(['captcha' => $captcha]);
        $instansi = Instansi::orderBy('nama_instansi', 'asc')->get();

        return view('Auth.registerPemohon', compact('captcha', 'instansi'));
    }



    public function logout(Request $request)
    {
        FacadesAuth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function logoutPemohon(Request $request)
    {
        FacadesAuth::guard('pemohon')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginPemohon');
    }
    //
}
