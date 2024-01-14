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
        // to be done $facultati si $departamente

        $facultate = $this->faker->numberBetween(1, 9); // Assume a range for facultate_id

        // Define the available departament_ids based on facultate_id
        $availableDepartments = [];
        switch ($facultate) {
            case 1:
                $availableDepartments = [1, 2];
                break;
            case 2:
                $availableDepartments = [3, 4, 5, 6, 7, 8 , 9, 10, 11, 12, 13, 14, 15];
                break;
            case 3:
                $availableDepartments = [16, 17, 18];
                break;
            case 4:
                $availableDepartments = [19, 20, 21, 22, 23, 24];
                break;
            case 5:
                $availableDepartments = [25, 26, 27, 28, 29, 30, 31];
                break;
            case 6:
                $availableDepartments = [32, 33, 34, 35, 36];
                break;
            case 7:
                $availableDepartments = [37, 38, 39, 40, 41, 42, 43];
                break;
            case 8:
                $availableDepartments = [44, 45, 46, 47, 48];
                break;
            case 9:
                $availableDepartments = [49, 50];
                break;
        }
        $departament = $this->faker->randomElement($availableDepartments);


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
