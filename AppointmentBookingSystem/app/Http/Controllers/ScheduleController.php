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
      $doctor = Doctors::where('id', $request->input('doctors_id'))->first();
      $validatedData['doctors_id']=$doctor->id;

   foreach ($validatedData['start_time'] as $key => $startTime) {
        $schedule = new Schedule();
        $schedule->date_bs = $validatedData['date_bs'];
        $schedule->start_time = $startTime;
        $schedule->end_time = $validatedData['end_time'][$key];
        $schedule->doctors_id = $validatedData['doctors_id'];
        $schedule->user_id = $validatedData['user_id'];
        $schedule->save();
    }

    return redirect()->route('schedule.index')->with('success', 'Schedules created successfully.');

    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
       return redirect(route('schedule.index'))->with('success','Schedule deleted  successfully');
    }
}
