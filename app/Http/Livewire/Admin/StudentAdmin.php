<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class StudentAdmin extends Component
{
    public function render()
    {
        return view('livewire.admin.student-admin',[
            'users'=>\App\Models\etudiant::paginate(15),
        ])->extends('layouts.admin')
        ->section('content');
    }
}
