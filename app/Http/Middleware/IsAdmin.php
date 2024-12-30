<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;



class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        // memeriksa pengguna yang login adalah admin atau bukan
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request); //lanjutkan ke halaman
        }

        //jika bukan admin, arahkan ke halaman lain
        return redirect('/')->with('error','access denied');
    }
}
