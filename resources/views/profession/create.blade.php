@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Cargos</h1>
    <form action="{{ url('/professions') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('profession.form')

</form>
</div>
@endsection
