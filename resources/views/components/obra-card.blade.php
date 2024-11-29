@props(['obra'])

<x-card>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="py-3 px-5 mt-0 bg-white dark:bg-gray-800 shadow sm:rounded-lg" >
            <!--El nombre de la obra es un enlace para mostrar la información completa de la obra-->
            <h3 class="text-base font-bold"> 
                <a href="/obras/{{$obra->id}}" class="text-black dark:text-white">
                    {{$obra->nombre_obra}}
                </a>
            </h3>
            <div class="text-base">
                <label class="text-black dark:text-white font-bold">Número de obra: </label>
                <label class="text-black dark:text-white">{{$obra->numero_obra}}</label>
            </div>
            <div class="text-base">
                <label class="text-black dark:text-white font-bold">Localidad: </label>
                <label class="text-black dark:text-white">{{$obra->localidad->nombre_localidad}}</label>
            </div> 
        </div>
    </div>
</x-card>