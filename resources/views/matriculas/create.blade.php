@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Registrar Matricula</h1>
        <form action="{{ url('/matriculas') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('matriculas.form')

        </form>
       
    </div>
@endsection


