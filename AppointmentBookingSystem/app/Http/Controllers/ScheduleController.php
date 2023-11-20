<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Schedule;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;

class ScheduleController extends Controller
{
    public function index()
    { $schedules=Schedule::latest()->get();
        return view('schedule.index',compact('schedules'));
    }
    public function create()
    {
        // $departments=Department :: get ();
        $doctors = Doctors::get();
        return view('schedule.create',['doctors'=>$doctors]);
    }
    public function store(ScheduleRequest $request)
    {
      $validatedData=$request->all();
      $user = auth()->user();
      $validatedData['user_id'] = $user->id;
      $doctor = Doctors::find($request->input('doctors_id'));
      $validatedData['doctors_id']=$doctor->id;

    Schedule::create($validatedData);

      return redirect()->route('schedule.index')->with('success', 'schedule created  successfully.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
       return redirect(route('schedule.index'))->with('success','Schedule deleted  successfully');
    }
}
