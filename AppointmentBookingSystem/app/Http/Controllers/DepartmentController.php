<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->get();
        return view('department.index', compact('departments'));
    }
    public function create()
    {
    return view('department.create');
    }
    public function store(DepartmentRequest $request)
    {
        $validatedData = $request->validated();
        $departments= Department::create($validatedData);
        return redirect()->route('department.index');
    }

    public function edit(Department $department)
    {
    return view ('department.edit',compact('department'));
    }

    public function update(DepartmentRequest $request, Department $department)
    {
        $validatedData = $request->validated();
        $department->update($validatedData);
        return redirect()->route('department.index');
    }


    public function destroy(Department $department)
    {
$department->delete();
return redirect()->route('department.index');
    }
}
