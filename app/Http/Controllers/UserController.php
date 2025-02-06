<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user(){
        // $profcount = User::where('role','enseignant')->count();
        // $etudiantcount = User::where('role','etudiant')->count();
        $users = User::all();
        return view('user.index', compact('users',) );
    }

    public function updaterole(Request $request, $id)
    {
        // Validation du rôle
        $request->validate([
            'role' => 'required|in:etudiant,enseignant,admin',
        ]);

        // Récupération de l'utilisateur
        $user = User::findOrFail($id); // Correction ici

        // Mise à jour du rôle
        $user->role = $request->role;
        $user->save(); // Appel correct de la méthode save()

        // Redirection avec un message de succès
        return redirect()->route('user.index')->with('success', 'Rôle modifié avec succès');
    }

    public function prof(){


        $profcounts = User::where('role','enseignant')->get();

        return view('user.prof', compact('profcounts',) );
    }

    public function etudiant(){


        $etudiantcounts = User::where('role','etudiant')->get();

        return view('user.etudiant', compact('etudiantcounts') );
    }


    public function edit($id){
        $user = User::findOrFail($id);
        dd($user); // Assurez-vous que l'utilisateur existe
        return view('user.edit', compact('user'));

    }

    // public function edit($id){
    //     $user = User::findOrFail($id); // Assurez-vous que l'utilisateur existe
    //     dd($user); // Vérifiez que l'utilisateur est bien récupéré
    //     return view('user.edit', compact('user'));
    // }

    public function show(string $id){

        return view('user.show');

    }

      public function update(Request $request, User $user){


          $request->validate([
           'name'=>'required',
           'email' => 'required|email|unique:users,email,' . $user->id ,
           'role'=>'required'
          ]);

          $user->update($request->all());
          return redirect()->route('user.index')->with('success','utilisateur modifier avec success');




      }

    //   public function destroy(User $user){

    //    $user->delete();
    //    return redirect()->route('user.index')->with('success','utilisateur supprime avec success');

    //   }

      public function destroy(User $user)
      {
          try {
              $user->delete();
              return redirect()->route('user.index')->with('success', 'Le user a été supprimé avec succès.');


          } catch (\Exception $e) {
              // Gestion de l'erreur
              return redirect()->route('user.index')->with('error', 'Une erreur est survenue lors de la suppression du users.');
          }
      }

   }


// public function destroy(User $user)
// {
//     $user->delete();
//     return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès.');
// }



