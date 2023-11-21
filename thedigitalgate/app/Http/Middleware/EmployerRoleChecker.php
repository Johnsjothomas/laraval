<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmployerRoleChecker
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
        if(!empty($request->session()->get('register_id'))){
            if($request->session()->get('role') == 'employer' || $request->session()->get('role') == 'team'){
                return $next($request);
            }else{
                return redirect(route('talent')); 
            }
        }else{
            return $next($request);
        }
        
        
    }
}
