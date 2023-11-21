<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TeamRoleChecker
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
            if($request->session()->get('role') == 'team'){
                abort(404);
            }
            return $next($request);
        }else{
            return $next($request);
        }
        
        
    }
}
