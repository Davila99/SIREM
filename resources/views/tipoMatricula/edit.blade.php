@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Editar Matricula</legend>
        <form action="{{ url('tmatricula/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('tipoMatricula.form')
        </form>
    </div>
@endsection
