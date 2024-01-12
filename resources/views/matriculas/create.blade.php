@extends('adminlte::page')

@section('content')
    @include('layouts.app') {{-- Incluir el contenido del segundo layout --}}

    <div class="container">
        <legend class="text">Registrar Matricula</legend>
        <form action="{{ url('/matriculas') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('matriculas.form')
        </form>
    </div>
@endsection
