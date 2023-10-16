<?php

namespace App\Http\Controllers;
use App\Models\Doctors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'email' => 'required|email|unique:doctors,email', 
            'password' => 'required|string|min:8', 
            'contact' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'dob' => 'required|date|max:255',
            'specialization' => 'required|string|max:255',
            'image' => 'file|nullable|mimes:jpeg,png,jpg,gif|max:2048',   
        ]);  
        $validatedData['name'] = $validatedData['fname'] . ' ' . $validatedData['mname'] . ' ' . $validatedData['lname'];
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); 
            $validatedData['image'] = $imagePath;
        }
        Doctors::create($validatedData);
        return redirect()->route('doctors.index')->with('success', 'Doctor registered successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Doctors $doctor)
    {
        return view('doctors.edit',['doctor'=>$doctor]);
    }

    public function update(Request $request, Doctors $doctor)
    {
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'license_no' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email', 
            'contact' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'dob' => 'required|date|max:255',
            'specialization' => 'required|string|max:255',
            'image' => 'file|nullable|mimes:jpeg,png,jpg,gif|max:2048',   
        ]);  
        $validatedData['name'] = $validatedData['fname'] . ' ' . $validatedData['mname'] . ' ' . $validatedData['lname'];

 
        if ($request->hasFile('image')) {
            // Delete the previous image (if exists)
            if ($doctor->image) {
                Storage::disk('public')->delete($doctor->image);
            }
        
            $imagePath = $request->file('image')->store('public/images');
            $validatedData['image'] = $imagePath;

        }
        $doctor->update($validatedData);
        return redirect()->route('doctors.index')->with('success', 'Doctor Updated successfully.');

}

    public function delete(Doctors $doctor)
    {
       $doctor->delete();
       return redirect(route('doctors.index'))->with('success','Doctor deleted  successfully'); 
    }
}
