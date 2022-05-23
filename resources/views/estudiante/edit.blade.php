@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Estudiante</h1>
        <form action="{{ url('estudiantes/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('estudiante.form')
        </form>
    </div>

@endsection