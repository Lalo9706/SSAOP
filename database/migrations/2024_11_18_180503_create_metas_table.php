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
        Schema::create('metas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id');
            $table->string('tipo_meta'); //Proyecto | Beneficiarios
            $table->string('unidad_medida'); // PAGO | KILOMETRO | METRO CUADRADO | ETC
            $table->decimal('cantidad_aprobada', 10, 2)->nullable()->default(0);
            $table->decimal('cantidad_alcanzada', 10, 2)->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metas');
    }
};
