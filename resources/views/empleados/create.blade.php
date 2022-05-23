@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Registrar Empleado</h1>
    <form action="{{ url('/empleados') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('empleados.form')

</form>
</div>
@endsection
