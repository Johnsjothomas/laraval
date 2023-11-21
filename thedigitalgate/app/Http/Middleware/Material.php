<?php

namespace App\Http\Middleware;
use Auth;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Cache;

class Material
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

        $countries = Cache::get('countries');
        if (!Cache::has('countries') || !isset($countries[0]->fields->Phone_Code)){
         $count = 50;
         $page = 1;   
         $response = app('App\Http\Controllers\ApiController')->setCountries($page);
         $countryarray=$response->data->data->content; 
         $total_count = $response->data->data->totalRecords;
         $page++;

         while($count <= $total_count) {
          $response = app('App\Http\Controllers\ApiController')->setCountries($page);
          array_push($countryarray,...$response->data->data->content);  
          $count = $count + 50;
          $page++;
         }


         Cache::put('countries', $countryarray);

        
        }

         return $next($request);
    }
}
