<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar una Obra') }}
        </h2>
    </x-slot>
    <!-- Estilo del Formulario -->
    <div class="flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <!--Formulario-->
            <form method="POST" action="{{ route('obras.store') }}" enctype="multipart/form-data">
                @csrf <!-- Token de seguridad -->

                <div x-data="{ activeTab: 'tab1' }">
                    <!-- Navegación de Pestañas -->
                    <div class="flex border-b">
                        <button type="button" 
                        @click="activeTab = 'tab1'" 
                        :class="{
                            'bg-gray-100 text-black dark:text-black font-bold': activeTab === 'tab1',
                            'bg-indigo-500 text-black dark:text-white': activeTab !== 'tab1'
                        }" 
                        class="py-2 px-4 border-b-2 focus:outline-none">
                            Datos Básicos
                        </button>

                        <button type="button" 
                        @click="activeTab = 'tab2'" 
                        :class="{
                            'bg-gray-100 text-black dark:text-black font-bold': activeTab === 'tab2',
                            'bg-indigo-500 text-black dark:text-white': activeTab !== 'tab2'
                        }" 
                        class="py-2 px-4 border-b-2 focus:outline-none">
                            Estructura Financiera
                        </button>

                        <button type="button" 
                        @click="activeTab = 'tab3'" 
                        :class="{
                            'bg-gray-100 text-black dark:text-black font-bold': activeTab === 'tab3',
                            'bg-indigo-500 text-black dark:text-white' : activeTab !== 'tab3'
                        }" 
                        class="py-2 px-4 border-b-2 focus:outline-none">
                            Metas
                        </button>
                    </div>
                    <!-- Fin navegación de Pestañas -->

                    <!-- CAMPOS DE DATOS BÁSICOS -->
                    <h3 class="font-semibold text-lg text-center text-gray-800 dark:text-gray-200 leading-tight py-3" x-show="activeTab === 'tab1'">
                        {{ __('Datos Básicos') }}
                    </h3>
                    <!--Conjunto de combo-boxes para la selección del PGI y la Localidad-->
                    <div x-data="localidades" x-show="activeTab === 'tab1'">
                        <!-- Combo-box para seleccionar PGI -->
                        <div class="py-2">
                            <x-input-label for="pgi_id" :value="__('Programa General de Inversión')" />
                            <select name="pgi_id" id="pgi_id"
                            x-model="pgiSeleccionado" @change="filtrarMunicipiosYLocalidades()"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            bg-white text-black dark:bg-gray-800 dark:text-white dark:border-gray-600">
                                <option value="">Selecciona el PGI</option>
                                @foreach ($pgis as $pgi)
                                    <option value="{{ $pgi->id }}">{{ $pgi->fuenteFinanciamiento->clave_fondo }} - {{ $pgi->ejercicio_fiscal }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Combo-box de Municipio (invisible o deshabilitado)
                        ** Este combo box no es necesario ya que solo hay un municipio asociado a cada PGI, 
                        ** por lo que el script lo seleccionará automaticamente.
                        <div class="py-2">
                            <x-input-label for="municipio_id" :value="__('Municipio')" />
                            <select name="municipio_id" id="municipio_id"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            bg-white text-black dark:bg-gray-800 dark:text-white dark:border-gray-600"
                            x-model="municipioSeleccionado" x-bind:disabled="municipios.length === 0">
                                <option value="">Selecciona el Municipio</option>
                                <template x-if="municipios.length > 0">
                                    <option :value="municipioSeleccionado" x-text="municipios[0].nombre_municipio"></option>
                                </template>
                            </select>
                        </div>
                        -->

                        <!-- Combo-box para seleccionar Localidad -->
                        <div class="py-2">
                            <x-input-label for="localidad_id" :value="__('Localidad')" />
                            <select name="localidad_id" id="localidad_id"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            bg-white text-black dark:bg-gray-800 dark:text-white dark:border-gray-600" :disabled="!localidades.length">
                                <option value="">Selecciona la Localidad</option>
                                <template x-for="localidad in localidades" :key="localidad.id">
                                    <option :value="localidad.id" x-text="localidad.nombre_localidad"></option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <!--Fin - Conjunto de combo-boxes para la selección del PGI y la Localidad-->

                    <!--Conjunto de combo-boxes para la selección de Programas, Subprogramas y Tipologías-->
                    <div x-data="programas" x-show="activeTab === 'tab1'">
                        <!-- Combo-box de Programas -->
                        <div class="py-2">
                            <x-input-label for="programa_id" :value="__('Programa')" />
                            <select name="programa_id" id="programa_id"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            bg-white text-black dark:bg-gray-800 dark:text-white dark:border-gray-600" 
                            x-model="programaSeleccionado" @change="filtrarSubprogramas()">
                                <option value="">Selecciona el Programa</option>
                                @foreach ($programas as $programa)
                                    <option value="{{ $programa->id }}">{{ $programa->clave_programa }} - {{ $programa->nombre_programa }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <!-- Combo-box de Subprogramas -->
                        <div class="py-2">
                            <x-input-label for="subprograma_id" :value="__('Subprograma')" />
                            <select name="subprograma_id" id="subprograma_id"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            bg-white text-black dark:bg-gray-800 dark:text-white dark:border-gray-600"
                            x-model="subprogramaSeleccionado" @change="filtrarTipologias()" :disabled="!subprogramas.length">
                                <option value="">Selecciona el Subprograma</option>
                                <template x-for="subprograma in subprogramas" :key="subprograma.id">
                                    <option :value="subprograma.id" x-text="subprograma.clave_subprograma + ' - ' + subprograma.nombre_subprograma"></option>
                                </template>
                            </select>
                        </div>
                    
                        <!-- Combo-box de Tipologías -->
                        <div class="py-2">
                            <x-input-label for="tipologia_id" :value="__('Tipología')" />
                            <select name="tipologia_id" id="tipologia_id" 
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            bg-white text-black dark:bg-gray-800 dark:text-white dark:border-gray-600" :disabled="!tipologias.length">
                                <option value="">Selecciona la Tipología</option>
                                <template x-for="tipologia in tipologias" :key="tipologia.id">
                                    <option :value="tipologia.id" x-text="tipologia.clave_tipologia + ' - ' + tipologia.nombre_tipologia"></option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <!--Fin - Conjunto de combo-boxes para la selección de Programas, Subprogramas y Tipologías-->

                    <!--Combo-box Tipo de Obra-->
                    <div class="py-2" x-show="activeTab === 'tab1'">
                        <x-input-label for="tipo_obra" :value="__('Tipo de Obra')" />
                        <select name="tipo_obra"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            bg-white text-black dark:bg-gray-800 dark:text-white dark:border-gray-600" id="tipo_obra">
                            <option value="">Selecciona el Tipo</option>
                            <option value="Obra">Obra</option>
                            <option value="Accion">Acción</option>
                            <option value="Servicio">Servicio</option>
                        </select>
                    </div>

                    <!--Campo de Texto - Número de Obra-->
                    <div class="py-2" x-show="activeTab === 'tab1'">
                        <x-input-label for="numero_obra" :value="__('Número de Obra')" />
                        <x-text-input id="numero_obra" class="block mt-1 w-full" type="text" 
                        name="numero_obra" :value="old('numero_obra')" required autofocus autocomplete="numero_obra" />
                        <x-input-error :messages="$errors->get('numero_obra')" class="mt-2" />
                    </div>

                    <!--Campo de Texto - Nombre de la Obra-->
                    <div class="py-2" x-show="activeTab === 'tab1'">
                        <x-input-label for="nombre_obra" :value="__('Nombre de la Obra')" />
                        <x-text-input id="nombre_obra" class="block mt-1 w-full" type="text" 
                        name="nombre_obra" :value="old('nombre_obra')" required autofocus autocomplete="nombre_obra" />
                        <x-input-error :messages="$errors->get('nombre_obra')" class="mt-2" />
                    </div>

                    <!--Campo de Texto - Descripción de la Obra-->
                    <div class="py-2" x-show="activeTab === 'tab1'">
                        <x-input-label for="descripcion_obra" :value="__('Descripción de la Obra')" />
                        <x-text-input id="descripcion_obra" class="block mt-1 w-full" type="text" 
                        name="descripcion_obra" :value="old('descripcion_obra')" required autofocus autocomplete="descripcion_obra" />
                        <x-input-error :messages="$errors->get('descripcion_obra')" class="mt-2" />
                    </div>

                    <!--Campo de Texto - Latitud-->
                    <div class="py-2" x-show="activeTab === 'tab1'">
                        <x-input-label for="latitud" :value="__('Latitud')" />
                        <x-text-input id="latitud" class="block mt-1 w-full" type="text" 
                        name="latitud" :value="old('latitud')" required autofocus autocomplete="latitud" />
                        <x-input-error :messages="$errors->get('latitud')" class="mt-2" />
                    </div>

                    <!--Campo de Texto - Longitud-->
                    <div class="py-2" x-show="activeTab === 'tab1'">
                        <x-input-label for="longitud" :value="__('Longitud')" />
                        <x-text-input id="longitud" class="block mt-1 w-full" type="text" 
                        name="longitud" :value="old('longitud')" required autofocus autocomplete="longitud" />
                        <x-input-error :messages="$errors->get('longitud')" class="mt-2" />
                    </div>

                    <!--Campo de Texto - Zona de Alta Prioridad-->
                    <div class="py-2" x-show="activeTab === 'tab1'">
                        <x-input-label for="zona_alta_prioridad" :value="__('Zona de Alta Prioridad')" />
                        <x-text-input id="zona_alta_prioridad" class="block mt-1 w-full" type="text" 
                        name="zona_alta_prioridad" :value="old('zona_alta_prioridad')" required autofocus autocomplete="zona_alta_prioridad" />
                        <x-input-error :messages="$errors->get('zona_alta_prioridad')" class="mt-2" />
                    </div>

                    <!--Campo de Texto - AGEBS-->
                    <div class="py-2" x-show="activeTab === 'tab1'">
                        <x-input-label for="agebs" :value="__('Área Geoestadística Básica')" />
                        <x-text-input id="agebs" class="block mt-1 w-full" type="text" 
                        name="agebs" :value="old('agebs')" required autofocus autocomplete="agebs" />
                        <x-input-error :messages="$errors->get('agebs')" class="mt-2" />
                    </div>

                    <!--Combo-box - Grado de Rezago Social-->
                    <div class="py-2" x-show="activeTab === 'tab1'">
                        <x-input-label for="grado_rezago_social" :value="__('Grado de Rezago Social')" />
                        <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            bg-white text-black dark:bg-gray-800 dark:text-white dark:border-gray-600"
                        name="grado_rezago_social" id="grado_rezago_social">
                            <option value="">Selecciona el grado</option>
                            <option value="Bajo">Bajo</option>
                            <option value="Medio">Medio</option>
                            <option value="Alto">Alto</option>
                        </select>
                    </div>

                    <!--Campo de Texto - Modalidad de Ejecución-->
                    <div class="py-2" x-show="activeTab === 'tab1'">
                        <x-input-label for="modalidad_ejecucion" :value="__('Modalidad de Ejecución')" />
                        <x-text-input id="modalidad_ejecucion" class="block mt-1 w-full" type="text" 
                        name="modalidad_ejecucion" :value="old('modalidad_ejecucion')" required autofocus autocomplete="modalidad_ejecucion" />
                        <x-input-error :messages="$errors->get('modalidad_ejecucion')" class="mt-2" />
                    </div>

                    <!--Combo-box - Tipo de Licitación-->
                    <div class="py-2" x-show="activeTab === 'tab1'">
                        <x-input-label for="tipo_licitacion" :value="__('Tipo de Licitación')" />
                        <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            bg-white text-black dark:bg-gray-800 dark:text-white dark:border-gray-600"
                        name="tipo_licitacion" id="tipo_licitacion">
                            <option value="">Selecciona el tipo de licitación</option>
                            <option value="Adjudicación Directa ">Adjudicación Directa </option>
                            <option value="Invitación a cuando menos tres personas">Invitación a cuando menos tres personas</option>
                        </select>
                    </div>

                    <!--Botón para seleccionar el archivo de la solicitud de obra-->
                    <div class="py-2" x-show="activeTab === 'tab1'">
                        <x-input-label for="solicitud_obra" :value="__('Solicitud de la Obra')" />
                        <input
                            type="file"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm 
                            bg-white text-black dark:bg-gray-800 dark:text-white dark:border-gray-600"
                            name="solicitud_obra" id="solicitud_obra"
                        />
                        @error('solicitud_obra')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
            
                    </div>
                    <!-- FIN DE CAMPOS DE DATOS BÁSICOS -->
                    
                    <!-- CAMPOS DE DATOS DE ESTRUCTURA FINANCIERA -->
                    <h3 class="font-semibold text-lg text-center text-gray-800 dark:text-gray-200 leading-tight py-3" x-show="activeTab === 'tab2'">
                        {{ __('Estructura Financiera (Inversión Aprobada)') }}
                    </h3>

                    <!--Campo númerico - Costo Total-->
                    <div class="py-2" x-show="activeTab === 'tab2'">
                        <x-input-label for="costo_total" :value="__('Costo Total')" />
                        <div class="flex py-2">
                            <span class="mt-1 px-3 py-2 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                            text-black dark:text-white rounded-l-md">$</span> <!--Simbolo $-->
                            <x-text-input id="costo_total" 
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                                type="number" name="costo_total" :value="old('costo_total')" required step="0.01" min="0" placeholder="0.00"
                            />
                        </div>
                    </div>

                    <!--Campo númerico - Fuente de Financiamiento-->
                    <div class="py-2" x-show="activeTab === 'tab2'">
                        <x-input-label for="fuente_financiamiento" :value="__('Fuente de Financiamiento')" />
                        <div class="flex py-2">
                            <span class="mt-1 px-3 py-2 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                            text-black dark:text-white rounded-l-md">$</span> <!--Simbolo $-->
                            <x-text-input id="fuente_financiamiento" 
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                                type="number" name="fuente_financiamiento" :value="old('fuente_financiamiento')" required step="0.01" min="0" placeholder="0.00"
                            />
                        </div>
                    </div>

                    <!--Campo númerico - Aportación Municipal-->
                    <div class="py-2" x-show="activeTab === 'tab2'">
                        <x-input-label for="aportacion_municipal" :value="__('Aportación Municipal')" />
                        <div class="flex py-2">
                            <span class="mt-1 px-3 py-2 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                            text-black dark:text-white rounded-l-md">$</span> <!--Simbolo $-->
                            <x-text-input id="aportacion_municipal" 
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                                type="number" name="aportacion_municipal" :value="old('aportacion_municipal')" step="0.01" min="0" placeholder="0.00"
                            />
                        </div>
                    </div>

                    <!--Campo númerico - Aportación de Beneficiarios-->
                    <div class="py-2" x-show="activeTab === 'tab2'">
                        <x-input-label for="aportacion_beneficiarios" :value="__('Aportación de Beneficiarios')" />
                        <div class="flex py-2">
                            <span class="mt-1 px-3 py-2 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                            text-black dark:text-white rounded-l-md">$</span> <!--Simbolo $-->
                            <x-text-input id="aportacion_beneficiarios" 
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                                type="number" name="aportacion_beneficiarios" :value="old('aportacion_beneficiarios')" step="0.01" min="0" placeholder="0.00"
                            />
                        </div>
                    </div>

                    <!--Campo númerico - Otras Fuentes Federales-->
                    <div class="py-2" x-show="activeTab === 'tab2'">
                        <x-input-label for="otras_fuentes_federales" :value="__('Otras Fuentes Federales')" />
                        <div class="flex py-2">
                            <span class="mt-1 px-3 py-2 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                            text-black dark:text-white rounded-l-md">$</span> <!--Simbolo $-->
                            <x-text-input id="otras_fuentes_federales" 
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                                type="number" name="otras_fuentes_federales" :value="old('otras_fuentes_federales')" step="0.01" min="0" placeholder="0.00"
                            />
                        </div>
                    </div>

                    <!--Campo númerico - Otas Fuentes Estatales-->
                    <div class="py-2" x-show="activeTab === 'tab2'">
                        <x-input-label for="otras_fuentes_estatales" :value="__('Otras Fuentes Estatales')" />
                        <div class="flex py-2">
                            <span class="mt-1 px-3 py-2 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                            text-black dark:text-white rounded-l-md">$</span> <!--Simbolo $-->
                            <x-text-input id="otras_fuentes_estatales" 
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                                type="number" name="otras_fuentes_estatales" :value="old('otras_fuentes_estatales')" step="0.01" min="0" placeholder="0.00"
                            />
                        </div>
                    </div>

                    <!--Campo númerico - Otros Aportes-->
                    <div class="py-2" x-show="activeTab === 'tab2'">
                        <x-input-label for="otros" :value="__('Otros Aportes')" />
                        <div class="flex py-2">
                            <span class="mt-1 px-3 py-2 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700
                            text-black dark:text-white rounded-l-md">$</span> <!--Simbolo $-->
                            <x-text-input id="otros" 
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                                type="number" name="otros" :value="old('otros')" step="0.01" min="0" placeholder="0.00"
                            />
                        </div>
                    </div>
                    <!-- FIN DE CAMPOS DE DATOS DE ESTRUCTURA FINANCIERA -->

                    <!-- CAMPOS DE DATOS DE METAS -->
                    <div x-show="activeTab === 'tab3'"> <!--Incluir todo en la pestaña 3-->
                        <h3 class="font-semibold text-lg text-center text-gray-800 dark:text-gray-200 leading-tight py-3">
                            {{ __('Metas') }}
                        </h3>

                        <h3 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight py-0">
                            {{ __('Del proyecto: ') }}
                        </h3>
                        <div class="grid grid-cols-2 md:grid-cols-2 gap-4">  <!--GRID de 2 x 22-->
                            <!--Campo de Texto - Unidad de Medida - Proyecto -->
                            <div class="py-2">
                                <x-input-label for="unidad_medida_proyecto" :value="__('Unidad de Medida')" />
                                <x-text-input id="unidad_medida_proyecto" class="block mt-1 w-full" type="text" 
                                name="unidad_medida_proyecto" :value="old('unidad_medida_proyecto')" required autofocus autocomplete="unidad_medida_proyecto" />
                                <x-input-error :messages="$errors->get('unidad_medida_proyecto')" class="mt-2" />
                            </div>
    
                            <!--Campo de Texto - Cantidad Aprobada - Proyecto -->
                            <div class="py-2">
                                <x-input-label for="cantidad_aprobada_proyecto" :value="__('Cantidad Aprobada')" />
                                <x-text-input id="cantidad_aprobada_proyecto" class="block mt-1 w-full" type="text" 
                                name="cantidad_aprobada_proyecto" :value="old('cantidad_aprobada_proyecto')" required autofocus autocomplete="cantidad_aprobada_proyecto" />
                                <x-input-error :messages="$errors->get('cantidad_aprobada_proyecto')" class="mt-2" />
                            </div>
                        </div>

                        <h3 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight py-0">
                            {{ __('De beneficiarios: ') }}
                        </h3>
                        <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                            <!--Campo de Texto - Unidad de Medida - Beneficiarios -->
                            <div class="py-2">
                                <x-input-label for="unidad_medida_beneficiarios" :value="__('Unidad de Medida')" />
                                <x-text-input id="unidad_medida_beneficiarios" class="block mt-1 w-full" type="text" 
                                name="unidad_medida_beneficiarios" :value="old('unidad_medida_beneficiarios')" required autofocus autocomplete="unidad_medida_beneficiarios" />
                                <x-input-error :messages="$errors->get('unidad_medida_beneficiarios')" class="mt-2" />
                            </div>
    
                            <!--Campo de Texto - Cantidad Aprobada - Beneficiaris -->
                            <div class="py-2">
                                <x-input-label for="cantidad_aprobada_beneficiarios" :value="__('Cantidad Aprobada')" />
                                <x-text-input id="cantidad_aprobada_beneficiarios" class="block mt-1 w-full" type="text" 
                                name="cantidad_aprobada_beneficiarios" :value="old('cantidad_aprobada_beneficiarios')" required autofocus autocomplete="cantidad_aprobada_beneficiarios" />
                                <x-input-error :messages="$errors->get('cantidad_aprobada_beneficiarios')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <!-- FIN DE CAMPOS DE DATOS DE METAS -->
                </div>

                <!-- Botón de Registro-->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Registrar Obra') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Scripts --------------------------------------------------------------------------------------------------------->
            <script>
                /* Script para mostrar un cuadro de dialogo al recargar la página sin haber guardado los datos del formulario */
                let isFormDirty = false; //Variable para detectar si el formulario ha sido modificado

                // Función listener que detecta cambios en los campos del formulario y modifica la variable isFormDirty
                document.addEventListener('input', () => {
                    isFormDirty = true;
                });

                // Reinicia el estado de la variable cuando se envía el formulario
                document.querySelector('form').addEventListener('submit', () => {
                    isFormDirty = false;
                });

                window.addEventListener('beforeunload', function(event) {
                    if (isFormDirty) {
                        event.preventDefault(); // Esta línea es importante para mostrar la alerta
                        event.returnValue = '';  // Necesario para que se muestre la alerta
                    }
                });

                /* Fin - Script para mostrar un cuadro de dialogo al recargar la página sin haber guardado los datos del formulario */

                //Script para filtrar Programas, Subprogramas y Tipologías
                function localidades() {
                    return {
                        pgis: @json($pgis),
                        municipios: [],
                        localidades: [],
                        pgiSeleccionado: '',
                        municipioSeleccionado: '',

                        // Filtra los municipios y localidades al seleccionar un pgi
                        filtrarMunicipiosYLocalidades() {
                            // Filtra el municipio relacionado con el pgi seleccionado (uno solo)
                            const pgi = this.pgis.find(p => p.id == this.pgiSeleccionado);
                            if (pgi) {
                                this.municipios = [pgi.municipio]; // Asignamos solo un municipio (relación 1 a 1)
                                this.municipioSeleccionado = pgi.municipio.id; // Asignamos el municipio automáticamente
                                this.localidades = pgi.municipio.localidades || []; // Filtramos las localidades asociadas al municipio
                            } else {
                                this.municipios = [];
                                this.municipioSeleccionado = '';
                                this.localidades = [];
                            }
                        }
                    }
                }
                
                // Script para filtrar las Localidades asociadas al Municipio del PGI
                function programas() {
                    return {
                        programas: @json($programas),
                        subprogramas: [],
                        tipologias: [],
                        programaSeleccionado: '',
                        subprogramaSeleccionado: '',
            
                        filtrarSubprogramas() {
                            this.subprogramas = this.programas.find(p => p.id == this.programaSeleccionado)?.subprogramas || [];
                            this.subprogramaSeleccionado = '';
                            this.tipologias = [];
                        },
            
                        filtrarTipologias() {
                            this.tipologias = this.subprogramas.find(s => s.id == this.subprogramaSeleccionado)?.tipologias || [];
                        }
                    }
                }
            </script>
        </div>
    </div> 
</x-app-layout>