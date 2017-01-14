<?php

namespace borg\Http\Middleware;

use borg\Events\UserNoty;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class ValidateAccount
{

    /**
     * @param $request
     * @param Closure $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (empty(Auth::user()->account->cnpj) && !Request::is('dashboard/account') && !Request::is('logout') && !Auth::user()->hasRole('admin')) {
                Session::flash('firstMessage', []);
                return redirect('dashboard/account');
            }
        }
        return $next($request);
    }
}