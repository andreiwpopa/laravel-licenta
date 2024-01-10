<?php

namespace App\Livewire;

use App\Http\Enums\LocuriAdmitere;
use App\Models\Facultate;
use App\Models\FacultateDepartamentLicenta;
use App\Models\StudentAdmis;
use App\Models\StudentContextScolaritate;
use Livewire\Component;

class DashboardStudenti extends Component
{
    public function render()
    {
        $facultati=Facultate::all();
        $departamente=FacultateDepartamentLicenta::all();
        $studentiInscrisi = StudentContextScolaritate::all();
        $inscrisiCount = 0;
        $admisCount = 0;
        $admisi = StudentAdmis::all();
        $locuriAdmitere =  LocuriAdmitere::cases();
        $isFull = 0;

        return view('livewire.dashboard-studenti', [
            'facultati' => $facultati,
            'departamente' => $departamente,
            'studentiInscrisi' => $studentiInscrisi,
            'inscrisiCount' => $inscrisiCount,
            'admisi' => $admisi,
            'admisCount' => $admisCount,
            'locuriAdmitere' => $locuriAdmitere,
            'isFull' => $isFull
        ]);
    }
}
