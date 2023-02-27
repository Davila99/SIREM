@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Registrar Nueva Organizacion Academica </legend>
        <form action="{{ url('/organizacionacademica') }}" method="post" enctype="multipart/form-data">
            @csrf
            organizacionacademica
            @include('organizacionacademica.form')

        </form>
    </div>
@endsection
