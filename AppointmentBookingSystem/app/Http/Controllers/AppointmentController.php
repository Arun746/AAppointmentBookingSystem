<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\AppointmentRequest;

class AppointmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();
        foreach ($departments as $department) {
            $doctorCount = Doctors::where('department_id', $department->id)->count();
            $department->doctorCount = $doctorCount;
        }
        return view('appointment.form', compact('departments'));
    }

    public function store(AppointmentRequest $request)
    {
        $patientDetail = Patient::create($request->all());
        $request['patient_id'] = $patientDetail->id;
        $scheduleData = Schedule::findOrFail($request->schedule_id);
        $request['doctors_id'] = $scheduleData->doctors_id;
        $doctor = Doctors::findOrFail($scheduleData->doctors_id);
        $email = $doctor->email;
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
        Mail::send(
            'mail.email',
            $scheduleData->toArray(),
            function ($message) use ($email) {
                $message->to($email, 'Doctor')->subject('New Appointments Registered.');
            }
        );
        return redirect()->route('welcome')->with('success', 'Appointment booked successfully! We will get to you soon');
    }

    public function show($id)
    {
        $departments = Department::findOrFail($id);
        $doctors = $departments->doctor()->with('schedule')->get();
        $tomorrow = Carbon::now()->addDay()->format('Y-m-d');
        $dayAfterTomorrow = Carbon::now()->addDays(2)->format('Y-m-d');
        foreach ($doctors as $doctor) {
            $doctor->filteredSchedules = $doctor->schedule
                ->groupBy('date_ad')
                ->filter(function ($schedulesByDate, $date) use ($tomorrow, $dayAfterTomorrow) {
                    return $date == $tomorrow || $date == $dayAfterTomorrow;
                });
        }
        return view('appointment.doctorslist', compact('doctors'));
    }
}
