<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (auth()->check()){ 
            $user = Auth::user();
            if ($user->isAdmin()) {
                return $next($request);
            }            
        }
        abort(403, 'No eres administrador');

    }
}