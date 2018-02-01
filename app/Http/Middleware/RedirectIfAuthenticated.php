<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       

           /*if (Auth::user()->id_perfil == 4) {

            return '/operador';

        }elseif (Auth::user()->id_perfil == 3) {
            //return redirect()->to('admin');
             return '/aplicacion';
        }*/

     }
}
