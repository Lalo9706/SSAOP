<?php
/*
    Este seeder almacenará los catalogos de Programas, Subprogramas y Tipologías para el registro de Obras.
    NOTA: Por el momento se desconocen todas las categorías, así que solo se pondrán unas de ejemplo y para pruebas.
*/

namespace Database\Seeders;

use App\Models\Programa;
use App\Models\Subprograma;
use App\Models\Tipologia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramasSubprogramasTipologiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Los siguintes catálogos se han configurado para su registro como pruebas, se recomienda que
        //al insertar los catálogos reales, se haga con bucles foreach.

        //--------------------PROGRAMAS--------------------
        $programa_vivienda = Programa::create([
            'clave_programa' => 'SH',
            'nombre_programa' => 'Vivienda'
        ]);

        $programa_urbanizacion = Programa::create([
            'clave_programa' => 'UB',
            'nombre_programa' => 'Urbanización'
        ]);

        $programa_agua = Programa::create([
            'clave_programa' => 'SC',
            'nombre_programa' => 'Agua y Saneamiento'
        ]);


        //--------------------SUBPROGRAMAS--------------------
        //Vivienda
        $subprograma_vivienda_construccion = Subprograma::create([
            'programa_id' => $programa_vivienda->id,
            'clave_subprograma' => '02',
            'nombre_subprograma' => 'Construcción'
        ]);

        //Urbanización
        $subprograma_urbanizacion_construccion = Subprograma::create([
            'programa_id' => $programa_urbanizacion->id,
            'clave_subprograma' => '02',
            'nombre_subprograma' => 'Construcción'
        ]);

        //Agua y Saneamiento
        $subprograma_urbanizacion_rehabilitacion = Subprograma::create([
            'programa_id' => $programa_urbanizacion->id,
            'clave_subprograma' => '03',
            'nombre_subprograma' => 'Rehabilitación'
        ]);

        $subprograma_agua_rehabilitacion = Subprograma::create([
            'programa_id' => $programa_agua->id,
            'clave_subprograma' => '03',
            'nombre_subprograma' => 'Rehabilitación'
        ]);

        //--------------------TIPOLOGÍAS--------------------
        //Vivienda - Construcción
        Tipologia::create([
            'subprograma_id' => $subprograma_vivienda_construccion->id,
            'clave_tipologia' => 'd',
            'nombre_tipologia' => 'Cuartos Dormitorios'
        ]);

        //Urbanización - Construcción
        Tipologia::create([
            'subprograma_id' => $subprograma_urbanizacion_construccion->id,
            'clave_tipologia' => 'a',
            'nombre_tipologia' => 'Caminos Rurales'
        ]);

        //Urbanización - Rehabilitación
        Tipologia::create([
            'subprograma_id' => $subprograma_urbanizacion_rehabilitacion->id,
            'clave_tipologia' => 'b',
            'nombre_tipologia' => 'Calle (Adoquín, Asfalto, Concreto, Empedrado y Huellas de Rodamiento)'
        ]);

        //Agua y Saneamiento - Rehabilitación
        Tipologia::create([
            'subprograma_id' => $subprograma_agua_rehabilitacion->id,
            'clave_tipologia' => 'b',
            'nombre_tipologia' => 'Red de Agua Entubada'
        ]);

        Tipologia::create([
            'subprograma_id' => $subprograma_agua_rehabilitacion->id,
            'clave_tipologia' => 'c',
            'nombre_tipologia' => 'Pozo Produndo de Agua Potable'
        ]);
       
    }
}
