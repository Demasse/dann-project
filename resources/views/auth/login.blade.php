<x-auth-layout title="Connexion" :action="route('login')" submitmessage="connexion">



    <x-input  name="email" label="Adresse e-mail"  type="email" />
    <x-input  name="password" label="mot de passe" type="password" />


    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <input id="remember" name="remember" type="checkbox"
                class="form-checkbox
                     h-4 w-4 rounded border-blue-300 text-green-950 focus:ring-green-950">
            <label for="remember" class="ml-3 block text-sm leading-6">Reste connecté
            </label>
        </div>



    </div>


    </x-auth-layout>

    <p class="text-center text-gray-700 -mt-8 -ml-10">
        Si vous n'avez pas de compte,
        <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700 font-semibold underline">
            inscrivez-vous
        </a>
    </p>
