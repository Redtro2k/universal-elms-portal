<?php

namespace App\Http\Controllers;

use Illuminate\{Http\Request,  Support\Facades\Mail};
use Inertia\Inertia;
use App\Models\Curriculum;
use App\Http\Requests\CurriculumRequest;


class CurriculumController extends Controller
{
    function __construct(Curriculum $curriculum){
        return $this->curriculum = $curriculum;
    }
    public function index(){
        return Inertia::render('Curriculum/Course/CurriculumIndex');
    }

    public function store(CurriculumRequest $request){
        if($request->validated() && $request->hasFile('images')){
            $insert = $this->curriculum->create($request->except('images'));
            $insert->addMediaFromRequest('images')->toMediaCollection('images');
            return redirect()->back()->with('success', 'Successfully Created New Curriculum');
        }else{
            return abort(419);
        }
    }
}
