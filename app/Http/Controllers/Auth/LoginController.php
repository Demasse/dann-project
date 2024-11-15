<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{



    public function __construct(){

        $this->middleware('guest')->except('logout');
       // $this->middleware('auth')->except('logout');

    }



    public function showLoginForm():View{

        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
{
    // Validation des identifiants
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ]);

    // Tentative de connexion
    if (Auth::attempt($credentials, (bool) $request->remember)) {
        $request->session()->regenerate(); // Régénérer la session

        return redirect()->route('cours.index')->withStatus("Connexion réussie");
    }

    // En cas d'échec
    return back()->withErrors([
        'email' => 'Identifiants erronés.',
    ])->onlyInput('email');
}




    // public function login(Request $request): RedirectResponse{

    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required','string'],
    //     ]);


       // dd($request);
      // dd($request);


        // if (Auth::attempt($credentials , (bool) $request->remember)) {
        //     $request->session()->regenerate();

        //     return redirect()->route('cours.index')->withStatus("connexion reussie");
        // }

        // return back()->withErrors([
        //     'email' => 'identifiant erronés',
        // ])->onlyInput('email');
    // }

    public function logout(Request $request): RedirectResponse
        {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

        }

}
