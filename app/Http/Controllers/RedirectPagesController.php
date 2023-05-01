<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Traits\AppSession;

class RedirectPagesController extends Controller
{
    use AppSession;

    public function processing(){
        return Inertia::render('AccountProcessing');
    }
    public function index(){
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'schools' => $this->SchoolSigned(false)
        ]);
    }
}
