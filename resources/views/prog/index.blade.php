@extends('layouts.admin')

@section('title', 'Emploi de temps')
@section('content')

<div class="col-span-4">
    <div class="content">
        <h1 class="text-2xl text-center px-4 py-2 font-bold text-white bg-gradient-to-r from-red-500 to-black rounded-md hover:opacity-80 transition-opacity duration-300">
            Emploi de temps
        </h1>
        <br>

        <table id="printableTable" class=" bg-white rounded-lg shadow-lg">
            <caption class="text-lg font-bold text-gray-800 text-center mb-4">
                Emploi de temps de la semaine du {{ \Carbon\Carbon::now()->startOfWeek()->format('d/m/Y') }} au
                {{ \Carbon\Carbon::now()->endOfWeek()->format('d/m/Y') }}
            </caption>

            <thead>
                <tr class="hover:text-white font-semibold bg-black text-white">
                    <th class="py-2 px-4 text-left">Matière</th>
                    <th class="py-2 px-4 text-left">Jour</th>
                    <th class="py-2 px-4 text-left">Heure de début</th>
                    <th class="py-2 px-4 text-left">Heure de fin</th>
                    <th class="py-2 px-4 text-left">Enseignant</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($progs as $prog)
                    <tr>
                        <td class="text-center text-2xl">{{ $prog->cour['nom'] }}</td>
                        <td class="text-center text-2xl">{{ $prog->jour }}</td>
                        <td class="text-center text-2xl">{{ $prog->heure_debut }}</td>
                        <td class="text-center text-2xl">{{ $prog->heure_fin }}</td>
                        <td class="text-center text-2xl">{{ $prog->nom }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br><br>
    </div>

    <button onclick="printTable()"
        class="text-red-500 hover:text-white bg-black font-bold py-2 px-4 rounded-full shadow-lg transition duration-300 hover:shadow-xl hover:scale-105">
        Imprimer
    </button>

</div>

<script>
    function printTable() {
        var printContents = document.getElementById("printableTable").outerHTML;
        var originalContents = document.body.innerHTML;

        // Remplace le contenu du corps par la table
        document.body.innerHTML = printContents;

        // Appliquer les styles avant l'impression
        var style = document.createElement('style');
        style.innerHTML = `
            @media print {
                @page {
                    size: A5;
                    margin: 10mm;
                }
                body {
                    width: 148mm;
                    overflow: hidden; /* Éviter le débordement */
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: center;
                    height: 1rem; /* Assurez-vous que la hauteur est auto */
                }
            }
        `;
        document.head.appendChild(style);

        window.print();

        // Restaurez le contenu original après l'impression
        document.body.innerHTML = originalContents;
        window.location.reload(); // Recharge la page pour restaurer les événements JavaScript
    }
</script>

@endsection
