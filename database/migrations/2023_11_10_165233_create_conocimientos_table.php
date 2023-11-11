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
        Schema::create('conocimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',256);
        });

        // Insertar valores predeterminados para su seleccion
        DB::table('conocimientos')->insert([
            //INGENIERÍA MECATRÓNICA
            ['nombre' => 'Ciencias en general'],
            ['nombre' => 'Física'],
            ['nombre' => 'Matemáticas'],
            // sistemas computacionales
            ['nombre' => 'Cálculo'],
            ['nombre' => 'Manejo de Equipo de Cómputo'],
            ['nombre' => 'Álgebra'],
            //automotriz
            ['nombre' => 'Aritmética'],
            ['nombre' => 'Dominio de TIC'],
            ['nombre' => 'Química'],
            //carpinteria
            ['nombre' => 'Geometría'],
            ['nombre' => 'Trigonometría'],
            //administracion
            ['nombre' => 'Costos'],
            ['nombre' => 'Economía'],
            ['nombre' => 'Estádistica'],
            //NEGOCIOS INTERNACIONALES
            ['nombre' => 'Administración'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conocimientos');
    }
};
