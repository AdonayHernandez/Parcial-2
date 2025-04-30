<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Admision;
use App\Models\InformeAlta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<InformeAlta>
 */
class InformeAltaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'admision_id' => Admision::factory(),
            'diagnostico_final' => fake()->realText(200),
            'tratamientos_aplicados' => fake()->paragraphs(2, true),
            'medicacion_casa' => collect(fake()->sentences(3))
                ->map(fn($sentence) => trim($sentence, '.'))
                ->implode('. '),
            'recomendaciones_medicas' => fake()->realText(150),
            'fecha_proxima_revision' => fake()
                ->optional(0.7)
                ->dateTimeBetween('+1 week', '+6 months'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
