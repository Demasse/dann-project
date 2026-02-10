@extends('layouts.admin')

@section('title', 'Liste des cours')

@section('content')
<div class="col-span-4 min-h-screen bg-white p-4 md:p-6 overflow-auto">
    <div class="w-full max-w-7xl mx-auto">

        <h1 class="text-3xl md:text-4xl font-extrabold text-center mb-8
            bg-gradient-to-r from-blue-500 via-green-500 to-teal-500
            bg-clip-text text-transparent">
            Liste des matières
        </h1>

        {{-- Messages flash --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg shadow-md max-w-2xl mx-auto">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-md max-w-2xl mx-auto">
                {{ session('error') }}
            </div>
        @endif

        @if ($cours->count())
        {{-- Scroll horizontal pour mobile --}}
        <div class="overflow-x-auto">
            <div class="bg-white rounded-xl shadow-xl border border-gray-200 min-w-[900px]">
                <table class="w-full border-collapse">

                    {{-- HEADER --}}
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-500 to-green-500 text-white text-left">
                            <th class="px-6 py-4 text-lg font-semibold">Matière</th>
                            <th class="px-6 py-4 text-lg font-semibold">Description</th>
                            <th class="px-6 py-4 text-lg font-semibold text-center">Module</th>
                            <th class="px-6 py-4 text-lg font-semibold text-center">Compétence</th>
                            <th class="px-6 py-4 text-lg font-semibold text-center">Action</th>
                        </tr>
                    </thead>

                    {{-- BODY --}}
                    <tbody>
                        @foreach ($cours as $cour)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition">

                            {{-- Matière --}}
                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $cour->nom }}
                            </td>

                            {{-- Description --}}
                            <td class="px-6 py-4 text-gray-700">
                                {{ $cour->description }}
                            </td>

                            {{-- Module --}}
                            <td class="px-6 py-4 text-center">
                                <select
                                    onchange="updateCompetence(this, 'competence-{{ $cour->id }}')"
                                    class="w-44 mx-auto border border-gray-300 text-gray-800 p-2 rounded-lg
                                           focus:outline-none focus:ring-2 focus:ring-blue-500">

                                    @foreach ($cour->modules as $module)
                                        <option
                                            value="{{ $module->id }}"
                                            data-competence="{{ $module->competence?->titre }}"
                                            {{ $loop->first ? 'selected' : '' }}>
                                            {{ $module->nom_module }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>

                            {{-- Compétence --}}
                            <td id="competence-{{ $cour->id }}"
                                class="px-6 py-4 text-center text-gray-800 font-medium">
                                {{ $cour->modules->first()?->competence?->titre }}
                            </td>

                            {{-- Actions --}}
                            <td class="px-6 py-4">
                                <div class="flex justify-center items-center gap-2">

                                    <a href="{{ route('cours.show', $cour->id) }}"
                                       class="w-24 text-center bg-green-500 text-white py-2 rounded-lg
                                              hover:bg-green-600 transition shadow">
                                        Voir
                                    </a>

                                    @if (Auth::user()->role === 'admin')
                                        <a href="{{ route('cours.edit', $cour->id) }}"
                                           class="w-24 text-center bg-blue-500 text-white py-2 rounded-lg
                                                  hover:bg-blue-600 transition shadow">
                                            Modifier
                                        </a>

                                        <a href="{{ route('cours.delete', $cour->id) }}"
                                           class="w-24 text-center bg-pink-500 text-white py-2 rounded-lg
                                                  hover:bg-pink-600 transition shadow">
                                            Supprimer
                                        </a>
                                    @endif

                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
            <p class="text-center text-gray-600 mt-8">Aucun cours disponible.</p>
        @endif

    </div>
</div>

{{-- SCRIPT --}}
<script>
    function updateCompetence(selectElement, competenceId) {
        const competenceCell = document.getElementById(competenceId);
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        competenceCell.textContent = selectedOption.dataset.competence || '';
    }
</script>
@endsection
