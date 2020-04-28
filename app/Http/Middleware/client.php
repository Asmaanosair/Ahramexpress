<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class client
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

        if(Auth::guard('client')->check()){
            return $next($request);
        }else{

            return redirect('/client_account');



        }
    }


}
