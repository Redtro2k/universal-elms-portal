<?php


use App\Http\Controllers\{RoleController, DashboardController, SchoolController, RedirectPagesController, CurriculumController};


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () { // for authenticated
    Route::middleware(['roles.redirect'])->group(function() { //dashboards
            Route::get('/dashboard', DashboardController::class)->name('dashboard');
    });
    Route::resource('roles', RoleController::class, ['only' => ['create']]); // roles
    Route::controller(SchoolController::class)->prefix('school')->group(function() { // schools
        Route::get('/create', 'create')->middleware(['can:admin', 'school.existing'])->name('school.create');
        Route::get('', 'index')->name('school.index'); 
        Route::post('', 'store')->name('school.store');
    });
    Route::middleware(['can:admin'])->group(function(){
        Route::resource('curriculum', CurriculumController::class, ['only' => 'index']);
    });
});

Route::controller(RedirectPagesController::class)->group(function(){ // redirect pages
    Route::get('/processing', 'processing') //processing
        ->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->name('processing');
    Route::get('/', 'index')->name('index'); //global index
});



