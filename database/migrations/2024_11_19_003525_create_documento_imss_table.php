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
        Schema::create('documentos_imss', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id')->constrained();
            $table->date('fecha_registro');
            $table->string('folio_acuse');
            $table->string('tipo_documento'); // ALTA | BAJA
            $table->string('ruta_archivo_imss');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos_imss');
    }
};
