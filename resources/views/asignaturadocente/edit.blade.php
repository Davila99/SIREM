@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Asignatura Docente</h1>
        <form action="{{ url('asignaturadoc/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('asignaturadocente.form')
        </form>
    </div>

@endsection