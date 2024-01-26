<?php

namespace App\Livewire;

use App\Models\DepartamentDisciplineLicenta;
use App\Models\Facultate;
use App\Models\FacultateDepartamentLicenta;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class CreateProfesor extends Component
{
    public $facultati;
    public $departamente;
    public $discipline;

    #[Modelable]
    public $disciplineIds = [];

    public $selectedFacultate = null;
    public $selectedDepartamente = null;



    public function mount()
    {
        $this->facultati = Facultate::all();
    }

    public function updatedSelectedFacultate($facultate)
    {
        $this->departamente = FacultateDepartamentLicenta::where('facultate_id', $facultate)->get();
    }

    public function updatedSelectedDepartamente($departamente)
    {
        $this->discipline = DepartamentDisciplineLicenta::where('departament_id', $departamente)->get();
    }
    public function render()
    {
        return view('livewire.create-profesor');
    }
}
