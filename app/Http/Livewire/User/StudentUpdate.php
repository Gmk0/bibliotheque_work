<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentUpdate extends Component
{
    public $state;
    public function render()
    {
      

        return view('livewire.user.student-update');
    }
    public function mount(){
        $id = Auth::user()->id;
        $this->state = \App\Models\etudiant::where('users_id', $id)->first()->toArray();
    }

    public function updateStudent(){

        $this->validate([
            "state.name"=>"required"
        ]);
        \App\Models\etudiant::find($this->state['id'])->update([
            "name"=>$this->state['name']
        ]);

        $this->emit("saved");
        
    }
}
