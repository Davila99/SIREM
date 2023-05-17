@extends('adminlte::page')
 @section('content')
    <div class="container">
        <legend class="text">Registrar Nuevo turno</legend>
        <form action="{{ url('/turnos') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('turno.form')

        </form>
    </div>
@endsection
