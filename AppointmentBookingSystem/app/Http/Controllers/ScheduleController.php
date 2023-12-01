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

        while ($interval->lt($endTime) && $endTime->diffInMinutes($interval) >= 30) {
            $schedule = Schedule::create([
                'user_id' => $validatedData['user_id'],
                'doctors_id' => $validatedData['doctors_id'],
                'date_bs' => $validatedData['date_bs'],
                'date_ad' => $validatedData['date_ad'],
                'start_time' => $interval->format('H:i'),
                'end_time' => $interval->addMinutes(30)->format('H:i'),
            ]);
            $interval->addMinutes(5);
        }


        return redirect()->route('schedule.index')->with('success', 'Schedules created successfully.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
       return redirect(route('schedule.index'))->with('success','Schedule deleted  successfully');
    }
}
