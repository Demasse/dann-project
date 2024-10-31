
@extends('layouts.admin')

@section('title','liste des professeur')
@section('content')
<div class="col-span-4">

    <h1 class=" text-2xl text-center   px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-md hover:opacity-80 transition-opacity duration-300">Listes des utilisateurs</h1>
<br>
<br>

   <ul></ul>

    <table class="min-w-full bg-white rounded-lg shadow-lg">
        <thead>
            <tr class="bg-blue-600 text-white">
                <th class="py-2 px-4 text-left">Nom</th>
                <th class="py-2 px-4 text-left">Email</th>
                <th class="py-2 px-4 text-left">Role</th>
                <th class="py-2 px-4 text-left">Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($etudiantcounts as $etudiantcount )
        <tr>
            <td class="py-2 px-4">{{ $etudiantcount->name }}</td>
            <td class="py-2 px-4">{{ $etudiantcount->email }}</td>
            <td class="py-2 px-4">{{ $etudiantcount->role }}</td>

            <td class="  ">

                {{-- <a  class="text-white mx-2 bg-[#2cabd2] px-1 py-1 rounded-md">Update</a>
                <a  class="text-white mx-2 bg-[#f33caf] px-1 py-1 rounded-md">Delete</a>
                <a  class="text-white mx-2 bg-[#39c845] px-1 py-1 rounded-md">Voir</a> --}}

                <a href="{{ route('user.show', $etudiantcount) }}" class="text-whi:te mx-2 bg-[#39c845] px-1 py-1 rounded-md">Voir</a>
                <a href="{{ route('user.edit', $etudiantcount) }}" class="text-white mx-2 bg-[#2cabd2] px-1 py-1 rounded-md">Update</a>
                <a href="{{ route('user.delete', $etudiantcount) }}" class="text-white mx-2 bg-[#f33caf] px-1 py-1 rounded-md">Delete</a>

            </td>

        </tr>

            @endforeach



        </tbody>

    </table>




</div>
@endsection
