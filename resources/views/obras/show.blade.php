<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Información de la Obra') }}
        </h2>
    </x-slot>
    <div class="gap-4 space-y-4 md:space-y-0 mx-4 py-6">
        @props(['obra'])
        <x-card>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="py-3 px-5 mt-0 bg-white dark:bg-gray-800 shadow sm:rounded-lg" >
                    <!--El nombre de la obra es un enlace para mostrar la información completa de la obra-->
                    <h3> 
                        <label class="text-black dark:text-white font-bold">Nombre de la Obra: </label>
                        <label class="text-black dark:text-white">
                            {{$obra->nombre_obra}}
                        </label>
                    </h3>
                    <div class="text-base">
                        <label class="text-black dark:text-white font-bold">Número de obra: </label>
                        <label class="text-black dark:text-white">{{$obra->numero_obra}}</label>
                    </div>
                    <div class="text-base">
                        <label class="text-black dark:text-white font-bold">Fuente de Financiamiento: </label>
                        <label class="text-black dark:text-white">{{$obra->pgi->fuenteFinanciamiento->clave_fondo}}</label>
                    </div>
                    <div class="text-base">
                        <label class="text-black dark:text-white font-bold">Costo Total Aprobado: </label>
                        <label class="text-black dark:text-white">{{$obra->estructuraFinancieraAprobada->first()->costo_total}}
                        </label>
                    </div> 
                    <div class="text-base">
                        <label class="text-black dark:text-white font-bold">Localidad: </label>
                        <label class="text-black dark:text-white">{{$obra->localidad->nombre_localidad}}</label>
                    </div> 
                    <div class="text-base">
                        <label class="text-black dark:text-white font-bold">Programa: </label>
                        <label class="text-black dark:text-white">{{$obra->programa->nombre_programa}}</label>
                    </div> 
                    <div class="text-base">
                        <label class="text-black dark:text-white font-bold">Subprograma: </label>
                        <label class="text-black dark:text-white">{{$obra->subprograma->nombre_subprograma}}</label>
                    </div> 
                    <div class="text-base">
                        <label class="text-black dark:text-white font-bold">Tipología: </label>
                        <label class="text-black dark:text-white">{{$obra->tipologia->nombre_tipologia}}</label>
                    </div> 
                </div>
            </div>
        </x-card>
    </div>
</x-app-layout>
