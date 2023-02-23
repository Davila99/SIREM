<h1>Hola desde </h1>

@section('title', 'Dashboard')
@extends('layouts.app')

@section('plugins.Sweetalert2', true)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buscar') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-xl-12">
                        <form action="{{route(estudiantes.index)}}" method="get">
                            <div class="form-row">
                                <div class="col-sm-4 my-2" >
                                   
                                    <input type="text" class="form-control" name="texto" value="{{$texto}}">    
                                   
                                </div>
                                <div class="col-sm-4 my-2">
                                    <input type="submit" class="btn btn-success" value="buscar">
                                </div>
                            </div>
                        </form>
                    </div>

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop 

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> 
Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success') 
    </script>
@stop