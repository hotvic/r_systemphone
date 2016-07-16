<?php

namespace App\Http\Middleware;

use Closure;

class shopAdminMiddleware
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
        if (!\Auth::user()->is('admin'))
            return redirect('/');

        return $next($request);
    }
}
