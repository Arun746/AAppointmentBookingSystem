<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id'=>'nullable',
            'doctors_id' => 'required|exists:doctors,id',
            'date_bs' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'date_ad'=>'nullable',
            'status'=>'nullable',
        ];
    }
}
