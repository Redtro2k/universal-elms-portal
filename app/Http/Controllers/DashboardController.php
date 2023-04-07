<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class DashboardController extends Controller
{
    //
    public function __invoke(){
        if(auth()->user()->hasRole('admin')){
            return Inertia::render('Dashboards/AdminDashboard');
        }else{
            return Inertia::render('Dashboard');
        }
    }
}
