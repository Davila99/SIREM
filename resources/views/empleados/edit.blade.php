@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Editar Empleados</legend>
        <form action="{{ url('empleados/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('empleados.form')
        </form>
    </div>
@endsection
