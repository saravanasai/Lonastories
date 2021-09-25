<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class is_admin
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





           if(!session()->has('admin')&& $request->path()!='admin/login' && $request->path()!='/')
           {

               return redirect()->route('admin.login');
           }
           if(session()->has('admin')  && $request->path()=='/')
            {

                return back();
            }


        return $next($request);
    }
}
