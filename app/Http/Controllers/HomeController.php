<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function __construct(){

        $this->middleware('auth');
       // $this->middleware('auth')->except('logout');

    }



    // public function about(){


    //     return view("begin.about");

    // }


    public function cours(){
        $cours=Cour::with('modules', 'modules.competence')->orderBy('created_at', 'desc')->paginate(20);
// dd($cours);
        return view('cours.index',compact('cours'));

    }

    public function jours(){


        return view('cours.jours');

    }

    public function emploi(){


        return view('home.emploi');

    }
    public function liste(){


        return view('cours.liste');

    }

    public function acceuil(){
        $countcour = Cour::count();
        $countmodule = Module::count();
        $countuser = User::count();
        $profcount = User::where('role','enseignant')->count();
        $etudiantcount = User::where('role','etudiant')->count();

        return view('begin.acceuil', compact("countcour", "countmodule", "countuser","profcount","etudiantcount" ));

    }





}