<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    public function rules(): array
    {
        $doctor = $this->route('doctor');

        if ($this->isMethod('PUT')) {
            return [
                'fname' => 'required|string|max:255',
                'mname' => 'nullable|string|max:255',
                'lname' => 'required|string|max:255',
                'license_no' => 'required|string|max:255',
                'email' => [
                    'required',
                    Rule::unique('doctors')->ignore($doctor->id ?? null),
                ],
                'contact' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'dob' => 'required',
                'engdob'=>'required',
                'specialization' => 'required|string|max:255',
                'role' => 'nullable|integer',
                'status'=>'nullable',

                'level'=>'required',
                'board'=>'required',
                'institution'=>'required',
                'completion_year'=>'required',
                'gpa'=>'required',

                'organization'=>'required',
                'position'=>'required',
                'job_description'=>'required',
                'start_date'=>'required',
                'end_date'=>'required',
            ];
        } else {
            return [
                'fname' => 'required|string|max:255',
                'mname' => 'nullable|string|max:255',
                'lname' => 'required|string|max:255',
                'license_no' => 'required|string|max:255',
                'email' => 'required|unique:doctors,email',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',
                'contact' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'dob' => 'required',
                'engdob'=>'required',
                'specialization' => 'required|string|max:255',
                'role' => 'nullable|integer',
                'status'=>'nullable',

                'level'=>'required',
                'board'=>'required',
                'institution'=>'required',
                'completion_year'=>'required',
                'gpa'=>'required',

                'organization'=>'required',
                'position'=>'required',
                'job_description'=>'required',
                'start_date'=>'required',
                'end_date'=>'required',
            ];
        }
    }
}
