<?php

namespace App\Http\Livewire\Admin;

use App\Models\Domaine;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class DomaineViews extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public  $domaines = [];
    public $file;
    public $domaineEdit=[];
    public $img;
    public $fileEdit;
    public $search="";






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
     
        $domaine=Domaine::find($id);
        $oldFile = public_path("\storage\domaines\\") . $domaine->image;
        File::delete($oldFile);

        Domaine::destroy($id);

        $this->dispatchBrowserEvent('Event', [
            "message" => [

                "title" => "le domaine a ete faites avec succes",
                "type" => "success",

            ]
        ]);
    }

    public function goToEdit(int $id){

       
        $this->domaineEdit=Domaine::find($id)->toArray();
        $this->img = $this->domaineEdit['image'];
   
        $this->dispatchBrowserEvent('showEditModal');
        
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

    public function editDomaine(){

            $this->validate([
            'domaineEdit.intitule' => 'required|',
            'domaineEdit.description' => 'required',
            ]);

         $oldFile= public_path("\storage\domaines\\").$this->domaineEdit['image'];
         
         $id = $this->domaineEdit['id'];

       

       

        if(empty($this->fileEdit)){
            Domaine::find($id)->update([
                'intitule' => $this->domaineEdit['intitule'],
                'description' => $this->domaineEdit['description'],
             
            ]);
        }else{
            $fileName = 'domaine' . time() . $this->fileEdit->getClientOriginalName();
            $upload_file = $this->fileEdit->storeAs('public/domaines', $fileName);
            File::delete($oldFile);

            Domaine::find($id)->update([
                'intitule'=>$this->domaineEdit['intitule'],
                'description'=>$this->domaineEdit['description'],
                'image'=>$fileName
            ]);
        }

            $this->dispatchBrowserEvent('Event',[
            "message" => [

                "title" => "Votre modification a ete faites avec succes",
                "type" => "success",
              
            ]
            ]);

     }
   
    public function render()
    {
        return view('livewire.admin.domaine-views',[
            'domaineList'=>Domaine::where("intitule",'LIKE',"%{$this->search}%")
            ->paginate(10),
          
        ])->extends('layouts.admin')
        ->section('content');;
    }
}
