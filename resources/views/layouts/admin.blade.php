{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans w-[100%] h-[100vh] grid grid-cols-5 gap-1 col-span-full">

    <header class=" bg-black/50 py-4 flex flex-col shadow-md col-span-1">
        <nav class="container mx-auto">
            <ul class="flex justify-center space-x-4 flex-col h-[100%]">
                <li class="flex items-center space-x-1 py-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-white"> ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                        </svg>
                    </div>
                    <a class="text-white hover:text-red-700 font-bold text-lg"
                        href="{{ route('begin.acceuil') }}">Dashboard</a>
                </li>

                @if (Auth::user()->role === 'admin')
                    <li class="flex items-center space-x-1 py-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>

                        </div>
                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href="{{ route('cours.index') }}">liste
                            des cours</a>
                    </li>



                    <li class="flex items-center space-x-1 py-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                            </svg>

                        </div>
                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href="{{ route('cours.create') }} ">Créer
                            un cours</a>
                    </li>


                    <li class="flex items-center space-x-1 py-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                            </svg>

                        </div>
                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href="{{ route('module.create') }} ">Créer un module</a>
                    </li>

                    <li class="flex items-center space-x-1 py-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"  class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                            </svg>


                        </div>
                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href="{{ route('prog.create') }} ">programme un cours</a>
                    </li>

                    <li class="flex items-center space-x-1 py-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"  class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>

                        </div>
                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href="{{ route('user.index') }} ">Liste
                            des utilisateur</a>
                    </li>

                    <li class="flex items-center space-x-1 py-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"  class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                        </div>
                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href="{{ route('user.prof') }} ">Liste
                            des professeurs</a>
                    </li>


                    <li class="flex items-center space-x-1 py-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"  class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>

                        </div>
                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href="{{ route('user.etudiant') }} ">Liste des etudiants</a>
                    </li>

                    <li class="flex items-center space-x-1 py-2">
                        <div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"  class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                            </svg>

                        </div>

                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href=" {{ route('prog.index') }}  ">Emploi de temps </a>
                    </li>
                @elseif(Auth::user()->role === 'enseignant')
                    <li class="flex items-center space-x-1 py-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"  class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>

                        </div>
                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href="{{ route('cours.index') }}">liste
                            des cours</a>
                    </li>



                    <li class="flex items-center space-x-1 py-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"  class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                            </svg>

                        </div>
                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href="{{ route('cours.create') }} ">Créer
                            un cours</a>
                    </li>


                    <li class="flex items-center space-x-1 py-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"  class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                            </svg>

                        </div>
                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href="{{ route('module.create') }} ">Créer un module</a>
                    </li>

                    <li class="flex items-center space-x-1 py-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"  class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                            </svg>


                        </div>
                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href="{{ route('prog.create') }} ">programme un cours</a>
                    </li>
                    <li class="flex items-center space-x-1 py-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"  class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>

                        </div>
                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href="{{ route('user.etudiant') }} ">Liste des etudiants</a>
                    </li>

                    <li class="flex items-center space-x-1 py-2">
                        <div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"  class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                            </svg>

                        </div>

                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href=" {{ route('prog.index') }}  ">Emploi de temps </a>
                    </li>
                @elseif(Auth::user()->role === 'etudiant')
                    <li class="flex items-center space-x-1 py-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"  class="size-6 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 2.25C6.75 2.25 2.25 6.75 2.25 12S6.75 21.75 12 21.75 21.75 17.25 21.75 12 17.25 2.25 12 2.25Zm0 18A5.25 5.25 0 1 1 12 3a5.25 5.25 0 0 1 0 10.5A5.25 5.25 0 0 1 12 20.25Z" />
                            </svg>
                        </div>
                        <a class="text-white hover:text-red-700 font-bold text-lg"
                            href="{{ route('prog.index') }}">Emploi de temps</a>
                    </li>
                @endif

                <li class="flex items-center space-x-1 py-2 mt-[16rem]">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor"  class="size-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>
                    </div>
                    <a class="text-white hover:text-red-700 font-bold text-lg"
                        href="{{ route('logout') }}">Déconnexion</a>
                </li>
            </ul>
        </nav>
    </header>

    @yield('content')

</body>

</html>
 --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans w-full h-screen md:grid md:grid-cols-5 gap-1 overflow-hidden">

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
           fixed md:static top-0 left-0
           h-screen w-64
           -translate-x-full md:translate-x-0
           transition-transform duration-300
           z-40 col-span-1">

    <nav class="container mx-auto">
        <ul class="flex flex-col h-full mt-8">

            {{-- Dashboard --}}
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
                        ['route' => 'prog.create', 'label' => 'Programmer un cours'],
                        ['route' => 'user.index', 'label' => 'Liste des utilisateurs'],
                        ['route' => 'user.prof', 'label' => 'Liste des professeurs'],
                        ['route' => 'user.etudiant', 'label' => 'Liste des étudiants'],
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

            {{-- Menu dynamique --}}
            @foreach ($menuItems[Auth::user()->role] ?? [] as $item)
                <li class="flex items-center py-2 px-4 hover:bg-[#d7d7ec]">
                    <a class="text-white font-bold text-lg"
                       href="{{ route($item['route']) }}">
                       {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
 </ul>

<ul class="flex flex-col md:mt-[1.56rem]

           gap-3 px-4">

    {{-- Ajouter utilisateur (ADMIN ONLY) --}}
    @if (Auth::user()->role === 'admin')
        <li>
            <a href="{{ route('user.create') }}"
               class="group relative flex items-center justify-center gap-2
                      bg-gradient-to-r from-indigo-500 to-purple-600
                      text-white font-bold text-base
                      py-2.5 rounded-lg
                      shadow-md shadow-purple-500/30
                      transition-all duration-300
                      hover:scale-[1.02] hover:shadow-lg">

                <!-- Icon -->
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
                  py-2.5 rounded-lg
                  shadow-md shadow-red-500/30
                  transition-all duration-300
                  hover:scale-[1.02] hover:shadow-lg">

            <!-- Icon -->
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
<main class="md:col-span-4 p-6">
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



