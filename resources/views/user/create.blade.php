@extends('adminlte::page')

@section('content')
    <div class="container">
        <legend class="text">Registrar Nuevo Usuario</legend>
        <form action="{{ url('/users') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('user.form')

        </form>
    </div>
@endsection
