<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function edit($appointment_management, Request $request)
    {
        $status = $request->input('status');
        $appointments = Appointment::find($appointment_management);
        $appointments->status = $status;
        $patient = Patient::find($appointments->patient_id);
        $email = $patient->email;
        $appointments->save();
        $schedule = Schedule::find($appointments->schedule_id);
        if ($schedule) {
            $schedule->status = ($status == 1) ? 'occupied' : 'unoccupied';
            $schedule->save();
        }

        if ($status == 1) {
            Mail::send('mail.patientappointment', $schedule->toArray(), function ($message) use ($email) {
                $message->to($email, 'Patient')->subject('Appointment Approved');
            });
        } elseif ($status == 2) {
            Mail::send('mail.patientappointment', $schedule->toArray(), function ($message) use ($email) {
                $message->to($email, 'Patient')->subject('Appointment Declined');
            });
        }
        return redirect()->back();
    }
}
