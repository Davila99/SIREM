@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Registrar Nuevo Estudiante</legend>
        <form action="{{ url('/estudiantes') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('estudiante.form')

        </form>
    </div>
@endsection
