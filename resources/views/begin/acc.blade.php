<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
{{-- <body class="bg-black/100"> --}}

<body class="bg-gradient-to-r from-black to-red-500/5 ">
    {{-- <body class="bg-gradient-to-r from-red-500 to-black"> --}}
    {{-- <body class=" bg-gradient-to-r from-blue-400 to-violet-500"> --}}

    <div class="container flex justify-between mt-5  text-black">

        <!-- Image au début -->
        <div class="">

            {{-- <img class="rounded-full h-16 -my-4 " src="  image.png " alt=""> --}}
            <img class="rounded-full h-16 -my-4 " src=" CFPCanadienne_Tee-shirt[1].png" alt="">


            {{-- <img class="rounded-full h-16 -my-4 " src="   4-Gestion-du-stress.jpg  " alt=""> --}}

        </div>

        <div class="">

            <!-- Liens au milieu -->
            <div class="gap-y-2">
                {{-- <a class=" text-white hover:text-red-200 font-semibold bg-purple-700 p-2 rounded-md " href="">About</a> --}}
                <a  class="text-red-500 hover:text-black hover:bg-white font-semibold bg-black p-4 rounded-md transition-colors duration-300"
                    href="">About</a>
                <a class="text-red-500 hover:text-white hover:bg-black font-semibold bg-white p-4 rounded-md transition-colors duration-300"
                    href="">Contact</a>
                {{-- <a class=" text-white hover:text-red-200 font-semibold bg-purple-700 p-2 rounded-md " href="">Contact</a> --}}
            </div>

        </div>

        <!-- Liens d'inscription et de connexion à la fin -->


        {{-- <div x-data="{ open: false }" class="relative inline-block text-left">
            <div>
                <button @click="open = !open" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-purple-700 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Étudiant
                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                    <a href="register" class="block px-4 py-2 text-sm text-gray-700   hover:text-red-500 " role="menuitem">Inscription</a>
                    <a href="login" class="block px-4 py-2 text-sm text-gray-700   hover:text-red-500 " role="menuitem">Connexion</a>
                </div>
            </div>
        </div> --}}



    </div>

    <div class=" mt-11  ">

        <h1 class="text-5xl uppercase mx-11 font-semibold text-red-600 ">
            Bienvenue sur notre plateforme <br> de  gestion des emplois du temps !
        </h1>

        <br>
        <br>

        <div class=" flex justify-between gap-x-4  mx-36">

            <p class="text-2xl text-white">Nous sommes heureux de vous accueillir dans cet espace conçu <br>
                spécialement pour les étudiants et le personnel de l'université. <br> Grâce à notre outil, vous pouvez
                facilement créer, modifier et <br> consulter votre emploi du temps en quelques clics. <br>

                Planifiez vos cours, réunions et évènements pour optimiser <br> votre temps et atteindre vos objectifs
                académiques. <br> Profitez d'une expérience personnalisée pour gérer <br> votre année universitaire de
                manière efficace.</p>

            <div class=" -mt-10 ">

                <img class=" h-96" src=" Tmp1.png " alt="">
            </div>



        </div>
        <div class="mx-32 gap-x-6 mt-2 justify-center text-lg">

            <a class="text-white hover:text-black hover:bg-white font-semibold bg-red-700 p-4 rounded-md transition-colors duration-300"
               href="{{ route('register') }}">Inscription</a>
            <a class="text-red-500 hover:text-white hover:bg-black font-semibold bg-white p-4 rounded-md transition-colors duration-300"
               href="{{ route('login') }}">Connexion</a>

        </div>

    </div>

    <div class="auth text-2xl mx-11 ">
        {{-- <a class="text-white hover:text-red-200 font-semibold bg-gradient-to-r from-blue-500 to-green-500 p-2 rounded-md transform transition-transform duration-300 hover:scale-105" href="{{ route('login') }}">Admin</a> --}}
        {{-- <a class="text-white hover:text-red-200 font-semibold bg-gradient-to-r from-blue-500 to-green-500 p-2 rounded-md" href="{{ route('login') }}">Admin</a> --}}
        {{-- <a class="text-white hover:text-red-200   font-semibold  bg-purple-700 p-2 rounded-md " href=" {{ route('login')}} ">Professeur</a> --}}
    </div>


    <div class="relative p-4 overflow-hidden text-red-700 text-2xl rounded-lg marquee">
        <span class="inline-block pb-8 transition-opacity duration-500 opacity-0 marquee-content animate-marquee">
            Bienvenue dans votre gestion d'emploi du temps ! Organisez vos activités, atteignez vos objectifs, et restez
            productif !
        </span>
    </div>

    <script src="/resources/js/app.js"></script>
</body>

</html>
