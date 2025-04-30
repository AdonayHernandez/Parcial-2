<?php

namespace Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admision_id')->constrained('admisiones')->onDelete('cascade');
            $table->string('nombre', 100);
            $table->string('dosis', 50);
            $table->string('frecuencia', 50);
            $table->string('via_administracion', 50);
            $table->string('duracion_tratamiento', 50);
            $table->foreignId('medico_prescriptor_id')->constrained('medicos')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicamentos');
    }
};