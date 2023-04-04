@extends('adminlte::page')
@section('content')
    <div class="container">
        <legend class="text">Editar Estudiante Tutor</legend>
        <form action="{{ url('tutorestudiante/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('estudiantetutor.form')
        </form>
    </div>

@endsection