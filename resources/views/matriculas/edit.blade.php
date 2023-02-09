@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Editar Matricula</legend>
        <form action="{{ url('matriculas/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('matriculas.form')
        </form>
    </div>
@endsection
