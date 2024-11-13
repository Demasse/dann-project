@extends('layouts.admin')

@section('content')
<div class="col-span-4">
    <h1 class="text-2xl text-center">Programmes de cours</h1>

    <table class="min-w-full bg-white rounded-lg shadow-lg">
        <thead>
            <tr>
                <th>Matière</th>
                <th>Jour</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>enseignant</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($progs as $prog)
            <tr>
                <td>{{ $prog->course->subject }}</td>
                <td>{{ $prog->day }}</td>
                <td>{{ $prog->start_time }}</td>
                <td>{{ $prog->end_time }}</td>
                <td>{{ $prog->nom }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
