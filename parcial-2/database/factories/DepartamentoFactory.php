<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departamento>
 */
class DepartamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'nombre' => $this->faker->randomElement(['Urgencias', 'Cardiología', 'Pediatría', 'Neurología', 'Traumatología']),
            'ubicacion' => 'Piso ' . $this->faker->numberBetween(1, 5) . ' - Ala ' . $this->faker->randomElement(['Norte', 'Sur', 'Este', 'Oeste']),
            'jefe_departamento' => $this->faker->name(),
            'presupuesto_anual' => $this->faker->numberBetween(50000, 500000)
        ];
    }
}
