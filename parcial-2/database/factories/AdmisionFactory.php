<?php

namespace Database\Factories;

use App\Models\Departamento;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admision>
 */
class AdmisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_hora_ingreso' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'departamento_id' => Departamento::factory(),
            'medico_id' => Medico::factory(),
            'paciente_id' => Paciente::factory(),
            'sintomas_presentados' => $this->faker->paragraphs(2, true),
            'diagnostico_preliminar' => $this->faker->sentence(),
            'nivel_urgencia' => $this->faker->randomElement(['Bajo', 'Medio', 'Alto', 'Crítico'])
        ];
    }
}
