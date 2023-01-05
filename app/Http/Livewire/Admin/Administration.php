<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Administration extends Component
{
    public function render()
    {
        return view('livewire.admin.administration')->extends('layouts.admin')
        ->section('content');;
    }
}
