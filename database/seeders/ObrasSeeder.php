<?php
/*
    Este seeder almacenará un par de Obras en la base de datos con sus respectivas Metas y Estructuras Financieras.
    Al igual que con las Localidades, las Obras requieren el registro de al menos una Fuente de Financiamiento y
    un PGI al cual asociarse, por lo que el seeder realizará un par de registros de prueba.
*/

namespace Database\Seeders;

use App\Models\EstructuraFinanciera;
use App\Models\FuenteFinanciamiento;
use App\Models\Meta;
use App\Models\Obra;
use App\Models\PGI;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $fuente_financiamiento_1 = FuenteFinanciamiento::create([
            'clave_fondo' => 'FAISMUN',
            'nombre_fondo' => 'Fondo de Aportaciones para la Infraestructura Social Municipal y de las Demarcaciones Territoriales del Distrito Federal'
        ]);

        $pgi_1 = PGI::create([
            'fuente_financiamiento_id' => $fuente_financiamiento_1->id,
            'municipio_id' => '1',
            'ejercicio_fiscal' => '2023', 
            'monto_aprobado' => 29417855.00,
            'estado' => true
        ]);

        $obra_1 = Obra::create([
            'pgi_id' => $pgi_1->id,
            'programa_id' => '1',
            'subprograma_id' => '1',
            'tipologia_id' => '1',
            'localidad_id' => '12',
            'tipo_obra' => 'Obra',
            'numero_obra' => '2023301880410',
            'latitud' => null,
            'longitud' => null,
            'zona_alta_prioridad' => 'Rural',
            'agebs' => null,
            'grado_rezago_social' => 'BAJO',
            'nombre_obra' => 'CONSTRUCCIÓN DE CUARTOS DORMITORIO EN LA LOCALIDAD DE TLAPALA',
            'descripcion_obra' => 'CONSTRUCCIÓN DE CUARTOS DORMITORIO EN LA LOCALIDAD DE TLAPALA',
            'situacion_fisica' => null,
            'modalidad_ejecucion' => 'Contrato',
            'tipo_licitacion' => 'Invitación a cuando menos tres personas',
            'ruta_archivo_solicitud_obra' => null,
            'estado' => true
        ]);

        $obra_2 = Obra::create([
            'pgi_id' => $pgi_1->id,
            'programa_id' => '3',
            'subprograma_id' => '4',
            'tipologia_id' => '4',
            'localidad_id' => '1',
            'tipo_obra' => 'Obra',
            'numero_obra' => '2023301880424',
            'latitud' => null,
            'longitud' => null,
            'zona_alta_prioridad' => 'Rural',
            'agebs' => null,
            'grado_rezago_social' => 'BAJO',
            'nombre_obra' => 'REHABILITACIÓN DE RED DE AGUA ENTUBADA EN LA LOCALIDAD DE TOTUTLA',
            'descripcion_obra' => 'REHABILITACIÓN DE RED DE AGUA ENTUBADA EN LA LOCALIDAD DE TOTUTLA',
            'situacion_fisica' => null,
            'modalidad_ejecucion' => 'Contrato',
            'tipo_licitacion' => 'Invitación a cuando menos tres personas',
            'ruta_archivo_solicitud_obra' => null,
            'estado' => true
        ]);

        EstructuraFinanciera::create([
            'obra_id' => $obra_1->id,
            'tipo_estructura_financiera' => 'Inversion Aprobada',
            'costo_total' => 200000,
            'fuente_financiamiento' => 200000
        ]);

        EstructuraFinanciera::create([
            'obra_id' => $obra_2->id,
            'tipo_estructura_financiera' => 'Inversion Aprobada',
            'costo_total' => 650000,
            'fuente_financiamiento' => 650000
        ]);

        //Cada Obra debe tener dos tipos de meta: De Proyecto y Beneficiarios
        //Metas para Obra 1

        Meta::create([
            'obra_id' => $obra_1->id,
            'tipo_meta' => 'Proyecto',
            'unidad_medida' => 'Metro Cuadrado',
            'cantidad_aprobada' => 20,
            'cantidad_alcanzada' => null
        ]);

        Meta::create([
            'obra_id' => $obra_1->id,
            'tipo_meta' => 'Beneficiarios',
            'unidad_medida' => 'Persona',
            'cantidad_aprobada' => 8,
            'cantidad_alcanzada' => null
        ]);

        //Metas para Obra 2

        Meta::create([
            'obra_id' => $obra_2->id,
            'tipo_meta' => 'Proyecto',
            'unidad_medida' => 'Metro Lineal',
            'cantidad_aprobada' => 700,
            'cantidad_alcanzada' => null/*, Las siguientes columnas se guardan con valores de 0 por defecto:
            'aportacion_municipal' => 0,
            'aportacion_beneficiarios' => 0,
            'otras_fuentes_federales' => 0,
            'otras_fuentes_estatales' => 0,
            'otros'*/
        ]);

        Meta::create([
            'obra_id' => $obra_2->id,
            'tipo_meta' => 'Beneficiarios',
            'unidad_medida' => 'Persona',
            'cantidad_aprobada' => 4051,
            'cantidad_alcanzada' => null/*, Las siguientes columnas se guardan con valores de 0 por defecto:
            'aportacion_municipal' => 0,
            'aportacion_beneficiarios' => 0,
            'otras_fuentes_federales' => 0,
            'otras_fuentes_estatales' => 0,
            'otros'*/
        ]);
    }
}
