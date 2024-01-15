<?php

namespace App\Livewire;

use App\Http\Enums\LocuriAdmitere;
use App\Models\Facultate;
use App\Models\FacultateDepartamentLicenta;
use App\Models\StudentAdmis;
use App\Models\StudentContextScolaritate;
use Livewire\Attributes\Computed;
use Livewire\Component;

class DashboardStudenti extends Component
{
    public $facultateId;

    public function countStudentiInscrisi($facultate_id, $departament_id) {
        return StudentContextScolaritate::where('facultate_id', $facultate_id)->where('departament_id', $departament_id)->get()->count();
    }

    public function countStudentiAdmisi($facultate_id, $departament_id) {
        return StudentAdmis::where('facultate_id', $facultate_id)->where('departament_id', $departament_id)->where('loc_confirmat', '1')->get()->count();
    }

    public function updatedFacultateId()
    {
        $this->departamentId = null;
    }

    #[Computed()]
    public function facultati()
    {
        return Facultate::all();
    }
    #[Computed()]
    public function departamente()
    {
        return FacultateDepartamentLicenta::where('facultate_id', $this->facultateId)->get();
    }
    public function render()
    {
        $facultati=Facultate::all();
        $departamente=FacultateDepartamentLicenta::all();
        $locuriAdmitere =  LocuriAdmitere::cases();
        $isFull = 0;

        return view('livewire.dashboard-studenti', [
            'facultati' => $facultati,
            'departamente' => $departamente,
            'locuriAdmitere' => $locuriAdmitere,
            'isFull' => $isFull
        ]);
    }
}
