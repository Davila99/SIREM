@extends('adminlte::page')
@section('content')
    <div class="container">
        <legend class="text">Editar Organizacion Academica</legend>
        <form action="{{ url('organizacionacademica/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('organizacionacademica.form')
        </form>
    </div>
@endsection
