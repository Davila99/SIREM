@extends('layouts.app')
@section('content')
<div class="container">
    <legend class="text">Registrar Nuevo Cargo</legend>
    <form action="{{ url('/cargos') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('cargo.form')

</form>
</div>
@endsection
