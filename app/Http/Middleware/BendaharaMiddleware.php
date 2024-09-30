<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BendaharaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user login dan memiliki role user
        if (Auth::check() && Auth::user()->role === 'bendahara') {
            return $next($request); // Lanjutkan jika user
        }

        // Jika bukan user, arahkan ke halaman dashboard admin atau home
        return redirect('/bendahara/index');
    }
}