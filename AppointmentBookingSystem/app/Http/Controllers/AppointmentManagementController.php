<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentManagementController extends Controller
{
    public function index()
    {
        $doctor = auth()->user()->doctor;

        if ($doctor) {
            $docid = $doctor->id;
            $appointments = Appointment::where('doctor_id', $docid)->get();
            return view('appointmentmanage.index', compact('appointments'));
        }

    }

    public function edit(string $appointment_management, Request $request)
    {
        $status = $request->input('status');
        $appointments= Appointment::find($appointment_management);
        $appointments->status = $status;
        $appointments->save();
        $schedule = Schedule::find($appointment->schedule_id);

        if ($schedule) {
            // Update the schedule status based on the appointment status
            $schedule->status = ($status == 1) ? 'occupied' : 'unoccupied';
            $schedule->save();
        }
        return redirect()->back();
    }


}
