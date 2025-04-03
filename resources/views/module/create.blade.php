@extends('layouts.admin')

@section('title', 'Créer un module')

@section('content')
<div class="col-span-4 min-h-screen bg-gradient-to-br from-gray-100 via-blue-50 to-green-50 p-6 flex items-center justify-center">
    <div class="w-full max-w-lg">
        <h1 class="text-6xl font-extrabold text-center mb-8 bg-gradient-to-r from-red-500 via-pink-500 to-purple-500 bg-clip-text text-transparent transform hover:scale-105 transition-all duration-300">Créer un module</h1>

        <!-- Message de succès ou erreur (optionnel) -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg shadow-md animate-bounce">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg shadow-md">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('module.store') }}" method="POST" class="bg-white p-8 rounded-xl shadow-lg border border-gray-200 transition-all duration-300 hover:shadow-xl">
            @csrf

            <div class="mb-6">
                <label for="module_id" class="block text-gray-700 font-semibold mb-2">Nom du module</label>
                <input
                    type="text"
                    name="nom"
                    id="module_id"
                    class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition-all duration-200"
                    value="{{ old('nom') }}"
                    required
                    placeholder="Entrez le nom du module"
                >
                @error('nom')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="competence_id" class="block text-gray-700 font-semibold mb-2">Compétence associée</label>
                <input
                    type="text"
                    name="competence"
                    id="competence_id"
                    class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition-all duration-200"
                    value="{{ old('competence') }}"
                    required
                    placeholder="Entrez la compétence"
                >
                @error('competence')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="cour_id" class="block text-gray-700 font-semibold mb-2">Cours associé</label>
                <select
                    name="cour_id"
                    id="cour_id"
                    class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition-all duration-200"
                    required
                >
                    <option value="" disabled selected>Sélectionnez un cours</option>
                    @foreach ($cours as $cour)
                        <option value="{{ $cour->id }}" {{ old('cour_id') == $cour->id ? 'selected' : '' }}>
                            {{ $cour->nom }}
                        </option>
                    @endforeach
                </select>
                @error('cour_id')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-center">
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-red-500 to-purple-500 text-white font-bold py-3 px-6 rounded-lg hover:from-red-600 hover:to-purple-600 transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
                >
                    Créer le module
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
