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
        Schema::create('habilidades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',256);
        });


        // Insertar valores predeterminados para su seleccion
        DB::table('habilidades')->insert([
            //INGENIERÍA MECATRÓNICA
            ['nombre' => 'Cooperación'],
            ['nombre' => 'Integración'],
            ['nombre' => 'Manejo de TI.'],
            ['nombre' => 'Razonamiento matemático'],
            //sistemas computacionales
            ['nombre' => 'Creatividad'],
            ['nombre' => 'Entendimiento de la Ciencia'],
            ['nombre' => 'Innovación'],
            ['nombre' => 'Interés por las Tecnologías de la Información'],
            ['nombre' => 'Manejo de Equipo de Cómputo'],
            ['nombre' => 'Pensamiento Matemático'],
            //tecnologia automotriz
            ['nombre' => 'Lectura y Redacción'],
            ['nombre' => 'Relaciones Humanas'],
            //carpinteria
            ['nombre' => 'Capacidad de Observación y Abstracción'],
            //administracion empresarial
            ['nombre' => 'Comunicación Oral y Escrita'],
            ['nombre' => 'Organización'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habilidades');
    }
};
