@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Asignaturas</h1>
    <form action="{{ url('/consanguiniedades') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('consanguiniedad.form')

</form>
</div>
@endsection