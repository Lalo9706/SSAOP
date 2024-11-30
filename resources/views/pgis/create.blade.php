<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar un Programa General de Inversión (PGI)') }}
        </h2>
    </x-slot>
    <!-- Estilo del Formulario -->
    <div class="flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <!--Formulario-->
            <form method="POST" action="{{ route('pgis.store') }}" enctype="multipart/form-data">
                @csrf <!-- Token de seguridad -->

                <!-- Combo-box de Fuentes de Financiamiento -->
                <div class="py-2">
                    <x-input-label for="fuente_financiamiento_id" :value="__('Fuente de Financiamiento')" />
                    <select name="fuente_financiamiento_id" id="fuente_financiamiento_id" 
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                    bg-white text-black dark:bg-gray-800 dark:text-white dark:border-gray-600" :disabled="!fuentesFinanciamiento.length">
                        <option value="">Selecciona la Fuente de Financiamiento</option>
                        @foreach($fuentesFinanciamiento as $fuenteFinanciamiento)
                            <option value="{{ $fuenteFinanciamiento->id }}">{{ $fuenteFinanciamiento->clave_fondo }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Combo-box de Municipios -->
                <div class="py-2">
                    <x-input-label for="municipio_id" :value="__('Municipio')" />
                    <select name="municipio_id" id="municipio_id" 
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                    bg-white text-black dark:bg-gray-800 dark:text-white dark:border-gray-600" :disabled="!municipios.length">
                        <option value="">Selecciona el Municipio</option>
                        @foreach($municipios as $municipio)
                            <option value="{{ $municipio->id }}">{{ $municipio->clave_municipio }} - {{ $municipio->nombre_municipio }}</option>
                        @endforeach
                    </select>
                </div>

                <!--Campo de Texto - Ejercicio Fiscal-->
                <div class="py-2" x-show="activeTab === 'tab1'">
                    <x-input-label for="ejercicio_fiscal" :value="__('Ejercicio Fiscal')" />
                    <x-text-input id="ejercicio_fiscal" class="block mt-1 w-full" type="text" placeholder="Introduzca el año"
                    name="ejercicio_fiscal" :value="old('ejercicio_fiscal')" required autofocus autocomplete="ejercicio_fiscal" />
                    <x-input-error :messages="$errors->get('ejercicio_fiscal')" class="mt-2" />
                </div>
                
                <!--Campo númerico - Monto Aprobado-->
                <div class="py-2" x-show="activeTab === 'tab2'">
                    <x-input-label for="monto_aprobado" :value="__('Monto Aprobado')" />
                    <div class="flex py-2">
                        <span class="mt-1 px-3 py-2 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                        text-black dark:text-white rounded-l-md">$</span> <!--Simbolo $-->
                        <x-text-input id="monto_aprobado" 
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                            type="number" name="monto_aprobado" :value="old('monto_aprobado')" required step="0.01" min="0" placeholder="0.00"
                        />
                    </div>
                </div>

                 <!-- Botón de Registro-->
                 <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Registrar PGI') }}
                    </x-primary-button>
                </div>
            </form>
            <script>
                
                
            </script>
        </div>
    </div>
</x-app-layout>