<?php
namespace App\Http\Traits;

trait UserProfileValidation{

    function rules($is_required = true, $datatype, $min = null, $max = null, $unique = null)
    {
        $rules = [
            $is_required == true ? 'required' : 'nullable',
            $datatype,
            'min:'.($min ?? 0),
            'max:'.($max ?? 255),
        ];
        if(!is_null($unique)){
            $rules[] = 'unique:'.$unique;
        }
        return $rules;
    }

    function stringRules($is_required = true, $max = null, $unique = null)
    {
        return $this->rules($is_required, 'string', unique: $unique);
    }

    function integerRules($is_required = true, $min = null, $max = null, $unique = null)
    {
        return $this->rules($is_required, 'numeric', $min, $max, $unique);
    }
}