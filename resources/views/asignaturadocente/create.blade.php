@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Crear Asignatura de Docentes</legend>
        <form action="{{ url('/asignaturadocente') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('asignaturadocente.form')

        </form>
    </div>
@endsection
