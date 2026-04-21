<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $requiredRole): Response
    {
        // 1. Cek apakah login sebagai petugas
        if (Auth::guard('petugas')->check()) {
            $user = Auth::guard('petugas')->user();

            // 2. Cek apakah role-nya sesuai dengan parameter middleware
            if ($user->role === $requiredRole) {
                return $next($request); // Berhasil, lanjut ke halaman
            }

            // Jika login tapi role salah
            return abort(403, 'Anda tidak memiliki hak akses.');
        }

        // Jika tidak login sebagai petugas, lempar ke halaman login petugas
        return redirect()->route('login')->with('error', 'Silakan Login Terlebih Dahulu');
    }
}
