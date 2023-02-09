@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Editar Tutor</legend>
        <form action="{{ url('tutores/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('tutores.form')
        </form>
    </div>

@endsection
