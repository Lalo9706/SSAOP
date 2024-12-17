<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Obras en Desarrollo') }}
        </h2>
    </x-slot>
    <div class="gap-4 space-y-4 md:space-y-0 mx-4 py-6">
        @unless (count($obras) == 0) <!--Hasta que el conteo de obras sea igual a 0-->    
            <!--Se ejecutará este bucle para mostrar cada una de las obras del arreglo-->
            @foreach($obras as $obra)
                <x-obra-card :obra="$obra" />
            @endforeach
        @else
        <p>No se encontraron obras activas</p>
        @endunless
    </div>
        
    <div class="m-6 p-4">
        {{$obras->links()}}
    </div>

</x-app-layout>