<?php

namespace App\Http\Controllers;

use Illuminate\{Http\Request,  Support\Facades\Mail};
use Inertia\Inertia;
use App\Models\Curriculum;
use App\Mail\CurriculumMail;
use App\Http\Requests\CurriculumRequest;


class CurriculumController extends Controller
{
    public function index(){
        return Inertia::render('Curriculum/Course/CurriculumIndex');
    }

    public function store(CurriculumRequest $request){
        if($request->validated()){
            return Curriculum::create($request->validated());
        }
    }
}
