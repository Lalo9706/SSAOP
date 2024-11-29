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
        Schema::create('prefacturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id')->constrained();
            $table->string('tipo_pago'); // Anticipo | Estimación 01 | Estimación 02 | Estimación 03
            $table->decimal('importe', 10, 2)->nullable()->default(0);
            $table->decimal('montoIVA', 10, 2)->nullable()->default(0); // Importe x 0.016
            $table->decimal('total', 10, 2)->nullable()->default(0); // Importe + Monto IVA
            $table->decimal('cinco_al_millar', 10, 2)->nullable()->default(0); // Importe x 0.005
            $table->decimal('amortizacion_anticipo', 10, 2)->nullable()->default(0); //
            $table->decimal('neto', 10, 2)->nullable()->default(0); // Total – Cinco al Millar
            $table->string('ruta_archivo_factura')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prefacturas');
    }
};
