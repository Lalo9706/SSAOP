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
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pgi_id')->constrained();
            $table->foreignId('programa_id')->constrained();
            $table->foreignId('subprograma_id')->constrained();
            $table->foreignId('tipologia_id')->constrained();
            $table->foreignId('localidad_id')->constrained('localidades');
            $table->string('tipo_obra'); //Obra - Acción - Servicio
            $table->string('numero_obra');
            $table->decimal('latitud', 9, 6)->nullable();
            $table->decimal('longitud', 9, 6)->nullable();
            $table->string('zona_alta_prioridad');
            $table->string('agebs')->nullable()->default('N/A');
            $table->string('grado_rezago_social');
            $table->string('nombre_obra');
            $table->longText('descripcion_obra');
            $table->string('situacion_fisica')->nullable()->default('N/A');
            $table->string('modalidad_ejecucion');
            $table->string('tipo_licitacion');
            $table->string('solicitud_obra')->nullable(); //Ruta del archivo de la solicitud de la Obra
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
