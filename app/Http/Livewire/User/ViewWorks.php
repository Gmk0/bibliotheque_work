<?php

namespace App\Http\Livewire\User;

use App\Models\consultation;
use App\Models\work;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewWorks extends Component
{
    public $work;
    public function mount($id)
    {
        $this->work = work::find($id);
        consultation::create([
            'users_id' => Auth::user()->id,
            'works_id' => $id,
        ]);
    }
    public function render()
    {
        return view('livewire.user.view-works') ->extends('layouts.user')
        ->section('content');;
    }
}
