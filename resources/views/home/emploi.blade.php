@extends('layouts.admin')
@section('content')

<div class="col-span-4">
    <h1 class=" text-2xl text-center   px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-md hover:opacity-80 transition-opacity duration-300">Emploi de temps</h1>

 <br>
 <br>


            <table class="min-w-full bg-white rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="py-2 px-4 text-left">Matière</th>
                        <th class="py-2 px-4 text-left">jours</th>
                        <th class="py-2 px-4 text-left">heure de debut</th>
                        <th class="py-2 px-4 text-left">heure de fin</th>
                        <th class="py-2 px-4 text-left">Enseignant</th>

                    </tr>
                </thead>

                <tbody>
                   @foreach ($cours as $cour )

                   <tr>
                       <td class="py-2 px-4" {{$cour->id}} >{{$cour->nom}}</td>

                    </tr>
                    @endforeach
                </tbody>


            </table>



</div>
@endsection
