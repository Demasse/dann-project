<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Cour;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{




    public function create()
    {
        $cours=Cour::all();
        $modules=module::all(); //recupere les module assoisie au cours
        return view('module.create',compact('modules', 'cours' ));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255', // Le nom du module
            'competence' => 'required|string|max:255', // La compétence associée
            'cour_id' => 'required|exists:cours,id', // Le cours sélectionné
        ]);

        $cour_id = Cour::where('id', $validated['cour_id'])->first()->id;
        // Recherche ou création du module
        $module = Module::firstOrCreate([
            'nom_module' => $validated['nom'],
            'cour_id' => $cour_id,
        ]);
        $module_id = Module::orderBy('id', 'desc')->first()->id;
        // Recherche ou création de la compétence
        $competence = Competence::firstOrCreate([
            'titre' => $validated['competence'],
            'module_id' => $module_id
        ]);
        // Mise à jour du cours sélectionné avec les nouvelles associations


        // Redirection avec message de succès
        return redirect()->route('cours.index')->with('success', 'Module creer avec succès !');
    }


    public function edit($id)
    {
        // Récupérer le module spécifique
        $module = Module::findOrFail($id);

        // Récupérer les compétences associées au module
        $competences = Competence::where('module_id', $module->id)->get();

        // Récupérer tous les cours pour pouvoir les afficher
        $cours = Cour::all();

        return view('modules.edit', compact('module', 'competences', 'cours'));
    }


    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom_module' => 'required|string|max:255',
            'cour_id' => 'required|exists:cours,id',
        ]);

        // Récupération du module à mettre à jour
        $module = Module::findOrFail($id);

        // Mise à jour des informations du module
        $module->nom_module = $validated['nom_module'];
        $module->cour_id = $validated['cour_id'];

        // Sauvegarde des modifications
        $module->save();

        // Redirection vers la liste des modules avec un message de succès
        return redirect()->route('cours.index')->with('success', 'Cours mis à jour avec succès');

    }


    public function index(){


        return view("begin.acc");

    }







}
