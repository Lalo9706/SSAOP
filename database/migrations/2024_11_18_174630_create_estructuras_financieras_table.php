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
        Schema::create('estructuras_financieras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id');
            $table->string('tipo_estructura_financiera'); // Inversión Aprobada | Inversión Devengada | Inversión Pagada
            $table->decimal('costo_total', 10, 2)->default(0);
            $table->decimal('fuente_financiamiento', 10, 2)->default(0);
            $table->decimal('aportacion_municipal', 10, 2)->default(0);
            $table->decimal('aportacion_beneficiarios', 10, 2)->default(0);
            $table->decimal('otras_fuentes_federales', 10, 2)->default(0);
            $table->decimal('otras_fuentes_estatales', 10, 2)->default(0);
            $table->decimal('otros', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estructuras_financieras');
    }
};
