<?php
namespace App\Http\Controllers;
use App\Http\Requests\DoctorRequest;
use App\Models\User;
use App\Models\Doctors;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = Doctors::all();
        return view('doctors.index', compact('doctors'));
    }
    public function create()
    {
        return view('doctors.create');
    }
    public function store(DoctorRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        
        $validatedData['user_id'] = $user->id;
        $doctor = Doctors::create($validatedData);
        return redirect()->route('doctors.index')->with('success', 'Doctor registered successfully.');
    }
    public function edit(Doctors $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }
    public function update(DoctorRequest $request, Doctors $doctor)
    {
        $validatedData = $request->validated();
        $doctor->user->update($validatedData);
        $doctor->update($validatedData);
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }
    public function delete(Doctors $doctor)
    {
       $doctor->user->delete();
       $doctor->delete();
       return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
}
