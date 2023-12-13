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

        .nav-item {
            margin: 4px;
        }

        .nav-link:hover {
            background-color: #a0d3e2;
            color: #3b4966;
            border-radius: 10px;
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

        .btn {
            background-color: #1d2f4f;
            color: #c6d1e7;
        }

        .btn:hover {
            background-color: #1994ba;
            color: #c6d1e7;
        }
    </style>
</head>

<body>
    @inject('menubar_helper', 'App\Helpers\MenubarHelper')
    <nav class="navbar navbar-expand-sm" style="backdrop-filter: blur(1px); background-color: #c6d1e7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/AdminLTELogo.png') }}" alt="Appointment Booking System" style="width:40px;"
                    class="rounded-pill">
                A.HEALTHCARE
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="/">Home</a>
                    </li>
                    @foreach ($menubar_helper->list() as $menu)
                        @if ($menu->type == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $menu->module->link }}">{{ $menu->name }}</a>
                            </li>
                        @elseif ($menu->type == 2)
                            <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">{{ $menu->name }}</a>
                            </li>
                        @else
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ $menu->external_link }}">{{ $menu->name }}</a> </li>
                        @endif
                    @endforeach
                    <li class="nav-item">
                        <a href="/login" class=" btn">login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="dept">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info text-center mt-2 ">
                            <h4> Choose Department</h4>
                        </div>
                    </div>
                    @foreach ($departments as $department)
                        <div class="col-lg-3">
                            <a href="{{ route('appointment.show', $department->id) }} " class="text-decoration-none">
                                <div class="card">
                                    <div class="card-body ">
                                        <div class="card-title ">
                                            <h5>Department :
                                                {{ $department->departmentName }} </h5>

                                        </div>
                                        <h3 class="card-text">{{ $department->doctorCount }}</h3>
                                        <p class="card-text">Doctors Available</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>
