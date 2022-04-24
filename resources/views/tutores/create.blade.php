@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Tutores</h1>
    <form action="{{ url('/tutores') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('tutores.form')

</form>
</div>
@endsection
