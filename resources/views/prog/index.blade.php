@extends('layouts.admin')

@section('title', 'Emploi du temps')

@section('content')


<div class="col-span-4 min-h-screen text-black bg-gradient-to-br p-6 flex justify-center overflow-scroll ">

    <div class="w-full max-w-6xl">
        <h1 class="text-4xl font-extrabold text-center mb-8 bg-gradient-to-r from-blue-400 via-green-400 to-teal-400 bg-clip-text text-transparent transform hover:scale-105 transition-all duration-300 shadow-lg">
            Emploi du temps
        </h1>
        <div>

        </div>

        <!-- Message de la semaine et tableau -->
        <div class="imprime">
            <p class="text-lg font-semibold text-center mb-6 text-blue-200 bg-gray-800 bg-opacity-70 rounded-lg py-2 px-4 shadow-md">
                Emploi de temps de la semaine du {{ \Carbon\Carbon::now()->startOfWeek()->format('d/m/Y') }} au {{ \Carbon\Carbon::now()->endOfWeek()->format('d/m/Y') }}
            </p>

<<<<<<< HEAD
=======
            {{-- <div class="text-lg font-semibold text-gray-700 bg-blue-100 p-4 rounded-lg shadow-md"> --}}
                <div class="flex justify-between items-center bg-gray-800 bg-opacity-70 p-4 rounded-lg shadow-md">
                    <div>
                        <label for="filiere" class="block text-gray-200 text-lg font-semibold mb-2">Filière :</label>
                        <select id="filiere" name="filiere" class="block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-500">
                            <option value=""> Développement d'application web  </option>
                            <option value="secretariat_bureautique">Secrétariat bureautique</option>
                            <option value="comptabilite_informatisée">Comptabilité informatisée et de gestion</option>
                            <option value="maintenance_systemes_informatiques">Maintenance des systèmes informatiques</option>
                            <option value="developpement_application">Développement d'application web </option>
                            <option value="graphisme_production">Graphisme de production</option>
                            <option value="secretariat_direction">Secrétariat de direction</option>
                            <option value="maintenance_reseaux_informatiques">Maintenance des réseaux informatiques</option>
                        </select>
                    </div>
                    <div class=" font-semibold text-gray-200 p-4 text-2xl">
                        Année scolaire {{
                            (\Carbon\Carbon::now()->month >= 9 ? \Carbon\Carbon::now()->year : \Carbon\Carbon::now()->year - 1)
                        }}-{{
                            (\Carbon\Carbon::now()->month >= 9 ? \Carbon\Carbon::now()->year + 1 : \Carbon\Carbon::now()->year)
                        }}
                    </div>
                </div>
