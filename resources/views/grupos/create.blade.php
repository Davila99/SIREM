@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Asignatura de Docentes</h1>
    <form action="{{ url('/grupose') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('grupos.form')

</form>
</div>
@endsection
