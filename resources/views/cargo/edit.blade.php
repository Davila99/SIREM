@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Cargo</h1>
        <form action="{{ url('cargos/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('cargo.form')
        </form>
    </div>
@endsection
