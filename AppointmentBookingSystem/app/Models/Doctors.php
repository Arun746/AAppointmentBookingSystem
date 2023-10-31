<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;
    protected $fillable = ['fname',
                           'mname',
                           'lname',
                           'user_id',
                           'license_no',
                           'email',
                           'password',
                           'contact',
                           'address',
                           'gender',
                            'dob',
                            'engdob',
                            'specialization',
                            'role',
                            'status',
                             'image',
                            ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function experience() {
        return $this->hasMany(Experience::class);
    }

    public function education() {
        return $this->hasMany(Education::class);
    }
}
