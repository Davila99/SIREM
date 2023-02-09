@extends('layouts.app')
@section('content')
<div class="container">
    <legend class="text">Registrar Nuevo Tutor</legend>
    <form action="{{ url('/tutores') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('tutores.form')

</form>
</div>
@endsection
