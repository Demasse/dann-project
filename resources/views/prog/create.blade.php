
@extends('layouts.admin')

@section('title','PROGRAMME UN COURS')
@section('content')
<div class="col-span-4">

    <h1 class="text-2xl text-center px-4 py-2 font-bold text-white bg-gradient-to-r from-red-500 to-black rounded-md hover:opacity-80 transition-opacity duration-300">Programmer un cours</h1>
<br>

<form action="{{ route('prog.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label for="subject" class="block font-bold mb-2">Matière</label>
        <select name="cour_id" id="subject_id" class="border rounded py-2 px-3 w-full" required>

        @foreach ($cours as $cour )
          <option value=" {{$cour->id  }} ">{{$cour->nom}}</option>
        @endforeach

    </select>
    @error('subject_id')
    {{$message}}
            @enderror
    </div>

    <div class="mb-4">
        <label for="day" class="block font-bold mb-2">Jour</label>
        <select name="jour" id="day" class="border rounded py-2 px-3 w-full">
            <option value="">Sélectionnez un jour</option>
            <option value="Lundi">Lundi</option>
            <option value="Mardi">Mardi</option>
            <option value="Mercredi">Mercredi</option>
            <option value="Jeudi">Jeudi</option>
            <option value="Vendredi">Vendredi</option>
        </select>
        @error('day')
        {{$message}}
                @enderror
    </div>

    <div class="mb-4">
        <label for="start_time" class="block font-bold mb-2">Heure de début</label>
        <input type="time" name="heure_debut" id="start_time" class="border rounded py-2 px-3 w-full" required>
        @error('start_time')
{{$message}}
        @enderror
    </div>

    <div class="mb-4">
        <label for="end_time" class="block font-bold mb-2">Heure de fin</label>
        <input type="time" name="heure_fin" id="end_time" class="border rounded py-2 px-3 w-full" required>
        @error('end_time')
        {{$message}}
                @enderror
    </div>

    <div class="mb-4">
        <label for="teacher_name" class="block font-bold mb-2">Nom de l'enseignant</label>
        <input type="text" name="nom" id="teacher_name" class="border rounded py-2 px-3 w-full" required>
        @error('teacher_name')
        {{$message}}
                @enderror
    </div>

    <div class="flex items-center justify-between">
        <button
            class="text-red-500 hover:text-white font-semibold bg-black py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit">
            Create
        </button>
    </div>
</form>

</div>

@endsection
