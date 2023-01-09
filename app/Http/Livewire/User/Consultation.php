<?php

namespace App\Http\Livewire\User;

use App\Models\Domaine;
use App\Models\work;
use Livewire\Component;
use Livewire\WithPagination;

class Consultation extends Component
{
    use WithPagination;
    public $allDomaine;
    public $domaine ;
    public $searchs="";
    public $categorie;
    public $faculte;
    public $order="ASC";
    public $sort="10";
    public $name="sujet";
    public $sujet;
    public $domainesName="all categorie";
    

    protected $paginationTheme = "tailwind";
    protected $queryString = [
        'searchs' => ['expect' => ''],
        'categorie' => ['expect' => ''],
        'faculte'=>['expect'=>''],
        'domaine'=>['expect'=>'']
      
    ];
    public function clearfilter()
    {
        $this->domaine =null;
        $this->categorie = null;
        $this->categorie = null;
        $this->searchs = "";
    }
    public function domaines($id, string $name){
        $this->domainesName = $name;
        $this->domaine=$id;
    }


    public function searchiTem()
    {

        return $this->searchs;
    }
    
    public function updating($name, $val)
    {
        if ($name == 'searchs')  {
            $this->reset();
        }
    }
    public function render()
    {
        $this->allDomaine= Domaine::all();

        return view('livewire.user.consultation',[
            "works" => work::when($this->faculte, function ($q) {
                $q->where("faculte", 'LIKE', "%{$this->faculte}%");
                
            })->when($this->categorie, function($query){
                $query->where("categorie",$this->categorie);
                
            })->when($this->domaine, function ($query) {
                $query->whereHas('domaine', function ($q) {
                    $q->where('intitule', 'LIKE', "%{$this->domaine}%");
                });

            }) ->Where('status', 1)
                ->orderBy($this->name, $this->order)
                ->search(trim($this->searchs))
                ->paginate($this->sort),

            "count"=> work::when($this->faculte, function ($q) {
                $q->where("faculte", 'LIKE', "%{$this->faculte}%");
                
            })->when($this->categorie, function($query){
                $query->where("categorie",$this->categorie);
            }) ->Where('status', 1)
                ->orderBy($this->name, $this->order)
                ->search(trim($this->searchs))
                ->get(),
        ]);
    }
}
