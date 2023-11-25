@section('title', 'Dashboard')
@extends('admin.custom-layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('mensaje-error-ruta'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lo sentimos',
                text: ' Por problemas técnicos, no se puede mostrar la página en este momento.',
            })
        </script>
    @endif
    <script>
        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success')
    </script>
@stop
