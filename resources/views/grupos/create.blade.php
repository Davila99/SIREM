@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Registrar Grupo</h1>
    <form action="{{ url('/grupos') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('grupos.form')

</form>
</div>
@endsection
