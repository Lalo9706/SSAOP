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
        Schema::create('fotos_avance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('avance_fisico_id')->constrained('avances_fisicos')->onDelete('cascade'); //Se eliminará el registro de la foto si se elimina registro del avance físico asociado.
            $table->string('ruta_archivo_foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotos_avance');
    }
};
