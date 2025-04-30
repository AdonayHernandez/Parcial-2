<?php

namespace Database\Factories;

use App\Models\Admision;
use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicamentoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'admision_id' => Admision::factory(),
            'nombre' => $this->faker->randomElement([
                'Paracetamol', 'Ibuprofeno', 'Amoxicilina', 
                'Omeprazol', 'Loratadina'
            ]),
            'dosis' => $this->faker->numberBetween(1, 1000) . ' mg',
            'frecuencia' => $this->faker->randomElement([
                'Cada 8 horas', 'Cada 12 horas', 'Cada 24 horas'
            ]),
            'via_administracion' => $this->faker->randomElement([
                'Oral', 'Intravenosa', 'Intramuscular', 'Sublingual'
            ]),
            'duracion_tratamiento' => $this->faker->numberBetween(1, 30) . ' días',
            'medico_prescriptor_id' => Medico::factory()
        ];
    }
}
