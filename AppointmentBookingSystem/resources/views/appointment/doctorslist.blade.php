<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .navbar-brand {
            font-family: Helvetica;
        }

        body {
            background-image: url('https://c1.wallpaperflare.com/preview/937/818/491/stethoscope-doctor-md-medical-health-hospital.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
            height: 100vh;
            width: 100vw;
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
    <div class="content">
        <div class="container">
            <h2> Choose appointmenet schedule of preferred doctor</h2>
            @forelse ($doctors as $doctor)
                @if ($doctor->schedule->isNotEmpty())
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
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>date</th>
                                            <th>time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctor->schedule->groupBy('date_bs') as $date => $schedulesByDate)
                                            <tr>
                                                <td>{{ $date }}</td>
                                                <td>
                                                    @foreach ($schedulesByDate as $key)
                                                        <button type="button" class="btn btn-info "
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#myModal-{{ $key->id }}">
                                                            {{ $key->start_time . ' - ' . $key->end_time }}
                                                        </button>

                                                        <div class="modal fade" id="myModal-{{ $key->id }}">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header text-center"
                                                                        style="background-color: #17a2b8;color:white">
                                                                        <h4 class="modal-title text-center">Book
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
                                                                                    <label for="mname">Middle
                                                                                        Name:</label>
                                                                                    <input type="text" id="mname"
                                                                                        name="mname"
                                                                                        class="form-control" />
                                                                                    @error('mname')
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
                                                                            </div>

                                                                            <div class="form row">
                                                                                <div class="form-group col">
                                                                                    <label for="dob_bs">Date Of
                                                                                        Birth
                                                                                        No:</label>
                                                                                    <input type="date"
                                                                                        id="dob_bs" name="dob_bs"
                                                                                        class="form-control" />
                                                                                    @error('dob_bs')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="form-group col">
                                                                                    <label for="remakrs">Remarks
                                                                                        No:</label>
                                                                                    <input type="text"
                                                                                        id="remakrs" name="remakrs"
                                                                                        class="form-control" />
                                                                                    @error('remakrs')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>

                                                                                <input type="hidden" name="doctor_id"
                                                                                    value="{{ $key->doctor->id }}">
                                                                                <input type="hidden"
                                                                                    name="schedule_id"
                                                                                    value="{{ $key->id }}">
                                                                                <input type="hidden"
                                                                                    name="booking_date_bs"
                                                                                    id="booking_date_bs"
                                                                                    value="{{ $key->date_bs }}">
                                                                                <input type="hidden"
                                                                                    name="booking_date_ad"
                                                                                    value="{{ $key->date_ad }}">

                                                                                <div class="form-group col pt-4  ">
                                                                                    <button type="submit"
                                                                                        class="btn btn-dark float-right">Submit</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </td>
                                            </tr>
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
                                <!-- This doctor has no schedule -->
                                <div class="text-center">
                                    <p>Sorry! No schedule found for {{ $doctor->fname . ' ' . $doctor->lname }}
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

    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
