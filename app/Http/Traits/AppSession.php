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
        if($this->school->count() != 0){
            return 'check';
        }else{
            $temp_school = collect([
                'school_name' => $allow_acrym ? $this->acronymString(config('app.name')) : config('app.name'),
                'school_description' => 'Our flexible and fully customizable portal system is designed specifically for schools in need of a dynamic website. With a user-friendly interface and fast loading times, our system allows for seamless communication between teachers, parents, and students.',
                'school_id' => null
                ]);
            return $temp_school;
        }
    }
}