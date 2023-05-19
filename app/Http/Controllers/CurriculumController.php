<?php

namespace App\Http\Controllers;

use Illuminate\{Http\Request,  Support\Facades\Mail};
use Inertia\Inertia;
use App\Models\Curriculum;
use App\Http\Requests\CurriculumRequest;
use App\Http\Traits\StringFilter;


class CurriculumController extends Controller
{
    use StringFilter;

    function __construct(Curriculum $curriculum){
        return $this->curriculum = $curriculum;
    }
    public function index(){
        return Inertia::render('Curriculum/Course/CurriculumIndex', [
            'curriculum' => $this->curriculum->all()->map(fn($m) => [
                    'id' => $m->id,
                    'title' => $m->title,
                    'program' => $this->UpperFirstCharacter($m->programs),
                    'description' => $m->description,
                    'excerpt' => $m->excerpt
                ])
        ]);
    }
    public function show($id){
        return Inertia::render('Curriculum/Course/CurriculumShow',[
            'curriculum' => $this->curriculum->find($id)
        ]);
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
