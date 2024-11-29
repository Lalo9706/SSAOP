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
        Schema::create('clasificacion_fais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('obra_id')->constrained()->onDelete('cascade'); //Se eliminara este registro si se elimina la obra asociada.
            $table->string('clasificacion_proyecto');
            $table->string('subclasificacion_proyecto');
            $table->string('modalidad_proyecto');
            $table->string('contribucion_carencia_social');
            $table->string('tipo_contribucion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clasificacion_fais');
    }
};
