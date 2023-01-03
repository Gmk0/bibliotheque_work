<?php

namespace App\Http\Livewire\Admin;

use App\Models\Domaine;
use Livewire\Component;
use Livewire\WithFileUploads;

class DomaineViews extends Component
{
    use WithFileUploads;
    public  $domaines = [];
    public $file;






    public function registerDomaines()
    {
        $this->validate([
            'domaines.intitule' => 'required|unique:domaines,intitule',
            'domaines.description' => 'required',
            'file' => 'mimes:jpg,png,gif,jpeg'
        ]);

        $fileName = 'domaine' . time() . $this->file->getClientOriginalName();
        $upload_file = $this->file->storeAs('public/domaines', $fileName);
        $data = [
            'intitule' => $this->domaines['intitule'],
            'status' => 0,
            'description' => $this->domaines['description'],
            'image' => $fileName,
        ];
        Domaine::create($data);




        $this->domaines = "";
        $this->file = "";
        $this->dispatchBrowserEvent("hideModal", [
            "messages" => "Dommaine bien inserer"
        ]);
    }
    public function cleanModal()
    {
        $this->domaines = "";
        $this->file = "";
    }
    public function ActiveStatus(int $id)
    {
        $domaines= Domaine::find($id)->update([
            'status'=>1
        ]);
        
    }
    public function DesactiveStatus(int $id)
    {
        $domaines = Domaine::find($id)->update([
            'status' => 0
        ]);
    }

    public function deleteDomaines(int $id)
    {
        Domaine::destroy($id);
    }
    public function confirmDelete($id, $name)
    {

        $this->dispatchBrowserEvent('showWarningMessage', [
            "message" => [
                "text" => "Vous etes sur le point de supprimer $name  de domaines. voulez-vous continuer",
                "title" => "Etes-vous sur de continuer",
                "type" => "warning",
                "data" => [
                    "id" => $id
                ]
            ]

        ]);
    }

   
    public function render()
    {
        return view('livewire.admin.domaine-views',[
            'domaineList'=>Domaine::all(),
        ])->extends('layouts.admin')
        ->section('content');;
    }
}
