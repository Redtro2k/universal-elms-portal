<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompleteFillingRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        switch($user){
            case 'step1-roles':
                //? todo using laravel spatie permission
                return $user->roles == null || !$user->isAdmin ? redirect('/roles') : $next($request);
            break;
            case 'step2-education-level':
                //todo create a MVC for Education level
                return $user->education_level == null || !$user->isAdmin ? redirect('/education-level') : $next($request);
            break;
            case 'step3-interest':
                //todo create a MVC for Interest
                return $user->interest == null || !user->isAdmin ? redirect('/interest') : $next($request);
        }
    }
}
