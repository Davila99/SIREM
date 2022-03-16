@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Asignaturas</h1>
    <form action="{{ url('/asignaturas') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('asignatura.form')

</form>
</div>
@endsection
