@extends('layouts.admin')

@section('title', 'emploi de temps ')
@section('content')
    <div class="col-span-4">
        <div id="content" class="content">
            <h1
                class="text-2xl text-center px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-md hover:opacity-80 transition-opacity duration-300">
                emploi de temps
            </h1>
            <br>

            <table class="min-w-full bg-white rounded-lg shadow-lg">
                <p class="text-lg font-bold text-gray-800 text-center mb-4">
                    Emploi de temps de la semaine du {{ \Carbon\Carbon::now()->startOfWeek()->format('d/m/Y') }} au
                    {{ \Carbon\Carbon::now()->endOfWeek()->format('d/m/Y') }}
                </p>

                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="py-2 px-4 text-left">Matière</th>
                        <th class="py-2 px-4 text-left">Jour</th>
                        <th class="py-2 px-4 text-left">Heure de début</th>
                        <th class="py-2 px-4 text-left">Heure de fin</th>
                        <th class="py-2 px-4 text-left">enseignant</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($progs as $prog)
                        <tr>
                            <td class=" text-center text-2xl " >{{ $prog->cour['nom'] }}</td>
                            <td  class=" text-center text-2xl "  >{{ $prog->jour }}</td>
                            <td  class=" text-center text-2xl "  >{{ $prog->heure_debut }}</td>
                            <td  class=" text-center text-2xl "  >{{ $prog->heure_fin }}</td>
                            <td  class=" text-center text-2xl "  >{{ $prog->nom }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <br>
            <br>
        </div>

        <button onclick="printDiv()"
            class="bg-gradient-to-r from-blue-500 to-green-500 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300 hover:shadow-xl hover:scale-105">
            Imprimer
        </button>
    </div>

    <script>
        function printDiv() {
            var printContents = document.getElementById("content").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            window.location.reload();  // Recharge la page pour restaurer les événements JavaScript
        }
    </script>

@endsection
