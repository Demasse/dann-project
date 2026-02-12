@extends('layouts.admin')

@section('title', 'Tableau de Bord')

@section('content')
<div class="col-span-4 overflow-scroll">
    <div class="bg-white dark:bg-gray-900 p-8 min-h-screen flex flex-col items-center text-gray-800 dark:text-gray-100 transition-colors duration-300">

        <h1 class="text-4xl md:text-5xl font-extrabold text-center mb-10 bg-gradient-to-r from-purple-600 via-pink-500 to-indigo-600 dark:from-purple-400 dark:via-pink-300 dark:to-indigo-400 bg-clip-text text-transparent animate-pulse hover:scale-105 transition-all duration-300">
            Tableau de Bord - Gestion d'Emploi du Temps
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12 w-full max-w-5xl">

            @if(Auth::user()->role === 'admin'|| Auth::user()->role === 'enseignant')
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:border-purple-500 dark:hover:border-purple-400 animate-fade-up">
                    <div class="flex items-center gap-4">
                        <svg class="w-10 h-10 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253"></path>
                        </svg>
                        <div>
                            <h2 class="text-xl font-bold mb-2 text-gray-700 dark:text-gray-200">Cours</h2>
                            <p class="text-3xl font-semibold text-purple-600 dark:text-purple-400">{{ $countcour }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'enseignant')
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:border-orange-500 dark:hover:border-orange-400 animate-fade-up animate-delay-100">
                    <div class="flex items-center gap-4">
                        <svg class="w-10 h-10 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <div>
                            <h2 class="text-xl font-bold mb-2 text-gray-700 dark:text-gray-200">Modules</h2>
                            <p class="text-3xl font-semibold text-orange-600 dark:text-orange-400">{{ $countmodule }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user()->role === 'admin')
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:border-pink-500 dark:hover:border-pink-400 animate-fade-up animate-delay-200">
                    <div class="flex items-center gap-4">
                        <svg class="w-10 h-10 text-pink-600 dark:text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 1.857a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <div>
                            <h2 class="text-xl font-bold mb-2 text-gray-700 dark:text-gray-200">Utilisateurs</h2>
                            <p class="text-3xl font-semibold text-pink-600 dark:text-pink-400">{{ $countuser }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'enseignant')
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:border-teal-500 dark:hover:border-teal-400 animate-fade-up animate-delay-300">
                    <div class="flex items-center gap-4">
                        <svg class="w-10 h-10 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <div>
                            <h2 class="text-xl font-bold mb-2 text-gray-700 dark:text-gray-200">Compétences</h2>
                            <p class="text-3xl font-semibold text-teal-600 dark:text-teal-400">{{ $countcompetence }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'enseignant')
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:border-blue-500 dark:hover:border-blue-400 animate-fade-up animate-delay-400">
                    <div class="flex items-center gap-4">
                        <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16M12 2l8 4-8 4-8-4 8-4z"></path>
                        </svg>
                        <div>
                            <h2 class="text-xl font-bold mb-2 text-gray-700 dark:text-gray-200">
                                {{ Auth::user()->role === 'admin' ? 'Étudiants' : 'Apprenants' }}
                            </h2>
                            <p class="text-3xl font-semibold text-blue-600 dark:text-blue-400">{{ $etudiantcount }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user()->role === 'admin')
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg p-6 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:border-indigo-500 dark:hover:border-indigo-400 animate-fade-up animate-delay-500">
                    <div class="flex items-center gap-4">
                        <svg class="w-10 h-10 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <div>
                            <h2 class="text-xl font-bold mb-2 text-gray-700 dark:text-gray-200">Enseignants</h2>
                            <p class="text-3xl font-semibold text-indigo-600 dark:text-indigo-400">{{ $profcount }}</p>
                        </div>
                    </div>
                </div>
            @endif

        </div>

        <br><br>

        <div class="w-full max-w-5xl">
            <h2 class="text-2xl font-bold text-orange-700 dark:text-orange-400 mb-4 animate-fade-up">Actions Rapides</h2>
            <div class="flex flex-wrap gap-6 animate-fade-up animate-delay-500">
                <a href="{{ route('cours.create') }}"
                    class="bg-gradient-to-r from-purple-600 to-indigo-600 dark:from-purple-500 dark:to-indigo-500 text-white font-bold py-3 px-6 rounded-full hover:scale-105 transition-all duration-300 hover:shadow-lg">
                    Créer un Cours
                </a>
                <a href="{{ route('prog.index') }}"
                    class="bg-gradient-to-r from-teal-600 to-cyan-600 dark:from-teal-500 dark:to-cyan-500 text-white font-bold py-3 px-6 rounded-full hover:scale-105 transition-all duration-300 hover:shadow-lg">
                    Voir l’Emploi du Temps
                </a>
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('user.create') }}"
                        class="bg-gradient-to-r from-pink-600 to-red-600 dark:from-pink-500 dark:to-red-500 text-white font-bold py-3 px-6 rounded-full hover:scale-105 transition-all duration-300 hover:shadow-lg">
                        Ajouter un Utilisateur
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
