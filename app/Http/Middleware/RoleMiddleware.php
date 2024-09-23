<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect('login');
        }

        // Cek role user
        if (Auth::user()->role !== $role) {
            return redirect('/');  // Arahkan ke halaman utama jika role tidak sesuai
        }

        return $next($request);
    }
}
