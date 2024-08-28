

@extends('layouts.admin')

@section('content')

<div class="container">


    <form action="{{ route('cours.show' , [ 'cour'=>$cour ])  }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="nom">Nom du cours:</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="text" name="nom" value="{{ $cour->nom}}" required>
        </div>

        <p>{{ $cour->nom}}</p>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="nom">description</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="text" name="nom" value="{{ $cour->description  }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="module_id">Module</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="module_id" required>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->nom_module }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="module_id">Competence associé:</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="module_id" required>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}">{{$module->competence?->titre}}</option>
                @endforeach
            </select>
        </div>

        <a href="http://127.0.0.1:8000/cours" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Retour</a>
    </form>


</div>
@endsection
