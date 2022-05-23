@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Registrar Nuevo Cargo</h1>
    <form action="{{ url('/cargos') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('cargo.form')

</form>
</div>
@endsection
