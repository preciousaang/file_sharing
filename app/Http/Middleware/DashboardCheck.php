<?php

namespace App\Http\Middleware;

use Closure;

class DashboardCheck
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
        $response = $next($request);
        if(auth()->check() && auth()->user()->role->name !== 'admin'){
            abort(403);
        }
        return $response;
    }
}
