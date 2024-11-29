<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("¡Inicio de Sesión Exitoso!") }}
                </div>
            </div>
        </div>
        <body class="bg-gray-100">
        <div class="container mx-auto p-8">
            <h1 class="text-3xl font-bold text-center mx-4 py-6 text-black dark:text-white">
                Menú Principal
            </h1>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-3 px-5 mt-0">
                <a href="" class="py-3 px-5 mt-0 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-black dark:text-white">
                    <span>Programas de Inversión</span>
                </a>
                <a href="{{ route('obras.create') }}" class="py-3 px-5 mt-0 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-black dark:text-white">
                    <span>Registro de Obras</span>
                </a>
                <a href="" class="py-3 px-5 mt-0 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-black dark:text-white">
                    <span>Contratos</span>
                </a>
                <a href="" class="py-3 px-5 mt-0 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-black dark:text-white">
                    <span>Fianzas</span>
                </a>
            </div>
        </div>
        </body>
    </div>
</x-app-layout>
