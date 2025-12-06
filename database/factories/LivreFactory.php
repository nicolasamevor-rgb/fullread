<?php

namespace Database\Factories;

use App\Models\categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livre>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => fake()->sentence(3),
            'auteur' => fake()->name(),
            'categorie_id' => categorie::factory(),
            'disponibilite' => fake()->boolean(),

        ];
    }
}
