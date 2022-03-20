@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Cargos</h1>
    <form action="{{ url('/grados') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('grado.form')

</form>
</div>
@endsection
