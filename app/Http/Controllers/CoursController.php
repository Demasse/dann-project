<?php

namespace App\Http\Controllers;

use App\Models\cours;
use App\Models\module;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cours=Cours::with('modules', 'modules.competence')->orderBy('created_at', 'desc')->paginate(20);
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
        $request->validate([
            'nom'=> 'required',
            'module_id'=> 'required',
        ]);

      cours::create($request->all());

      return redirect()->route('cours.index')->with('success','les cours a ete cree avec success');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $module = Module::findOrFail($id);
      $competences= $module->competences;

      return response()->json([
        'module' => $module,
        'competences' => $competences
      ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cours $cours)
    {
        $modules=Module::all(); //recupere les module assoisie au cours
        return view('cours.edit',compact('cours','modules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cours $cours)
    {
        // 1. Valider les données entrées par l'utilisateur

      $request->validate([
        'nom'=> 'required',
        'moduleçid'=> 'required',

      ]);

// 2. Mettre à jour les champs du modèle avec les nouvelles données
        $cours->update([
            'nom' => $request->input('nom'),
            'module_id' => $request->input('module_id'),
        ]);


        // 3. Rediriger l'utilisateur vers la liste des cours, en affichant un message de succès
        return redirect()->route('cours.index')->with('success', 'Cours mis à jour avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cours $cour)
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
