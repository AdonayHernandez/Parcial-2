<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admisiones', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora_ingreso');
            $table->foreignId('departamento_id')->constrained()->onDelete('restrict');
            $table->foreignId('medico_id')->constrained()->onDelete('restrict');
            $table->foreignId('paciente_id')->constrained()->onDelete('restrict');
            $table->text('sintomas_presentados');
            $table->text('diagnostico_preliminar');
            $table->enum('nivel_urgencia', ['Bajo', 'Medio', 'Alto', 'Crítico']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admisiones');
    }
};