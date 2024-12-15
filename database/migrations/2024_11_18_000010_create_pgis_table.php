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
        Schema::create('pgis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fuente_financiamiento_id')->constrained('fuentes_financiamiento');
            $table->foreignId('municipio_id')->constrained();
            $table->string('ejercicio_fiscal');
            $table->decimal('monto_aprobado', 11, 2)->nullable()->default(0);
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pgis');
    }
};
