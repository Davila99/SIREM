@extends('layouts.app')
@section('content')
<div class="container">
    <legend class="text">Registrar Nueva Asignatura</legend>
    <form action="{{ url('/asignaturas') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('asignatura.form')

</form>
</div>
@endsection
