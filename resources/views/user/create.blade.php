@extends('layouts.admin')

@section('content')
<div class="col-span-4 flex items-center justify-center min-h-screen bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 p-6">
    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md transform transition-transform duration-300 border border-indigo-200">
        <h2 class="text-3xl font-extrabold text-center mb-6 bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Créer un enseignant </h2>

        <!-- Affichage des erreurs avec style -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-500/90 text-white rounded-lg shadow-md animate-pulse">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Message de succès (optionnel) -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-500/90 text-white rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="name" class="block text-indigo-700 font-semibold">Nom</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="mt-1 block w-full p-3 border border-indigo-300 rounded-lg bg-indigo-50 text-indigo-900 placeholder-indigo-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200" placeholder="Entrez le nom">
            </div>

            <div class="mb-5">
                <label for="email" class="block text-indigo-700 font-semibold">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full p-3 border border-indigo-300 rounded-lg bg-indigo-50 text-indigo-900 placeholder-indigo-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200" placeholder="Entrez l'email">
            </div>

            <div class="mb-5">
                <label for="password" class="block text-indigo-700 font-semibold">Mot de passe</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full p-3 border border-indigo-300 rounded-lg bg-indigo-50 text-indigo-900 placeholder-indigo-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200" placeholder="Entrez le mot de passe">
            </div>

            <div class="mb-5">
                <label for="password_confirmation" class="block text-indigo-700 font-semibold">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 block w-full p-3 border border-indigo-300 rounded-lg bg-indigo-50 text-indigo-900 placeholder-indigo-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200" placeholder="Confirmez le mot de passe">
            </div>

            <div class="mb-6">
                <label for="role" class="block text-indigo-700 font-semibold">Rôle</label>
                <select id="role" name="role" class="mt-1 block w-full p-3 border border-indigo-300 rounded-lg bg-indigo-50 text-indigo-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200">
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="enseignant" {{ old('role') == 'enseignant' ? 'selected' : '' }}>Enseignant</option>
                    <option value="etudiant" {{ old('role') == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold py-3 rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">Créer l'utilisateur</button>
        </form>
    </div>
</div>
@endsection
