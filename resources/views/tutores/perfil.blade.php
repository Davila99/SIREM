@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row justify-content-start">
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Información de  Tutor
                    </h1>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $tutores->nombre}} {{$tutores->apellido}}</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Cedula: {{$tutores->cedula }}</li>
                                        <li class="list-group-item">Telefono: {{$tutores->telefono}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Tutor </h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Primer Nombre:</th>
                                                <td>{{ $tutores->nombre}}</td>
                                                <th>Apellidos:</th>
                                                <td>{{$tutores->apellido}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Cargo:</th>
                                                <td>{{$tutores->cedula}}</td>
                                                <th scope="row">Telefono:</th>
                                                <td>{{$tutores->telefono}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
