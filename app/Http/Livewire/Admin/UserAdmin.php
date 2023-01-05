<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class UserAdmin extends Component
{
    public function render()
    {
        return view('livewire.admin.user-admin')->extends('layouts.admin')
        ->section('content')
        ;
    }
}
