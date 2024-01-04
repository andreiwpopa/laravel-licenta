<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(FacultateSeeder::class);
        $this->call(FacultateDepartamentLicentaSeeder::class);
        $this->call(DepartamentDisciplineLicentaSeeder::class);
        $this->call(StudentProfileSeeder::class);
    }
}
