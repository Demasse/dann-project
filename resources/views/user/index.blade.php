@extends('layouts.admin')

@section('title', 'Tous les utilisateurs')

@section('content')
<div class="col-span-4 min-h-screen bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 p-6 overflow-auto">
    <div class="w-full max-w-5xl mx-auto">

        <!-- Titre -->
        <h1 class="text-4xl font-extrabold text-center mb-8
                   bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600
                   bg-clip-text text-transparent
                   transform hover:scale-105 transition-all duration-300">
            Liste des utilisateurs
        </h1>

        <!-- Message de succès -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-500/90 text-white rounded-lg shadow-md w-full max-w-2xl mx-auto">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tableau des utilisateurs -->
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden border border-indigo-200 transition-all duration-300 hover:shadow-xl">

            <!-- Scroll horizontal pour mobile -->
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
                            <th class="py-4 px-6 text-left text-lg font-semibold">Nom</th>
                            <th class="py-4 px-6 text-left text-lg font-semibold">Email</th>
                            <th class="py-4 px-6 text-left text-lg font-semibold">Rôle</th>
                            <th class="py-4 px-6 text-left text-lg font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            @if ($user->role !== 'admin')
                                <tr class="border-b border-indigo-100 hover:bg-indigo-50 transition-all duration-200">
                                    <td class="py-4 px-6 text-indigo-900 font-medium">{{ $user->name }}</td>
                                    <td class="py-4 px-6 text-indigo-900">{{ $user->email }}</td>
                                    <td class="py-4 px-6 text-indigo-900">
                                        <form action="{{ route('user.updaterole', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="role"
                                                    onchange="this.form.submit()"
                                                    class="bg-indigo-50 border border-indigo-300 text-indigo-900 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-200">
                                                <option value="etudiant" {{ $user->role == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                                                <option value="enseignant" {{ $user->role == 'enseignant' ? 'selected' : '' }}>Enseignant</option>
                                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="py-4 px-6 flex flex-wrap gap-2">
                                        <a href="{{ route('user.show', $user) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                            Voir
                                        </a>
                                        <a href="{{ route('user.edit', $user) }}" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                            Modifier
                                        </a>
                                        <form action="{{ route('user.delete', $user) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                                Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 px-6 text-center text-indigo-700 font-medium">Aucun utilisateur trouvé</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
