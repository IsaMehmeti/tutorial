<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Completed
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
          if (Auth::User()->completion >= 100) {
            return redirect('/')->with('danger','Your profile is already completed.');
        }else{
            return $next($request);
            }
    }
}
