<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        $loginStatus = session()->get('login_status');
        $role = session()->get('role');
        if ($loginStatus) {
            if ($role == 'pimpinan') {
                return redirect()->route('pimpinan.index');
            }
            if ($role == 'petugas') {
                return redirect()->route('petugas.index');
            }
        }
        return $next($request);
    }
}
