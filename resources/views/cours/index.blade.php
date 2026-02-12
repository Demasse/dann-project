@extends('layouts.admin')

@section('title', 'Liste des cours')

@section('content')
<div class="col-span-4 min-h-screen bg-white dark:bg-gray-900 p-4 md:p-6 overflow-auto transition-colors duration-300">
    <div class="w-full max-w-7xl mx-auto">

        {{-- TITRE --}}
        <h1 class="text-3xl md:text-4xl font-extrabold text-center mb-8
            bg-gradient-to-r from-blue-500 via-green-500 to-teal-500
            bg-clip-text text-transparent">
            Liste des matières
        </h1>

        {{-- FLASH MESSAGE --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-800 text-green-700 dark:text-green-300 rounded-lg shadow-md max-w-2xl mx-auto">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="mb-6 p-4 bg-red-100 dark:bg-red-900/30 border border-red-400 dark:border-red-800 text-red-700 dark:text-red-300 rounded-lg shadow-md max-w-2xl mx-auto">
                {{ session('error') }}
            </div>
        @endif

        @if ($cours->count())

        {{-- ================= MOBILE : CARDS ================= --}}
        <div class="md:hidden space-y-4">

            @foreach ($cours as $cour)
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-md p-4 transition-colors">

                    <h2 class="text-lg font-bold text-blue-600 dark:text-blue-400 mb-1">
                        {{ $cour->nom }}
                    </h2>

                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                        {{ $cour->description }}
                    </p>

                    {{-- MODULE --}}
                    <div class="mb-3">
                        <label class="text-xs font-semibold text-gray-500 dark:text-gray-400">Module</label>
                        <select
                            onchange="updateCompetence(this, 'mobile-competence-{{ $cour->id }}')"
                            class="w-full mt-1 border border-gray-300 dark:border-gray-600 p-2 rounded-lg
                                   bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                   focus:outline-none focus:ring-2 focus:ring-blue-500">

                            @foreach ($cour->modules as $module)
                                <option
                                    data-competence="{{ $module->competence?->titre }}"
                                    {{ $loop->first ? 'selected' : '' }}>
                                    {{ $module->nom_module }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- COMPETENCE --}}
                    <p class="text-sm text-gray-700 dark:text-gray-300 mb-4">
                        <span class="font-semibold">Compétence :</span>
                        <span id="mobile-competence-{{ $cour->id }}">
                            {{ $cour->modules->first()?->competence?->titre }}
                        </span>
                    </p>

                    {{-- ACTIONS --}}
                    <div class="flex gap-2">
                        <a href="{{ route('cours.show', $cour->id) }}"
                           class="flex-1 text-center bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg transition-colors">
                            Voir
                        </a>

                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('cours.edit', $cour->id) }}"
                               class="flex-1 text-center bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition-colors">
                                Modifier
                            </a>
                        @endif
                    </div>

                </div>
            @endforeach

        </div>

        {{-- ================= DESKTOP : TABLE ================= --}}
        <div class="hidden md:block overflow-x-auto">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-200 dark:border-gray-700 min-w-[900px] transition-colors">

                <table class="w-full border-collapse">

                    <thead>
                        <tr class="bg-gradient-to-r from-blue-500 to-green-500 text-white">
                            <th class="px-6 py-4 text-left text-lg font-semibold">Matière</th>
                            <th class="px-6 py-4 text-left text-lg font-semibold">Description</th>
                            <th class="px-6 py-4 text-center text-lg font-semibold">Module</th>
                            <th class="px-6 py-4 text-center text-lg font-semibold">Compétence</th>
                            <th class="px-6 py-4 text-center text-lg font-semibold">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($cours as $cour)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">

                            <td class="px-6 py-4 font-medium text-gray-800 dark:text-gray-100">
                                {{ $cour->nom }}
                            </td>

                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                {{ $cour->description }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <select
                                    onchange="updateCompetence(this, 'competence-{{ $cour->id }}')"
                                    class="w-44 mx-auto border border-gray-300 dark:border-gray-600 p-2 rounded-lg
                                           bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                           focus:outline-none focus:ring-2 focus:ring-blue-500">

                                    @foreach ($cour->modules as $module)
                                        <option
                                            data-competence="{{ $module->competence?->titre }}"
                                            {{ $loop->first ? 'selected' : '' }}>
                                            {{ $module->nom_module }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>

                            <td id="competence-{{ $cour->id }}"
                                class="px-6 py-4 text-center font-medium text-gray-800 dark:text-gray-200">
                                {{ $cour->modules->first()?->competence?->titre }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('cours.show', $cour->id) }}"
                                       class="w-24 text-center bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg transition-colors">
                                        Voir
                                    </a>

                                    @if (Auth::user()->role === 'admin')
                                        <a href="{{ route('cours.edit', $cour->id) }}"
                                           class="w-24 text-center bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition-colors">
                                            Modifier
                                        </a>

                                        <a href="{{ route('cours.delete', $cour->id) }}"
                                           class="w-24 text-center bg-pink-500 hover:bg-pink-600 text-white py-2 rounded-lg transition-colors">
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
            <p class="text-center text-gray-600 dark:text-gray-400 mt-8 transition-colors">Aucun cours disponible.</p>
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
