<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\School;

class SchoolController extends Controller
{
    public function index(){
        dd(School::count() != 0);
    }
    public function create(){
        return Inertia::render('School/Create');
    }
}
