<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css"
        rel="stylesheet" type="text/css" />
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
            background-image: url('https://c1.wallpaperflare.com/preview/937/818/491/stethoscope-doctor-md-medical-health-hospital.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
            height: 100vh;
            width: 100vw;
        }



        .btn {
            background-color: #1d4f47;
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
            <!-- Toggler button for small screens -->
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
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>

    <div class="content">
        <div class="container">
            <h2> Choose appointmenet schedule of preferred doctor</h2>
            @forelse ($doctors as $doctor)
                @if ($doctor->filteredSchedules->isNotEmpty())
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mb-4  card-outline">
                                <div class="card-body box-profile ">
                                    <div class="text-center">
                                        <div class="card-body text-center">
                                            <img class="profile-user-img img-fluid img-circle "
                                                src="{{ asset('storage/' . $doctor->image) }}" alt="Profile Image">
                                            <p class="text-bold">
                                                {{ $doctor->fname . '' . $doctor->mname . '' . $doctor->lname }}
                                            </p>
                                            <p>
                                                {{ $doctor->specialization }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 h-100">
                            <div class="card">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>date</th>
                                            <th>time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctor->filteredSchedules as $date => $schedulesByDate)
                                            <tr>
                                                <td>{{ $date }}</td>
                                                <td>

                                                    @foreach ($schedulesByDate as $key)
                                                        @if ($key->status == 'occupied')
                                                            <button type="button" class="btn btn-danger" disabled>
                                                                {{ $key->start_time . ' - ' . $key->end_time }}
                                                            </button>
                                                        @else
                                                            <button type="button" class="btn btn-info"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#myModal{{ $key->id }}">
                                                                {{ $key->start_time . ' - ' . $key->end_time }}
                                                            </button>
                                                        @endif
                                                    @endforeach

                                                    @foreach ($schedulesByDate as $key)
                                                        <div class="modal fade" id="myModal{{ $key->id }}">
                                                            <div class="modal-dialog modal-md">
                                                                <div class="modal-content">
                                                                    <div class="modal-header text-center"
                                                                        style="background-color: #17a2b8;color:white">
                                                                        <h4 class="modal-title text-center">

                                                                            Book
                                                                            Your
                                                                            appointment</h4>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"></button>
                                                                    </div>


                                                                    <div class="modal-body">

                                                                        <form method="post"
                                                                            action="{{ route('appointment.store') }}">
                                                                            @csrf

                                                                            <div class="form row">
                                                                                <div class="form-group col">
                                                                                    <label for="fname">First
                                                                                        Name:</label>
                                                                                    <input type="text" id="fname"
                                                                                        name="fname"
                                                                                        class="form-control" />
                                                                                    @error('fname')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="form-group col">
                                                                                    <label for="lname">Last
                                                                                        Name:</label>
                                                                                    <input type="text" id="lname"
                                                                                        name="lname"
                                                                                        class="form-control" />
                                                                                    @error('lname')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="form row">
                                                                                <div class="form-group col">
                                                                                    <label for="email">Email:</label>
                                                                                    <input type="email" id="email"
                                                                                        name="email"
                                                                                        class="form-control" />
                                                                                    @error('email')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="form-group col">
                                                                                    <label
                                                                                        for="address">Address:</label>
                                                                                    <input type="text"
                                                                                        id="address" name="address"
                                                                                        class="form-control" />
                                                                                    @error('address')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>


                                                                            </div>

                                                                            <div class="form row">
                                                                                <div class="form-group col">
                                                                                    <label for="dob_bs">Date Of
                                                                                        Birth
                                                                                        :</label>

                                                                                    <input type="text"
                                                                                        id="dob_bs{{ $key->id }}"
                                                                                        name="dob_bs"
                                                                                        class="form-control" />
                                                                                    @error('dob_bs')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="form-group col">
                                                                                    <label for="contact">Contact
                                                                                        No:</label>
                                                                                    <input type="tel"
                                                                                        id="contact" name="contact"
                                                                                        class="form-control" />
                                                                                    @error('contact')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>


                                                                                <input type="hidden" name="doctor_id"
                                                                                    value="{{ $key->doctor->id }}">
                                                                                <input type="hidden"
                                                                                    name="schedule_id"
                                                                                    value="{{ $key->id }}">

                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="form-group col pt-2">
                                                                                    @if (config('services.recaptcha.key'))
                                                                                        <div class="g-recaptcha"
                                                                                            name="g-recaptcha"
                                                                                            data-sitekey="{{ config('services.recaptcha.key') }}">
                                                                                            {{ config('services.recaptcha.key') }}
                                                                                        </div>
                                                                                    @endif
                                                                                    <div class="mt-2">
                                                                                        <button type="submit"
                                                                                            class="btn btn-dark float-right">Submit</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </form>
                                                                    </div>
                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            $('#dob_bs{{ $key->id }}').nepaliDatePicker({
                                                                                container: '#myModal{{ $key->id }}',
                                                                                ndpYear: true,
                                                                                ndpMonth: true,
                                                                                ndpYearCount: 10,
                                                                                // disableDaysAfter: 0
                                                                            });


                                                                        });
                                                                    </script>
                                                                    <script>
                                                                        document.addEventListener('DOMContentLoaded', function() {
                                                                            document.querySelector('.btn-dark').addEventListener('click', function() {
                                                                                grecaptcha.ready(function() {
                                                                                    grecaptcha.execute('{{ config('services.recaptcha.key') }}', {
                                                                                            action: 'submit'
                                                                                        })
                                                                                        .then(function(token) {
                                                                                            // Check if the token is valid before submitting the form
                                                                                            if (token) {
                                                                                                document.querySelector('form').submit();
                                                                                            } else {
                                                                                                // Handle the case where reCAPTCHA verification fails
                                                                                                alert('Please verify that you are not a robot.');
                                                                                            }
                                                                                        });
                                                                                });
                                                                            });
                                                                        });
                                                                    </script>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach


                                                </td>
                                            </tr>
                                            {{-- @else
                                                <h4>no Schedule found</h4>
                                            @endif --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mb-4 card-secondary card-outline">
                                <div class="card-body box-profile ">
                                    <div class="text-center">
                                        <div class="card-body text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ asset('storage/' . $doctor->image) }}" alt="Profile Image">
                                            <p class="text-bold">
                                                {{ $doctor->fname . '' . $doctor->mname . '' . $doctor->lname }}
                                            </p>
                                            <p>
                                                {{ $doctor->specialization }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 h-100">
                            <div class="card">

                                <div class="text-center">
                                    <p>Sorry! No schedules available for tomorrow and after tomorrow for
                                        {{ $doctor->fname . ' ' . $doctor->lname }}
                                        😢</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="text-center">
                    <p>Sorry ! No doctors found for this Department😢</p>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js"
        type="text/javascript"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>
