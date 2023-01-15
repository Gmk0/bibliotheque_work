<?php

namespace App\Http\Livewire\Admin;

use App\Models\Domaine;
use App\Models\work;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class WorksAdmin extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public  $search = "";
    public   $worksMod=[];
    public $status;
    public $categorie;
    public $faculte;
    public $domaine;
    public $check;
    public $sort = 25;
    public  $selection = [];
    public $facultes=['SCIENCES INFORMATIQUE','ECONOMIE', 'DROIT', 'DROIT CANONIQUE', 'MEDECINE', 'PHILOSOPHIE','COMMUNICATION SOCIAL','THEOLOGIE'];

    protected $queryString = [
        'search' => ['expect' => ''],
    ];


    public function deleteTravaux(array $id)
    {

       
        
       
            # code...
            $works = work::find($id);
            foreach($works as $work){

            $oldFile = public_path("\storage\works\\") . $work->path_document;
            File::delete($oldFile); 
            }
          
         
       
        work::destroy($id);
        $this->selection = [];
        $this->check = ""; 
    }


    public function activeMultiples(array $id)
    {
        work::whereIn('id', $id)->update([
            'status' => 1,
        ]);
        $this->selection = [];
        $this->check = "";
    }

    public function desactiveMultiple(array $id)
    {

        work::whereIn('id', $id)->update([
            'status' => 0,
        ]);
        $this->selection = [];
        $this->check = "";
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function modifierId( $id)
    {
        $this->worksMod=work::find($id)->toArray();

        
        $this->dispatchBrowserEvent('showModalDocument');
        # code...
    }

    public function addIdDocument(){

        $this->validate([
            "worksMod.id_document"=>"required",
        ]);

        
        work::find($this->worksMod['id'])->update([
            'id_document'=> $this->worksMod['id_document']
        ]);
        $this->dispatchBrowserEvent('hideModalDocument');

    }

   

   
    
    public function render()
    {
        $this->domaines=Domaine::all();
        return view('livewire.admin.works-admin', [
            'travaux' => work::search(trim($this->search))
                ->when($this->status, function ($q) {
                    $q->where('status', $this->status);
                })
                ->when($this->categorie, function ($q) {
                    $q->where('categorie', $this->categorie);
                })->when($this->faculte, function ($q) {
                    $q->where('faculte', $this->faculte);
                })->when($this->domaine, function ($q) {
                $q->where('domaines_id', $this->domaine);
                    })
                ->orderBy('id', 'asc')

                ->paginate($this->sort),
        ])->extends('layouts.admin')
        ->section('content');
    }
}
