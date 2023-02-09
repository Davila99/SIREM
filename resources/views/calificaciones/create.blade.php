@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear </h1>
    <form action="{{ url('/calificaciones') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('calificaciones.form')
    
</form>
</div>
@endsection
