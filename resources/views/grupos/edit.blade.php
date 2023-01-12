@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Grupo Docente</h1>
        <form action="{{ url('grupos/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('grupos.form')
        </form>
    </div>

@endsection