<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class deptRequest extends FormRequest
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
            'dept' => 'required|string|unique:departments,dept'
        ];
    }

    public function messages()
    {
        return [
                    'dept.required' => 'Department field is required',
                    'faculty.required' => 'Please select faculty'

        ];
    }
}
