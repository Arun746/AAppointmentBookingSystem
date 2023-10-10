<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['doctors_id',  'organization', 'position','job_description', 'start_date', 'end_date',];
}
