<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dormitories.name' => 'required',
            'student.full_name' => 'required',
            'employees.full_name' => 'required'
        ];
    }
}
