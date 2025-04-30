<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numero_identificacion' => $this->faker->unique()->regexify('PAC[0-9]{6}'),
            'nombre_completo' => $this->faker->name(),
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-80 years', '-1 year'),
            'direccion' => $this->faker->address(),
            'telefono' => $this->faker->phoneNumber(),
            'correo_electronico' => $this->faker->email(),
            'grupo_sanguineo' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'alergias' => $this->faker->optional()->sentences(2, true),
            'historial_medico_resumido' => $this->faker->optional()->paragraph()
        ];
    }
}
