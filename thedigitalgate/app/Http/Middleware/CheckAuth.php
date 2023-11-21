<?php

namespace App\Http\Middleware;
use Auth;

use Closure;
use Illuminate\Http\Request;

class CheckAuth
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
        if (empty($request->session()->get('access_token'))) {
           return redirect('login');
        }
         return $next($request);
    }
}
