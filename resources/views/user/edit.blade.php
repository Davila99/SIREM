@extends('layouts.custom-layout')
@section('content')
    <div class="container">
        <legend class="text">Editar Usuario</legend>
        <form action="{{ url('users/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('user.form')
        </form>
    </div>

@endsection
