<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentProfile>
 */
class StudentProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nume_complet' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'data_nastere' => fake()->dateTime(),
            'tara_nastere' => fake()->country(),
            'judet_nastere' => fake()->state(),
            'sex' => fake()->randomElement(['masculin', 'feminin']),
        ];
    }
}
