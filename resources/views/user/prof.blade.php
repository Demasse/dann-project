@extends('layouts.admin')

@section('title', 'Liste des professeurs')

@section('content')
<div class="col-span-4 min-h-screen bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 dark:from-gray-900 dark:via-indigo-950 dark:to-purple-950 p-4 md:p-6 transition-colors duration-300">
    <div class="w-full max-w-5xl mx-auto">

        {{-- TITRE --}}
        <h1 class="text-3xl md:text-4xl font-extrabold text-center mb-8
                   bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600
                   dark:from-indigo-400 dark:via-purple-400 dark:to-pink-400
                   bg-clip-text text-transparent transform hover:scale-105 transition-all duration-300">
            Liste des professeurs
        </h1>

        {{-- MESSAGE SUCCESS --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-500/90 dark:bg-green-600/80 text-white rounded-lg shadow-md w-full max-w-2xl mx-auto">
                {{ session('success') }}
            </div>
        @endif

        {{-- ================= MOBILE : CARDS (Visible uniquement sur mobile) ================= --}}
        <div class="md:hidden space-y-4">
            @forelse ($profcounts as $profcount)
                <div class="bg-white dark:bg-gray-800 p-5 rounded-xl shadow-md border border-indigo-200 dark:border-indigo-900/50">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h2 class="text-lg font-bold text-indigo-900 dark:text-indigo-200">{{ $profcount->name }}</h2>
                            <p class="text-sm text-indigo-700 dark:text-indigo-400">{{ $profcount->email }}</p>
                        </div>
                        <span class="px-3 py-1 text-xs font-bold bg-purple-100 dark:bg-purple-900/50 text-purple-600 dark:text-purple-300 rounded-full uppercase">
                            {{ $profcount->role }}
                        </span>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('user.show', $profcount) }}"
                           class="flex justify-center items-center bg-green-500 text-white py-2 rounded-lg text-sm font-semibold shadow-sm">
                            Voir
                        </a>
                        <a href="{{ route('user.edit', $profcount) }}"
                           class="flex justify-center items-center bg-indigo-500 text-white py-2 rounded-lg text-sm font-semibold shadow-sm">
                            Modifier
                        </a>
                        <form action="{{ route('user.delete', $profcount) }}" method="POST" class="col-span-2 mt-1" onsubmit="return confirm('Supprimer ce professeur ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-pink-500 text-white py-2 rounded-lg text-sm font-semibold shadow-sm">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center text-indigo-700 dark:text-indigo-400 font-medium">Aucun professeur trouvé</p>
            @endforelse
        </div>

        {{-- ================= DESKTOP : TABLEAU (Caché sur mobile) ================= --}}
        <div class="hidden md:block bg-white dark:bg-gray-800 rounded-xl shadow-2xl overflow-hidden border border-indigo-200 dark:border-indigo-900/50 transition-all duration-300">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
                            <th class="py-4 px-6 text-left text-lg font-semibold">Nom</th>
                            <th class="py-4 px-6 text-left text-lg font-semibold">Email</th>
                            <th class="py-4 px-6 text-left text-lg font-semibold">Rôle</th>
                            <th class="py-4 px-6 text-center text-lg font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-indigo-100 dark:divide-indigo-900/30">
                        @forelse ($profcounts as $profcount)
                            <tr class="hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-all duration-200">
                                <td class="py-4 px-6 text-indigo-900 dark:text-indigo-200 font-medium">
                                    {{ $profcount->name }}
                                </td>
                                <td class="py-4 px-6 text-indigo-800 dark:text-indigo-300">
                                    {{ $profcount->email }}
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 text-sm font-medium bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-300 rounded-full">
                                        {{ $profcount->role }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('user.show', $profcount) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-all shadow-md transform hover:scale-105">
                                            Voir
                                        </a>
                                        <a href="{{ route('user.edit', $profcount) }}" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition-all shadow-md transform hover:scale-105">
                                            Modifier
                                        </a>
                                        <form action="{{ route('user.delete', $profcount) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition-all shadow-md transform hover:scale-105">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-10 px-6 text-center text-indigo-700 dark:text-indigo-400 font-medium italic">
                                    Aucun professeur trouvé
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
