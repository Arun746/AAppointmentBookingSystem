<?php

namespace App\Http\Controllers;

use DB;
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
    {
        $users=User::get();
        $userCount = User::count();
        $doctorCount = Doctors::count();
        $departmentCount = Department::count();
        $scheduleCount = Schedule::count();

            // Fetch data for the pie chart (replace with your actual logic)
            $departments = Department::select('departmentName', DB::raw('count(doctors.id) as doctor_count'))
            ->leftJoin('doctors', 'departments.id', '=', 'doctors.department_id')
            ->groupBy('departments.id', 'departmentName')
            ->get();


        return view('home', compact('userCount', 'doctorCount', 'departmentCount', 'scheduleCount', 'users', 'departments'));
    }
}
