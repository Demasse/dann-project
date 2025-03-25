<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Prog;
use Illuminate\Http\Request;

class ProgController extends Controller
{
    public function index()
    {
        $progs = Prog::all();
        $schedule = [];
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
        $creneaux = ['Matin', 'Après-midi'];

        foreach ($days as $day) {
            foreach ($creneaux as $creneau) {
                $schedule[$day][$creneau] = [];
            }
        }

        foreach ($progs as $prog) {
            $schedule[$prog->jour][$prog->creneau][] = $prog;
        }

       // dd('Méthode index() appelée', $days, $creneaux);
        // Ajoute ceci pour tester

        return view("prog.index", compact('schedule', 'days', 'creneaux'));
    }


    public function create()
    {
        $cours = Cour::all();
        return view('prog.create', compact('cours'));
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'cour_id' => 'required|exists:cours,id',
            'jour' => 'required|in:Lundi,Mardi,Mercredi,Jeudi,Vendredi,Samedi',
            'creneau' => 'required|in:Matin,Après-midi',
            'nom' => 'required|string|max:255',
        ]);

        // Création d'un nouveau programme
        Prog::create($validatedData);

        // Redirection vers la liste des programmes avec un message de succès
        return redirect()->route('prog.index')->with('success', 'Le cours a été programmé avec succès.');
    }
}
