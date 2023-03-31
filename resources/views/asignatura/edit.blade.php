@extends('adminlte::page')
@section('content')
    <div class="container">
      <legend class="text">Editar Asignatura</legend>
        <form action="{{ url('asignaturas/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('asignatura.form')
        </form>
    </div>
@endsection
