<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Cour;
use App\Models\module;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours=Cour::with('modules', 'modules.competence')->orderBy('created_at', 'desc')->paginate(20);
        // foreach ($cours as $cour) {
            //     foreach ($cour->modules as $module) {
                //     dd($module->nom_module);
                // }
                // }
                // dd($cours);
        return view('cours.index',compact('cours'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modules=module::all(); //recupere les module assoisie au cours
        return view('cours.create',compact('modules'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255', // Le nom du module
            'description' => 'required|string|max:255', // La compétence associée
            // 'cour_id' => 'required|exists:cours,id', // Le cours sélectionné
        ]);
        $cours = Cour::create([
            'nom' => $validated['nom'], // Le nom du module
            'description' => $validated['description'],
        ]);

    

        // Redirection avec message de succès
        return redirect()->route('cours.index')->with('success', 'Cours creer avec success !');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $module = Module::findOrFail($id);
    //   $competences= $module->competences;
      $cour=cour::find($id);
      $modules=Module::all();
      return view('cours.show',compact('cour','modules'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cour $cour)
    {

        $modules=Module::all(); //recupere les module assoisie au cours
        return view('cours.edit',compact('cour','modules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cour $cour)
    {
        // 1. Valider les données entrées par l'utilisateur
        $request->validate([
            'nom'=> 'required',
            'description'=> 'required',

            // 'module_id'=> 'required',

        ]);

        // 2. Mettre à jour les champs du modèle avec les nouvelles données
        $cour->update([
            'nom' => $request->input('nom'),
            'description' => $request->input('description'),

        ]);
        // dd($request);


        // 3. Rediriger l'utilisateur vers la liste des cours, en affichant un message de succès
        return redirect()->route('cours.index')->with('success', 'Cours mis à jour avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cour $cour)
    {
        try {
            $cour->delete();
            return redirect()->route('cours.index')->with('success', 'Le cours a été supprimé avec succès.');


        } catch (\Exception $e) {
            // Gestion de l'erreur
            return redirect()->route('cours.index')->with('error', 'Une erreur est survenue lors de la suppression du cours.');
        }
    }
}
