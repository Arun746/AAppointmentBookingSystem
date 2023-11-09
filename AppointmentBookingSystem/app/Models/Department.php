<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['departmentName'];


    public function doctor(){
        return $this -> hasMany(Doctors::class);
    }

}

