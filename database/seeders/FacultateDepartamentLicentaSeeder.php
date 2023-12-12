<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FacultateDepartamentLicenta;

class FacultateDepartamentLicentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacultateDepartamentLicenta::create([
            'facultate_id' => '5',
            'departament_name' => 'Biologie'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '5',
            'departament_name' => 'Biologie - in limba engleză'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '5',
            'departament_name' => 'Educație fizică și sportivă'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '5',
            'departament_name' => 'Sport și performanță motrică'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '5',
            'departament_name' => 'Informatică'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '5',
            'departament_name' => 'Matematică informatică'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '5',
            'departament_name' => 'Ecologie și protecția mediului'
        ]);
    }
}
