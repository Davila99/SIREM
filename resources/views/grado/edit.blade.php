@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Editar Grado</legend>
        <form action="{{ url('grados/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('grado.form')
        </form>
    </div>
@endsection
