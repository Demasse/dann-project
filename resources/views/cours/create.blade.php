
@extends('layouts.admin')

@section('title','Creer un cours')
@section('content')
<div class="col-span-4">

<h1 class="text-2xl font-bold mb-4">Créer un nouveau cncghfcgcours</h1>




<form action="{{ route('cours.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="nom">Nom du cours:</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="text" name="nom" required>
    </div>

    <div class="mb-4">
        <label for="description" class="block font-bold mb-2">Description</label>
        <textarea name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
      </div>

    <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Créer
        </button>
    </div>
</form>

</div>

@endsection
