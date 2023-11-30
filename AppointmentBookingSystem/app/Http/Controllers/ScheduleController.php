<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Schedule;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\ScheduleRequest;

class ScheduleController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 0)
        {
            $schedules = Schedule::whereHas('doctor', function ($query) {
                $query->whereNull('deleted_at');
            })->latest()->get();

            return view('schedule.index', compact('schedules'));
        } elseif (auth()->user()->role == 1)
        {
            $doctorId = auth()->user()->doctor->id;
            $schedules = Schedule::where('doctors_id', $doctorId)
                ->whereHas('doctor', function ($query) {
                    $query->whereNull('deleted_at');
                })
                ->latest()
                ->get();

            return view('schedule.index', compact('schedules'));
        }
    }

    public function create()
    {
        // $departments=Department :: get ();
        $doctors = Doctors::get();
        return view('schedule.create',['doctors'=>$doctors]);
    }

    public function store(ScheduleRequest $request)
    {
        $validatedData = $request->all();
        $user = auth()->user();
        $validatedData['user_id'] = $user->id;
        $doctor = Doctors::find($request->input('doctors_id'));
        $validatedData['doctors_id'] = $doctor->id;
        $startTime = Carbon::parse($validatedData['start_time']);
        $endTime = Carbon::parse($validatedData['end_time']);
        $interval = $startTime->copy();
        // dd($validatedData);
        while ($startTime->lt($endTime) && $endTime->diffInMinutes($startTime) >= 30) {
            $schedule=Schedule::create([
                'user_id' => $validatedData['user_id'],
                'doctors_id' => $validatedData['doctors_id'],
                'date_bs' => $validatedData['date_bs'],
                'date_ad' => $validatedData['date_ad'],
                'start_time' => $startTime->format('H:i'),
                'end_time' => $startTime->addMinutes(30)->format('H:i'),
            ]);
            $startTime->addMinutes(5);
            // dd($schedule);
        }

        return redirect()->route('schedule.index')->with('success', 'Schedules created successfully.');
    }

    //    foreach ($validatedData['start_time'] as $key => $startTime) {
    //     $schedule = new Schedule();
    //     $schedule->date_bs = $validatedData['date_bs'];
    //     $schedule->date_ad = $validatedData['date_ad'];
    //     $schedule->start_time = $startTime;
    //     $schedule->end_time = $validatedData['end_time'][$key];
    //     $schedule->doctors_id = $validatedData['doctors_id'];
    //     $schedule->user_id = $validatedData['user_id'];
    //     $schedule->save();
    //   }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
       return redirect(route('schedule.index'))->with('success','Schedule deleted  successfully');
    }
}
