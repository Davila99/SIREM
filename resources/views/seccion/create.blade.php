@extends('adminlte::page')
 @section('content')
    <div class="container">
        <legend class="text">Registrar Nueva Sección </legend>
        <form action="{{ url('/seccion') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('seccion.form')

        </form>
    </div>
@endsection
