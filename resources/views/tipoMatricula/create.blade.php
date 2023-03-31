@extends('adminlte::page')
 @section('content')
    <div class="container">
        <legend class="text">Registrar Nuevo Tipo de Matricula</legend>
        <form action="{{ url('/tmatricula') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('tipoMatricula.form')

        </form>
    </div>
@endsection
