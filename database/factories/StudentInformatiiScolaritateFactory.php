<?php

namespace Database\Factories;

use App\Models\StudentProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentInformatiiScolaritate>
 */
class StudentInformatiiScolaritateFactory extends Factory
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

        $startYear = fake()->year();
        $endYear = fake()->year('+1');

        return [
            'sp_id' => $existingStudentProfileId,
            'categorie_studii' => fake()->randomElement(['Absolvent liceu', 'Absolvent licenta']),
            'an_absolvire_liceu' => fake()->numberBetween(1970, 2024),
            'medie_bacalaureat' => fake()->randomFloat(2, 1, 10),
            'olimpic' => fake()->randomElement(['0', '1']),
            'medie_admitere' => fake()->randomFloat(2,1,10),
            'promotie' => $startYear . '-' . $endYear,
        ];
    }
}
