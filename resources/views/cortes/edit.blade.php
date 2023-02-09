@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Editar Cargos</legend>
        <form action="{{ url('cevaluativos/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('cortes.form')
        </form>
    </div>
@endsection
