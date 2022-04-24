@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Tutores</h1>
        <form action="{{ url('tutores/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('tutores.form')
        </form>
    </div>

@endsection
