@extends('adminlte::page')
@section('content')
    <div class="container">
        <legend class="text">Registrar Nueva Organización Académica </legend>
        <form action="{{ url('/organizacionacademica') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('organizacionacademica.form')

        </form>
    </div>
@endsection
