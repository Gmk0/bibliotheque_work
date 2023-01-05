<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\work;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function home(){

        
        $works= work::where('status',1)->paginate(8);
        $domaines= Domaine::where('status',1)->paginate(6);
        return view('home',[
            "works"=>$works,
            "Domaine"=>$domaines
        ]);
    }
}
