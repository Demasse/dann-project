@extends('layouts.admin')

@section('title', 'Liste des cours')

@section('content')
<div class="col-span-4 min-h-screen bg-white p-6 flex justify-center overflow-scroll ">
    <div class="w-full max-w-6xl">
        <h1 class="text-4xl font-extrabold text-center mb-8 bg-gradient-to-r from-blue-500 via-green-500 to-teal-500 bg-clip-text text-transparent transform hover:scale-105 transition-all duration-300 shadow-lg">Liste des matiere</h1>

        <!-- Messages flash -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg shadow-md w-full max-w-2xl mx-auto animate-bounce">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-md w-full max-w-2xl mx-auto">
                {{ session('error') }}
            </div>
        @endif

        @if ($cours->count())
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden border border-gray-200 transition-all duration-300 hover:shadow-xl">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-500 to-green-500 text-white">
                            <th class="py-4 px-6 text-left text-lg font-semibold border-b border-blue-400/30">Matière</th>
                            <th class="py-4 px-6 text-left text-lg font-semibold border-b border-blue-400/30">Description</th>
                            <th class="py-4 px-6 text-left text-lg font-semibold border-b border-blue-400/30">Module</th>
                            <th class="py-4 px-6 text-left text-lg font-semibold border-b border-blue-400/30">Compétence</th>
                            <th class="py-4 px-6 text-left text-lg font-semibold border-b border-blue-400/30">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cours as $cour)
                            <tr class="border-b border-gray-200 hover:bg-gray-100 transition-all duration-200 cursor-pointer" onclick="toggleHighlight(this)">
                                <td class="py-4 px-6 text-gray-800 font-medium">{{ $cour->nom }}</td>
                                <td class="py-4 px-6 text-gray-800">{{ $cour->description }}</td>
                                <td class="py-4 px-6  ">

                                    <select name="module" onchange="updateCompetence(this, 'competence-{{ $cour->id }}')" class="   border w-[9rem] border-gray-300 text-gray-800 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">

                                    <select name="module" onchange="updateCompetence(this, 'competence-{{ $cour->id }}')" class="   border w-[10rem] border-gray-300 text-gray-800 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">

                                        @foreach ($cour->modules as $module)
                                            <option value="{{ $module->id }}" data-competence="{{ $module->competence?->titre }}" {{ $loop->first ? 'selected' : '' }}>
                                                {{ $module->nom_module }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td id="competence-{{ $cour->id }}" class="py-4 px-6 text-gray-800">
                                    @if ($cour->modules->isNotEmpty())
                                        {{ $cour->modules->first()->competence?->titre }}
                                    @endif
                                </td>
                                <td class="py-4 px-6 flex space-x-2">
                                    @if (Auth::user()->role === 'admin')
                                        <a href="{{ route('cours.show', $cour->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                            Voir
                                        </a>
                                        <a href="{{ route('cours.edit', $cour->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                            Modifier
                                        </a>
                                        <a href="{{ route('cours.delete', $cour->id) }}" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                            Supprimer
                                        </a>
                                    @else
                                        <a href="{{ route('cours.show', $cour->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                            Voir
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center text-gray-600 font-medium mt-6">Aucun cours disponible.</p>
        @endif
    </div>
</div>

<script>
    function updateCompetence(selectElement, competenceId) {
        const competenceCell = document.getElementById(competenceId);
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        competenceCell.textContent = selectedOption.dataset.competence || '';
    }

    function toggleHighlight(row) {
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach(r => r.classList.remove('bg-green-100', 'bg-yellow-100', 'bg-pink-100', 'bg-blue-100'));
        const colors = ['bg-green-100', 'bg-yellow-100', 'bg-pink-100', 'bg-blue-100'];
        const randomColor = colors[Math.floor(Math.random() * colors.length)];
        row.classList.add(randomColor);
    }
</script>
@endsection
