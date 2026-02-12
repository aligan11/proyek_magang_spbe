<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        $loginStatus = session()->get('login_status');
        $role = session()->get('role');


        if (!$loginStatus || $role !== $requiredRole) {
            return redirect()->route('login')->withErrors(['error' => 'Akses tidak diizinkan!']);
        }
        return $next($request);
    }
}
