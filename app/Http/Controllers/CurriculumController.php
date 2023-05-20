<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use App\Models\Curriculum;
use App\Http\Requests\CurriculumRequest;
use App\Http\Traits\StringFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Request;


class CurriculumController extends Controller
{
    use StringFilter;

    function __construct(Curriculum $curriculum){
        return $this->curriculum = $curriculum;
    }
    public function index(){
        $query = QueryBuilder::for($this->curriculum)
        ->allowedFilters('title')
        ->paginate(11)
        ->through(function($e){
            return [
                'id' => $e->id,
                'title' => $e->title,
                'program' => $e->label_program,
                'excerpt' => $e->excerpt
            ];
        });
        return Inertia::render('Curriculum/Course/CurriculumIndex', [
            'curriculum' => $query,
            'filters' => Request::only(['search'])
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
