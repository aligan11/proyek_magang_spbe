<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Rules\loginCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class authController extends Controller
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

        $role = session()->get('role');

        if ($role == 'pimpinan') {
            return redirect()->route('pimpinan.dashboard');
        } elseif ($role == 'petugas') {
            return redirect()->route('petugas.index');
        } else {
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
