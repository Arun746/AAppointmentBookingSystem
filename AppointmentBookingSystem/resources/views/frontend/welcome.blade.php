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
            margin: 0;
            padding: 0;
            background-image: url('https://i.pinimg.com/1200x/21/54/cd/2154cd17b398cf202ab361615fe313af.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100vw;
        }

        .card {
            box-shadow: 30px 0 20px #17315d;
            background-color: #c6d1e7;
            border-radius: 10px;
            height: 70vh;
            width: 90%;
            max-width: 400px;
            margin-left: 4%;
            margin-top: 9%;
        }

        .card-title {
            text-align: center;
            margin: 10%;
            font-family: Georgia;
            text-shadow: 2px 1px 1px #17315d;
        }

        .card-text {
            text-align: center;
            margin: 10%;
            padding: 2px;
        }

        .btn-booknow {
            margin-left: 38%;
            margin-top: 15%;
            background-color: #1d2f4f;
            color: #c6d1e7;

        }

        .btn-booknow:hover {
            background-color: #1994ba;
            color: #c6d1e7;
        }

        .btn {
            background-color: #1d2f4f;
            color: #c6d1e7;
        }

        .btn:hover {
            background-color: #1994ba;
            color: #c6d1e7;
        }


        .nav-item {
            margin: 4px;
        }

        .nav-link:hover {
            background-color: #a0d3e2;
            color: #3b4966;
            border-radius: 10px;
        }
    </style>



</head>

<body>
    @inject('menubar_helper', 'App\Helpers\MenubarHelper')
    {{-- $menuItems = $menus->list(); --}}
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
                            <li class="nav-item"><a class="nav-link" href="">{{ $menu->name }}</a> </li>
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


    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Book Smart, Save Time</h2>
                        <p class="card-text">Your journey to optimal health starts here. Elevate your healthcare
                            experience with our efficient booking system and say goodbye to long waiting times and hello
                            to prioritized care.</p>
                        <a href="/appointment" class="btn btn-booknow">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


</html>
