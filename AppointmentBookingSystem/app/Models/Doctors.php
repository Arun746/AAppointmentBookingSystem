<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;
    protected $fillable = ['users_id','fname', 'lname','lisence_no','contact','address', 'gender','dob','specialization', 'photo',];


}
