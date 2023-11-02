<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable=['doctors_id','level','board','institution','completion_year','gpa'];

    public function doctor()
    {
        return $this->belongsTo(Doctors::class,'doctors_id');
    }
}


