<?php 
namespace App\Http\Traits;
use App\Models\School;
use Illuminate\Support\Collection;

trait AppSession{
    public function __construct(School $school){
        $this->school = $school;
    }
    public function acronymString($text){
        $acronym = '';
        $words = explode(' ', $text);
        $numWords = count($words);
        foreach($words as $key => $word){
            if ($key === $numWords - 1) {
                $acronym .= $word;
            } else {
                $acronym .= substr($word, 0, 1);
            }
        }
        return $acronym;
    }

    public function SchoolSigned($allow_acrym = true){
        $get_school = $this->school->first();

        if($get_school){

            $ini_school_name = $allow_acrym == true ? $this->acronymString($get_school->school_name) : $get_school->school_name;
        }else{
            $ini_school_name = $allow_acrym == true ? $this->acronymString(config('app.name')) : config('app.name');
        }

        $temp_school = collect([
            'school_name' => $ini_school_name,
            'school_description' => $get_school ? $get_school->school_description : 'Our flexible and fully customizable portal system is designed specifically for schools in need of a dynamic website. With a user-friendly interface and fast loading times, our system allows for seamless communication between teachers, parents, and students.',
            'school_id' => $get_school ? $get_school->school_id : null
            ]);
        return $temp_school;
    }
}