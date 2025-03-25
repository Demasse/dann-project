@extends('layouts.admin')

@section('title', 'Emploi du temps')

@section('content')
<div class="col-span-4 imprime min-h-screen text-black bg-gradient-to-br p-6 flex justify-center overflow-scroll">
    <div class="w-full max-w-6xl">
        <h1 class="text-4xl font-extrabold text-center mb-8 bg-gradient-to-r from-blue-400 via-green-400 to-teal-400 bg-clip-text text-transparent transform hover:scale-105 transition-all duration-300 shadow-lg">
            Emploi du temps
        </h1>

        <!-- Message de la semaine -->
        <p class="text-lg font-semibold text-center mb-6 text-blue-200 bg-gray-800 bg-opacity-70 rounded-lg py-2 px-4 shadow-md">
            Emploi de temps de la semaine du {{ \Carbon\Carbon::now()->startOfWeek()->format('d/m/Y') }} au {{ \Carbon\Carbon::now()->endOfWeek()->format('d/m/Y') }}
        </p>

        <div class="rounded-xl shadow-2xl overflow-hidden border border-blue-500/50 transition-all duration-300 hover:shadow-xl">
            <table class="min-w-full">
                <thead>
                    <tr class="">
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
                    <tr class="">
                        <td class="py-2 px-6 font-medium">
                            Pause (12h-13h)
                        </td>
                        @foreach ($days as $day)
                            <td class="py-2 px-6 text-center">-</td>
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
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background: white !important;
            padding: 20px;
            overflow: visible;
            color: black !important;
        }
        .imprime .bg-gradient-to-br {
            background: none !important;
        }
        .imprime .bg-gray-800 {
            background: white !important;
            color: black !important;
        }
        .imprime .text-blue-100, .imprime .text-blue-200, .imprime .text-blue-300 {
            color: black !important;
        }
        .imprime .bg-gradient-to-r {
            background: none !important;
            color: black !important;
            -webkit-print-color-adjust: exact;
        }
        .imprime .shadow-lg, .imprime .shadow-2xl, .imprime .hover\:shadow-xl {
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
        button {
            display: none !important;
        }
    }

    /* Styles pour la responsivité */
    @media (max-width: 768px) {
        table {
            display: block;
            overflow-x: auto;
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
