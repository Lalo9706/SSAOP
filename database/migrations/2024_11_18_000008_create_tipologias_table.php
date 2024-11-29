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
        Schema::create('tipologias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subprograma_id')->constrained();
            $table->string('clave_tipologia');
            $table->string('nombre_tipologia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipologias');
    }
};
