@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Registrar Corte envaluativo</h1>
        <form action="{{ url('/cevaluativos') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('cortes.form')

        </form>
    </div>
@endsection

