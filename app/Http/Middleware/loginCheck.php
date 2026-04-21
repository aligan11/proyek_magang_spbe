<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class loginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika sudah login sebagai petugas, arahkan ke dashboard masing-masing
        if (Auth::guard('petugas')->check()) {
            $user = Auth::guard('petugas')->user();
            if ($user) {
                if ($user->role == 'kabid') {
                    return redirect()->route('pimpinan.index');
                }
                if ($user->role == 'staff') {
                    return redirect()->route('petugas.index');
                }
            }
        }

        // Jika sudah login sebagai pemohon, arahkan ke dashboard pemohon
        if (Auth::guard('pemohon')->check()) {
            return redirect()->route('dashboardPemohon');
        }

        return $next($request);
    }
}
