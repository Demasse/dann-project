@extends('layouts.admin')

@section('title','Creer un cours')
@section('content')
<div class="col-span-4">






    <body class="bg-gray-100 p-6">

        <div class=" justify-end  text-end mx-2">

            <div x-data="{ open: false }" class="relative inline-block text-left">
                <div>
                    <button @click="open = !open" class="inline-flex justify-center  w-16 h-16 rounded-full border border-gray-300 shadow-sm px-4 py-2 bg-purple-700 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Étudiant
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a href="register" class="block px-4 py-2 text-sm text-gray-700   hover:text-red-500 " role="menuitem">profil</a>
                        <a href="login" class="block px-4 py-2 text-sm text-gray-700   hover:text-red-500 " role="menuitem">option du profiles</a>
                    </div>
                </div>
            </div>

        </div>

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
