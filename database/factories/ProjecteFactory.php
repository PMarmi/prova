<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projecte>
 */
class ProjecteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // $paraulesNom = rand(4,8);
        // $fraseDescripcio = rand(50,150);
        
        return [
            'nom' => fake()->sentence(),
            'usuari_id' => fake()->randomElement([1, 2]),
            'descripcio' => fake()->paragraph(),
        ];
    }
}
