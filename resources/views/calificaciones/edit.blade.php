@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar </h1>
        <form action="{{ url('calificaciones/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('calificaciones.form')
        </form>
    </div>
@endsection