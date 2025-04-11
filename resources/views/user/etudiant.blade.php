@extends('layouts.admin')

@section('title', 'Liste des étudiants')

@section('content')
<div class="col-span-4 bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 p-6 flex justify-center">
    <div class="w-full max-w-5xl">
        <h1 class="text-4xl font-extrabold text-center mb-8 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent transform hover:scale-105 transition-all duration-300">Liste des étudiants</h1>

        <!-- Message de succès (optionnel) -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-500/90 text-white rounded-lg shadow-md w-full max-w-2xl mx-auto">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-2xl overflow-hidden border border-indigo-200 transition-all duration-300 hover:shadow-xl">
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
                    @forelse ($etudiantcounts as $etudiantcount)
                        <tr class="border-b border-indigo-100 hover:bg-indigo-50 transition-all duration-200">
                            <td class="py-4 px-6 text-indigo-900 font-medium">{{ $etudiantcount->name }}</td>
                            <td class="py-4 px-6 text-indigo-900">{{ $etudiantcount->email }}</td>
                            <td class="py-4 px-6 text-indigo-900">{{ $etudiantcount->role }}</td>
                            <td class="py-4 px-6 flex space-x-2">
                                @if (Auth::user()->role === 'admin' )
                                    <a href="{{ route('user.show', $etudiantcount) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                        Voir
                                    </a>
                                    <a href="{{ route('user.edit', $etudiantcount) }}" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                        Modifier
                                    </a>
                                    <a href="{{ route('user.delete', $etudiantcount) }}" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                        Supprimer
                                    </a>
                                @else
                                    <a href="{{ route('user.show', $etudiantcount) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                        Voir
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-6 px-6 text-center text-indigo-700 font-medium">Aucun étudiant trouvé</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
