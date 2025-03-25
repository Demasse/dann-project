@extends('layouts.admin')

@section('title', 'Programmer un cours')

@section('content')
<div class="col-span-4 min-h-screen bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 p-6 flex items-center justify-center">
    <div class="bg-gray-800 bg-opacity-80 backdrop-blur-md p-8 rounded-xl shadow-2xl w-full max-w-lg border border-cyan-500/50 transform transition-transform duration-300">
        <h1 class="text-4xl font-extrabold text-center mb-8 bg-gradient-to-r from-cyan-400 via-pink-500 to-purple-500 bg-clip-text text-transparent animate-pulse">Programmer un cours</h1>

        <!-- Message de succès (optionnel) -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-500/90 text-white rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('prog.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="subject" class="block text-cyan-300 font-semibold mb-2">Matière</label>
                <select name="cour_id" id="subject_id" class="w-full p-3 bg-gray-700 border border-cyan-500 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-500 transition-all duration-200" required>
                    @foreach ($cours as $cour)
                        <option value="{{ $cour->id }}" class="bg-gray-800">{{ $cour->nom }}</option>
                    @endforeach
                </select>
                @error('cour_id')
                    <div class="text-pink-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="day" class="block text-cyan-300 font-semibold mb-2">Jour</label>
                <select name="jour" id="day" class="w-full p-3 bg-gray-700 border border-cyan-500 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-500 transition-all duration-200" required>
                    <option value="" class="bg-gray-800">Sélectionnez un jour</option>
                    <option value="Lundi" class="bg-gray-800">Lundi</option>
                    <option value="Mardi" class="bg-gray-800">Mardi</option>
                    <option value="Mercredi" class="bg-gray-800">Mercredi</option>
                    <option value="Jeudi" class="bg-gray-800">Jeudi</option>
                    <option value="Vendredi" class="bg-gray-800">Vendredi</option>
                    <option value="Samedi" class="bg-gray-800">Samedi</option> <!-- Ajout de Samedi -->
                </select>
                @error('jour')
                    <div class="text-pink-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="creneau" class="block text-cyan-300 font-semibold mb-2">Créneau</label>
                <select name="creneau" id="creneau" class="w-full p-3 bg-gray-700 border border-cyan-500 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-500 transition-all duration-200" required>
                    <option value="" class="bg-gray-800">Sélectionnez un créneau</option>
                    <option value="Matin" class="bg-gray-800">Matin (8h-12h)</option>
                    <option value="Après-midi" class="bg-gray-800">Après-midi (13h-17h)</option>
                </select>
                @error('creneau')
                    <div class="text-pink-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="teacher_name" class="block text-cyan-300 font-semibold mb-2">Nom de l'enseignant</label>
                <input type="text" name="nom" id="teacher_name" class="w-full p-3 bg-gray-700 border border-cyan-500 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-500 transition-all duration-200" required placeholder="Entrez le nom">
                @error('nom')
                    <div class="text-pink-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 to-purple-500 text-white font-bold py-3 px-6 rounded-lg hover:from-cyan-600 hover:to-purple-600 transition-all duration-300 transform hover:scale-105 hover:shadow-lg shadow-cyan-500/50">
                    Créer le cours
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
