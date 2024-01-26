@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">
            <span class="badge badge-primary">
                {{ $organizacionAcademica->descripcion ?? 'N/A' }}
            </span>
        </h1>
        <legend class="text">Crear Asignatura de Docentes</legend>
        <form action="{{ url('/asignaturadocente') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="organizacion_academica_id" name="organizacion_academica_id" value="{{ $organizacionAcademicaId }}">
            @include('asignaturadocente.form')
        </form>
    </div>
@endsection
