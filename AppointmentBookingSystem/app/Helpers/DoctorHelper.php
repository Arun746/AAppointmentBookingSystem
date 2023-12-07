<?php
namespace App\Helpers;
use App\Models\Doctors;

class DoctorHelper{
public function list(){
    $doctor=Doctors::where('status',1)->orderBy('id','desc')->pluck('fname','id');
    return ($doctor);
}
}
