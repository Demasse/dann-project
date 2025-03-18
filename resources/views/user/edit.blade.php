{{-- <!-- resources/views/utilisateurs/edit.blade.php -->
@extends('layouts.admin')

@section('content')


<div class="col-span-4">

    <h1 class=" text-2xl text-center   px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-md hover:opacity-80 transition-opacity duration-300"> Modifier l'utilisateur</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">Nom</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="role">Rôle</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="role" type="text" name="role" value="{{ $user->role }}" required>
        </div>

        <button type="submit" class="bg-gradient-to-r from-blue-500 to-green-500 text-white font-bold py-2 px-4 rounded-lg border-2 border-transparent transition duration-300 hover:opacity-80 hover:border-white">
            Mettre à jour
        </button>
     <br>
     <br>
        <a href="{{ auth()->user()->role === 'admin' ? 'http://127.0.0.1:8000/utilisateurs' : 'http://127.0.0.1:8000/etudiants' }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Retour</a>
    </form>




</div>


@endsection --}}



@extends('layouts.admin')

@section('content')

<div class="col-span-4">

    <h1 class=" text-2xl text-center   px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-md hover:opacity-80 transition-opacity duration-300"> Modifier l'utilisateur</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">Nom</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="role">Rôle</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="role" type="text" name="role" value="{{ $user->role }}" required>
        </div>

        <button type="submit" class="bg-gradient-to-r from-blue-500 to-green-500 text-white font-bold py-2 px-4 rounded-lg border-2 border-transparent transition duration-300 hover:opacity-80 hover:border-white">
            Mettre à jour
        </button>
     <br>
     <br>
        <a href="{{ auth()->user()->role === 'admin' ? 'http://127.0.0.1:8000/utilisateurs' : 'http://127.0.0.1:8000/etudiants' }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Retour</a>
    </form>

</div>

@endsection
