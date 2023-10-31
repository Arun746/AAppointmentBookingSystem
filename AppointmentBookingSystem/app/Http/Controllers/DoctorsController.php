<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Doctors;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors=Doctors::all();
        return view('doctors.index',['doctors'=>$doctors]);
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'license_no' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' =>'required|min:8',
            'contact' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'dob' => 'required|date',
            'specialization' => 'required|string|max:255',
            'role'=>'nullable|integer',

        ]);
       

        $user = User::create([
            'fname' => $validatedData['fname'] ,
            'mname' => $validatedData['mname'],
            'lname' => $validatedData['lname'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'role'=>$validatedData['role'],
        ]);

        $doctorvalidated['user_id'] =$user->id;

        $doctor = Doctors::create([
        'fname' => $validatedData['fname'],
        'mname' => $validatedData['mname'],
        'lname' => $validatedData['lname'],
        'user_id' => $user->id,
        'license_no' =>  $validatedData['license_no'],
        'email' =>  $validatedData['email'],
        'password' =>  $validatedData['password'],
        'contact' =>  $validatedData['contact'],
        'address' =>  $validatedData['address'],
        'gender' => $validatedData['gender'],
        'dob' =>$validatedData['dob'] ,
        'specialization' =>$validatedData['specialization'] ,
        'role'=>$validatedData['role'],
        ]);
        return redirect()->route('doctors.index')->with('success', 'Doctor registered successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Doctors $doctor)
    {
        // dd($doctor);
        return view('doctors.edit', ['doctor' => $doctor]);
    }

    public function update(Request $request, Doctors $doctor)
    {
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'license_no' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required',
            'dob' => 'required|date|max:255',
            'specialization' => 'required|string|max:255',
            'role'=>'nullable'|'integer',
        ]);
        $user = User::findOrFail($doctor->user_id);
        $user->update([
            'fname' => $validatedData['fname'],
            'mname' => $validatedData['mname'],
            'lname' => $validatedData['lname'],
            'email' => $validatedData['email'],
        ]);

        $doctor->update($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Doctor Updated successfully.');

}
public function delete(Doctors $doctor)
{
    $doctor->user->delete(); 
    $doctor->delete(); 

    return redirect()->route('doctors.index')->with('success', 'Doctor and associated user deleted successfully');
}

}
