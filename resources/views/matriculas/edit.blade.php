@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Nivel Academico</h1>
        <form action="{{ url('matriculas/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('matriculas.form')
        </form>
    </div>
@endsection
