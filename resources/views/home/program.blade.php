
@extends('layouts.admin')

@section('title','Creer un cours')
@section('content')
<div class="col-span-4">

<h1 class=" text-2xl text-center   px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-md hover:opacity-80 transition-opacity duration-300">programme un cours</h1>

<br>

<form action="   " method="POST">
    @csrf

    <div class="mb-4">
        <label for="subject" class="block font-bold mb-2">Matière</label>
        <select name="subject_id" id="subject_id" class="border rounded py-2 px-3 w-full" required>

        @foreach ($cours as $cour )
          <option value=" {{$cour->id  }} ">{{$cour->nom}}</option>
        @endforeach

    </select>
    </div>

    <div class="mb-4">
        <label for="day" class="block font-bold mb-2">Jour</label>
        <select name="day" id="day" class="border rounded py-2 px-3 w-full">
            <option value="">Sélectionnez un jour</option>
            <option value="Lundi">Lundi</option>
            <option value="Mardi">Mardi</option>
            <option value="Mercredi">Mercredi</option>
            <option value="Jeudi">Jeudi</option>
            <option value="Vendredi">Vendredi</option>
        </select>
    </div>

    <div class="mb-4">
        <label for="start_time" class="block font-bold mb-2">Heure de début</label>
        <input type="time" name="start_time" id="start_time" class="border rounded py-2 px-3 w-full" required>
    </div>

    <div class="mb-4">
        <label for="end_time" class="block font-bold mb-2">Heure de fin</label>
        <input type="time" name="end_time" id="end_time" class="border rounded py-2 px-3 w-full" required>
    </div>

    <div class="mb-4">
        <label for="teacher_name" class="block font-bold mb-2">Nom de l'enseignant</label>
        <input type="text" name="teacher_name" id="teacher_name" class="border rounded py-2 px-3 w-full" required>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        create
    </button>
</form>

</div>

@endsection
