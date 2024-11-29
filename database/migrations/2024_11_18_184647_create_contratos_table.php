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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id')->constrained();
            $table->foreignId('contratista_id')->constrained();
            $table->string('numero_contrato');
            $table->date('fecha_plazo_inicio');
            $table->date('fecha_plazo_termino');
            $table->string('ruta_archivo_contrato');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};