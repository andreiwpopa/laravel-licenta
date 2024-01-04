<?php

namespace Database\Factories;

use App\Models\StudentProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentContextScolaritate>
 */
class StudentContextScolaritateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $facultate = 5;
        $departament = 5;

        static $index=0;
        $existingStudentProfileId = StudentProfile::pluck('id')[$index++];

        return [
            'sp_id' => $existingStudentProfileId,
            'facultate_id' => $facultate,
            'departament_id' => $departament,
            'forma_de_invatamant' => fake()->randomElement(['zi', 'ff']),

        ];
    }
}
