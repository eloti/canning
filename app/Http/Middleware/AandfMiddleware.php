<?php

namespace App\Http\Middleware;

use Closure;

class AandFMiddleware
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
        if(auth()->guest()) {
            return redirect('/');
        }
        if(auth()->user()->clearance > 5) {
            return redirect('/home');
        }
        return $next($request);
    }
}
