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
        Schema::create('tb_carrusel_noticias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('link');
            $table->string('imagen');
            $table->boolean('estado')->default(false);  // estado por defecto es false
            $table->datetime('fecha_activacion')->nullable();  // nueva columna de fecha de activación
            $table->datetime('fecha_desactivacion')->nullable();  // fecha de desactivación
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_carrusel_noticias');
    }
};
