@extends('adminlte::page')
 @section('content')
    <div class="container">
        <legend class="text">Registrar Nivel Academico</legend>
        <form action="{{ url('/nivelacademic') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('nivelacademico.form')
        </form>
    </div>
@endsection
