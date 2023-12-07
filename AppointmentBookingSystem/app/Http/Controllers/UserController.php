<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Doctors;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\MyNotification;

class UserController extends Controller
{
    // public function index()
    // {
    //     $users = User::latest()->get();
    //     return view('users.index', compact('users'));
    // }
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('fname', 'like', "%$searchTerm%")
                  ->orWhere('mname', 'like', "%$searchTerm%")
                  ->orWhere('lname', 'like', "%$searchTerm%")
                  ->orWhere('email', 'like', "%$searchTerm%");
            });
        }

        $users = $query->latest()->get();

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
        $action = 'edit_user';
        $logged_user = auth()->user();
        $logged_user->notify(new MyNotification($user, $action));
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    public function destroy(User $user)
    {
         if ($user->doctor) {
       $user->doctor->delete();
     }
       $user->delete();
       return redirect(route('users.index'))->with('success','User deleted  successfully');

    }

    public function passwordReset(User $user)
    {
        $newPassword = Str::random(8);
        $user->password = Hash::make($newPassword);
        $user->save();
        $email = $user->email;
        $action = 'password_reset';
        $logged_user = auth()->user();
        $logged_user->notify(new MyNotification($user, $action));
        Mail::send('mail.password_reset', ['user' => $user, 'newPassword' => $newPassword], function ($message) use ($email) {
            $message->to($email, 'User')->subject('Password Reset Done !!');
        });
        return redirect()->back()->with('success', 'Password reset successfully. Check the user\'s email for the new password.');
    }

}

