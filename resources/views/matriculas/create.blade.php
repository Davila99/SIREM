@extends('layouts.app')
@section('content')
    <div class="container">
        <legend class="text">Registrar Matricula</legend>
        <form action="{{ url('/matriculas') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('matriculas.form')

        </form>
       
    </div>
@endsection


