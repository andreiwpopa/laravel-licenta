<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facultate;

class FacultateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Facultate::create(['facultate_name' => 'Facultatea de Drept']);
        Facultate::create(['facultate_name' => 'Facultatea de Inginerie']);
        Facultate::create(['facultate_name' => 'Facultatea de Litere şi Arte']);
        Facultate::create(['facultate_name' => 'Facultatea de Medicină']);
        Facultate::create(['facultate_name' => 'Facultatea de Ştiinţe']);
        Facultate::create(['facultate_name' => 'Facultatea de ȘAIAPM']);
        Facultate::create(['facultate_name' => 'Facultatea de Ştiinte Economice']);
        Facultate::create(['facultate_name' => 'Facultatea de Științe Socio-Umane']);
        Facultate::create(['facultate_name' => 'Facultatea de Teologie']);
    }
}
