<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Doctors;
use App\Models\Education;
use App\Models\Department;
use App\Models\Experience;
use App\Http\Requests\DoctorRequest;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = Doctors::latest()->get();
        return view('doctors.index', compact('doctors'));
    }
    public function create()
    {
        $departments = Department::all();
        return view('doctors.create',['departments'=>$departments]);
    }
    public function store(DoctorRequest $request)
    {
        $validatedData = $request->all();
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['role']=1;
        $user = User::create($validatedData);

        $validatedData['user_id'] = $user->id;
        $doctor = Doctors::create($validatedData);

        $validatedData['doctors_id']=$doctor->id;

        $educationData = Education::where('doctors_id',$doctor->id)->get();
        foreach($validatedData['institution'] as $key => $item){
            $educationData[$key] = [
                'doctors_id' => $doctor->id,
                'institution' => $validatedData['institution'][$key],
                'level' => $validatedData['level'][$key],
                'board' => $validatedData['board'][$key],
                'completion_year' => $validatedData['completion_year'][$key],
                'gpa' => $validatedData['gpa'][$key],
         ];
        Education::create($educationData[$key]);
        }
        $experienceData = Experience::where('doctors_id',$doctor->id)->get();
        foreach($validatedData['organization'] as $key => $item){
            $experienceData[$key] = [
                'doctors_id' => $doctor->id,
                'organization' => $validatedData['organization'][$key],
                'position' => $validatedData['position'][$key],
                'job_description' => $validatedData['job_description'][$key],
                'start_date' => $validatedData['start_date'][$key],
                'end_date' => $validatedData['end_date'][$key],
         ];
        Experience::create($experienceData[$key]);
        }
        return redirect()->route('doctors.index')->with('success', 'Doctor registered successfully.');
    }
    public function edit(Doctors $doctor)
    {
        $education = $doctor->education;
        $experience = $doctor->experience;
        return view('doctors.edit', compact('doctor', 'education','experience'));
    }
    public function update(DoctorRequest $request, Doctors $doctor)
    {
        $validatedData = $request->validated();
        $doctor->user->update($validatedData);
        $del_education = Doctors::find($doctor->id);
        if ($del_education) {
             Education::where('doctors_id', $doctor->id)->delete();
        }
        foreach ($validatedData['institution'] as $key => $item) {
            $education = new Education();
            $education->doctors_id = $doctor->id;
            $education->level = $validatedData['level'][$key];
            $education->institution = $validatedData['institution'][$key];
            $education->board = $validatedData['board'][$key];
            $education->completion_year = $validatedData['completion_year'][$key];
            $education->gpa = $validatedData['gpa'][$key];
            $education->save();
        }
        if ($del_education) {
            Experience::where('doctors_id', $doctor->id)->delete();
        }
        foreach ($validatedData['organization'] as $key => $item) {
            $experience = new Experience();
            $experience->doctors_id = $doctor->id;
            $experience->organization = $validatedData['organization'][$key];
            $experience->position = $validatedData['position'][$key];
            $experience->start_date = $validatedData['start_date'][$key];
            $experience->end_date = $validatedData['end_date'][$key];
            $experience->job_description = $validatedData['job_description'][$key];
            $experience->save();
        }
        $doctor->update($validatedData);
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }
    public function delete(Doctors $doctor)
    {
       $doctor->user->delete();
       $doctor->delete();
       return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
}

// public function show($id)
// {
//     $doctor = Doctor::findOrFail($id);
//     return view('system.doctor.profile', compact('doctor'));
// }
