<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarR
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->user()->rol == 'admin'){
            return $next($request);
        }else{
            return abort(403, 'No Tienes Permitido El Acceso');
        }
        
    }
}
