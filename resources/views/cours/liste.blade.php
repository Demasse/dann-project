
@extends('layouts.admin')

@section('title','Creer un cours')
@section('content')

<div class="col-span-4">

    <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matières Scolaires</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">
    <div class="container mx-auto">
        <h1 class=" text-2xl text-center   px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-md hover:opacity-80 transition-opacity duration-300">Liste des cours</h1>
        <br>

        <table class="min-w-full bg-white rounded-lg shadow-lg">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="py-2 px-4 text-left">Matière</th>
                    <th class="py-2 px-4 text-left">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Mathématiques</td>
                    <td class="py-2 px-4">Étude des nombres, des formes et des structures.</td>
                </tr>
                <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Sciences</td>
                    <td class="py-2 px-4">Exploration des phénomènes naturels et des lois de la nature.</td>
                </tr>
                <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Histoire</td>
                    <td class="py-2 px-4">Étude des événements passés et de leur impact sur le présent.</td>
                </tr>
                <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Géographie</td>
                    <td class="py-2 px-4">Analyse des espaces terrestres et des interactions humaines.</td>
                </tr>
                <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Langue Française</td>
                    <td class="py-2 px-4">Étude de la langue, de la littérature et de la culture françaises.</td>
                </tr>
                {{-- <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Langue Anglaise</td>
                    <td class="py-2 px-4">Apprentissage de l'anglais à l'oral et à l'écrit.</td>
                </tr>
                <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Éducation Physique</td>
                    <td class="py-2 px-4">Développement de la condition physique et des compétences sportives.</td>
                </tr>
                <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Arts Plastiques</td>
                    <td class="py-2 px-4">Création artistique à travers divers médiums et techniques.</td>
                </tr> --}}
                {{-- <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Musique</td>
                    <td class="py-2 px-4">Apprentissage des théories musicales et de la pratique instrumentale.</td>
                </tr>
                <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Informatique</td>
                    <td class="py-2 px-4">Introduction aux concepts de base de l'informatique et de la programmation.</td>
                </tr>
                <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Philosophie</td>
                    <td class="py-2 px-4">Réflexion critique sur les questions fondamentales de l'existence.</td>
                </tr>
                <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Économie</td>
                    <td class="py-2 px-4">Étude des choix économiques et de la gestion des ressources.</td>
                </tr> --}}
                <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Biologie</td>
                    <td class="py-2 px-4">Étude des organismes vivants et de leurs interactions.</td>
                </tr>
                <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Chimie</td>
                    <td class="py-2 px-4">Analyse des substances et des transformations chimiques.</td>
                </tr>
                <tr class="hover:bg-gray-200 cursor-pointer" onclick="toggleHighlight(this)">
                    <td class="py-2 px-4">Physique</td>
                    <td class="py-2 px-4">Étude des lois de la nature et des phénomènes physiques.</td>
                </tr>
            </tbody>
        </table>
    </div>


    {{-- <script>
        function toggleHighlight(row) {
            // Retirer la couleur active des autres lignes
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(r => r.classList.remove('bg-green-100', 'bg-yellow-100', 'bg-pink-100'));

            // Ajouter une couleur aléatoire au clic
            const colors = ['bg-green-100', 'bg-yellow-100', 'bg-pink-100'];
            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            row.classList.add(randomColor);
        }

        function toggleHighlight(row) {
            // Retirer la couleur active des autres lignes
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(r => r.classList.remove('bg-green-100', 'bg-yellow-100', 'bg-pink-100', 'bg-blue-100'));

            // Ajouter une couleur aléatoire au clic
            const colors = ['bg-green-100', 'bg-yellow-100', 'bg-pink-100', 'bg-blue-100'];
            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            row.classList.add(randomColor);
        }

        function countSubjects() {
            // Compter le nombre de lignes dans le corps du tableau
            const subjects = document.querySelectorAll('tbody tr');
            const total = subjects.length;

            // Afficher le total dans le paragraphe
            document.getElementById('totalSubjects').textContent = total;
        }
    </script> --}}


    </script>
</div>
</body>

</html>


@endsection
