<?php

namespace App\Http\Livewire\User;

use App\Models\Domaine;
use App\Models\etudiant;
use App\Models\work;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddWork extends Component
{
    use WithFileUploads;
    public $work=[];
    public $nbrsPublication;
    public $file= null;
    public $students;
    public $matricule;
    public $facultes = ['SCIENCES INFORMATIQUE', 'ECONOMIE', 'DROIT', 'DROIT CANONIQUE', 'MEDECINE', 'PHILOSOPHIE', 'COMMUNICATION SOCIAL', 'THEOLOGIE'];

   

    public function save(){
        $this->validate([
            "work.sujet"=>'required',
            "work.etudiant"=>'required',
            "work.faculte"=>'required',
            "work.categorie"=>'required',
            "work.page"=>'required',
            "work.annee"=>'required',
            "work.domaine" => 'required',
            "file"=>'required|file|mimes:pdf,docx,ppt,pptx,doc|max:5000'
        ],[
            "required"=>"le champs :attribute est requis"
        ]);

        
        
        $fileName = $this->work['etudiant']. $this->file->getClientOriginalName();

        $upload_file = $this->file->storeAs('travaux', $fileName, 's3');

       $works= work::create([
            "sujet"=>$this->work['sujet'],
            "categorie"=>$this->work['categorie'],
            "faculte"=>$this->work['faculte'],
            "etudiant"=>$this->work['etudiant'],
            "annnee_etude"=>$this->work['annee'],
            "nbr_pages"=>$this->work['page'],
            "path_document"=>$fileName,
            "status"=>0,
            "viewCounter"=>0,
            "domaines_id"=>$this->work['domaine'],
            "etudiants_id" => $this->students->id,
        ]);
      

        $this->work = [];
        $this->file=null;
        $this->dispatchBrowserEvent("showSuccessMessage", [
            "message" => "Votre document a éte bien enregistrer il va
            etre  verifier avant sans mise enligne"
        ]);

    }

    public function findMatricule(){

        $this->validate([
            "matricule"=>'required|min:14|max:14'
        ]);
        $etudiant=etudiant::where('matricule',$this->matricule)->first();
        
        if(!empty($etudiant)){
            $this->students = $etudiant;
            $this->nbrsPublication=work::where('etudiants_id', $etudiant->id)->count();
         
        }else{
            $this->dispatchBrowserEvent("error", [
                "message" => "Matricule introuvable"
            ]);
        }
    }

    public function render()
    {
        $domaine= Domaine::all();

        return view('livewire.user.add-work',[
            'domaines'=>$domaine,
      
        ])->extends('layouts.user')
        ->section('content');
    }
}
