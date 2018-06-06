<?php

namespace App\Http\Middleware;

use Closure;
class AuthTokenMiddleware
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
        if (!$request->session()->has('token')) {
            return redirect()->route('login.show');
        }

        return $next($request);
    }
}
