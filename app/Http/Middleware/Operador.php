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

          $usuario_actual=\Auth::user();
       if ($usuario_actual->id_perfil != 4) {
        return redirect()->back();
       }
        return $next($request);
    }
}
