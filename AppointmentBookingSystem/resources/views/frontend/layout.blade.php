<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style>
        .navbar-brand {
            font-family: Helvetica;
        }

        section.main {
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
    @include('frontend.navbar')
    {{-- injecting FAQHelper --}}
    @inject('faq_helper', 'App\Helpers\FAQHelper')

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    <section class="main">
        <div class="container m-6">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Book Smart, Save Time</h2>
                            <p class="card-text">Your journey to optimal health starts here. Elevate your
                                healthcare
                                experience with our efficient booking system and say goodbye to long waiting
                                times and
                                hello
                                to prioritized care.</p>
                            <a href="/appointment" class="btn btn-booknow">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="additional-section" style="height: 800px">
        <div class="container">
            <h2 class="text-center col-12 mt-4 mb-4" style="color: #162e65">Frequently Asked Questions
            </h2>

            @if ($faq_helper->list()->isEmpty())
                <p>No FAQs available.</p>
            @else
                <dl>
                    <div class="row ">
                        @foreach ($faq_helper->list() as $faq)
                            <div class="col-6 p-4">
                                <dt>{{ $faq->question }}</dt>
                                <dd>{{ $faq->answer }}</dd>
                            </div>
                        @endforeach

                    </div>

                </dl>
            @endif
        </div>
        </div>
    </section>
    @include('frontend.footer')

</body>




</html>
