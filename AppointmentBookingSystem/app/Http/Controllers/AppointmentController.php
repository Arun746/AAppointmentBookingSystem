<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Http\Request;
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
        $scheduleData = Schedule::findOrFail($request->schedule_id);
        $request['doctors_id'] = $scheduleData->doctors_id;
        Appointment::create($request->only([
            'schedule_id',
            'patient_id',
            'doctor_id',
            'booking_date_bs',
            'booking_date_ad',
            'status',
            'remarks',
            'updated_at',
            'created_at',
        ]));

        return redirect()->route('welcome')->with('success', 'Appointment booked successfully! We will get to you soon');

    }
    public function show($id){

        $departments = Department::findOrFail($id);
        $doctors = $departments->doctor()->with('schedule')->get();

        return view('appointment.doctorslist',compact('doctors'));
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



