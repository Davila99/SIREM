@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row justify-content-start">
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Información de  Empleado
                    </h1>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <div class="card bg-light">
                                    <div class="px-5 pt-2">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $empleado->nombres}} {{$empleado->apellidos}}</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Cedula: {{$empleado->cedula }}</li>
                                        <li class="list-group-item">Telefono: {{$empleado->telefono}}</li>
                                    </ul>
                                    
                                </div>
                                <a  type="button" class="btn btn-primary"  href="{{ url('empleados/') }}"> Regresar </a>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Tutor </h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nombres:</th>
                                                <td>{{$empleado->nombres}}</td>
                                                <th>Apellidos:</th>
                                                <td>{{$empleado->apellidos}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Telefono:</th>
                                                <td>{{$empleado->telefono}}</td>
                                                <th scope="row">Cedula:</th>
                                                <td>{{$empleado->cedula}}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <th scope="row">Fecha de Nacimiento:</th>
                                                <td>{{$empleado->fecha_nacimiento}}</td>
                                                <th>Nivel Academico:</th>
                                                <td>{{$empleado->nivel_academico_id}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Direccion:</th>
                                                <td>{{$empleado->direccion}}</td>
                                                <th>Email:</th>
                                                <td>{{$empleado->email}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Fecha de ingreso</th>
                                                <td>{{$empleado->fecha_ingreso}}</td>
                                                <th>Cargo:</th>
                                                <td>{{$empleado->cargos_id}}</td>
                                            </tr>
                                            <tr>
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
