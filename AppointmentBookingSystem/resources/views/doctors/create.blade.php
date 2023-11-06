@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-sm-8">
                <h2> Add Doctors
                </h2>
                <div class="card mt-3 p-3">
                    {{ $errors }}
                    <form method="post" action="{{ route('doctors.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="doctor-form" id="basicinfo" style="display: block">
                            <div class="card-header">
                                <h1 class="card-title ">Basic Info</h1>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="fname">First Name:</label>
                                        <input type="text" id="fname" name="fname" class="form-control"
                                            value="{{ old('fname') }}" />
                                        @error('fname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="mname">Middle Name:</label>
                                        <input type="text" id="mname" name="mname" class="form-control"
                                            value="{{ old('mname') }}" />
                                        @error('mname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="lname">Last Name:</label>
                                        <input type="text" id="lname" name="lname" class="form-control"
                                            value="{{ old('lname') }}" />
                                        @error('lname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-col">
                                    <label for="license_no">License Number:</label>
                                    <input type="text" id="license_no" name="license_no" class="form-control"
                                        value="{{ old('license_no') }}" />
                                    @error('license_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-col">
                                    <label for="contact">Phone Number</label>
                                    <input type="integer" id="contact"name="contact" class="form-control"
                                        value="{{ old('contact') }}" />
                                    @error('contact')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-col">
                                    <label for="address">Address:</label>
                                    <input type="text" id="address" name="address" class="form-control"
                                        value="{{ old('address') }}" />
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-col">
                                    <label for="gender">Gender:</label>
                                    <div class="row">
                                        <div class="form-check">
                                            <input type="radio" id="male" name="gender" value="male"
                                                {{ old('gender') === 'male' ? 'checked' : '' }}>
                                            <label for="male">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="female" name="gender" value="female"
                                                {{ old('gender') === 'female' ? 'checked' : '' }} />
                                            <label for="female">Female</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" id="others" name="gender" value="others"
                                                {{ old('gender') === 'others' ? 'checked' : '' }} />
                                            <label for="others">Others</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-col">
                                    <label for="dob">DOB:</label>
                                    <input type="varchar" id="dob" name="dob" class="form-control"
                                        value="{{ old('dob') }}" />
                                    @error('dob')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="hidden" id="engdob" name='engdob' />

                                <div class="form-col">
                                    <label for="specialization">Specialization:</label>
                                    <input type="text" id="specialization" name="specialization" class="form-control"
                                        value="{{ old('specialization') }}" />
                                    @error('specialization')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-col">
                                    <label for="role">Role:</label>
                                    <input type="number" id="role" name="role" class="form-control"
                                        value="{{ old('role') }}" />
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-col">
                                    <label for="status">status:</label>
                                    <input type="boolean" id="status" name="status" class="form-control" />
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-info btn-sm float-right" onclick="toggleFormOne()"
                                    id="toggleFormOne">Next</a>
                            </div>
                        </div>


                        {{-- Education Form --}}
                        <div class="education-form" id="education" style="display: none">
                            <div class="card-header">
                                <h3 class="card-title">Education</h3>
                                <a href="#" class="btn btn-info btn-sm float-right" id="addbutton"> Add More</a>
                            </div>

                            <div class="card-body">

                                <div class="col education-repeat">
                                    <fieldset style="border: 1px solid #000; padding: 10px; margin:10px;">
                                        <div class="form-col">
                                            <label for="level">level:</label>
                                            <input type="text" id="level" name="level[]" class="form-control" />
                                            @error('level')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-col">
                                            <label for="board">Board:</label>
                                            <input type="text" id="board" name="board[]" class="form-control" />
                                            @error('board')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-col">
                                            <label for="institution">Institution:</label>
                                            <input type="text" id="institution" name="institution[]"
                                                class="form-control" />
                                            @error('institution')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-col">
                                            <label for="completion_year">Completion-Year:</label>
                                            <input type="year" id="completion_year" name="completion_year[]"
                                                class="form-control" {{-- value="{{ old('completion_year') }}" --}} />
                                            @error('completion_year')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-col">
                                            <label for="gpa">GPA:</label>
                                            <input type="number" id="gpa" name="gpa[]" class="form-control" />
                                            @error('gpa')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-col">

                                            <i class="btn btn-danger btn-sm float-right remove-education ">Delete</i>

                                        </div>
                                    </fieldset>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-info btn-sm float-left" onclick="toggleFormOne()"
                                    id="toggleFormOne">Previous</a>
                                <a href="#" class="btn btn-info btn-sm float-right" onclick="toggleFormTwo()"
                                    id="toggleFormTwo">Next</a>
                            </div>
                        </div>


                        {{-- Experience Form --}}
                        <div class="experience-form" id="experience" style="display: none">
                            <div class="card-header">
                                <h3 class="card-title">Experience</h3>
                                <a href="#" class="btn btn-info btn-sm float-right" id="experience-add">Add
                                    More</a>
                            </div>
                            <div class="card-body">
                                <div class="col experience-repeat">
                                    <fieldset style="border: 1px solid #000; padding: 10px; margin:10px;">
                                        <div class="form-col">
                                            <label for="organization">Organization Name:</label>
                                            <input type="text" id="organization" name="organization[]"
                                                class="form-control" />
                                            @error('organization')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-col">
                                            <label for="position">Position:</label>
                                            <input type="text" id="position" name="position[]"
                                                class="form-control" />
                                            @error('position')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-col">
                                            <label for="job_description">Job description:</label>
                                            <input type="textarea" id="job_description" name="job_description[]"
                                                class="form-control" />
                                            @error('job_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-col">
                                            <label for="start_date">Start-Date:</label>
                                            <input type="date" id="start_date" name="start_date[]"
                                                class="form-control" />
                                            @error('start_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-col">
                                            <label for="end_date">End-date:</label>
                                            <input type="date" id="end_date" name="end_date[]"
                                                class="form-control" />
                                            @error('end_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-col">
                                            <a href="#" class="btn btn-danger btn-sm float-right "
                                                id="">Delete</a>

                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-info btn-sm float-left" onclick="toggleFormTwo()"
                                    id="toggleFormTwo">Previous</a>
                                <a href="#" class="btn btn-info btn-sm float-right" onclick="toggleFormThree()"
                                    id="toggleFormThree">Next</a>
                            </div>
                        </div>

                        {{-- Login Form --}}
                        <div class="login-form" id="login" style="display: none">
                            <div class="card-header">
                                <h3 class="card-title">login</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group col">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        value="{{ old('password') }}" />
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="password_confirmation">Confirm Password:</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control" value="{{ old('password_confirmation') }}" />
                                    @error('confirmpassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-info btn-sm float-left" onclick="toggleFormThree()"
                                    id="toggleFormThree">Previous</a>
                                <button type="submit" class="btn btn-dark float-right">Submit</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
