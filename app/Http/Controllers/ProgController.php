<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Prog;
use Illuminate\Http\Request;

class ProgController extends Controller
{

    public function program(){

        // $progs = Prog::all();
        $cours=Cour::all();
        return view("prog.create",compact('cours'));

    }

    // public function create()
    // {
    //     $cours = Cour::all();
    //     return view('prog.create', compact('cours'));
    // }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'cours_id' => 'required|exists:cours,id', // Assurez-vous que 'cours' est le nom de votre table
            'jour' => 'required|string',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:start_time',
            'nom' => 'required|string|max:255',

        ]);

        // Création d'un nouveau programme
        Prog::create($validatedData);

        // Redirection vers la liste des programmes avec un message de succès
        return redirect()->route('programme-cours.index')->with('success', 'Le cours a été programmé avec succès.');
    }

}
