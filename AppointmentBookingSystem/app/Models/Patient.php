<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Patient extends Model implements Auditable
{
    use HasFactory,\OwenIt\Auditing\Auditable;

    protected $fillable= [ 'fname',
                            'mname',
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


