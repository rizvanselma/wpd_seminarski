<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Seminarski')</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header class="bg-white w-full block mb-32">
            <div class="flex items-center justify-between w-full p-4">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('logoipsum-284.svg') }}" alt="Logo" class="h-10 w-auto">
                </a>

                <nav class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 font-medium">Kontrolna ploca</a>
                        <a href="{{ route('auth.logout') }}" class="text-gray-700 hover:text-blue-600 font-medium">Odjava</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium">Prijava</a>
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600 font-medium">Registracija</a>
                    @endauth
                </nav>
            </div>
        </header>

        {{-- {{ dd(Route::getRoutes() )}} --}}

        <main class="container mx-auto px-3 pb-12">
            @yield('content')
        </main>
    </body>
</html>
