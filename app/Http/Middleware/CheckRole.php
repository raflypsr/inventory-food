<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles) : response
    {
        // Memeriksa apakah pengguna telah masuk atau tidak
        if (Auth::check()) {

            // Memeriksa role pengguna
            $user = Auth::user();

            // Memeriksa semua role yang ada di $roles dan dibandingkan
            if (in_array($user->role, $roles)) {

                // Jika peran pengguna cocok dengan yang diizinkan
                return $next($request);
            }
        }

        // kalo ga sesuai
        return redirect('/unauthorized'); 
    }

}
