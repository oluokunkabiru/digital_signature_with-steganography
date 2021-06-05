<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class attendanceRequest extends FormRequest
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
            'faculty' =>'required|string',
            'dept' =>'required|string',
            'level' =>'required|string',
            'course' =>'required|string',
            'date' =>'required|date',
        ];
    }

    public function messages()
    {
        return [
            'faculty.required' => 'Please select faculty',
            'dept.required' => 'Please select department',
            'course.required' => 'Please select courses',
            'level.required' => 'Please select level',
            'date.required' => 'Please select date',
        ];
    }
}
