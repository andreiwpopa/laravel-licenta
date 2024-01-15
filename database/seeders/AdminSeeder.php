<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Enums\Roles;
use App\Models\StudentProfile;
use App\Models\StudentProfileLegal;
use App\Models\StudentProfileMinister;
use App\Models\StudentInformatiiScolaritate;
use App\Models\StudentContextScolaritate;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminProfile = StudentProfile::factory()->make();
        $adminProfile->save();

        StudentProfileLegal::factory()->create(['sp_id' => $adminProfile->id]);
        StudentProfileMinister::factory()->create(['sp_id' => $adminProfile->id]);
        StudentInformatiiScolaritate::factory()->create(['sp_id' => $adminProfile->id]);
        StudentContextScolaritate::factory()->create(['sp_id' => $adminProfile->id]);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => 'admin',
            'role_id' => Roles::ADMIN->value,
            'sp_id' => $adminProfile->id,
        ]);

        $user ->assignRole('admin');
    }
}
