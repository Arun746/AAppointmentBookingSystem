<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

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
            'password' => 'required|string|min:8', 
            'role' => 'nullable',  
        ]);  
        $validatedData['name'] = $validatedData['fname'] . ' ' . $validatedData['mname'] . ' ' . $validatedData['lname'];
        $validatedData['status'] = 'default_status';
        User::create($validatedData);
        return redirect()->route('users.index')->with('success', 'User registered successfully.');
    }

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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8', 
            'role' => 'nullable',  
        ]);  
        $validatedData['name'] = $validatedData['fname'] . ' ' . $validatedData['mname'] . ' ' . $validatedData['lname'];
        $validatedData['status'] = 'default_status';
        $user->update($validatedData);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function delete(User $user)
    {
       $user->delete();
       return redirect(route('users.index'))->with('success','User deleted  successfully'); 
    }
}
