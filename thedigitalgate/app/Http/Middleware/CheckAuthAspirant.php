<?php

namespace App\Http\Middleware;
use Auth;

use Closure;
use Illuminate\Http\Request;

class CheckAuthAspirant
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
        if (empty($request->session()->get('Aspirant_ID'))) {
           return redirect('login');
        }
         return $next($request);
    }
}
