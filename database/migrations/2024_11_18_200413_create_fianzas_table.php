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
        Schema::create('fianzas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contrato_id')->constrained()->onDelete('cascade'); //Se eliminarán las fianzas si se elimina el contrato
            $table->string('tipo_fianza'); // Anticipo | Cumplimiento | Vicios Ocultos
            $table->string('nombre_afianzadora');
            $table->string('numero_fianza');
            $table->decimal('monto_fianza, 10, 2');
            $table->string('clave_seguimiento');
            $table->string('ruta_archivo_fianza');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fianzas');
    }
};
