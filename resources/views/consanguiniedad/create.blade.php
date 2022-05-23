@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Registrar Nueva Consanguiniedad</h1>
    <form action="{{ url('/consanguiniedades') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('consanguiniedad.form')

</form>
</div>
@endsection