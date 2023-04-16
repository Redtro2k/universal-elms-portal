<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Traits\AppSession;



class HandleInertiaRequests extends Middleware
{
    use AppSession;
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'user' => auth()->user() ?  [
                'roles' =>  auth()->user()->getRoleNames()
            ] : null,
            'signed' => [
                'school' => $this->SchoolSigned(false)
            ],
            'flash' => [
                'success' => session('success'),
                'failed' => session('failed')
            ],
            'breadcrumbs' => explode('/', Route::current()->uri),
        ]);
    }
}
