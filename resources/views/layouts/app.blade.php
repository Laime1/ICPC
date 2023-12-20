<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ICPC') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <x-jet-banner />

        <div class="min-h-screen bg-blue-200">
        <div class="min-h-screen">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="custom-main-color"> <!-- Agrega la clase personalizada -->
                {{ $slot }}
            </main>
        </div>

        <footer class="text-center position-f py-3">
            <!-- Contenido del pie de página -->
            <p>&copy; 2023 ICPC Sinteg. Todos los derechos reservados.</p>
            <style>
            footer{
                background-color:  #B93A5A;
                color: white;
                bottom: 0;
                width: 100%;
                height: 50px;
                align-self: flex-end;
            }
            </style>
        </footer>
        @stack('modals')

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
