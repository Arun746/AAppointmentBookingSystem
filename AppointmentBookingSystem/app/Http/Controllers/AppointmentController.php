<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\AppointmentRequest;

class AppointmentController extends Controller
{

    public function index()
    {
        // $doctors = Doctors::latest()->get();
        $departments = Department::latest()->get();
       return view('appointment.form',compact('departments'));
    }
    public function create()
    {
        //
    }


    public function store(AppointmentRequest $request)
    {
        $patientDetail = Patient::create($request->all());
        $request['patient_id'] = $patientDetail->id;
        // dd($request->schedule_id);
        $scheduleData = Schedule::findOrFail($request->schedule_id);
        $request['doctors_id'] = $scheduleData->doctors_id;
        // $request['status'] = 0;
        $appointment = Appointment::create([
            'schedule_id' => $request->schedule_id,
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'status' => 0,
            'remarks' => $request->remarks,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        $scheduleData->update(['status' => 'occupied']);

        // dd($appointment);

        Mail::send('mail.email',$scheduleData->toArray(),
        function($message){
            $message->to('doctor@gmail.com','Doctor')->subject('New Appointments Registered.');
        });
        return redirect()->route('welcome')->with('success', 'Appointment booked successfully! We will get to you soon');
    }


    public function show($id){
        $departments = Department::findOrFail($id);
        $doctors = $departments->doctor()->with('schedule')->get();

        // $bookedSchedules = Schedule::whereIn('id', function ($query) {
        //     $query->select('schedule_id')
        //         ->from('appointments')
        //         ->whereIn('status', [0, 1]);
        // })->pluck('id')->toArray();

        return view('appointment.doctorslist', compact('doctors'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}



