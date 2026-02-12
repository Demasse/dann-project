<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- SCRIPT ANTI-FLASH : S'exécute avant le rendu de la page --}}
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 font-sans w-full h-screen overflow-hidden md:grid md:grid-cols-5 transition-colors duration-300">

<button id="menuBtn"
    class="md:hidden fixed top-4 left-4 z-50
           bg-blue-900/90 backdrop-blur
           p-3 rounded-full text-white
           shadow-md transition hover:bg-[#9711ab] active:scale-95">
    <svg id="iconMenu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
    </svg>
    <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 hidden">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
</button>

<header id="sidebar"
    class="bg-gray-800 dark:bg-black py-4 flex flex-col shadow-md
           fixed md:sticky top-0 left-0
           h-screen w-64
           -translate-x-full md:translate-x-0
           transition-transform duration-300
           z-40 col-span-1 border-r border-transparent dark:border-gray-800">

    <nav class="flex flex-col h-full justify-between">
        {{-- Menu Principal --}}
        <ul class="flex flex-col mt-8">
            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'enseignant')
                <li class="flex items-center py-2 px-4 hover:bg-[#d7d7ec] dark:hover:bg-gray-800 transition-colors">
                    <a class="text-white dark:text-gray-200 font-bold text-lg"
                       href="{{ route('begin.acceuil') }}">Dashboard</a>
                </li>
            @endif

            @php
                $menuItems = [
                    'admin' => [
                        ['route' => 'cours.index', 'label' => 'Liste des cours'],
                        ['route' => 'cours.create', 'label' => 'Créer un cours'],
                        ['route' => 'module.create', 'label' => 'Créer un module'],
                        ['route' => 'user.index', 'label' => 'Liste des utilisateurs'],
                        ['route' => 'user.prof', 'label' => 'Liste des professeurs'],
                        ['route' => 'user.etudiant', 'label' => 'Liste des étudiants'],
                        ['route' => 'prog.create', 'label' => 'Programmer un cours'],
                        ['route' => 'prog.index', 'label' => 'Emploi de temps'],
                    ],
                    'enseignant' => [
                        ['route' => 'cours.index', 'label' => 'Liste des cours'],
                        ['route' => 'cours.create', 'label' => 'Créer un cours'],
                        ['route' => 'module.create', 'label' => 'Créer un module'],
                        ['route' => 'prog.create', 'label' => 'Programmer un cours'],
                        ['route' => 'user.etudiant', 'label' => 'Liste des étudiants'],
                        ['route' => 'prog.index', 'label' => 'Emploi de temps'],
                    ],
                    'etudiant' => [
                        ['route' => 'prog.index', 'label' => 'Emploi de temps'],
                    ],
                ];
            @endphp

            @foreach ($menuItems[Auth::user()->role] ?? [] as $item)
                <li class="flex items-center py-2 px-4 hover:bg-[#d7d7ec] dark:hover:bg-gray-800 transition-colors">
                    <a class="text-white dark:text-gray-300 font-bold text-lg"
                       href="{{ route($item['route']) }}">
                       {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Footer Menu --}}
        <ul class="flex flex-col gap-3 px-4 mb-4">
            @if (Auth::user()->role === 'admin')
                <li>
                    <a href="{{ route('user.create') }}"
                       class="group relative flex items-center justify-center gap-2 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-bold text-base py-2.5 rounded-lg shadow-md transition-all hover:scale-[1.02]">
                        <span>Ajouter un utilisateur</span>
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('logout') }}"
                   class="group relative flex items-center justify-center gap-2 bg-gradient-to-r from-red-500 to-red-600 text-white font-bold text-base py-2.5 rounded-lg shadow-md transition-all hover:scale-[1.02]">
                    <span>Déconnexion</span>
                </a>
            </li>
        </ul>
    </nav>
</header>

<main class="md:col-span-4 p-6 overflow-auto h-screen relative text-gray-900 dark:text-white transition-colors duration-300">

    <div class="fixed top-4 right-6 z-50">
        <button id="theme-toggle" class="p-2.5 rounded-xl bg-white dark:bg-gray-800 shadow-xl border border-gray-200 dark:border-gray-700 hover:scale-110 transition-all active:scale-95">
            <span id="theme-toggle-dark-icon" class="hidden text-xl">🌙</span>
            <span id="theme-toggle-light-icon" class="hidden text-xl">☀️</span>
        </button>
    </div>

    {{-- C'est ici que s'affiche le dashboard --}}
    @yield('content')
</main>

<script>
    // --- GESTION DU MENU MOBILE ---
    const menuBtn = document.getElementById('menuBtn');
    const sidebar = document.getElementById('sidebar');
    const iconMenu = document.getElementById('iconMenu');
    const iconClose = document.getElementById('iconClose');

    menuBtn.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        iconMenu.classList.toggle('hidden');
        iconClose.classList.toggle('hidden');
    });

    // --- GESTION DU MODE SOMBRE ---
    const themeToggleBtn = document.getElementById('theme-toggle');
    const darkIcon = document.getElementById('theme-toggle-dark-icon');
    const lightIcon = document.getElementById('theme-toggle-light-icon');

    function updateIcons() {
        if (document.documentElement.classList.contains('dark')) {
            lightIcon.classList.remove('hidden');
            darkIcon.classList.add('hidden');
        } else {
            darkIcon.classList.remove('hidden');
            lightIcon.classList.add('hidden');
        }
    }

    // Initialisation des icônes au chargement
    updateIcons();

    themeToggleBtn.addEventListener('click', function() {
        // Basculer la classe dark sur le HTML
        document.documentElement.classList.toggle('dark');

        // Sauvegarder la préférence
        if (document.documentElement.classList.contains('dark')) {
            localStorage.setItem('color-theme', 'dark');
        } else {
            localStorage.setItem('color-theme', 'light');
        }

        // Mettre à jour l'icône du bouton
        updateIcons();
    });
</script>

</body>
</html>
