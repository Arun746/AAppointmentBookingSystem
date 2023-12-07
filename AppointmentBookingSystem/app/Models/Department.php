<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;


class Department extends Model implements Auditable
{
    use HasFactory,\OwenIt\Auditing\Auditable;

    protected $fillable = ['departmentName'];


    public function doctor(){
        return $this -> hasMany(Doctors::class,'department_id');
    }

}
