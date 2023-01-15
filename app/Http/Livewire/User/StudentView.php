<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentView extends Component
{
    public $etudiant=[];
    public $facultes = ['SCIENCES INFORMATIQUE', 'ECONOMIE', 'DROIT', 'DROIT CANONIQUE', 'MEDECINE', 'PHILOSOPHIE', 'COMMUNICATION SOCIAL', 'THEOLOGIE'];

    public function render()
    {
        return view('livewire.user.student-view')->extends('layouts.user')
        ->section('content');
    }

    public function register(){
        $this->validate([
            "etudiant.name"=>"required|string",
            "etudiant.matricule" => "required|min:14|max:14|unique:etudiants,matricule",
            "etudiant.faculte"=>"required|string"
        ]);
    
        $data=[
            'name'=>$this->etudiant['name'],
            'matricule' => $this->etudiant['matricule'],
            'faculte' => $this->etudiant['faculte'],
            'users_id' => Auth::user()->id,
        ] ;

            \App\Models\etudiant::create($data);

        $this->dispatchBrowserEvent("showSuccessMessage", [
            "messages" => "les document a ete bien envoyer"
        ]);
        
        $this->etudiant=[];
      

    }
}
