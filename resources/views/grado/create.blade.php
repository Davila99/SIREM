@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Registrar Nuevo Grado</legend>
        <form action="{{ url('/grados') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('grado.form')

        </form>
    </div>
@endsection
