@extends('layouts.app')

@section('content')
    <div class="container ">

        <div class="row justify-content-center">

            <div class="col-sm-12">
                <h2> Add Doctors
                </h2>
                <div class="card mt-3 p-3">
                    {{ $errors }}
                    <form method="post" action="{{ route('doctors.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="doctor-form" id="basicinfo" style="display:  block">
                            <div class="card-header">
                                <h1 class="card-title ">Basic Info</h1>
                            </div>
                            <div class="card-body">
                                <div class="form row">
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
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="license_no">License Number:</label>
                                        <input type="text" id="license_no" name="license_no" class="form-control"
                                            value="{{ old('license_no') }}" />
                                        @error('license_no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="contact">Phone Number</label>
                                        <input type="integer" id="contact"name="contact" class="form-control"
                                            value="{{ old('contact') }}" />
                                        @error('contact')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="address">Address:</label>
                                        <input type="text" id="address" name="address" class="form-control"
                                            value="{{ old('address') }}" />
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="status">Status:</label>
                                        <select id="status" name="status" class="form-control">
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="dob">DOB:</label>
                                        <input type="text" id="dob" name="dob" class="form-control"
                                            value="{{ old('dob') }}" />
                                        @error('dob')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <input type="hidden" id="engdob" name='engdob' />

                                    <div class="form-group col">
                                        <label for="specialization">Specialization:</label>
                                        <input type="text" id="specialization" name="specialization" class="form-control"
                                            value="{{ old('specialization') }}" />
                                        @error('specialization')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class=" form-group col-sm-4">
                                        <label for="image">Select image:</label>
                                        <input type="file" id="image" name="image" class="form-control "
                                            value="{{ old('image') }}" onchange="previewImage(this)" />
                                        <img id="imagePreview" src="{{ asset('storage/images/images (2).jpeg') }}"
                                            style="max-width: 100%; max-height: 200px;">

                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class=" form-group col-sm-4">
                                        <label for="department_id">Select Department:</label>
                                        <select name="department_id" id="department_id" class="form-control">
                                            <option value="">Select Department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">
                                                    {{ $department->departmentName }}</option>
                                            @endforeach
                                        </select>

                                        @error('department_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-4">

                                        <div class="row mt-3 ml-3">
                                            <label for="gender">Gender:</label>
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

                                    <div class="row">
                                        <div class="form-group col-sm-2">
                                            <label for="level">level:</label>
                                            <input type="text" id="level" name="level[]" class="form-control"
                                                value="{{ is_array(old('level')) ? old('level')[0] : old('level') }}" />
                                            @error('level')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="board">Board:</label>
                                            <input type="text" id="board" name="board[]" class="form-control" />
                                            @error('board')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="institution">Institution:</label>
                                            <input type="text" id="institution" name="institution[]"
                                                class="form-control" />
                                            @error('institution')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-2">
                                            <label for="completion_year">Completion-Year:</label>
                                            <input type="year" id="completion_year" name="completion_year[]"
                                                class="form-control" {{-- value="{{ old('completion_year') }}" --}} />
                                            @error('completion_year')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="gpa">GPA:</label>
                                            <input type="number" id="gpa" name="gpa[]" class="form-control" />
                                            @error('gpa')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-1 mt-4 pt-2">
                                            <label></label>
                                            <i
                                                class="btn btn-danger  btn-sm float-right remove-education fas fa-trash-alt"></i>

                                        </div>
                                    </div>

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

                                    <div class="row">
                                        <div class="form-group col-sm-3">
                                            <label for="organization">Organization Name:</label>
                                            <input type="text" id="organization" name="organization[]"
                                                class="form-control" />
                                            @error('organization')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="position">Position:</label>
                                            <input type="text" id="position" name="position[]"
                                                class="form-control" />
                                            @error('position')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="job_description">Job description:</label>
                                            <input type="textarea" id="job_description" name="job_description[]"
                                                class="form-control" />
                                            @error('job_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-2">
                                            <label for="start_date">Start-Date:</label>
                                            <input type="date" id="start_date" name="start_date[]"
                                                class="form-control" />
                                            @error('start_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-sm-2">
                                            <label for="end_date">End-date:</label>
                                            <input type="date" id="end_date" name="end_date[]"
                                                class="form-control" />
                                            @error('end_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-1 mt-3 pt-3">
                                            <i class="btn btn-danger btn-sm  fas fa-trash-alt remove-experience">
                                            </i>
                                        </div>
                                    </div>

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
                        <div class="login-form" id="login" style="display:none">
                            <div class="card-header">
                                <h3 class="card-title">login</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
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
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-info btn-sm float-left" onclick="toggleFormThree()"
                                    id="toggleFormThree">Previous</a>
                                <button type="submit" onclick="return confirm('Are you sure?')"
                                    class="btn btn-success  btn-sm float-right">Submit</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function previewImage(input) {
            var preview = document.getElementById('imagePreview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
