<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Education extends Model implements Auditable
{
    use HasFactory,\OwenIt\Auditing\Auditable;
    protected $fillable=['doctors_id','level','board','institution','completion_year','gpa'];

    public function doctor()
    {
        return $this->belongsTo(Doctors::class,'doctors_id');
    }
}


