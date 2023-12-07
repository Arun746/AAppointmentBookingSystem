<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Doctors;
use App\Models\Education;
use App\Models\Department;
use App\Models\Experience;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    // public function index()
    // {
    //     $doctors = Doctors::latest()->get();
    //     return view('doctors.index', compact('doctors'));
    // }

    public function index(Request $request)
{
    $doctors = Doctors::with('department')
        ->when($request->filled('department'), function ($query) use ($request) {
            $query->where('department_id', $request->input('department'));
        })
        ->when($request->has('search'), function ($query) use ($request) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('fname', 'like', "%$searchTerm%")
                    ->orWhere('lname', 'like', "%$searchTerm%")
                    ->orWhere('email', 'like', "%$searchTerm%");
            });
        })
        ->latest()
        ->get();

    $departments = Department::all();

    return view('doctors.index', compact('doctors', 'departments'));
}

    public function show(Doctors $doctor)
    {
        $education = Education::where('doctors_id', $doctor->id)->get();
        $experience = Experience::where('doctors_id', $doctor->id)->get();
        return view('doctors.profile', compact('doctor', 'education', 'experience'));
    }
    public function create()
    {
        $departments = Department::all();
        return view('doctors.create',compact('departments'));
    }
    public function store(DoctorRequest $request)
    {
        return DB::transaction(function () use ($request) {
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['role']=1;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // store in storage/app/public/images
            $validatedData['image'] = $imagePath;
        }

        $user = User::create($validatedData);
        $validatedData['user_id'] = $user->id;
        $doctor = Doctors::create($validatedData);
        $validatedData['doctors_id']=$doctor->id;

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
       });
    }
    public function edit(Doctors $doctor)
    {
        $education = $doctor->education;
        $experience = $doctor->experience;
        return view('doctors.edit', compact('doctor', 'education','experience'));
    }
   public function update(DoctorRequest $request, Doctors $doctor)
    {
        return DB::transaction(function () use ($request,$doctor) {
        $validatedData = $request->validated();
        $doctor->user->update($validatedData);

        Education::where('doctors_id', $doctor->id)->delete();
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
            Experience::where('doctors_id', $doctor->id)->delete();
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

        if ($request->hasFile('image')) {
            if ($doctor->image) {
                Storage::disk('public')->delete($doctor->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }
        $doctor->update($validatedData);
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');


      });
    }
    public function delete(Doctors $doctor)
    {
       $doctor->user->delete();
       $doctor->delete();
       return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }


}

