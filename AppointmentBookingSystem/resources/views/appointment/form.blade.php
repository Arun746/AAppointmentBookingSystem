<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .navbar-brand {
            font-family: Helvetica;
        }

        body {
            margin: 0;
            padding: 0;
            background-image: url('https://c1.wallpaperflare.com/preview/937/818/491/stethoscope-doctor-md-medical-health-hospital.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
            height: 100vh;
            width: 100vw;
        }

        .card {
            box-shadow: 10px 0 5px #17315d;
            margin: 10px;

            background-color: #c6d1e7;
            height: 200px;
        }

        .card-text {
            padding-top: 30px;
            text-align: center;
        }

        .heading {
            padding-left: 25px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm" style="backdrop-filter: blur(1px); background-color: #c6d1e7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/AdminLTELogo.png') }}" alt="Appointment Booking System" style="width:40px;"
                    class="rounded-pill">
                HEALTHCARE
            </a>

            <!-- Toggler button for small screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item"><a class="nav-link " href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link " href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link " href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="dept">
        <h2 class="heading">Choose Department</h2>
        <div class="container-fluid">
            <div class="row">
                @foreach ($departments as $department)
                    <div class="col-lg-4">
                        <a href="{{ route('appointment.show', $department->id) }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h4>{{ $department->departmentName }} </h4>
                                    </div>
                                    @php
                                        $doctorsInDepartment = $department->doctor->where('department_id', $department->id);
                                        $doctorCount = $doctorsInDepartment->count();
                                    @endphp
                                    <h3 class="card-text">{{ $doctorCount }}</h3>
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
