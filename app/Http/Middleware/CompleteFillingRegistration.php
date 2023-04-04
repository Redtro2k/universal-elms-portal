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
        switch($user->registration_step){
            case 'step1-roles':
                //? todo using laravel spatie permission
                if ($user->roles == null || !$user->isAdmin) {
                    return redirect('/roles');
                }
                break;
            case 'step2-education-level':
                //todo create a MVC for Education level
                if ($user->education_level == null || !$user->isAdmin) {
                    return redirect('/education-level');
                }
                break;
            case 'step3-interest':
                //todo create a MVC for Interest
                if ($user->interest == null || !$user->isAdmin) {
                    return redirect('/interest');
                }
                break;
        }
        return $next($request);
    }
}
