<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
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
        //  dd($request->path());
         if(!session()->has('customer') && $request->path()!='customer/home' && $request->path()!='customer/login')
         {

             return redirect('/home');
         }

         if(session()->has('customer') && $request->path()=='login')
         {
             return redirect('/home');

         }
        return $next($request);
    }
}
