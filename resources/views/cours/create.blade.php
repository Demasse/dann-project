@extends('layouts.admin')

@section('title', 'Créer un cours')

@section('content')
<div class="col-span-4 min-h-screen bg-gradient-to-br from-gray-100 via-blue-50 to-green-50 p-6 flex items-center justify-center">
    <div class="w-full max-w-lg">

        <h1 class="text-4xl md:text-7xl font-extrabold text-center mb-8 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 bg-clip-text text-transparent hover:scale-105 transition-all duration-300">
            Créer un cours
        </h1>

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

        <form action="{{ route('cours.store') }}" method="POST" class="bg-white p-8 rounded-xl shadow-lg border border-gray-200 transition-all duration-300 hover:shadow-xl">
            @csrf

            <div class="mb-6">
                <label for="nom" class="block text-gray-700 font-semibold mb-2">Nom du cours</label>
                <input
                    class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition-all duration-200"
                    id="nom"
                    type="text"
                    name="nom"
                    value="{{ old('nom') }}"
                    required
                    placeholder="Entrez le nom du cours"
                >
                @error('nom')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea
                    name="description"
                    class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition-all duration-200 h-32 resize-y"
                    placeholder="Décrivez le cours..."
                >{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="flex justify-center">
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-red-500 to-purple-500 text-white font-bold py-3 px-6 rounded-lg hover:from-red-600 hover:to-purple-600 transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
                >
                    Créer le cours
                </button>



            </div> --}}

            <div class="flex justify-center">
                <button type="submit" class="flex w-full justify-center rounded-md bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 px-4 py-2 text-sm font-semibold text-white shadow-lg hover:from-blue-600 hover:via-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    Créer le cours
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
