<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentari>
 */
class ComentariFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tasca_id' => fake()->numberBetween(1, 15),
            'usuari_id' => fake()->numberBetween(1, 2),
            'contingut' => fake()->paragraph(),
        ];
    }
}
