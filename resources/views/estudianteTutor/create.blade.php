@extends('adminlte::page')
@section('content')
    <div class="container">
        <legend class="text">Registrar Estudiante Tutor</legend>
        <form action="{{ url('/tutorestudiante') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('estudianteTutor.form')

        </form>
    </div>
@endsection
