<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <!-- Contenedor de Botones-->
    <body class="bg-gray-100">
    <div class="container mx-auto p-8"> 
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8 py-3 px-5 mt-0">
            <a href="{{ route('pgis.create') }}" class="py-3 px-5 mt-0 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-black dark:text-white">
                <span>Registro de Programa General de Inversión </span>
            </a>
            <a href="{{ route('obras.create') }}" class="py-3 px-5 mt-0 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-black dark:text-white">
                <span>Registro de Obras</span>
            </a>
            <a href="{{ route('register') }}" class="py-3 px-5 mt-0 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-black dark:text-white">
                <span>Registro de Usuario</span>
            </a>
        </div>
    </div>
    </body>
</x-app-layout>
