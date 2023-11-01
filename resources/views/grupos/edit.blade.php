@extends('layouts.custom-layout')
@section('content')
    <div class="container">
        <legend class="text">Editar Grupo Docente</legend>
        <form action="{{ url('grupos/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('grupos.form')
        </form>
    </div>

@endsection