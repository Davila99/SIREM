@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Editar Asignatura Docente</legend>
        <form action="{{ url('asignaturadocente/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('asignaturadocente.form')
        </form>
    </div>

@endsection