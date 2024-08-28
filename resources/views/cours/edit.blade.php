
@extends('layouts.admin')

@section('content')

<div class="container">

    <h1 class="text-2xl text-sky-600 "> Modification du cours  </h1>

 <form action="{{ route('cours.update' , [ 'cour'=>$cour ])  }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="nom">Nom du cours:</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="text" name="nom" value="{{ $cour->nom}}" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="nom">description</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="text" name="description" value="{{ $cour->description  }}" required>
    </div>
{{-- 
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="module_id">Competence associé:</label>
        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="competence" required>
            @foreach($modules as $module)
                <option value="{{ $module->id }}">{{$module->competence?->titre}}</option>
            @endforeach
        </select>
    </div> --}}

    <div class="">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Mise à jour
        </button>
    </div>
    <br>

    <a href="http://127.0.0.1:8000/cours" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2  mb-8 px-4 rounded">Retour</a>
</form>


</div>

@endsection

