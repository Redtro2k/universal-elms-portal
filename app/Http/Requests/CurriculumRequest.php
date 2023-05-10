<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurriculumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' => 'required|string',
            'description' => 'required|string',
            'programs' => 'required|string',
            'program_outcomes' => 'required|string',
            'specialize_subjects' => 'required|string',
            'admission_requirements' => 'required|string',
            'images' => 'nullable|image'
        ];
    }
}
