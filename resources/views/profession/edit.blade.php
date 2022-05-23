@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Profesion</h1>
        <form action="{{ url('profession/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('profession.form')
        </form>
    </div>
@endsection
