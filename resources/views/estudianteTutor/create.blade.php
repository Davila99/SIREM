@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear </h1>
    <form action="{{ url('/tutorestudiante') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('estudianteTutor.form')

</form>
</div>
@endsection