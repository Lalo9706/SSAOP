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
        Schema::create('subprogramas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programa_id')->constrained();
            $table->string('clave_subprograma');
            $table->string('nombre_subprograma');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subprogramas');
    }
};
