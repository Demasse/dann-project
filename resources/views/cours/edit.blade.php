
@extends('layouts.admin')

@section('content')

<div class="col-span-4">

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

    {{-- <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="module_id">Competence associé:</label>
        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="competence" required>
            @foreach($modules as $module)
                <option value="{{ $module->id }}">{{$module->competence?->titre}}</option>
            @endforeach
        </select>
    </div> --}}
{{-- @dump($cour->id) --}}
{{-- @dd($cour->modules) --}}
<div class="mb-4">
    <label for="module_id" class="block text-gray-700 font-bold mb-2">Module associé:</label>
    <select name="module_id[]" id="module_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required multiple>

        @foreach ($modules as $module)
        <option value="{{ $module->id }}"

            @foreach ($cour->modules as $moduleCour)

            {{$module->id === $moduleCour->id ? 'selected' : ''}}
            @endforeach
            >
            {{ $module->nom_module }}
        </option>

        @endforeach
    </select>
    {{-- @dd($modules) --}}
</div>

{{-- <div class="mb-4">
    <label for="competence_id" class="block text-gray-700 font-bold mb-2">Compétences associées:</label>
    <select name="competences[]" id="competence_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required multiple>
        @foreach ($competences as $competence)
            <option value="{{ $competence->id }}"
                @foreach ($cour->competences as $competenceCour)
                    {{ $competence->id == $competenceCour->id ? 'selected' : '' }}
                @endforeach
            >
                {{ $competence->nom }}
            </option>
        @endforeach
    </select>
</div> --}}

    <div class="">
        <button class="bg-blue-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Mise à jour
        </button>
    </div>
    <br>

    <a href="http://127.0.0.1:8000/cours" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2  mb-8 px-4 rounded">Retour</a>
    <a href="http://127.0.0.1:8000/cours" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2  mb-8 px-4 rounded ">Retour</a>
</form>


</div>
</div>

@endsection

