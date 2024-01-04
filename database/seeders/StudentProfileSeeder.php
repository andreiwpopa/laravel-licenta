<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentProfile;
use App\Models\StudentProfileLegal;
use App\Models\StudentProfileMinister;
use App\Models\StudentInformatiiScolaritate;
use App\Models\StudentContextScolaritate;
class StudentProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentProfiles = StudentProfile::factory()->count(100)->create();

        foreach ($studentProfiles as $studentProfile) {
            StudentProfileLegal::factory()->create(['sp_id' => $studentProfile->id]);
            StudentProfileMinister::factory()->create(['sp_id' => $studentProfile->id]);
            StudentInformatiiScolaritate::factory()->create(['sp_id' => $studentProfile->id]);
            StudentContextScolaritate::factory()->create(['sp_id' => $studentProfile->id]);
        }
    }
}
