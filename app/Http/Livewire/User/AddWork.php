<?php

namespace App\Http\Livewire\User;

use App\Models\Domaine;
use App\Models\work;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddWork extends Component
{
    use WithFileUploads;
    public $work=[];
    public $file;
    public $students;
    public $faculte=array(
        "name"=>[
            'SCIENCES-INFORMATIQUE',
            'MEDECINE',
            'DROIT'
        ],
        );
   

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

        
        
        $fileName = time() . $this->file->getClientOriginalName();
        $upload_file = $this->file->storeAs('public/works', $fileName);

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
        ]);
      

        $this->work = [];
        $this->file=null;
        $this->dispatchBrowserEvent("showSuccessMessage", [
            "messages" => "les document a ete bien envoyer"
        ]);

    }

    public function render()
    {
        $domaine= Domaine::all();

        return view('livewire.user.add-work',[
            'domaines'=>$domaine,
            'facultes'=>$this->faculte,
        ])->extends('layouts.user')
        ->section('content');
    }
}
