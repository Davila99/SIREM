@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Empleados</h1>
        <form action="{{ url('empleados/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('empleados.form')
        </form>
    </div>
@endsection
