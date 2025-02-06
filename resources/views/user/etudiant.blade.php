@extends('layouts.admin')

@section('title', 'Listes des etudiants')
@section('content')
    <div class="col-span-4">

        <h1
            class=" text-2xl text-center   px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-md hover:opacity-80 transition-opacity duration-300">
            Listes des etudiants</h1>
        <br>
        <br>

        <ul></ul>

        <table class="min-w-full bg-white rounded-lg shadow-lg">
            <thead>
                <tr class="bg-blue-600 text-white ">
                    <th class="py-2 px-4 text-left">Nom</th>
                    <th class="py-2 px-4 text-left">Email</th>
                    <th class="py-2 px-4 text-left">Role</th>
                    <th class="py-2 px-4 text-left">Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($etudiantcounts as $etudiantcount)
                    <tr class=" ">
                        <td class="py-2 px-4 ">{{ $etudiantcount->name }}</td>
                        <td class="py-2 px-4">{{ $etudiantcount->email }}</td>
                        <td class="py-2 px-4">{{ $etudiantcount->role }}</td>

                        <td class="  ">

                            {{-- <a  class="text-white mx-2 bg-[#2cabd2] px-1 py-1 rounded-md">Update</a>
                <a  class="text-white mx-2 bg-[#f33caf] px-1 py-1 rounded-md">Delete</a>
                <a  class="text-white mx-2 bg-[#39c845] px-1 py-1 rounded-md">Voir</a> --}}

                            @if (Auth::user()->role === 'admin')
                                <a href="{{ route('user.show', $etudiantcount) }}" class="text-white mx-2 bg-[#39c845] hover:bg-[#32a639] transition duration-300 ease-in-out px-4 py-2 rounded-md shadow-lg transform hover:scale-105">
                                    Voir
                                </a>
                                <a href="{{ route('user.edit', $etudiantcount) }}" class="text-white mx-2 bg-[#2cabd2] hover:bg-[#2298b5] transition duration-300 ease-in-out px-4 py-2 rounded-md shadow-lg transform hover:scale-105">
                                    Update
                                </a>
                                <a href="{{ route('user.delete', $etudiantcount) }}" class="text-white mx-2 bg-[#f33caf] hover:bg-[#d0287d] transition duration-300 ease-in-out px-4 py-2 rounded-md shadow-lg transform hover:scale-105">
                                    Delete
                                </a>
                            @else
                                <a href="{{ route('user.show', $etudiantcount) }}" class="text-white mx-2 bg-[#39c845] hover:bg-[#32a639] transition duration-300 ease-in-out px-4 py-2 rounded-md shadow-lg transform hover:scale-105">
                                    Voir
                                </a>
                            @endif

                        </td>

                    </tr>
                @endforeach



            </tbody>

        </table>




    </div>
@endsection
