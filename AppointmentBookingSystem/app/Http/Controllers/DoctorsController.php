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

        $user = User::create(array_merge($validatedData, [
            'password' => bcrypt($validatedData['password']),
        ]));

        $doctor = Doctors::create(array_merge($validatedData, [
            'user_id' => $user->id,
            'password' => bcrypt($validatedData['password']),
        ]));

        return redirect()->route('doctors.index')->with('success', 'Doctor registered successfully.');
    }

    

    public function edit(Doctors $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    public function update(DoctorRequest $request, Doctors $doctor)
    {
        $validatedData = $request->validated();

        $user = User::findOrFail($doctor->user_id);
        $user->update($validatedData);

        $doctor->update($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    public function destroy(Doctors $doctor)
    {
        $user = User::find($doctor->user_id);
        if ($user) {
            $user->delete();
        }
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
}
