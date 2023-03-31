@extends('adminlte::page')
 @section('content')
    <div class="container">
        <legend class="text">Editar Profesion</legend>
        <form action="{{ url('profession/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('profession.form')
        </form>
    </div>
@endsection
