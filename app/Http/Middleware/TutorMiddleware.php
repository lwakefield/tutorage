<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class TutorMiddleware
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
        if (Auth::check() and Auth::user()->hasRole('tutor')) {
            return $next($request);
        }
        return response('Unauthorized.', 401);
    }
}
