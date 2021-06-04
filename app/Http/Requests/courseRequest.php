<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class courseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'faculty' => 'required',
            'dept' => 'required',
            'coursetitle' => 'required|string|unique:courses,title,except,id',
            'courseunit' => 'required|numeric',
            'coursecode' => 'required|string|unique:courses,code, except,id',
            'level' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'faculty.required' => 'Please select faculty',
            'dept.required' => 'Please select department',
            'courseunit.required' => 'Please specify course unit ',
            'coursetitle.required' => 'Please specify course title ',
            'coursecode.required' => 'Please specify course code',
            'level.required' => 'Please select course level',
        ];
    }
}
