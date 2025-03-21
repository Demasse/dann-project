@extends('layouts.admin')

@section('title', 'Emploi du temps')

@section('content')
<div class="col-span-4 imprime min-h-screen bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 p-6 flex justify-center overflow-scroll">
    <div class="w-full max-w-6xl">
        <h1 class="text-4xl font-extrabold text-center mb-8 bg-gradient-to-r from-blue-400 via-green-400 to-teal-400 bg-clip-text text-transparent transform hover:scale-105 transition-all duration-300 shadow-lg">
            Emploi du temps
        </h1>

        <!-- Message de la semaine -->
        <p class="text-lg font-semibold text-center mb-6 text-blue-200 bg-gray-800 bg-opacity-70 rounded-lg py-2 px-4 shadow-md">
            Emploi de temps de la semaine du {{ \Carbon\Carbon::now()->startOfWeek()->format('d/m/Y') }} au {{ \Carbon\Carbon::now()->endOfWeek()->format('d/m/Y') }}
        </p>

        <div class="bg-gray-800 bg-opacity-80 backdrop-blur-md rounded-xl shadow-2xl overflow-hidden border border-blue-500/50 transition-all duration-300 hover:shadow-xl">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-600 to-green-600 text-white">
                        <th class="py-4 px-6 text-left text-lg font-semibold border-b border-blue-500/30">Matière</th>
                        <th class="py-4 px-6 text-left text-lg font-semibold border-b border-blue-500/30">Jour</th>
                        <th class="py-4 px-6 text-left text-lg font-semibold border-b border-blue-500/30">Heure de début</th>
                        <th class="py-4 px-6 text-left text-lg font-semibold border-b border-blue-500/30">Heure de fin</th>
                        <th class="py-4 px-6 text-left text-lg font-semibold border-b border-blue-500/30">Enseignant</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($progs as $prog)
                        <tr class="border-b border-blue-500/20 hover:bg-blue-900/30 transition-all duration-200">
                            <td class="py-4 px-6 text-blue-100 font-medium">{{ $prog->cour['nom'] }}</td>
                            <td class="py-4 px-6 text-blue-100">{{ $prog->jour }}</td>
                            <td class="py-4 px-6 text-blue-100">{{ $prog->heure_debut }}</td>
                            <td class="py-4 px-6 text-blue-100">{{ $prog->heure_fin }}</td>
                            <td class="py-4 px-6 text-blue-100">{{ $prog->nom }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 px-6 text-center text-blue-300 font-medium">Aucun cours programmé cette semaine</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Bouton Imprimer -->
        <div class="mt-8 flex justify-center">
            <button
                onclick="printDiv()"
                class="bg-gradient-to-r from-blue-500 to-green-500 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:from-blue-600 hover:to-green-600 transition-all duration-300 transform hover:scale-105 hover:shadow-xl shadow-blue-500/50"
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

<!-- CSS pour gérer l'impression -->
<style>
    @media print {
        body * {
            visibility: hidden; /* Masque tout sauf ce qui est ciblé */
        }
        .imprime, .imprime * {
            visibility: visible; /* Affiche uniquement la div .imprime et ses enfants */
        }
        .imprime {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background: white; /* Fond blanc pour l'impression */
            padding: 20px; /* Ajoute un peu de marge pour l'impression */
            overflow: visible; /* Assure que tout est visible */
        }
        /* Ajustements pour l'impression */
        .imprime .bg-gradient-to-br {
            background: none; /* Supprime le dégradé pour l'impression */
        }
        .imprime .bg-gray-800 {
            background: #fff; /* Fond blanc pour la table */
            color: #000; /* Texte noir pour lisibilité */
        }
        .imprime .text-blue-100, .imprime .text-blue-300 {
            color: #000; /* Texte noir pour lisibilité */
        }
        .imprime .bg-gradient-to-r {
            background: none; /* Supprime les dégradés des titres et en-têtes */
            color: #000; /* Texte noir */
            -webkit-print-color-adjust: exact; /* Force les couleurs */
        }
        /* Masque le bouton Imprimer lors de l'impression */
        button {
            display: none;
        }
    }
</style>
@endsection






@extends('layouts.admin')

@section('title', 'Emploi du temps')

@section('content')
<div class="col-span-4 imprime min-h-screen bg-white p-6 flex justify-center overflow-scroll">
    <div class="w-full max-w-6xl">
        <!-- En-tête -->

        <!-- Titre et Période -->
        <h1 class="text-3xl font-bold text-center mb-4 text-gray-800">Emploi du Temps</h1>
        <p class="text-lg font-semibold text-center mb-6 text-gray-600">
            Semaine du {{ \Carbon\Carbon::now()->startOfWeek()->format('d/m/Y') }} au {{ \Carbon\Carbon::now()->endOfWeek()->format('d/m/Y') }}
        </p>

        <!-- Tableau de l'Emploi du Temps -->
        <div class="bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-800">
                        <th class="border border-gray-300 py-2 px-4 text-left">Horaire</th>
                        <th class="border border-gray-300 py-2 px-4 text-center">Lundi</th>
                        <th class="border border-gray-300 py-2 px-4 text-center">Mardi</th>
                        <th class="border border-gray-300 py-2 px-4 text-center">Mercredi</th>
                        <th class="border border-gray-300 py-2 px-4 text-center">Jeudi</th>
                        <th class="border border-gray-300 py-2 px-4 text-center">Vendredi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Créneaux horaires -->
                    @foreach(['08:00-12:00' => 'Matin', '13:00-17:00' => 'Après-midi'] as $time => $period)
                        <tr>
                            <td class="border border-gray-300 py-2 px-4 font-semibold text-gray-700">{{ $period }} ({{ $time }})</td>
                            @foreach(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'] as $day)
                                <td class="border border-gray-300 py-2 px-4 text-center text-gray-600">
                                    @php
                                        $course = $progs->firstWhere('jour', $day);
                                    @endphp
                                    @if($course && (
                                        (strtotime($course->heure_debut) >= strtotime(explode('-', $time)[0]) && strtotime($course->heure_debut) < strtotime(explode('-', $time)[1])) ||
                                        (strtotime($course->heure_fin) > strtotime(explode('-', $time)[0]) && strtotime($course->heure_fin) <= strtotime(explode('-', $time)[1]))
                                    ))
                                        <div>
                                            <p class="font-medium">{{ $course->cour['nom'] }}</p>
                                            <p class="text-sm text-gray-500">{{ $course->heure_debut }} - {{ $course->heure_fin }}</p>
                                            <p class="text-sm text-gray-500">{{ $course->nom }}</p>
                                        </div>
                                    @else
                                        <p>-</p>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bouton Imprimer -->
        <div class="mt-8 flex justify-center">
            <button
                onclick="printDiv()"
                class="bg-gradient-to-r from-blue-500 to-green-500 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:from-blue-600 hover:to-green-600 transition-all duration-300 transform hover:scale-105 hover:shadow-xl shadow-blue-500/50"
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

<!-- CSS pour gérer l'impression -->
<style>
    @media print {
        body * {
            visibility: hidden; /* Masque tout sauf ce qui est ciblé */
        }
        .imprime, .imprime * {
            visibility: visible; /* Affiche uniquement la div .imprime et ses enfants */
        }
        .imprime {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background: white; /* Fond blanc pour l'impression */
            padding: 20px; /* Ajoute un peu de marge pour l'impression */
            overflow: visible; /* Assure que tout est visible */
        }
        /* Ajustements pour l'impression */
        .imprime .bg-gradient-to-br {
            background: none; /* Supprime le dégradé pour l'impression */
        }
        .imprime .bg-gray-800 {
            background: #fff; /* Fond blanc pour la table */
            color: #000; /* Texte noir pour lisibilité */
        }
        .imprime .text-blue-100, .imprime .text-blue-300 {
            color: #000; /* Texte noir pour lisibilité */
        }
        .imprime .bg-gradient-to-r {
            background: none; /* Supprime les dégradés des titres et en-têtes */
            color: #000; /* Texte noir */
            -webkit-print-color-adjust: exact; /* Force les couleurs */
        }
        /* Masque le bouton Imprimer lors de l'impression */
        button {
            display: none;
        }
    }
</style>
@endsection

