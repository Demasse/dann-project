@extends('layouts.app')

@section('content')
    <h1 class=" text-2xl text-center   px-4 py-2 font-bold text-white bg-gradient-to-r from-blue-500 to-green-500 rounded-md hover:opacity-80 transition-opacity duration-300">Liste des cours</h1>
 <br>
 <br>

    @if($cours->count())
        <ul>
            @foreach($cours as $cour)

            @endforeach
        </ul>
    @else
        <p>Aucun cours disponible.</p>
    @endif

{{-- message flash pour le delete --}}

    @if (session('success'))
    <div class="alert alert-success text-white bg-red-500 h-8 ">
        {{ session('success') }}
    </div>
    <br>
@elseif (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@endsection
