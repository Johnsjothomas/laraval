<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class CheckCompanySession
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
            if(Session::has('company_id')){
                return $next($request);
            }else{
               abort(404);
            }
        }else{
            return $next($request);
        }
        
        
    }
}
