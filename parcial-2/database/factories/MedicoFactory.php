<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departamento;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico>
 */
class MedicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_empleado' => $this->faker->unique()->regexify('MED[0-9]{5}'),
            'nombre_completo' => $this->faker->name(),
            'especialidad' => $this->faker->randomElement(['Cardiólogo', 'Pediatra', 'Neurólogo', 'Traumatólogo']),
            'anios_experiencia' => $this->faker->numberBetween(1, 30),
            'horario_consulta' => $this->faker->randomElement(['Matutino', 'Vespertino', 'Nocturno']),
            'datos_contacto' => $this->faker->phoneNumber() . ' - ' . $this->faker->email(),
            'departamento_principal_id' => Departamento::factory()
        ];
    }
}
