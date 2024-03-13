@extends('adminlte::page')
 @section('content')
    <div class="container">
        <legend class="text">Editar Sección</legend>
        <form action="{{ url('seccion/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('seccion.form')
        </form>
    </div>
@endsection
