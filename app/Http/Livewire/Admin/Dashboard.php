<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\work;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    
    use WithPagination;
    public $new_member;
    public $works_count;

    public $works_active;
    
    public function mount(){

       

    }
    public function render()
    {
        $this->new_member = User::all()->count();
     
        $this->works_active = work::where('status', 1)->count();
        $this->works_count = work::all()->count();
      
        return view('livewire.admin.dashboard',[
            'works'=>work::where('status',1)->orderBy('created_at','desc')->paginate(7),
        ]);
    }
}
