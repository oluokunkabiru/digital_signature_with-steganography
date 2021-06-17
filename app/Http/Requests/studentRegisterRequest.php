<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentRegisterRequest extends FormRequest
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
            'sname' => 'required|string',
            'fname' => 'required|string',
            'lname' => 'required|string',
            'phone' => 'required|numeric',
            'country' => 'required|string',
            'dob' => 'required|date',
            'city' => 'required|string',
            'state' => 'required|string',
            'gender' => 'required|string',
            'faculty' => 'required|numeric',
            'dept' => 'required|numeric',
            'level' => 'required|numeric',

        ];
    }

    public function messages()
    {
        return [
            'sname.required' => 'Please fill the surname',
            'fname.required' => 'Please fill the firstname',
            'lname.required' => 'Please fill the phone number',
            'dob.required' => 'Please fill the date of birth',
            'country.required' => 'Please select your country',
            'state.required' => 'Please fill the state of your resident',
            'city.required' => 'Please fill the city of your residence',
            'faculty.required' => 'Please select the faculty',
            'dept.required' => 'Please select the department',
            'level.required' => 'Please select level'
        ];
    }
}
