@extends('layouts.admin')

@section('content')

<div class="col-span-4">


    <h1 class=" text-2xl text-center   px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-md hover:opacity-80 transition-opacity duration-300">Liste des cours</h1>

 <br>
 <br>

 @if (session('success'))
 <div class="alert alert-success text-white bg-red-500 h-8 ">
     {{ session('success') }}
 </div>
 <br>
@elseif (session('error'))
 <div class="alert alert-danger">
     {{ session('error') }}
 </div>
@endif

    @if($cours->count())
        <ul>
            <table class="min-w-full bg-white rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="py-2 px-4 text-left">Matière</th>
                        <th class="py-2 px-4 text-left">Description</th>
                        <th class="py-2 px-4 text-left">Module</th>
                        <th class="py-2 px-4 text-left">Compétence</th>
                        <th class="py-2 px-4 text-left">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($cours as $cour)
                        <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                            <td class="py-2 px-4">{{$cour->nom}}</td>
                            <td class="py-2 px-4">{{$cour->description}}</td>
                            <td>
                                <select name="module" onchange="updateCompetence(this, 'competence-{{$cour->id}}')">
                                    {{-- <option value="">Sélectionner un module</option> --}}
                                    @foreach ($cour->modules as $module)
                                        <option value="{{$module->id}}" data-competence="{{$module->competence?->titre}}"
                                            @if ($loop->first) selected @endif>{{$module->nom_module}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td id="competence-{{$cour->id}}" class="py-2 px-4">
                                @if ($cour->modules->isNotEmpty())
                                    {{$cour->modules->first()->competence?->titre}}
                                @endif
                            </td>

                            <td class="gap-5">
                                @if (Auth::user()->role === 'admin' )

                                <a href="{{ route('cours.edit', $cour->id) }}" class="text-white mx-2 bg-[#2cabd2] px-1 py-1 rounded-md">Update</a>
                                <a href="{{ route('cours.delete', $cour->id) }}" class="text-white mx-2 bg-[#f33caf] px-1 py-1 rounded-md">Delete</a>

                                <a href="{{ route('cours.show', $cour->id) }}" class="text-white mx-2 bg-[#39c845] hover:bg-[#32a639] transition duration-300 ease-in-out px-4 py-2 rounded-md shadow-lg transform hover:scale-105">
                                    Voir
                                </a>

                                {{-- <a href="{{ route('cours.show', $cour->id) }}" class="text-white mx-2 bg-[#39c845] px-1 py-1 rounded-md">Voir</a> --}}

                                @else

                                {{-- <a href="{{ route('cours.show', $cour->id) }}" class="text-white mx-2 bg-[#39c845] px-1 py-1 rounded-md">Voir</a> --}}

                                <a href="{{ route('cours.show', $cour->id) }}" class="text-white mx-2 bg-[#39c845] hover:bg-[#32a639] transition duration-300 ease-in-out px-4 py-2 rounded-md shadow-lg transform hover:scale-105">
                                    Voir
                                </a>

                                @endif

                            </td>

                        </tr>
                    @endforeach
                </tbody>


            </table>

            <script>
                function updateCompetence(selectElement, competenceId) {
                    const competenceCell = document.getElementById(competenceId);
                    const selectedOption = selectElement.options[selectElement.selectedIndex];

                    // Mettre à jour la cellule de compétence avec la compétence associée au module sélectionné
                    competenceCell.textContent = selectedOption.dataset.competence || '';
                }
            </script>
        </ul>
    @else
        <p>Aucun cours disponible.</p>
    @endif

{{-- message flash pour le delete --}}


     <script>
        function toggleHighlight(row) {
            // Retirer la couleur active des autres lignes
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(r => r.classList.remove('bg-green-100', 'bg-yellow-100', 'bg-pink-100', 'bg-blue-100'));

            // Ajouter une couleur aléatoire au clic
            const colors = ['bg-green-100', 'bg-yellow-100', 'bg-pink-100', 'bg-blue-100'];
            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            row.classList.add(randomColor);
        }



    </script>


</div>
@endsection
