<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
'user_id'=>'nullable',
'doctors_id'=>'nullable',
'start_time'=>'required',
'end_time'=>'required',
'date_bs'=>'required',
'date_ad'=>'nullable',
        ];
    }
}
