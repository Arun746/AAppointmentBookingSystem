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
    @inject('page_helper', 'App\Helpers\PageHelper')

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

                            <button id="toggleLanguage" onclick="toggleLanguage()">Toggle Language</button>
                        </div>
                    </div>
                    <div class="row" id="languageContent">
                        @foreach ($page_helper->list() as $page)
                            <h2>{{ is_array($page->title) ? implode(', ', $page->title) : $page->title }}</h2>
                            <p>{{ is_array($page->description) ? implode(', ', $page->description) : $page->description }}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    @include('frontend.footer')
</body>
{{-- <script>
    function toggleLanguage() {
        var languageContent = document.getElementById('languageContent');
        var currentLanguage = languageContent.getAttribute('data-language');

        // Toggle between English and Nepali
        if (currentLanguage === 'en') {
            // Switch to Nepali
            renderContent({!! json_encode($page_helper->list('ne')) !!});
            languageContent.setAttribute('data-language', 'ne');
        } else {
            // Switch to English
            renderContent({!! json_encode($page_helper->list('en')) !!});
            languageContent.setAttribute('data-language', 'en');
        }
    }

    function renderContent(data) {
        var html = '';
        data.forEach(function(page) {
            html += '<h2>' + (page.title[currentLanguage] || '') + '</h2>';
            html += '<p>' + (page.description[currentLanguage] || '') + '</p>';
        });
        document.getElementById('languageContent').innerHTML = html;
    }
</script> --}}


</html>
