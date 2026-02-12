@extends('layouts.admin')

@section('title', 'Créer un cours')

@section('content')
<div class="col-span-4 min-h-screen bg-gradient-to-br from-gray-100 via-blue-50 to-green-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 p-6 flex items-center justify-center transition-colors duration-300">
    <div class="w-full max-w-lg">

        <h1 class="text-4xl md:text-7xl font-extrabold text-center mb-8 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-clip-text text-transparent hover:scale-105 transition-all duration-300">
            Créer un cours
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

        {{-- FORMULAIRE --}}
        <form action="{{ route('cours.store') }}" method="POST"
              class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 transition-all duration-300 hover:shadow-xl">
            @csrf

            {{-- NOM DU COURS --}}
            <div class="mb-6">
                <label for="nom" class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Nom du cours</label>
                <input
                    class="w-full p-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg
                           text-gray-700 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500
                           focus:outline-none focus:ring-2 focus:ring-purple-400 dark:focus:ring-purple-500 focus:border-transparent transition-all duration-200"
                    id="nom"
                    type="text"
                    name="nom"
                    value="{{ old('nom') }}"
                    required
                    placeholder="Entrez le nom du cours"
                >
                @error('nom')
                    <div class="text-red-500 dark:text-red-400 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            {{-- DESCRIPTION --}}
            <div class="mb-6">
                <label for="description" class="block text-gray-700 dark:text-gray-200 font-semibold mb-2">Description</label>
                <textarea
                    name="description"
                    class="w-full p-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg
                           text-gray-700 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500
                           focus:outline-none focus:ring-2 focus:ring-purple-400 dark:focus:ring-purple-500 focus:border-transparent transition-all duration-200 h-32 resize-y"
                    placeholder="Décrivez le cours..."
                >{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500 dark:text-red-400 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            {{-- BOUTON VALIDER --}}
            <div class="flex justify-center">
                <button type="submit"
                        class="flex w-full justify-center rounded-md bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 px-4 py-3 text-base font-bold text-white shadow-lg
                               hover:from-blue-600 hover:via-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105
                               focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    Créer le cours
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
