@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Consanguiniedad</h1>
        <form action="{{ url('consanguiniedades/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('consanguiniedad.form')
        </form>
    </div>
@endsection