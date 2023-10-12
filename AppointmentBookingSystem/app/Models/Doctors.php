<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;
    protected $fillable = ['users_id','fname', 'lname','lisence_no','contact','address', 'gender','dob','specialization', 'photo',];

    public function experience() {
        return $this->hasMany(Experience::class);
    }

    public function education() {
        return $this->hasMany(Education::class);
    }
}
