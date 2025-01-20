@extends('layouts.admin')

@section('title','Creer un cours')
@section('content')
<div class="col-span-4">

    <h1 class=" text-2xl text-center   px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-md hover:opacity-80 transition-opacity duration-300">Listes des utilisateurs</h1>
<br>
<br>

<form action=" {{ route('user.show', $user->id) }} " method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="nom">Nom :</label>
        <input class="shadow  appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" type="text"  name="nom" value="{{ $user->name }}" required>
    </div>

</form>

</div>
@endsection
