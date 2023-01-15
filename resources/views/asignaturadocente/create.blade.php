@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Asignatura de Docentes</h1>
    <form action="{{ url('/asignaturadoc') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('asignaturadocente.form')

</form>
</div>
@endsection
