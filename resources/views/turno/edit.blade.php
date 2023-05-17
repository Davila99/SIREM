@extends('adminlte::page')
 @section('content')
    <div class="container">
        <legend class="text">Editar turno</legend>
        <form action="{{ url('turnos/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('turno.form')
        </form>
    </div>
@endsection
