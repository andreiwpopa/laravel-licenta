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
        // Facultatea de Drept
        FacultateDepartamentLicenta::create([
            'facultate_id' => '1',
            'departament_name' => 'Drept'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '1',
            'departament_name' => 'Administratie Publica'
        ]);

        //Facultatea de Inginerie
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Calculatoare'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Tehnologia Informatiei'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Ingineria Sistemelor Multimedia'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Electronica Aplicata'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Electromecanica'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Inginerie Industriala'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Inginerie si management'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Ingineria transporturilor'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Ingineria mediului'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Mine, petrol si gaze'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Sisteme de Productie digitale'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Tehnologia Tricotajelor si Confectii'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Inginerie economica industriala'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Mecatronica'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '2',
            'departament_name' => 'Robotica'
        ]);

        // Facultatea de Litere şi Arte
        FacultateDepartamentLicenta::create([
            'facultate_id' => '3',
            'departament_name' => 'Arta Teatrala'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '3',
            'departament_name' => 'Studii Anglo-Americane si Germanistice'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '3',
            'departament_name' => 'Studii Romanice'
        ]);

        // Facultatea de Medicină
        FacultateDepartamentLicenta::create([
            'facultate_id' => '4',
            'departament_name' => 'Medicina'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '4',
            'departament_name' => 'Medicina Dentara'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '4',
            'departament_name' => 'Farmacie'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '4',
            'departament_name' => 'Asistenta Medicala Generala'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '4',
            'departament_name' => 'Tehnica Dentara'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '4',
            'departament_name' => 'Balneofiziokinetoterapie si Recuperare'
        ]);

        // Facultatea de Stiinte
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
            'departament_name' => 'Informatica'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '5',
            'departament_name' => 'Matematică informatică'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '5',
            'departament_name' => 'Ecologie și protecția mediului'
        ]);

        // Facultatea de ȘAIAPM

        FacultateDepartamentLicenta::create([
            'facultate_id' => '6',
            'departament_name' => 'Ingineria Produselor Alimentare'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '6',
            'departament_name' => 'Controlul si expertiza produselor alimentare'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '6',
            'departament_name' => 'Inginerie si management in alimentatie publica si agroturism'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '6',
            'departament_name' => 'Ingineria si protectia mediului in agricultura'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '6',
            'departament_name' => 'Montanologie'
        ]);

        // Facultatea de Ştiinte Economice
        FacultateDepartamentLicenta::create([
            'facultate_id' => '7',
            'departament_name' => 'Economia Comertului, Turismului si Serviciilor'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '7',
            'departament_name' => 'Administrarea afacerilor'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '7',
            'departament_name' => 'Informatica Economica'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '7',
            'departament_name' => 'Finante si Banci'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '7',
            'departament_name' => 'Management'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '7',
            'departament_name' => 'Contabilitate si Informatica de Gestiune'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '7',
            'departament_name' => 'Marketing'
        ]);

        // Facultatea de Științe Socio-Umane
        FacultateDepartamentLicenta::create([
            'facultate_id' => '8',
            'departament_name' => 'Jurnalism'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '8',
            'departament_name' => 'Comunicare si relatii publice'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '8',
            'departament_name' => 'Sociologie'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '8',
            'departament_name' => 'Resurse umane'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '8',
            'departament_name' => 'Asistenta sociala'
        ]);

        // Facultatea de Teologie
        FacultateDepartamentLicenta::create([
            'facultate_id' => '9',
            'departament_name' => 'Teologie Pastorala'
        ]);
        FacultateDepartamentLicenta::create([
            'facultate_id' => '9',
            'departament_name' => 'Muzica religioasa'
        ]);
    }
}
