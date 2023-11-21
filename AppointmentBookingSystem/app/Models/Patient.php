<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable= [ 'fname',
                            'lname',
                            'address',
                            'contact',
                            'email',
                            'dob_bs',
                            'dob_ad',
                          ];

public function appointment()
{
return $this->hasMany(Appointment::class);
}
}
