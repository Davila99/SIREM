@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach ($asignaturadocentes as $asignaturadocente)
            <tr>
                <td>{{ $asignaturadocente->asignatura->descripcion }}</td>
            </tr>
    </div>
@endsection
