<?php

namespace Club\Http\Middleware;

use Auth;
use Closure;

class VerifiUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = 'web')
    {
        if (!Auth::guard($guard)->check()){
            return redirect()->route('login');
        }else{

            if (Auth::user()->confirmed==0){
                return redirect()->route('verifi');
            }
            return $next($request);
        }
    }
}
