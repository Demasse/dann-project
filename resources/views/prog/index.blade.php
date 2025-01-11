@extends('layouts.admin')

@section('title','Creer un cours')
@section('content')
<div class="col-span-4">

    
    <h1 class=" text-2xl text-center  px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-md hover:opacity-80 transition-opacity duration-300  ">emploi de temps</h1>
    <br>

    <table class="min-w-full bg-white rounded-lg shadow-lg">


        <p class="text-lg font-bold text-gray-800 text-center mb-4">
            Emploi de temps de la semaine du {{ \Carbon\Carbon::now()->startOfWeek()->format('d/m/Y') }} au {{ \Carbon\Carbon::now()->endOfWeek()->format('d/m/Y') }}
        </p>

        <thead>
            <tr class="bg-blue-600 text-white">
                <th class="py-2 px-4 text-left">Matière</th>
                <th class="py-2 px-4 text-left">Jour</th>
                <th class="py-2 px-4 text-left">Heure de début</th>
                <th class="py-2 px-4 text-left">Heure de fin</th>
                <th class="py-2 px-4 text-left">enseignant</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($progs as $prog)
            <tr>
                 {{-- @dump($prog) --}}
                <td>{{ $prog->cour['nom'] }}</td>
                <td>{{ $prog->jour }}</td>
                <td>{{ $prog->heure_debut }}</td>
                <td>{{ $prog->heure_fin }}</td>
                <td>{{ $prog->nom }}</td>
             </tr>
            @endforeach
        </tbody>




    </table>

    
    <br>
<br>

   <button onclick="window.print()" class="bg-gradient-to-r from-blue-500 to-green-500 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300 hover:shadow-xl hover:scale-105">
      Imprimer
  </button>




</div>

@endsection
