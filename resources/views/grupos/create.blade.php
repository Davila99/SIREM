@extends('layouts.app')
@section('content')
<div class="container">
    <legend class="text">Registrar Grupo</legend>
    <form action="{{ url('/grupos') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('grupos.form')

</form>
</div>
@endsection
