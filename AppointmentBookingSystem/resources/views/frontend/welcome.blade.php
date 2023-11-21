<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background-image: url('https://wallpaperaccess.com/full/619974.jpg');">

    <nav class="navbar navbar-expand-sm" style=" backdrop-filter: blur(1px); background-color:#d5e8f2; ">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="{{ asset('images/AdminLTELogo.png') }}" alt="Appointment Booking Sysyem" style="width:40px;"
                    class="rounded-pill">
            </a>
        </div>
    </nav>
    <div class="container-fluid ">
        <div class="content " style="text-align:center; padding-top:20%;">
            <h1>Book Your Appointment</h1>
            <a href="/appointment" class="btn btn-primary btn-sm" role="button">
                Book an Appointment
            </a>
        </div>
    </div>


</body>


</html>
