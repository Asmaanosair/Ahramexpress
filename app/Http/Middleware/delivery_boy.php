<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class delivery_boy
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

//        if(Auth::guard('delivery_boy')->check()){
//            return $next($request);
//        }else{
//
//            return redirect('/kt_admin/APi_delivery_boy/login');
//
//
//        }
        return $next($request);
    }
}
