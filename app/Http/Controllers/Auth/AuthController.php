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

    public function generateMathCaptcha(Request $request)
    {
        $request->validate([
            'answer' => 'required|integer'
        ]);
        session(['math_captcha_answer' => $request->answer]);
        return response()->json(['status' => 'success']);
    }

    public function loginPemohon(Request $request)
    {

        // dd($request->all());
        // 1. Validasi Input Dasar
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha_input' => 'required|integer'
        ]);

        // 2. Validasi Captcha
        if ($request->captcha_input != session('math_captcha_answer')) {
            return back()->withErrors(['captcha_input' => 'Jawaban captcha salah!'])->withInput();
        }

        // 3. Logika Login (Contoh Auth Laravel)
        $credentials = $request->only('email', 'password');

        $remember = $request->has('remember');


        if (FacadesAuth::guard('pemohon')->attempt($credentials, $remember)) {

            $request->session()->regenerate();
            // Hapus captcha setelah berhasil login
            session()->forget('math_captcha_answer');

            return redirect()->intended('dashboard-pemohon');
        }

        return back()->withErrors([
            'email' => 'Email atau password tidak terdaftar.',
        ])->withInput();
    }

    public function showLoginPemohon()
    {
        return view('auth.loginPemohon');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $remember = $request->has('remember');


        if (FacadesAuth::guard('petugas')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = FacadesAuth::guard('petugas')->user();

            // Gunakan switch atau match jika role bertambah di kemudian hari
            return match ($user->role) {
                'kabid', 'katim' => redirect()->route('pimpinan.index'),
                'staff' => redirect()->route('petugas.index'),
                default => FacadesAuth::guard('petugas')->logout()
                    && abort(403, 'Role tidak terdaftar.'),
            };
        }

        // Tambahkan pesan error jika login gagal
        return back()->with(['login_error' => 'Email atau password salah.']);
    }


    public function registerPemohon(Request $request)
    {

        // dd($request->all());
        // ✅ rules dasar
        $rules = [
            'jenis_pemohon' => 'required|in:internal,eksternal',
            'nik' => 'required|digits:16|unique:pemohon,nik',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:pemohon,email',
            'password' => 'required|min:6',
            'no_hp' => 'required',
            'captcha' => 'required'
        ];

        // ✅ tambahan berdasarkan tipe
        if ($request->jenis_pemohon === 'internal') {
            $rules['nip'] = 'required|digits:18|unique:pemohon,nip';
            $rules['id_instansi'] = 'required|exists:instansi,id';
        }

        if ($request->jenis_pemohon === 'eksternal') {
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
        FacadesAuth::guard('petugas')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
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
