@extends('layouts.admin')

@section('title', 'Tous les utilisateurs')

@section('content')
<div class="col-span-4 min-h-screen bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 dark:from-gray-900 dark:via-indigo-950 dark:to-purple-950 p-4 md:p-6 overflow-auto transition-colors duration-300">
    <div class="w-full max-w-5xl mx-auto">

        {{-- TITRE --}}
        <h1 class="text-3xl md:text-4xl font-extrabold text-center mb-8
                   bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600
                   dark:from-indigo-400 dark:via-purple-400 dark:to-pink-400
                   bg-clip-text text-transparent">
            Liste des utilisateurs
        </h1>

        {{-- MESSAGE SUCCESS --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-500/90 dark:bg-green-600/80 text-white rounded-lg shadow-md max-w-2xl mx-auto animate-fade-in">
                {{ session('success') }}
            </div>
        @endif

        {{-- ================= MOBILE : CARDS ================= --}}
        <div class="md:hidden space-y-4">

            @forelse ($users as $user)
                @if ($user->role !== 'admin')
                <div class="bg-white dark:bg-gray-800 border border-indigo-200 dark:border-indigo-900/50 rounded-xl shadow-md p-4 transition-colors">

                    <h2 class="text-lg font-bold text-indigo-700 dark:text-indigo-400">
                        {{ $user->name }}
                    </h2>

                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                        {{ $user->email }}
                    </p>

                    {{-- ROLE --}}
                    <form action="{{ route('user.updaterole', $user->id) }}" method="POST" class="mb-4">
                        @csrf
                        @method('PUT')
                        <label class="text-xs font-semibold text-gray-500 dark:text-gray-400">Rôle</label>
                        <select name="role"
                                onchange="this.form.submit()"
                                class="w-full mt-1 bg-indigo-50 dark:bg-gray-700 border border-indigo-300 dark:border-indigo-800
                                       text-indigo-900 dark:text-indigo-200 p-2 rounded-lg
                                       focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option value="etudiant" {{ $user->role == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                            <option value="enseignant" {{ $user->role == 'enseignant' ? 'selected' : '' }}>Enseignant</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                        </select>
                    </form>

                    {{-- ACTIONS --}}
                    <div class="flex gap-2">
                        <a href="{{ route('user.show', $user) }}"
                           class="flex-1 text-center bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg transition-colors">
                            Voir
                        </a>

                        <a href="{{ route('user.edit', $user) }}"
                           class="flex-1 text-center bg-indigo-500 hover:bg-indigo-600 text-white py-2 rounded-lg transition-colors">
                            Modifier
                        </a>
                    </div>

                    <form action="{{ route('user.delete', $user) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 rounded-lg transition-colors">
                            Supprimer
                        </button>
                    </form>

                </div>
                @endif
            @empty
                <p class="text-center text-indigo-700 dark:text-indigo-400 font-medium">
                    Aucun utilisateur trouvé
                </p>
            @endforelse

        </div>

        {{-- ================= DESKTOP : TABLE ================= --}}
        <div class="hidden md:block bg-white dark:bg-gray-800 rounded-xl shadow-2xl border border-indigo-200 dark:border-indigo-900/50 overflow-hidden transition-colors">

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
                        @forelse ($users as $user)
                            @if ($user->role !== 'admin')
                            <tr class="hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-colors">
                                <td class="py-4 px-6 font-medium text-indigo-900 dark:text-indigo-200">
                                    {{ $user->name }}
                                </td>

                                <td class="py-4 px-6 text-indigo-900 dark:text-indigo-300">
                                    {{ $user->email }}
                                </td>

                                <td class="py-4 px-6">
                                    <form action="{{ route('user.updaterole', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="role"
                                                onchange="this.form.submit()"
                                                class="bg-indigo-50 dark:bg-gray-700 border border-indigo-300 dark:border-indigo-800
                                                       text-indigo-900 dark:text-indigo-200 p-2 rounded-lg
                                                       focus:outline-none focus:ring-2 focus:ring-purple-500">
                                            <option value="etudiant" {{ $user->role == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                                            <option value="enseignant" {{ $user->role == 'enseignant' ? 'selected' : '' }}>Enseignant</option>
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                                        </select>
                                    </form>
                                </td>

                                <td class="py-4 px-6">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('user.show', $user) }}"
                                           class="w-24 text-center bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg transition-colors shadow-sm">
                                            Voir
                                        </a>

                                        <a href="{{ route('user.edit', $user) }}"
                                           class="w-24 text-center bg-indigo-500 hover:bg-indigo-600 text-white py-2 rounded-lg transition-colors shadow-sm">
                                            Modifier
                                        </a>

                                        <form action="{{ route('user.delete', $user) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="w-24 bg-pink-500 hover:bg-pink-600 text-white py-2 rounded-lg transition-colors shadow-sm">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-indigo-700 dark:text-indigo-400 font-medium">
                                    Aucun utilisateur trouvé
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
