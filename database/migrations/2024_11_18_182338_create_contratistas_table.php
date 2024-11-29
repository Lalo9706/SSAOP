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
        Schema::create('contratistas', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social');
            $table->string('rfc', 13)->unique();; // El RFC tiene 12 o 13 caracteres.
            $table->string('telefono', 15); // Para manejar prefijos internacionales.
            $table->text('domicilio_fiscal');
            $table->string('sefiplan', 50)->unique();; // Si el número SEFIPLAN tiene un formato específico.
            $table->string('imss', 15)->unique();; // Si el número IMSS tiene un tamaño fijo.            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratistas');
    }
};
