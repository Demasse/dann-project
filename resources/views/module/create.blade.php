@extends('layouts.admin')

@section('title', 'Créer un module')

@section('content')
<div class="col-span-4 min-h-screen bg-gradient-to-br from-gray-100 via-blue-50 to-green-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 p-6 flex items-center justify-center transition-colors duration-300">
    <div class="w-full max-w-lg">
        <h1 class="text-6xl font-extrabold text-center mb-8 bg-gradient-to-r from-red-500 via-pink-500 to-purple-500 bg-clip-text text-transparent transform hover:scale-105 transition-all duration-300">
            Créer un module
        </h1>

        @if (session('success'))
            <div class="mb-6 p-4 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-800 text-green-700 dark:text-green-300 rounded-lg shadow-md animate-bounce">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="mb-6 p-4 bg-red-100 dark:bg-red-900/30 border border-red-400 dark:border-red-800 text-red-700 dark:text-red-300 rounded-lg shadow-md">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('module.store') }}" method="POST"
              class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl">
            @csrf

            <div class="mb-6">
                <label for="module_id" class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Nom du module</label>
                <input
                    type="text"
                    name="nom"
                    id="module_id"
                    class="w-full p-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg
                           text-gray-700 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500
                           focus:outline-none focus:ring-2 focus:ring-red-400 dark:focus:ring-red-500 focus:border-transparent transition-all duration-200"
                    value="{{ old('nom') }}"
                    required
                    placeholder="Entrez le nom du module"
                >
                @error('nom')
                    <div class="text-red-500 dark:text-red-400 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="competence_id" class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Compétence associée</label>
                <input
                    type="text"
                    name="competence"
                    id="competence_id"
                    class="w-full p-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg
                           text-gray-700 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500
                           focus:outline-none focus:ring-2 focus:ring-red-400 dark:focus:ring-red-500 focus:border-transparent transition-all duration-200"
                    value="{{ old('competence') }}"
                    required
                    placeholder="Entrez la compétence"
                >
                @error('competence')
                    <div class="text-red-500 dark:text-red-400 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="cour_id" class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Cours associé</label>
                <select
                    name="cour_id"
                    id="cour_id"
                    class="w-full p-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg
                           text-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-400 dark:focus:ring-red-500 focus:border-transparent transition-all duration-200"
                    required
                >
                    <option value="" disabled selected class="dark:bg-gray-800">Sélectionnez un cours</option>
                    @foreach ($cours as $cour)
                        <option value="{{ $cour->id }}" {{ old('cour_id') == $cour->id ? 'selected' : '' }} class="dark:bg-gray-800">
                            {{ $cour->nom }}
                        </option>
                    @endforeach
                </select>
                @error('cour_id')
                    <div class="text-red-500 dark:text-red-400 mt-1 text-sm">{{ $message }}</div>
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
