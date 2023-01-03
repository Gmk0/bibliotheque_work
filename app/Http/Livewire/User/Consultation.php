<?php

namespace App\Http\Livewire\User;

use App\Models\work;
use Livewire\Component;

class Consultation extends Component
{

    public $searchs="";
    public $categorie;
    public $faculte;
    public $order="ASC";
    public $sort="10";
    public $name="sujet";
    public $sujet;

    protected $paginationTheme = "bootstrap";
    protected $queryString = [
        'searchs' => ['expect' => ''],
        'categorie' => ['expect' => ''],
        'faculte'=>['expect'=>'']
      
    ];

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
        return view('livewire.user.consultation',[
            "works" => work::when($this->faculte, function ($q) {
                $q->where("faculte", 'LIKE', "%{$this->faculte}%");
                
            })->when($this->categorie, function($query){
                $query->where("categorie",$this->categorie);
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
