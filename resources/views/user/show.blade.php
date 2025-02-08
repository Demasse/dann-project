@extends('layouts.admin')

@section('title','Listes des utilisateurs')
@section('content')
<div class="col-span-4">

    <h1 class=" text-2xl text-center   px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-md hover:opacity-80 transition-opacity duration-300">Listes des utilisateurs</h1>
<br>
<br>



<form action="{{ route('user.show', $user->id ) }}" method="POST">
    @csrf
    {{-- @method('PUT') --}}

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="nom">Nom </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="text" name="nom" value="{{ $user->name }}" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="nom">Email </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="text" name="nom" value="{{ $user->email }}" required>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="nom">Rôle </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="text" name="nom" value="{{ $user->role }}" required>
    </div>

    {{-- <a href=" http://127.0.0.1:8000/utilisateurs " class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Retour</a> --}}


    <a href="{{ auth()->user()->role === 'admin' ? 'http://127.0.0.1:8000/utilisateurs' : 'http://127.0.0.1:8000/etudiants' }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Retour</a>




</form>


</div>
@endsection
