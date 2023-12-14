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

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100vw;
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
    {{-- @inject('page_helper', 'App\Helpers\PageHelper') --}}

    @include('frontend.navbar')
    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <section class="dynamic" style="height: 800px">
        <div class="container m-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col text-right">
                            <div>
                                <button onclick="showContent('en')">EN</button>
                                <button onclick="showContent('ne')">NE</button>
                            </div>
                        </div>
                    </div>
                    <div id="contentToShow">
                        <div class="english" style="display:show">
                            <h2>{{ $id->title['en'] }}</h2>
                            <hr>
                            <p>{!! $id->description['en'] !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    @include('frontend.footer')
</body>
<script>
    function showContent(language) {
        var contentContainer = document.getElementById('contentToShow');
        if (language === 'en') {
            contentContainer.innerHTML = '<h2>{{ $id->title['en'] }}</h2>' +
                '<p>{{ $id->description['en'] }}</p>';
        } else if (language === 'ne') {
            contentContainer.innerHTML = '<h2>{{ $id->title['ne'] }}</h2>' +
                '<p>{{ $id->description['ne'] }}</p>';
        }
    }
</script>

</html>
