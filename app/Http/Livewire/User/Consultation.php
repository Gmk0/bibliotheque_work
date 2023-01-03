<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Consultation extends Component
{

    public $searchs;
    public $categorie;
    public $faculte;
    public function render()
    {
        return view('livewire.user.consultation');
    }
}
