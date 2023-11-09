<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Doctors;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index()
    {
        $doctors = Doctors::onlyTrashed()->get();
        $users = User::onlyTrashed()->get();
        return view('doctors.trash',compact('doctors'));
    }
    public function restore($id) {
        $doctor = Doctors::onlyTrashed()->where('id', $id)->first();
        if ($doctor) {
            $doctor->restore();
            $user = User::onlyTrashed()->where('id', $doctor->user_id)->first();
            if ($user) {
                $user->restore();
            }
        }
        return redirect()->route('doctors.trash');
    }
    public function destroy($id)
    {
        $doctor = Doctors::onlyTrashed()->find($id);
        if($doctor){
            $doctor->forceDelete();
        }
        return redirect()->route('doctors.trash')->with('success','Doctor Deleted Successfully');
    }
}

