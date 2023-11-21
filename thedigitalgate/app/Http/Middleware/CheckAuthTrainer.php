<?php

namespace App\Http\Middleware;
use Auth;

use Closure;
use Illuminate\Http\Request;

class CheckAuthTrainer
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
        if (empty($request->session()->get('Trainer_ID'))) {
           return redirect('login');
        }
         return $next($request);
    }
}
