@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row justify-content-start">
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-person-lines-fill"></i> Estudiantes Tutores
                    </h1>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <div class="card bg-light">
                                    <div class="px-5 pt-2">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $estudiante->nombres}} {{$$estudiante->nombres}}</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Cedula: {{$$estudiante->nombres }}</li>
                                        <li class="list-group-item">Telefono: {{$$estudiante->nombres}}</li>
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
                                                <td>{{$estudiante->nombres}}</td>
                                                <th>Apellidos:</th>
                                                <td>{{$estudiante->nombres}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Telefono:</th>
                                                <td>{{$estudiante->nombres}}</td>
                                                <th scope="row">Cedula:</th>
                                                <td>{{$estudiante->nombres}}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <th scope="row">Fecha de Nacimiento:</th>
                                                <td>{{$estudiante->nombres}}</td>
                                                <th>Nivel Academico:</th>
                                                <td>{{$estudiante->nombres}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Direccion:</th>
                                                <td>{{$estudiante->nombres}}</td>
                                                <th>Email:</th>
                                                <td>{{$estudiante->nombres}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Fecha de ingreso</th>
                                                <td>{{$estudiante->nombres}}</td>
                                                <th>Cargo:</th>
                                                <td>{{ $estudiante->nombres }}</td>
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
