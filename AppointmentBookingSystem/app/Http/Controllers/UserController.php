<?php

namespace App\Http\Controllers;
use App\Models\Doctors;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required',
            'status'=>'required',
        ]);
        $validatedData['name'] = $validatedData['fname'] . ' ' . $validatedData['mname'] . ' ' . $validatedData['lname'];
        User::create($validatedData);
        return redirect()->route('users.index')->with('success', 'User registered successfully.');
    }
    // public function show(string $id)
    // {
    // }
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'nullable',
            'status'=>'required',
        ]);
        $validatedData['name'] = $validatedData['fname'] . ' ' . $validatedData['mname'] . ' ' . $validatedData['lname'];
        $user->update($validatedData);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    public function destroy(User $user)
    {
       $user->doctor->delete();
       $user->delete();
       return redirect(route('users.index'))->with('success','User deleted  successfully');

    }
}

