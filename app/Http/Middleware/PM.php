<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PM
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
        /**
         * Check if there is a user logged in
         */
        if(Auth::check()){

            /*
             * Check if user is an admin using checkAdmin function from User.php
             */
            if(Auth::user()->checkPM()){

                return $next($request);

            }
        }

        return redirect('/');
    }
}
