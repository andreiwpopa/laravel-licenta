<?php

namespace App\Livewire;

use App\Models\Facultate;
use App\Models\FacultateDepartamentLicenta;
use App\Models\StudentAdmis;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class StudentiAdmisiTable extends Component
{
    use WithPagination;

    public $search = '';
    public $confirmat = '';


    public function confirma_loc(StudentAdmis $studentAdmis)
    {
        $studentAdmis->loc_confirmat = 1;
        $studentAdmis->update();
    }

    public function neconfirmat(StudentAdmis $studentAdmis)
    {
        $studentAdmis->delete();
    }

    public function render()
    {
        $studentiAdmisi = StudentAdmis::search($this->search)
            ->when($this->confirmat !== '', function($query) {
                $query->where('loc_confirmat', $this->confirmat);
            })
            ->paginate(10);
        $facultati = Facultate::all();
        $departamente = FacultateDepartamentLicenta::all();


        foreach($studentiAdmisi as $student) {
            foreach($facultati as $facultate) {
                if ($student->facultate_id == $facultate->id){
                    $student->facultate_id = $facultate->facultate_name;
                }
            }
            foreach($departamente as $departament) {
                if($student->departament_id == $departament->id) {
                    $student->departament_id = $departament->departament_name;
                }
            }
        }

        return view('livewire.studenti-admisi-table', [
            'students' => $studentiAdmisi
        ]);
    }
}
