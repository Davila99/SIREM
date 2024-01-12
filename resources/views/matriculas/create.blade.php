@extends('layouts.app')

@section('content')
    @extends('adminlte::page')

    <div class="container">
        <legend class="text">Registrar Matricula</legend>
        <form action="{{ url('/matriculas') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('matriculas.form')
        </form>
    </div>
    

@endsection
