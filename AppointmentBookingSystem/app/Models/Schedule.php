<?php

namespace App\Models;


use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'doctors_id',
        'start_time',
        'end_time',
        'date_bs',
        'date_ad',
        'status',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctors::class,'doctors_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
}
