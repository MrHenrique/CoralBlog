<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="{{ URL::asset('css/mdb.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <link rel="icon" href="{{ URL::asset('images/favicon.png') }}">
</head>

<body>
    <header>
        <style>
            #intro {
                margin-top: 58px;
            }

            @media (max-width: 991px) {
                #intro {
                    margin-top: 45px;
                }
            }
        </style>

        <nav class="navbar navbar-expand-lg navbar bg-black fixed-top">
            @include('partials.nav')
        </nav>

        <div id="intro" class="p-5 text-center bg-lighter">
            @yield('header-intro')
        </div>

    </header>

    <main class="my-5">

    </main>
    @yield('main')
    <footer class="bg-black text-lg-start fixed-bottom">
        @include('partials.footer')
    </footer>
    <script type="text/javascript" src="{{ URL::asset('js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>

</html>
