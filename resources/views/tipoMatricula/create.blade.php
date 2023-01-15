@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Registrar Nuevo Tipo de Matricula</h1>
        <form action="{{ url('/tmatricula') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('tipoMatricula.form')

        </form>
    </div>
@endsection
