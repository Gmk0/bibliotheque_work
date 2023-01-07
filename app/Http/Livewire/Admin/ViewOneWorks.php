<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ViewOneWorks extends Component
{
    public $work;
    public function mount($id)
    {
        $this->work = \App\Models\work::find($id);
       
    }
    public function render()
    {
        return view('livewire.admin.view-one-works')->extends('layouts.admin')
        ->section('content');
    }
}
