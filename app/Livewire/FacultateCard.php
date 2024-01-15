<?php

namespace App\Livewire;

use Livewire\Component;

class FacultateCard extends Component
{
    public $facultate;

    public function mount($facultate)
    {
        $this->facultate= $facultate;
    }

    public function veziMaiMulte($facultate_id)
    {
        return redirect()->route('');
    }

    public function render()
    {
        return view('livewire.facultate-card', [
            'facultate' => $this->facultate,
        ]);
    }
}
