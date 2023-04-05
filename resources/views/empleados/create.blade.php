@extends('adminlte::page')
@section('content')
<div class="container">
    <legend class="text">Registrar Empleado</legend>
    <form action="{{ url('/empleados') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('empleados.form')

</form>
</div>
@endsection
