@extends('adminlte::page')
@section('title','Sirem')


@section('content')

@livewire('admin.users-index')
@endsection

@section('css')
    <link rel="stylesheet" href="">
@endsection

@section('js')
    <script>console.log('HI veificando prueba de la plataforma')</script>
@endsection