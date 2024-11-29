<?php
/*
    Este seeder almacena las 35 localidades del municipio de Totutla, Veracruz,
    pero para ello es necesario primero registrar al menos una Entidad Federativa (Veracruz),
    y un Municipio (Totutla), y asociar las Localidades a estos.
    Se ha hecho de este modo para mantener una buena separación entre datos y permitir
    la reutilización del modelo de datos a futuro.
*/

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EntidadFederativa;
use App\Models\Municipio;
use App\Models\Localidad;

class LocalidadesTotutlaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entidad = EntidadFederativa::create([
            'clave_entidad' => '30',
            'nombre_entidad' => 'Veracruz'
        ]);
        
        $municipio = Municipio::create([
            'entidad_federativa_id' => $entidad->id,
            'clave_municipio' => '188',
            'nombre_municipio' => 'Totutla'
        ]);

        //Añadiendo todas las localidades de Totutla
        
        $localidades = [
            ['clave_localidad' => '0001', 'nombre_localidad' => 'Totutla'],
            ['clave_localidad' => '0002', 'nombre_localidad' => 'Calcahualco'],
            ['clave_localidad' => '0003', 'nombre_localidad' => 'Cosolapa'],
            ['clave_localidad' => '0004', 'nombre_localidad' => 'El Encinal'],
            ['clave_localidad' => '0005', 'nombre_localidad' => 'Mata de Indio'],
            ['clave_localidad' => '0006', 'nombre_localidad' => 'Mata Obscura'],
            ['clave_localidad' => '0007', 'nombre_localidad' => 'El Mirador'],
            ['clave_localidad' => '0008', 'nombre_localidad' => 'Naranjos'],
            ['clave_localidad' => '0009', 'nombre_localidad' => 'Palmaritos'],
            ['clave_localidad' => '0010', 'nombre_localidad' => 'Palmas'],
            ['clave_localidad' => '0011', 'nombre_localidad' => 'Tlapala'],
            ['clave_localidad' => '0012', 'nombre_localidad' => 'Zapotitla'],
            ['clave_localidad' => '0014', 'nombre_localidad' => 'Oteapa (Calzada al Río)'],
            ['clave_localidad' => '0015', 'nombre_localidad' => 'El Retiro'],
            ['clave_localidad' => '0016', 'nombre_localidad' => 'El Santuario (Barrio Nuevo)'],
            ['clave_localidad' => '0018', 'nombre_localidad' => 'Tlacuatzintla'],
            ['clave_localidad' => '0019', 'nombre_localidad' => 'Chachaxtla'],
            ['clave_localidad' => '0020', 'nombre_localidad' => 'Totolapa (Cruz Verde)'],
            ['clave_localidad' => '0021', 'nombre_localidad' => 'Tecomatla'],
            ['clave_localidad' => '0022', 'nombre_localidad' => 'Los Barbechos'],
            ['clave_localidad' => '0023', 'nombre_localidad' => 'El Capricho'],
            ['clave_localidad' => '0025', 'nombre_localidad' => 'Navatepec'],
            ['clave_localidad' => '0026', 'nombre_localidad' => 'Los Pinos'],
            ['clave_localidad' => '0027', 'nombre_localidad' => 'Rincón de Calcahualco'],
            ['clave_localidad' => '0028', 'nombre_localidad' => 'Tepetlapa'],
            ['clave_localidad' => '0034', 'nombre_localidad' => 'Rancho Viejo'],
            ['clave_localidad' => '0060', 'nombre_localidad' => 'Colonia Progreso'],
            ['clave_localidad' => '0061', 'nombre_localidad' => 'Los Robles'],
            ['clave_localidad' => '0062', 'nombre_localidad' => 'Ejido la Peregrina'],
            ['clave_localidad' => '0063', 'nombre_localidad' => 'Loma de los Contreras'],
            ['clave_localidad' => '0064', 'nombre_localidad' => 'Colonia los Pinos'],
            ['clave_localidad' => '0065', 'nombre_localidad' => 'Colonia los Naranjos (El Roble)'],
            ['clave_localidad' => '0066', 'nombre_localidad' => 'El Crucero Uno'],
            ['clave_localidad' => '0067', 'nombre_localidad' => 'Kassandra'],
            ['clave_localidad' => '0068', 'nombre_localidad' => 'Yupitla (La Laguna)']
        ];

        foreach($localidades as $localidad){
            Localidad::create([
                'municipio_id' => $municipio->id,
                'clave_localidad' => $localidad['clave_localidad'],
                'nombre_localidad' => $localidad['nombre_localidad'],
            ]);
        }
    }
}
