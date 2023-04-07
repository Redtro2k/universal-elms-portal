<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RoleController, DashboardController, SchoolController};
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });

    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
        Route::middleware(['roles.redirect'])->group(function() {
            Route::get('/dashboard', DashboardController::class)->name('dashboard');
        });
        Route::resource('roles', RoleController::class, ['only' => [ 'create']]); // roles
        Route::controller(SchoolController::class)->prefix('school')->group(function() { // school
            Route::get('/create', 'create')->middleware(['can:admin', 'school.existing'])->name('school.create');
            Route::get('', 'index')->name('school.index');
        });

        // redirect pages
        Route::get('/processing', function() {
            return Inertia::render('AccountProcessing');
        })->name('processing');
});



