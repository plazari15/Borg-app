<?php

namespace borg\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class contaBloqueada
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
        if(!Auth::guest() && !empty(Auth::user()->account->cnpj)){
            if(Auth::user()->account->status == 0){
                abort(403, 'Sua conta está suspensa ou inativa!');
            }
        }

        return $next($request);
    }
}