>>>>>>> 31b5682 (first commit)
            <div class="rounded-xl shadow-2xl overflow-hidden border border-blue-500/50 transition-all duration-300 hover:shadow-xl">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 text-left text-lg font-semibold border-b border-blue-500/30">jours <br>/ horaire</th>
                            @foreach ($days as $day)
                                <th class="py-4 px-6 text-center text-lg font-semibold border-b border-blue-500/30">{{ $day }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Créneau Matin -->
                        <tr class="border-b transition-all duration-200">
                            <td class="py-4 px-6 font-medium">
                                Matin (8h-12h)
                            </td>
                            @foreach ($days as $day)
                                <td class="py-4 px-6 text-center">
                                    @if (isset($schedule[$day]['Matin']))
                                        @foreach ($schedule[$day]['Matin'] as $prog)
                                            <div class="mb-2">
                                                <span>{{ $prog->cour['nom'] }}</span><br>
                                                <span class="font-semibold text-2xl">{{ $prog->nom }}</span>
                                            </div>
                                        @endforeach
                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>

                        <!-- Ligne de pause (12h-13h) -->
                        <tr>
                            <td class="py-2 px-6 font-medium">
                                Pause (12h-13h)
                            </td>
                            @foreach ($days as $day)
                                <td class="py-2 px-6 text-center text-3xl font-bold">-</td>
                            @endforeach
                        </tr>

                        <!-- Créneau Après-midi -->
                        <tr class="border-b border-blue-500/20 hover:bg-blue-900/30 transition-all duration-200">
                            <td class="py-4 px-6 font-medium">
                                Après-midi (13h-17h)
                            </td>
                            @foreach ($days as $day)
                                <td class="py-4 px-6 text-center">
                                    @if (isset($schedule[$day]['Après-midi']))
                                        @foreach ($schedule[$day]['Après-midi'] as $prog)
                                            <div class="mb-2">
                                                <span>{{ $prog->cour['nom'] }}</span><br>
                                                <span class="font-semibold text-2xl">{{ $prog->nom }}</span>
                                            </div>
                                        @endforeach
                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bouton Imprimer -->
        <div class="mt-8 flex justify-center">
            <button
                onclick="printDiv()"
                class="bg-gradient-to-r from-blue-500 to-green-500 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:from-blue-600 hover:to-green-600 transition-all duration-300 transform hover:scale-105 hover:shadow-xl shadow-blue-500/50 print-hidden"
            >
                Imprimer
            </button>
        </div>
    </div>
</div>

<!-- Script JavaScript pour imprimer uniquement la div .imprime -->
<script>
    function printDiv() {
        window.print();
    }
</script>

<!-- CSS pour gérer l'impression et la responsivité -->
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .imprime, .imprime * {
            visibility: visible;
        }
        .imprime {
            overflow: hidden;
            position: absolute;
            top: 0;
            left: 0;
            width: 210mm; /* Largeur A4 */
            height: auto; /* Hauteur ajustée au contenu */
            margin: 0;
            padding: 10mm; /* Marges internes pour A4 */
            background: white !important;
            color: black !important;
            box-sizing: border-box;
        }
        .imprime .bg-gray-800 {
            background: white !important;
            color: black !important;
        }

        h1{
            display: none !important;
        }

        .imprime .text-blue-200 {
            color: black !important;
        }
        .imprime .rounded-lg {
            border-radius: 0 !important; /* Supprimer les coins arrondis pour l'impression */
        }
        .imprime .shadow-md, .imprime .shadow-2xl, .imprime .hover\:shadow-xl {
            box-shadow: none !important;
        }
        .imprime .border-blue-500\/50 {
            border: 1px solid black !important;
        }
        .imprime .border-b {
            border-bottom: 1px solid black !important;
        }
        .imprime .hover\:bg-blue-900\/30 {
            background: none !important;
        }
        .imprime table {
            width: 100%;
            border-collapse: collapse;
        }
        .imprime th, .imprime td {
            padding: 8px; /* Réduire le padding pour l'impression */
            font-size: 12px; /* Réduire la taille de la police pour l'impression */
            text-align: center;
            border: 1px solid black; /* Ajouter des bordures visibles pour l'impression */
        }
        .imprime th:first-child, .imprime td:first-child {
            background: white !important; /* Supprimer le fond coloré pour l'impression */
            position: static; /* Désactiver le positionnement sticky pour l'impression */
        }
        .imprime .text-2xl {
            font-size: 16px; /* Réduire la taille des noms pour l'impression */
        }
        .print-hidden {
            display: none !important;
        }
        @page {
            size: A4;
            margin: 10mm; /* Marges de la page A4 */
        }
    }

    /* Styles pour la responsivité à l'écran */
    @media (max-width: 768px) {
        table {
            display: block;
            /* overflow-x: auto; */
            white-space: nowrap;
        }
        th, td {
            min-width: 120px;
        }
        th:first-child, td:first-child {
            position: sticky;
            left: 0;
            background: #2d3748;
            z-index: 1;
        }
        td:first-child {
            background: #1a202c;
        }
    }

    @media (max-width: 480px) {
        th, td {
            font-size: 14px;
            padding: 8px;
        }
    }
</style>


@endsection
