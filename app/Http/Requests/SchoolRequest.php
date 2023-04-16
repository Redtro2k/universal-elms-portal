<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
            'school_name' => 'required|string|unique:schools',
            'school_id' => 'required|numeric|unique:schools',
            'school_description' => 'required|string',
            'region' => 'required|string',
            'province' => 'required|string',
            'cities' => 'required|string',
            'school_address' => 'required|string'
        ];
    }
}
