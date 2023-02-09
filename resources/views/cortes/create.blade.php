@extends('layouts.app')
@section('content')
    <div class="container">
        <h1></h1>
        <legend class="text">Registrar Corte envaluativo</legend>
        <form action="{{ url('/cevaluativos') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('cortes.form')

        </form>
    </div>
@endsection

