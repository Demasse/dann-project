<!-- resources/views/utilisateurs/edit.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Modifier l'utilisateur</h1>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="role">Rôle</label>
            <input type="text" name="role" class="form-control" value="{{ $user->role }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
