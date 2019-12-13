<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'student.nis' => 'required',
            'student.full_name' => 'required',
            'student.grade' => 'required',
            'student.gender' => 'required',
            'student.status' => 'required',
            'student_detail.religion' => 'required',
            'student_detail.nationality' => 'required',
            'student_detail.living_with' => 'required',
            'student_detail.bloodtype' => 'required',
            'student_detail.child_status' => 'required'
        ];
    }
}
