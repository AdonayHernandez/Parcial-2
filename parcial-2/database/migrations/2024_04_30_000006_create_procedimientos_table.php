<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('procedimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admision_id')->constrained('admisiones')->onDelete('cascade');
            $table->string('tipo_procedimiento', 100);
            $table->dateTime('fecha_hora');
            $table->foreignId('medico_responsable_id')->constrained('medicos')->onDelete('restrict');
            $table->text('enfermeros_asistentes')->nullable();
            $table->text('equipamiento_utilizado')->nullable();
            $table->text('resultados_obtenidos')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('procedimientos');
    }
};