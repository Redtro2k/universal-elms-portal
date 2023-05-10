<?php

namespace App\Http\Controllers;

use Illuminate\{Http\Request, Support\Facades\Mail};
use Inertia\Inertia;
use App\Models\School;
use App\Http\Requests\SchoolRequest;
use App\Mail\SchoolEmail;


class SchoolController extends Controller
{
    public function __construct(School $school){
        $this->school = $school;
    }
    public function index(){
        // https://themes.getbootstrap.com/preview/?theme_id=61529 for designing profile
        // https://play.tailwindcss.com/iAeJddCBG7?size=370x720
        return Inertia::render('School/Index');
    }
    public function create(){
        return Inertia::render('School/Create');
    }

    public function store(SchoolRequest $request){
        $request->validated();
        $this->school->create([
            'school_name' => $request->input('school_name'),
            'school_id' => $request->input('school_id'),
            'address' => $request->input('school_address'),
            'school_description' => $request->input('school_description'),
            'region' => $request->input('region'),
            'province' => $request->input('province'),
            'city' => $request->input('cities')
        ]);
        return redirect()->route('dashboard')->with('success', 'Great! Successfully created a new School.');
    }
}
