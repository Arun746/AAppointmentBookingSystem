<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctors extends Model
{
    use HasFactory,SoftDeletes;

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

     protected $dates=['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function education() {
        return $this->hasMany(Education::class);
    }
    public function experience() {
        return $this->hasMany(Experience::class);
    }


}
