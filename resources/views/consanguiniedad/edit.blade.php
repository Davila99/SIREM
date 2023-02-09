@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Editar Consanguiniedad</legend>
        <form action="{{ url('consanguiniedades/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('consanguiniedad.form')
        </form>
    </div>
@endsection