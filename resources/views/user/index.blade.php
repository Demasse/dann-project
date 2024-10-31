
@extends('layouts.admin')

@section('title','Creer un cours')
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

            @foreach ($users as $user )
        <tr>
            <td class="py-2 px-4">{{ $user->name }}</td>
            <td class="py-2 px-4">{{ $user->email }}</td>

            <td class="py-2 px-4">
                {{-- {{ $user->role }} --}}
                <form action=" {{ route('user.updaterole', $user->id)}} " method="POST">
          @csrf
          @method('PUT')

                    <select name="role" onchange="this.form.submit()" class="bg-gray-200 rounded">
                        <option value="etudiant" {{ $user->role == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                        <option value="enseignant" {{ $user->role == 'enseignant' ? 'selected' : '' }}>Enseignant</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                    </select>

                </form>

            </td>

            <td class="  ">

                {{-- <a  class="text-white mx-2 bg-[#2cabd2] px-1 py-1 rounded-md">Update</a>
                <a  class="text-white mx-2 bg-[#f33caf] px-1 py-1 rounded-md">Delete</a>
                <a  class="text-white mx-2 bg-[#39c845] px-1 py-1 rounded-md">Voir</a> --}}

                <a href="{{ route('user.show', $user) }}" class="text-whi:te mx-2 bg-[#39c845] px-1 py-1 rounded-md">Voir</a>
                <a href="{{ route('user.edit', $user) }}" class="text-white mx-2 bg-[#2cabd2] px-1 py-1 rounded-md">Update</a>
                <a href="{{ route('user.delete', $user) }}" class="text-white mx-2 bg-[#f33caf] px-1 py-1 rounded-md">Delete</a>

            </td>

        </tr>

            @endforeach



        </tbody>

    </table>




</div>
@endsection
