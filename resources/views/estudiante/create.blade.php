@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Registrar Estudiantes</h1>
            <form action="{{ url('/estudiantes') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('estudiante.form')

            </form>
    </div>
@endsection
