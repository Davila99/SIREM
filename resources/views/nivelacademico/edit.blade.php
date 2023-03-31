@extends('adminlte::page')
 @section('content')
    <div class="container">
        <legend class="text">Editar Nivel Academico</legend>
        <form action="{{ url('nivelacademic/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('nivelacademico.form')
        </form>
    </div>
@endsection
