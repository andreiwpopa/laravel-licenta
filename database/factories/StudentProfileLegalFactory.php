<?php

namespace Database\Factories;

use App\Models\StudentProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentProfileLegal>
 */
class StudentProfileLegalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $index=0;

        $existingStudentProfileId = StudentProfile::pluck('id')[$index++];

        return [
            'sp_id' => $existingStudentProfileId,
            'mediu' => fake()->randomElement(['Da', 'Nu']),
            'strain' => fake()->randomElement(['Da', 'Nu']),
            'minoritar' => fake()->randomElement(['Da', 'Nu']),
            'cetatenie' => fake()->word(),
            'nationalitate' => fake()->word(),
            'cnp' => fake()->randomNumber(10, true),
            'serie' => fake()->bothify('??-######'),
            'stare_civila' => fake()->randomElement(['casatorit', 'necasatorit']),
            'situatie_militara' => fake()->randomElement(['neincorporabil', 'incorporabil']),
            'nr_livret_militar' => fake()->randomNumber(5, true),
        ];
    }
}
