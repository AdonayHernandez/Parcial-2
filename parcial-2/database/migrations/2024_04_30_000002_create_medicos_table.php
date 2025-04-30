<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_empleado', 20)->unique();
            $table->string('nombre_completo', 100);
            $table->string('especialidad', 100)->nullable();
            $table->integer('anios_experiencia')->nullable();
            $table->string('horario_consulta', 100)->nullable();
            $table->string('datos_contacto', 255)->nullable();
            $table->foreignId('departamento_principal_id')
                  ->nullable()
                  ->constrained('departamentos')
                  ->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicos');
    }
};