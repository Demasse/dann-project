@extends('layouts.admin')

@section('title','Creer un cours')
@section('content')
<div class="col-span-4">






    <body class="bg-gray-100 p-6">

        <div class="flex flex-row justify-center items-center mt-6 gap-10">
            <!-- Bloc Nombre de Modules -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-8 w-[40%] transition-transform transform hover:scale-105 hover:shadow-xl hover:border-blue-500 hover:bg-blue-50">
                <h2 class="text-2xl font-bold mb-4 hover:text-blue-800   ">Nombre de Cours</h2>
                <p class="text-3xl text-blue-600 transition-colors hover:text-blue-800  "> {{ $countcour }} </p>

            </div>

            <!-- Bloc Cours -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-8 w-[40%] transition-transform transform hover:scale-105 hover:shadow-xl hover:border-green-500 hover:bg-green-50">
                <h2 class="text-2xl font-bold mb-4 hover:text-green-800  ">Module</h2>
                <p class="text-3xl text-green-600 transition-colors hover:text-green-800 "> {{ $countmodule    }} </p>
            </div>
        </div>


        <div class="flex flex-row justify-center items-center mt-6 gap-10">
            <!-- Bloc Nombre de Modules -->
            <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-8 w-[40%] transition-transform transform hover:scale-105 hover:shadow-xl hover:border-fuchsia-700 hover:bg-blue-50">
                <h2 class="text-2xl font-bold mb-4 hover:text-fuchsia-700  ">Nombre total d'utilisateur</h2>
                <p class="text-3xl text-blue-600 transition-colors hover:text-fuchsia-700  "> {{ $countuser }} </p>

            </div>

             <!-- Bloc Cours -->
             <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-8 w-[40%] transition-transform transform hover:scale-105 hover:shadow-xl hover:border-green-500 hover:bg-green-50">
                <h2 class="text-2xl font-bold mb-4 hover:text-green-800  ">nombre d'enseignant</h2>
                <p class="text-3xl text-green-600 transition-colors hover:text-green-800 ">{{  $profcount }} </p>
            </div>

        </div>

    <div class="flex flex-row justify-center items-center mt-6 gap-10">

        <div class="bg-white border border-gray-300 rounded-lg shadow-lg p-8 w-[40%] transition-transform transform hover:scale-105 hover:shadow-xl hover:border-green-500 hover:bg-green-50">
           <h2 class="text-2xl font-bold mb-4 hover:text-green-800  ">nombre etudiants</h2>
           <p class="text-3xl text-green-600 transition-colors hover:text-green-800 "> {{ $etudiantcount }}  </p>
       </div>
    </div>
    </body>

</html>

</div>
@endsection
