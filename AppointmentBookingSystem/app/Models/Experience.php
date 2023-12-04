<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Experience extends Model implements Auditable
{
    use HasFactory,\OwenIt\Auditing\Auditable;
    protected $fillable = ['doctors_id',  'organization', 'position','job_description', 'start_date', 'end_date',];

    public function doctor()
    {
        return $this->belongsTo(Doctors::class,'doctors_id');
    }
}


