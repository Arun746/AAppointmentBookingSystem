@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-sm-12">
                {{ $errors }}
                <h2> Edit Doctor Detail
                </h2>
                <div class="card mt-3 p-3 ">

                    <form method="post" action="{{ route('doctors.update', ['doctor' => $doctor]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- basic form --}}
                        <div class="doctor-form" id="basicinfo" style="display: block">
                            <div class="card-header">
                                <h1 class="card-title ">Basic Info</h1>
                            </div>
                            <div class="card-body ">
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="fname">First Name:</label>
                                        <input type="text" id="fname" name="fname" class="form-control"
                                            value="{{ old('fname', $doctor->fname) }}" />
                                    </div>

                                    <div class="form-group col">
                                        <label for="mname">Middle Name:</label>
                                        <input type="text" id="mname" name="mname" class="form-control"
                                            value="{{ old('mname', $doctor->mname) }}" />
                                    </div>

                                    <div class="form-group col">
                                        <label for="lname">Last Name:</label>
                                        <input type="text" id="lname" name="lname" class="form-control"
                                            value="{{ old('lname', $doctor->lname) }}" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="license_no">License Number:</label>
                                        <input type="text" id="license_no" name="license_no" class="form-control"
                                            value="{{ old('license_no', $doctor->license_no) }}" />
                                    </div>

                                    <div class="form-group col">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ old('email', $doctor->email) }}" />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="contact">Ph.Number</label>
                                        <input type="integer" id="contact"name="contact" class="form-control"
                                            value="{{ old('contact', $doctor->contact) }}" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="address">Address:</label>
                                        <input type="text" id="address" name="address" class="form-control"
                                            value="{{ old('address', $doctor->address) }}" />
                                    </div>


                                    <div class="form-group col">
                                        <label for="dob">DOB:</label>
                                        <input type="date" id="dob" name="dob" class="form-control"
                                            value="{{ old('dob', $doctor->dob) }}" />
                                    </div>
                                    <input type="hidden" id="engdob" name='engdob' />

                                    <div class="form-group col">
                                        <label for="specialization">Specialization:</label>
                                        <input type="text" id="specialization" name="specialization" class="form-control"
                                            value="{{ old('specialization', $doctor->specialization) }}" />
                                    </div>
                                </div>
                                <div class="form-row">


                                    <div class="form-group col">
                                        <label for="image">Image:</label>
                                        <input type="file" id="image" name="image" class="form-control"
                                            value="{{ old('image', $doctor->image) }}" onchange="previewImage(this)" />
                                        <img id="imagePreview" src="{{ asset('storage/' . $doctor->image) }}"
                                            class="mt-2 " style="max-width: 100px; max-height: 100px;" />
                                    </div>


                                    <div class="form-group col-sm-4">
                                        <label for="status">Status:</label>
                                        <select id="status" name="status" class="form-control">
                                            <option value="0" @if ($doctor->status === 0) selected @endif>
                                                Inactive
                                            </option>
                                            <option value="1" @if ($doctor->status === 1) selected @endif>Active
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col">
                                        <label for="gender">Gender:</label>
                                        <div class="row">
                                            <div class="form-check">
                                                <input type="radio" id="male" name="gender" value="male"
                                                    {{ old('gender', $doctor->gender) === 'male' ? 'checked' : '' }}>
                                                <label for="male">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" id="female" name="gender" value="female"
                                                    {{ old('gender', $doctor->gender) === 'female' ? 'checked' : '' }} />
                                                <label for="female">Female</label>
                                            </div>

                                            <div class="form-check">
                                                <input type="radio" id="others" name="gender" value="others"
                                                    {{ old('gender', $doctor->gender) === 'others' ? 'checked' : '' }} />
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
                                <a href="#" class="btn btn-info btn-sm float-right" id="addbutton"> Add
                                    More</a>
                            </div>
                            <div class="card-body">
                                @foreach ($education as $edu)
                                    <div class="col education-repeat">
                                        {{-- <fieldset style="border: 1px solid #000; padding: 10px; margin:10px;"> --}}
                                        <div class="form-row">
                                            <div class="form-group col-sm-2">
                                                <label for="level">level:</label>
                                                <input type="text" id="level" name="level[]" class="form-control"
                                                    value="{{ old('level', $edu->level) }}" />
                                                @error('level')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-sm-2">
                                                <label for="board">Board:</label>
                                                <input type="text" id="board" name="board[]" class="form-control"
                                                    value="{{ old('board', $edu->board) }}" />
                                                @error('board')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-sm-3">
                                                <label for="institution">Institution:</label>
                                                <input type="text" id="institution" name="institution[]"
                                                    class="form-control"
                                                    value="{{ old('institution', $edu->institution) }}" />
                                                @error('institution')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-sm-2">
                                                <label for="completion_year">Completion-Year:</label>
                                                <input type="year" id="completion_year" name="completion_year[]"
                                                    class="form-control"
                                                    value="{{ old('completion_year', $edu->completion_year) }}" />
                                                @error('completion_year')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="gpa">GPA:</label>
                                                <input type="number" id="gpa" name="gpa[]" class="form-control"
                                                    value="{{ old('gpa', $edu->gpa) }}" />
                                                @error('gpa')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-1 mt-3 pt-3">

                                                <i class="btn btn-danger btn-sm fas fa-trash-alt remove-education "></i>

                                            </div>
                                        </div>

                                    </div>
                                @endforeach

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

                                @foreach ($experience as $exp)
                                    <div class="col experience-repeat">
                                        {{-- <fieldset style="border: 1px solid #000; padding: 10px; margin:10px;"> --}}
                                        <div class="form-row">
                                            <div class="form-group col-sm-3">
                                                <label for="organization">Organization Name:</label>
                                                <input type="text" id="organization" name="organization[]"
                                                    class="form-control"
                                                    value="{{ old('organization', $exp->organization) }}" />
                                                @error('organization')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="position">Position:</label>
                                                <input type="text" id="position" name="position[]"
                                                    class="form-control" value="{{ old('position', $exp->position) }}" />
                                                @error('position')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="job_description">Job description:</label>
                                                <input type="textarea" id="job_description" name="job_description[]"
                                                    class="form-control"
                                                    value="{{ old('job_description', $exp->job_description) }}" />
                                                @error('job_description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="start_date">Start-Date:</label>
                                                <input type="date" id="start_date" name="start_date[]"
                                                    class="form-control"
                                                    value="{{ old('start_date', $exp->start_date) }}" />
                                                @error('start_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <label for="end_date">End-date:</label>
                                                <input type="date" id="end_date" name="end_date[]"
                                                    class="form-control" value="{{ old('end_date', $exp->end_date) }}" />
                                                @error('end_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-1 mt-3 pt-3">
                                                <i
                                                    class="btn btn-danger btn-sm float-right fas fa-trash-alt remove-experience"></i>
                                            </div>
                                        </div>
                                        {{-- </fieldset> --}}
                                    </div>
                                @endforeach

                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-info btn-sm float-left" onclick="toggleFormTwo()"
                                    id="toggleFormTwo">Previous</a>
                                <button type="submit" class="btn btn-dark float-right">Submit</button>
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
            } else {
                preview.src = "{{ asset($doctor->image) }}";
            }
        }
    </script>
@endsection
