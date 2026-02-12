<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        if ($loginStatus || $role == 'petugas') {
            return redirect()->route('petugas.index');
        }
        if ($loginStatus || $role == 'pimpinan') {
            return redirect()->route('pimpinan.index');
        }
        return $next($request);
    }
}
