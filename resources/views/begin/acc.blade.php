<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des Emplois du Temps</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900 dark:bg-gradient-to-tr dark:from-gray-800 dark:via-blue-900 dark:to-purple-900 dark:text-white min-h-screen font-sans transition-colors duration-500">
    <header class="container mx-auto flex flex-col md:flex-row justify-between items-center py-4 px-6 gap-4 md:gap-0">
        <div>
            <img class="rounded-full h-20 md:h-24" src="CFPCanadienne_Tee-shirt[1].png" alt="Logo">
        </div>

        <nav class="flex flex-wrap justify-center md:justify-end gap-4 md:gap-6 items-center">
            <button id="theme-toggle" class="p-3 rounded-full bg-gray-200 dark:bg-white/10 hover:bg-gray-300 dark:hover:bg-white/20 transition-all border border-gray-300 dark:border-white/30 shadow-sm">
                <span id="theme-toggle-dark-icon" class="hidden text-xl">🌙</span>
                <span id="theme-toggle-light-icon" class="hidden text-xl">☀️</span>
            </button>

            <a href="#"
                class="bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:from-blue-700 hover:to-purple-700 transition-all duration-300 hover:scale-105">
                À propos
            </a>
            <a href="#"
                class="bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:from-purple-700 hover:to-pink-700 transition-all duration-300 hover:scale-105">
                Contact
            </a>
        </nav>
    </header>

    <main class="container mx-auto mt-4 px-4 md:px-6">
        <h1
            class="text-4xl sm:text-5xl md:text-6xl uppercase font-extrabold text-center bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 dark:from-blue-400 dark:via-purple-400 dark:to-pink-400 bg-clip-text text-transparent transition-all duration-500 hover:scale-105">
            Bienvenue sur Time_app !
        </h1>

        <div class="flex flex-col md:flex-row justify-between items-center gap-8 md:gap-16 mt-6">
            <p
                class="text-lg sm:text-xl md:text-2xl text-gray-700 dark:text-gray-200 leading-relaxed max-w-full md:max-w-xl bg-white dark:bg-gray-800 bg-opacity-80 dark:bg-opacity-50 p-6 rounded-lg shadow-xl border border-gray-200 dark:border-white/10 transition-all duration-300">
                Nous sommes heureux de vous accueillir dans cet espace conçu spécialement pour les étudiants et le
                personnel universitaire. Ici, vous pouvez facilement créer, modifier et consulter vos emplois du temps.
                Organisez vos cours et événements pour maximiser votre productivité et réussir brillamment dans vos
                études ! Profitez d'une interface conviviale qui vous aide à rester sur la bonne voie et à gérer votre temps
                efficacement.
            </p>

            <div class="flex justify-center md:justify-end w-full md:w-auto">
                <img class="h-64 sm:h-80 md:h-96 rounded-xl border-2 border-blue-400 shadow-lg transition-all duration-300 hover:scale-105 dark:shadow-[0_0_25px_rgba(96,165,250,0.5)]"
                    src="Tmp1.png" alt="Illustration">
            </div>
        </div>

        @if(Auth::check())
            <div class="flex justify-center mt-12">
                <a class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold py-4 px-10 rounded-full border-2 border-purple-300 hover:scale-110 transition-all duration-300 shadow-lg" href="{{ route('begin.acceuil') }}">Dashboard</a>
            </div>
        @else
            <div class="flex flex-col sm:flex-row justify-center gap-6 mt-8">
                <a href="{{ route('register') }}"
                    class="bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold py-4 px-10 rounded-full border-2 border-blue-300 hover:scale-110 transition-all duration-300 shadow-lg text-center">
                    Inscription
                </a>
                <a href="{{ route('login') }}"
                    class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold py-4 px-10 rounded-full border-2 border-purple-300 hover:scale-110 transition-all duration-300 shadow-lg text-center">
                    Connexion
                </a>
            </div>
        @endif
    </main>

    <div class="relative mt-12 py-4 sm:py-6 px-4 bg-gradient-to-r from-blue-700 via-purple-700 to-pink-700 text-white text-lg sm:text-xl rounded-xl shadow-lg overflow-hidden">
        <span class="inline-block whitespace-nowrap animate-marquee2">
            Gère ton emploi du temps en toute simplicité ! Organise, planifie, et réussis sans effort !
        </span>
    </div>

    <style>
        .animate-marquee2 { animation: marquee2 15s linear infinite; }
        @keyframes marquee2 {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
    </style>

    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');

        // Check local storage or system preference
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            lightIcon.classList.remove('hidden');
        } else {
            document.documentElement.classList.remove('dark');
            darkIcon.classList.remove('hidden');
        }

        themeToggleBtn.addEventListener('click', function() {
            darkIcon.classList.toggle('hidden');
            lightIcon.classList.toggle('hidden');

            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        });
    </script>
</body>
</html>
