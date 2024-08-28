@extends('layouts.admin')

@section('content')
    <form action="{{ route('module.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="module_id">Module</label>
            <input type="text" name="nom"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="module_id" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="competence_id">Compétence associée:</label>
            <input type="text" name="competence"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="competence_id" required>
        </div>


        <div>
            <select name="cour_id" id="">
                @foreach ($cours as $cour)
                    <option value="{{ $cour->id }}">{{ $cour->nom }}</option>
                @endforeach
            </select>
        </div>
        <br>

        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Créer
            </button>
        </div>


    </form>
@endsection
