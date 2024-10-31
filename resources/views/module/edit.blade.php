@extends('layouts.admin')

@section('content')
    <form action="{{ route('module.update', [ 'module'=>$module ]) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <!-- Champ pour modifier le nom du module -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="nom_module">Nom du Module</label>
            <input type="text" name="nom_module" value="{{ $module->nom_module }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="nom_module" required>
        </div>

        <!-- Liste des compétences associées -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Compétences Associées</label>
            <ul>
                @foreach ($competences as $competence)
                    <li>{{ $competence->titre }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Sélectionner un cours à associer -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="cour_id">Associer un Cours</label>
            <select name="cour_id" id="cour_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach ($cours as $cour)
                    <option value="{{ $cour->id }}" {{ $module->cour_id == $cour->id ? 'selected' : '' }}>{{ $cour->nom }}</option>
                @endforeach
            </select>
        </div>

        <!-- Bouton pour soumettre la mise à jour -->
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Mettre à Jour
            </button>
        </div>
    </form>
@endsection
