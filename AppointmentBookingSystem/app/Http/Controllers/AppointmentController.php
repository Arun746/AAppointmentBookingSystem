<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Department;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index()
    {
        $doctors = Doctors::latest()->get();
        $departments = Department::latest()->get();
       return view('appointment.form',compact('doctors','departments'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }
    // public function index()
    // {
    //     $doctors = Doctor::latest()->get();
    //     return view('welcome',compact('doctors'));
    // }
    // public function store(Request $request)
    // {
    //     $patientDetail = Patient::create($request->all());
    //     $request['patient_id'] = $patientDetail->id;
    //     $scheduleData = Schedule::findOrFail($request->schedule_id);
    //     $request['doctors_id'] = $scheduleData->doctors_id;
    //     Booking::create($request->only([
    //         'schedule_id',
    //         'patient_id',
    //         'doctors_id',
    //         'updated_at',
    //         'created_at',
    //     ]));
    //     $scheduleData->update(['status' => 1]);
    //     Alert::success('Success!','Appointment Registered Successfully!');
    //     return redirect()->back();
    // }
    public function show($id){
        $departments = Department::findOrFail($id);

        $doctors = Doctors::with(['schedule' => function ($res) {
            $res->orderBy('date_bs', 'asc');
        }])
        ->where('department_id', $departments->id)
        ->get();

        return view('appointment.doctorslist',compact('doctors','departments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}




// <div class="row">
// <div class="col-md-3">
//     <div class="card card-primary card-outline">
//         <div class="card-body box-profile">
//             <div class="text-center">
//                 <img class="profile-user-img img-fluid img-circle" {{-- src="{{ asset($doctor->image) }}" --}} alt="profile">
//             </div>
//             <h3 class="profile-username text-center">
//                 {{ $doctor->fname . ' ' . $doctor->mname . ' ' . $doctor->lname }}</h3>

//             <p class="text-muted text-center">
//                 @if ($doctor->role == 0)
//                     Admin
//                 @elseif($doctor->role == 1)
//                     Doctor
//                 @else
//                     User
//                 @endif
//             </p>

//             <ul class="list-group list-group-unbordered mb-3">
//                 <li class="list-group-item">
//                     <b>License No:</b> {{ $doctor->license_no }}
//                 </li>
//                 <li class="list-group-item">
//                     <b>Email:</b> {{ $doctor->email }}
//                 </li>
//                 <li class="list-group-item">
//                     <b>Department: </b> {{ $doctor->department->departmentName }}
//                 </li>
//                 <li class="list-group-item">
//                     <b>Specialization: </b> {{ $doctor->specialization }}
//                 </li>
//                 <li class="list-group-item">
//                     <b>Status: </b>
//                     @if ($doctor->status == 0)
//                         Inactive
//                     @else
//                         Active
//                     @endif
//                 </li>
//             </ul>
//         </div>

//     </div>
// </div>
