<?php

namespace Database\Factories;

use App\Models\Admision;
use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcedimientoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'admision_id' => Admision::factory(),
            'tipo_procedimiento' => $this->faker->randomElement([
                'Radiografía', 
                'Análisis de sangre', 
                'Electrocardiograma',
                'Resonancia magnética', 
                'Tomografía'
            ]),
            'fecha_hora' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'medico_responsable_id' => Medico::factory(),
            'enfermeros_asistentes' => $this->faker->name() . ', ' . $this->faker->name(),
            'equipamiento_utilizado' => $this->faker->words(3, true),
            'resultados_obtenidos' => $this->faker->paragraph(),
            'observaciones' => $this->faker->optional()->sentence()
        ];
    }
}
