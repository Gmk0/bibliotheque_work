<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserAdmin extends Component
{
    use WithPagination;
    public function render()
    {

        return view('livewire.admin.user-admin',[
            'users'=>User::paginate(15),
        ])->extends('layouts.admin')
        ->section('content')
        ;
    }
}
