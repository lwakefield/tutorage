<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class StudentMiddleware
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
        if (Auth::check() and Auth::user()->hasRole('student')) {
            return $next($request);
        }
        return response('Unauthorized.', 401);
    }
}
