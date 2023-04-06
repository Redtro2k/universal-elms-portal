<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->doesnthave('roles')->get() && auth()->user()->isAdmin()){
            return $next($request);
        }
        elseif(auth()->user()->doesnthave('roles')->get() && !auth()->user()->isAdmin()){
            return redirect()->route('processing');
        }   
        else{
            return redirect()->route('roles.create');
        }
    }
}
