<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion des Cours')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Inclure d'autres fichiers CSS ou bibliothèques si nécessaire -->
</head>
<body class="bg-gray-100 font-sans">
    <header class="bg-blue-500 py-4 shadow-md">
        <nav class="container mx-auto">
            <!-- Menu de navigation commun à toutes les pages -->
            <ul class="flex justify-center space-x-4">
                <li>
                    <a class="text-white hover:text-red-200 font-bold text-lg" href="{{ route('cours.index') }}">Accueil</a>
                </li>
                <li>
                    <a class="text-white hover:text-red-200 font-bold text-lg" href="{{ route('cours.create') }} ">Créer un cours</a>
                </li>
                <!-- Ajouter d'autres liens de navigation si nécessaire -->
            </ul>
        </nav>
    </header>



    <div class="container mx-auto mt-8">
        <!-- Contenu spécifique à chaque page -->
        @yield('content')
    </div>

    <table class="w-[50rem] h-[10rem] border-blue-500 border-4 mx-auto">

        <thead>
          <tr>
            <th>Cours</th>
            <th>Description</th>
            <th>Module</th>
            <th>Competence</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($cours as $cour )

            <tr>
                <th>{{  $cour->nom  }}</th>
                <th>{{  $cour->description   }}</th>
                <th>
                    <select name="" id=" module-list ">
                        @foreach ( $cour->modules as $module)
                        <option value="{{$module->id}}">{{$module->nom_module}}</option>

                        <a href="#" data-module-id="{{ $module->id }}">{{ $module->name }}</a>
                        @endforeach
                    </select>
                </th>
                <th id="competences-container" >
                    {{-- {{  $cour->competences_id	}} --}}
                        @foreach ( $cour->modules as $module)
<option value="{{$module->id}}">{{$module->competence?->titre}}</option>
                        @endforeach
                </th>

                <td  class=" gap-5">

                    <a href="{{ route('cours.edit', $cour->id) }} "   class=" text-white mx-2  bg-[#5439c8] px-1 py-1 rounded-md ">Update</a>
                    <a href="{{ route('cours.delete', $cour->id) }} "   class=" text-white mx-2  bg-[#5439c8] px-1 py-1 rounded-md ">Delete</a>
                    <a href="{{ route('cours.delete', $cour->id) }} "   class=" text-white mx-2  bg-[#5439c8] px-1 py-1 rounded-md ">voire</a>

                    </td>
              </tr>
              @endforeach
        </tbody>
    </table>
</body>
</html>
