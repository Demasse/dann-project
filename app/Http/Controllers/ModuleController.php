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
        $modules=Module::all(); //recupere les module assoisie au cours
        return view('module.create',compact('modules', 'cours' ));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'competence' => 'required|string|max:255',
            'cour_id' => 'required|exists:cours,id',
        ]);

        // MODIFICATION 2 : Utilisation directe de l'ID validé (plus rapide)
        // Recherche ou création du module
        $module = Module::firstOrCreate([
            'nom_module' => $validated['nom'],
            'cour_id' => $validated['cour_id'],
        ]);

        // MODIFICATION 3 : Utilisation de l'ID de l'objet $module fraîchement créé
        // C'est beaucoup plus sûr que de faire un "orderBy desc" qui peut renvoyer le module d'un autre utilisateur
        $competence = Competence::firstOrCreate([
            'titre' => $validated['competence'],
            'module_id' => $module->id
        ]);

        return redirect()->route('cours.index')->with('success', 'Module créé avec succès !');
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
