@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Asignatura</h1>
        <form action="{{ url('asignaturas/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('asignatura.form')
        </form>
    </div>
@endsection
