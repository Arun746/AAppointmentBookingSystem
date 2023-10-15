<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;
    protected $fillable = ['name','license_no','email','contact','address', 'gender','dob','specialization', 'image'];

    public function experience() {
        return $this->hasMany(Experience::class);
    }

    public function education() {
        return $this->hasMany(Education::class);
    }
}
