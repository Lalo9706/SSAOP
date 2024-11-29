<?php
/*
    Este seeder ejecutará el registro de un usuario base para probar el sistema y posterior a eso ejecutará 
    en serie el registro de los datos base del sistema, como Localidades, Programas, Subprogramas,
    y por ultimo los datos de pruebas, como Obras, Metas, Estructura financiera, etc.
*/

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);

        $this->call([
            LocalidadesTotutlaSeeder::class, //Primero (De ser necesario, eliminarlo en el despliegue).
            ProgramasSubprogramasTipologiasSeeder::class, //Segundo
            ObrasSeeder::class //Tercer - Solo para pruebas (Eliminar en el despliegue)

        ]);

    }
}
