<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>

    <nav class="navbar navbar-expand-sm" style="background-color:#d5e8f2; backdrop-filter: blur(1px);">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="{{ asset('images/AdminLTELogo.png') }}" alt="Appointment Booking System" style="width:40px;"
                    class="rounded-pill">
            </a>
        </div>
    </nav>
    {{-- <div class="container-fluid ">

        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card mt-3 p-3">
                    <form method="post" action="">
                        @csrf
                        <div class="card-header">
                            adshdfvsadh
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-sm-2">
                                    <label for="departmentSelect">Choose Department:</label>
                                    <select id="departmentSelect" class="form-control">
                                        <option value="">Select Department</option>
                                        @foreach ($department as $dept)
                                            <option value="{{ $dept->id }}">
                                                {{ $dept->departmentName }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="doctorSelect">Choose Doctor:</label>
                                    <select name="doctor_id" id="doctorSelect" class="form-control">
                                        <option value="">Select Doctor</option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->id }}"
                                                data-department="{{ $doctor->department_id }}">
                                                {{ $doctor->fname . ' ' . $doctor->mname . ' ' . $doctor->lname }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm float-right">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('departmentSelect').addEventListener('change', function() {
            var selectedDepartment = this.value;
            var doctorSelect = document.getElementById('doctorSelect');

            // Reset doctor options
            doctorSelect.innerHTML = '<option value="">Select Doctor</option>';

            // Filter doctors based on the selected department
            @foreach ($doctors as $doctor)
                if ("{{ $doctor->department_id }}" == selectedDepartment) {
                    var option = document.createElement('option');
                    option.value = "{{ $doctor->id }}";
                    option.text = "{{ $doctor->fname . ' ' . $doctor->mname . ' ' . $doctor->lname }}";
                    doctorSelect.appendChild(option);
                }
            @endforeach
        });
    </script> --}}



    <div class="dept">
        <h2>Choose Department</h2>
        <div class="container-fluid">
            <div class="row">
                @foreach ($departments as $department)
                    <div class="col-md-4">
                        <a href="{{ route('appointment.show', $department->id) }}">
                            <div class="card">
                                <div class="card-header ">
                                    <div class="card-title">
                                        <h4>{{ $department->departmentName }}</h4>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $doctorsInDepartment = $department->doctor->where('department_id', $department->id);
                                            $doctorCount = $doctorsInDepartment->count();
                                        @endphp
                                        <h1 class="text-center">{{ $doctorCount }}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
