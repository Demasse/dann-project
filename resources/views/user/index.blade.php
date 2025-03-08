@extends('layouts.admin')

@section('title', 'Tout les utilisateur ')
@section('content')


    <div class="col-span-4">

        <h1 class="text-2xl text-center px-4 py-2 font-bold text-white bg-gradient-to-r from-red-500 to-black rounded-md hover:opacity-80 transition-opacity duration-300">Liste des utilisateurs</h1>
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

                @foreach ($users as $user)
                @if($user->role !== 'admin')

                    <tr>
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>

                        <td class="py-2 px-4">
                            {{-- {{ $user->role }} --}}


                            <form action=" {{ route('user.updaterole', $user->id) }} " method="POST">
                                @csrf
                                @method('PUT')

                                <select name="role" onchange="this.form.submit()" class="bg-gray-200 rounded">
                                    <option value="etudiant" {{ $user->role == 'etudiant' ? 'selected' : '' }}>Étudiant
                                    </option>
                                    <option value="enseignant" {{ $user->role == 'enseignant' ? 'selected' : '' }}>
                                        Enseignant</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur
                                    </option>
                                </select>

                            </form>

                            {{-- @if ($user->role !== 'admin')
                        <form action="{{ route('user.updaterole', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <select name="role" onchange="this.form.submit()" class="bg-gray-200 rounded">
                                <option value="etudiant" {{ $user->role == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                                <option value="enseignant" {{ $user->role == 'enseignant' ? 'selected' : '' }}>Enseignant</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
                            </select>
                        </form>
                        @endif --}}

                            </td>

                            <td class="  ">

                                {{-- <a  class="text-white mx-2 bg-[#2cabd2] px-1 py-1 rounded-md">Update</a>
                        <a  class="text-white mx-2 bg-[#f33caf] px-1 py-1 rounded-md">Delete</a>
                        <a  class="text-white mx-2 bg-[#39c845] px-1 py-1 rounded-md">Voir</a> --}}

                            <a
                                href="{{ route('user.show', $user) }}"class="text-white mx-2 bg-[#39c845] hover:bg-[#32a639] transition duration-300 ease-in-out px-4 py-2 rounded-md shadow-lg transform hover:scale-105">
                                Voir
                            </a>
                            <a href="{{ route('user.edit', $user) }}"
                                class="text-white mx-2 bg-[#2cabd2] hover:bg-[#2298b5] transition duration-300 ease-in-out px-4 py-2 rounded-md shadow-lg transform hover:scale-105">
                                Update </a>

                            <form action="{{ route('user.delete', $user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-white mx-2 bg-[#f33caf] hover:bg-[#d0287d] transition duration-300 ease-in-out px-4 py-2 rounded-md shadow-lg transform hover:scale-105">
                                    Delete
                                </button>
                            </form>

                        </td>

                    </tr>

                    @endif
                @endforeach



            </tbody>

        </table>




    </div>
@endsection
