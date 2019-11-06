<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserSession
{

    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('login')) {
            // user value cannot be found in session
            return redirect('/admin/login')->with('alert', 'Silahkan login terlebih dahulu !');
        }

        return $next($request);
    }
}
