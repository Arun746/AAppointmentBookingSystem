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
    <div class="dept">
        <h2>Choose Department</h2>
        <div class="container-fluid">
            <div class="row">
                @foreach ($departments as $department)
                    <div class="col-sm-4">
                        <a href="{{ route('appointment.show', $department->id) }}">
                            <div class="card" style="background-color: #c0daea">
                                <div class="card-header ">
                                    <div class="card-title">
                                        <h4>{{ $department->departmentName }} </i></h4>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $doctorsInDepartment = $department->doctor->where('department_id', $department->id);
                                            $doctorCount = $doctorsInDepartment->count();
                                        @endphp
                                        <h3 class="text-center">{{ $doctorCount }}</h3>

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
