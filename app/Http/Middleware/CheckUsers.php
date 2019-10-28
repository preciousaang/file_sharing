<?php

namespace App\Http\Middleware;

use Closure;

class CheckUsers
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
        if(auth()->check() && !auth()->user()->profile()->exists()){
            return redirect()->route('edit-profile')->with('message', 'Edit Your Profile');
        }
        return $response;
    }
}
