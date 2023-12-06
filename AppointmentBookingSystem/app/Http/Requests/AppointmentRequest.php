<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{

    public function rules(): array
    {
        return [
          'fname'=>'required',
          'mname'=>'nullable',
          'lname'=>'required',
          'email'=>'required',
          'address'=>'required',
          'contact'=>'required',
          'remarks'=>'nullable',
          'status'=>'nullable',
          'g-recaptcha-response' => 'required|recaptcha',
        ];
    }
}
