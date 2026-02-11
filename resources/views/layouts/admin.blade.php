<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans w-full h-screen overflow-hidden md:grid md:grid-cols-5">

<!-- =================== BOUTON MENU MOBILE =================== -->
<button id="menuBtn"
    class="md:hidden fixed top-4 left-4 z-50
           bg-blue-900/90 backdrop-blur
           p-3 rounded-full text-white
           shadow-md
           transition
           hover:bg-[#9711ab]
           active:scale-95">

    <!-- ICON MENU -->
    <svg id="iconMenu" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="w-7 h-7">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
    </svg>

    <!-- ICON CLOSE -->
    <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="w-7 h-7 hidden">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M6 18L18 6M6 6l12 12" />
    </svg>
</button>

<!-- =================== SIDEBAR =================== -->
<header id="sidebar"
    class="bg-gray-800 py-4 flex flex-col shadow-md
           fixed md:sticky top-0 left-0
           h-screen w-64
           -translate-x-full md:translate-x-0
           transition-transform duration-300
           z-40 col-span-1">

    <nav class="flex flex-col h-full justify-between">

        {{-- Menu Principal --}}
        <ul class="flex flex-col mt-8">
            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'enseignant')
                <li class="flex items-center py-2 px-4 hover:bg-[#d7d7ec]">
                    <a class="text-white font-bold text-lg"
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
                <li class="flex items-center py-2 px-4 hover:bg-[#d7d7ec]">
                    <a class="text-white font-bold text-lg"
                       href="{{ route($item['route']) }}">
                       {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Footer Menu : Ajouter utilisateur / Déconnexion --}}
        <ul class="flex flex-col gap-3 px-4 mb-4">

            {{-- Ajouter utilisateur (ADMIN ONLY) --}}
            @if (Auth::user()->role === 'admin')
                <li>
                    <a href="{{ route('user.create') }}"
                       class="group relative flex items-center justify-center gap-2
                              bg-gradient-to-r from-indigo-500 to-purple-600
                              text-white font-bold text-base
                              py-2.5 rounded-lg shadow-md shadow-purple-500/30
                              transition-all duration-300 hover:scale-[1.02] hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.8"
                             stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M18 7.5v9a2.25 2.25 0 01-2.25 2.25h-7.5A2.25 2.25 0 016 16.5v-9M15 6l-3-3-3 3m3-3v12" />
                        </svg>
                        <span>Ajouter un utilisateur</span>
                    </a>
                </li>
            @endif

            {{-- Déconnexion --}}
            <li>
                <a href="{{ route('logout') }}"
                   class="group relative flex items-center justify-center gap-2
                          bg-gradient-to-r from-red-500 to-red-600
                          text-white font-bold text-base
                          py-2.5 rounded-lg shadow-md shadow-red-500/30
                          transition-all duration-300 hover:scale-[1.02] hover:shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.8"
                         stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M18 12H9m0 0l3-3m-3 3l3 3" />
                    </svg>
                    <span>Déconnexion</span>
                </a>
            </li>

        </ul>

    </nav>
</header>

<!-- =================== CONTENU =================== -->
<main class="md:col-span-4 p-6 overflow-auto h-screen">
    @yield('content')
</main>

<!-- =================== JS =================== -->
<script>
    const menuBtn = document.getElementById('menuBtn');
    const sidebar = document.getElementById('sidebar');
    const iconMenu = document.getElementById('iconMenu');
    const iconClose = document.getElementById('iconClose');

    menuBtn.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        iconMenu.classList.toggle('hidden');
        iconClose.classList.toggle('hidden');
    });
</script>

</body>
</html>
