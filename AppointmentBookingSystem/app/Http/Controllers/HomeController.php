<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctors;
use App\Models\Schedule;
use App\Models\Department;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {$users=User::get();
        $userCount = User::count();
        $doctorCount = Doctors::count();
        $departmentCount = Department::count();
        $scheduleCount = Schedule::count();

        return view('home', compact('userCount', 'doctorCount', 'departmentCount', 'scheduleCount','users'));
    }
}
