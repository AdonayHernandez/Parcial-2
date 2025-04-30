<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('informes_altas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admision_id')->constrained('admisiones')->cascadeOnDelete();
            $table->text('diagnostico_final');
            $table->text('tratamientos_aplicados');
            $table->text('medicacion_casa');  
            $table->text('recomendaciones_medicas');
            $table->dateTime('fecha_proxima_revision')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informes_altas');
    }
};