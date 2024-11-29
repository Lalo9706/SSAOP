<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fuentes / Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.4/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col min-h-screen"> <!-- Se ha colocado flex y flex-col para que el contenido ocupe todo el espacio disponible en la pantalla y así el pie de página se vaya al fondo.-->
            @include('layouts.navigation')

            <!-- Encabezado de la Página / Page Heading-->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Contenido de la Página / Page Content-->
            <main class="flex-grow">
                {{ $slot }}
            </main>     
            
            <footer class="bg-white dark:bg-gray-800 shadow mt-4">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center text-gray-500 dark:text-gray-400">
                    © {{ date('Y') }} {{ config('app.name', 'SSAOP') }} {{ __('Todos los derechos reservados.') }}
                </div>
            </footer> 
        </div>        
    </body>
</html>
