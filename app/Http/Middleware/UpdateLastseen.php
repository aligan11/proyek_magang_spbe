<?php

namespace App\Http\Middleware;

use App\Models\Petugas;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function Symfony\Component\Clock\now;

class UpdateLastseen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $petugas = Auth::guard('petugas')->user();

        if ($petugas) {
            // Update langsung lewat query builder modelnya
            User::where('id', $petugas->id)->update([
                'last_seen' => now(),
            ]);
        }
        return $next($request);
    }
}
