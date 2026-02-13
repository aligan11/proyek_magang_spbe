<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use App\Rules\loginCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{


    public function showLoginForm()
    {
        return view('auth.login');
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


        if (FacadesAuth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = FacadesAuth::user();
            $role = $user->role;


            if ($role == 'pimpinan') {
                return redirect()->route('pimpinan.index');
            } elseif ($role == 'petugas') {
                return redirect()->route('petugas.index');
            } else {
            }
        }
    }



    public function logout(Request $request)
    {
        FacadesAuth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    //
}
