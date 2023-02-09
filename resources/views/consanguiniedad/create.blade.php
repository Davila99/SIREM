@extends('layouts.app')
@section('content')
<div class="container">
    <legend class="text">Registrar Nueva Consanguiniedad</legend>
    <form action="{{ url('/consanguiniedades') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('consanguiniedad.form')

</form>
</div>
@endsection