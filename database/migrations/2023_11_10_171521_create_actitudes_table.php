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
        Schema::create('actitudes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',256);
        });

        // Insertar valores predeterminados para su seleccion
        DB::table('actitudes')->insert([
            //INGENIERÍA MECATRÓNICA
            ['nombre' => 'Adaptabilidad al Cambio'],
            ['nombre' => 'Autoevaluación'],
            ['nombre' => 'Disciplina'],
            ['nombre' => 'Proactivo'],
            ['nombre' => 'Responsabilidad'],
            ['nombre' => 'Trabajo en equipo'],
            //sistemas computacionales
            ['nombre' => 'Interés por las Tecnologías de la Información'],
            ['nombre' => 'Orden'],
            //automotriz
            ['nombre' => 'Compromiso'],
            ['nombre' => 'Creatividad'],
            ['nombre' => 'Respeto'],
            //carpinteria
            ['nombre' => 'Cooperación'],
            ['nombre' => 'Interés por el Desarrollo Tecnológico'],
            //redes y telecomuniaciones
            ['nombre' => 'Interés por Tecnologías de Telecomunicación e Informática'],
            ['nombre' => 'Predisposición al Aprendizaje'],
            //administracion empresarial
            ['nombre' => 'Tomador de Riesgos'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actitudes');
    }
};
