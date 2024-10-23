<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('page-title') | Laravel Start 1</title>

        {{-- Stili nell'head --}}
        <link rel="stylesheet" href="css/style.css">

        {{-- <!-- Includiamo gli assets con la direttiva @vite --> --}}
        @vite('resources/js/app.js')

        @yield('head-imports')
    </head>
    <body>

        @include('partials.header')

        <main>
            <div class="container">

                <div class="row">

                    <div class="col">

                        <div>
                            <img class="gatto-img" src="{{ Vite::asset('resources/img/gatto.webp') }}" alt="Gatto">
                        </div>

                        <div class="gatto-bg">
                            QUESTO DIV AVRA' COME SFONDO IL GATTO
                        </div>

                        @yield('main-content')

                    </div>

                </div>

            </div>
        </main>

        @include('partials.footer')

        {{-- JS da importare nel body --}}
        @yield('body-imports')
    </body>
</html>
