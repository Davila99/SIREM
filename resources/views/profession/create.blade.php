@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Registrar Nueva Profesion </legend>
        <form action="{{ url('/profession') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('profession.form')

        </form>
    </div>
@endsection
