<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('page-title') | Laravel DC Comics</title>

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
