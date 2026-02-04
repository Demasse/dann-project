<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des Emplois du Temps</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-tr from-gray-800 via-blue-900 to-purple-900 text-white min-h-screen font-sans">
    <!-- Header -->
    <header class="container mx-auto flex flex-col md:flex-row justify-between items-center py-4 px-6 gap-4 md:gap-0">
        <!-- Logo -->
        <div>
            <img class="rounded-full h-20 md:h-24" src="CFPCanadienne_Tee-shirt[1].png" alt="Logo">
        </div>

        <!-- Navigation -->
        <nav class="flex flex-wrap justify-center md:justify-end gap-4 md:gap-6">
            <a href="#"
                class="bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:from-blue-700 hover:to-purple-700 transition-all duration-300 hover:scale-105 hover:shadow-[0_0_15px_rgba(139,92,246,0.8)]">
                À propos
            </a>
            <a href="#"
                class="bg-gradient-to-r from-purple-600 to-pink-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:from-purple-700 hover:to-pink-700 transition-all duration-300 hover:scale-105 hover:shadow-[0_0_15px_rgba(236,72,153,0.8)]">
                Contact
            </a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto mt-4 px-4 md:px-6">
        <h1
            class="text-4xl sm:text-5xl md:text-6xl uppercase font-extrabold text-center bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent transition-all duration-500 hover:scale-105 hover:shadow-[0_0_20px_rgba(167,139,250,0.7)]">
            Bienvenue sur Time_app !
        </h1>

        <div class="flex flex-col md:flex-row justify-between items-center gap-8 md:gap-16 mt-6">
            <!-- Texte -->
            <p
                class="text-lg sm:text-xl md:text-2xl text-gray-200 leading-relaxed max-w-full md:max-w-xl bg-gray-800 bg-opacity-50 p-6 rounded-lg shadow-md transition-all duration-300 hover:text-white hover:bg-opacity-70 hover:scale-102">
                Nous sommes heureux de vous accueillir dans cet espace conçu spécialement pour les étudiants et le
                personnel universitaire. Ici, vous pouvez facilement créer, modifier et consulter vos emplois du temps.
                Organisez vos cours et événements pour maximiser votre productivité et réussir brillamment dans vos
                études ! Profitez d'une interface conviviale qui vous aide à rester sur la bonne voie et à gérer votre temps
                efficacement.
            </p>

            <!-- Image -->
            <div class="flex justify-center md:justify-end w-full md:w-auto">
                <img class="h-64 sm:h-80 md:h-96 rounded-xl border-2 border-blue-400 shadow-[0_0_10px_rgba(96,165,250,0.7)] transition-all duration-300 hover:scale-110 hover:shadow-[0_0_25px_rgba(96,165,250,1)]"
                    src="Tmp1.png" alt="Illustration">
            </div>
        </div>

        <!-- Boutons d'action -->
        @if(Auth::check())
            <div class="flex justify-center mt-12">
                <a class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold py-4 px-10 rounded-full border-2 border-purple-300 hover:from-purple-600 hover:to-pink-600 hover:border-purple-400 transition-all duration-300 transform hover:scale-110 hover:shadow-[0_0_20px_rgba(236,72,153,0.9)]" href="{{ route('begin.acceuil') }}">Dashboard</a>
            </div>
        @else
            <div class="flex flex-col sm:flex-row justify-center gap-6 mt-8">
                <a href="{{ route('register') }}"
                    class="bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold py-4 px-10 rounded-full border-2 border-blue-300 hover:from-blue-600 hover:to-purple-600 hover:border-blue-400 transition-all duration-300 transform hover:scale-110 hover:shadow-[0_0_20px_rgba(139,92,246,0.9)]">
                    Inscription
                </a>
                <a href="{{ route('login') }}"
                    class="bg-gradient-to-r from-purple-500 to-pink-500 text-white font-semibold py-4 px-10 rounded-full border-2 border-purple-300 hover:from-purple-600 hover:to-pink-600 hover:border-purple-400 transition-all duration-300 transform hover:scale-110 hover:shadow-[0_0_20px_rgba(236,72,153,0.9)]">
                    Connexion
                </a>
            </div>
        @endif
    </main>

    <!-- Marquee (Ticker) -->
    <div
        class="relative mt-6 py-4 sm:py-6 px-4 sm:px-8 bg-gradient-to-r from-blue-800 via-purple-800 to-pink-800 text-white text-lg sm:text-xl md:text-2xl rounded-xl shadow-lg overflow-hidden">
        <span class="inline-block whitespace-nowrap animate-marquee2">
            Gère ton emploi du temps en toute simplicité ! Organise, planifie, et réussis sans effort !
        </span>
    </div>

    <!-- CSS personnalisé pour le marquee -->
    <style>
        .animate-marquee2 {
            animation: marquee2 12s linear infinite;
        }

        @keyframes marquee2 {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
</body>

</html>
