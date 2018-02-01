<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class Operador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


       if (Auth::user()->id_perfil == 4) {
        return redirect()->to('/operador');
       }



        return $next($request);
    }
}
