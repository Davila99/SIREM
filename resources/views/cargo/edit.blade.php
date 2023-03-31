@extends('adminlte::page')

@section('content')
    <div class="container">
        <legend class="text">Editar Cargo</legend>
        <form action="{{ url('cargos/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('cargo.form')
        </form>
    </div>
@endsection
