<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles_personas_obras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id')->constrained();
            $table->foreignId('persona_id')->constrained()->onDelete('cascade'); //Se eliminarán los roles si se elimina la persona.
            $table->string('rol'); // Beneficiario | Integrante de Comité
            $table->string('tipo_rol'); // Solo si rol = 'Integrante de Comité, [ Presidente | Vocal | Secretario | etc ]
            $table->string('ruta_archivo_identificacion'); //Fotografía
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_personas_obras');
    }
};
