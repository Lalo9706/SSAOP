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
        Schema::create('avances_generales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id')->constrained()->onDelete('cascade'); //Se eliminará el registro de avance general si se elimina la obra.
            $table->string('tipo_avance'); // Físico | Financiero
            $table->date('fecha_real_inicio');
            $table->date('fecha_real_termino');
            $table->integer('porcentaje_avance')->default(0); //0 - 100
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avances_generales');
    }
};
