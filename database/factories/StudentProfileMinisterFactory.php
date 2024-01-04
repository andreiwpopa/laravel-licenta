<?php

namespace Database\Factories;

use App\Models\StudentProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentProfileMinister>
 */
class StudentProfileMinisterFactory extends Factory
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
            'serie_pasaport' => fake()->randomNumber(5, true),
            'nr_aprob_minister' => fake()->randomNumber(5, true),
            'serie_aprob_minister' => fake()->randomNumber(5, true),
            'data_aprob_minister' => fake()->dateTime()
        ];
    }
}
