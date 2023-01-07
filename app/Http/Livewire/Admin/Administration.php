<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use App\Models\User;
use Livewire\Component;

class Administration extends Component
{
    public $admin=[];
  

    public function addUser()
    {
        $this->validate([
            "admin.name"=>'required',
            "admin.email" => 'required',
            "admin.password" => 'required',
            "admin.mobile" => 'required|numeric|unique:admins,mobile',
            "admin.role"=>'required'
            
        ]);
       

            Admin::create([
            'name'=>$this->admin['name'],
            'email' => $this->admin['email'],
            'mobile' => $this->admin['mobile'],
            'role' => $this->admin['role'],
            'password' => $this->admin['password'],
            'profile_photo_path' => "user.png",
            ]);


        $this->dispatchBrowserEvent('Event', [
            "message" => [

                "title" => "l'administrateur a ete inserer avec succes",
                "type" => "success",

            ]
        ]);
        $this->admin = [];
    }
    public function cleanModal(){
            $this->admin=[];
        
    }
    
    public function render()
    {
        return view('livewire.admin.administration',
        [
            'admins'=>Admin::all(),
        ])->extends('layouts.admin')
        ->section('content');;
    }
}
