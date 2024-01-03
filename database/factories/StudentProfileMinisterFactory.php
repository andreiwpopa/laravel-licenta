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
            'sp_id'
        ];
    }
}
