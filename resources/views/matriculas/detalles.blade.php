@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h1 class="display-6 mb-3">
                            <i class="bi bi-person-lines-fill"></i> Informacion de Matricula
                        </h1>
                        <div class="mb-4">
                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Informacion de Estudiante  </h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nombres:</th>
                                                <td>{{ $matriculas->estudiante->nombres }}</td>
                                                <th>Apellidos:</th>
                                                <td>{{ $matriculas->estudiante->apellidos }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Fecha de Nacimiento:</th>
                                                <td>{{ $matriculas->estudiante->fecha_nacimiento }}</td>
                                                <th scope="row">Edad:</th>
                                                <td>{{ $matriculas->estudiante->edad }}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <th scope="row">Direcion:</th>
                                                <td>{{ $matriculas->estudiante->direccion }}</td>
                                                <th>Fecha de registro:</th>
                                                <td>{{ $matriculas->fecha}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Sexo:</th>
                                                <td>{{ $matriculas->estudiante->sexo->descripcion }}</td>
                                                <th>Tipo de Matricula:</th>
                                                <td>{{ $matriculas->tipo_matricula->descripcion}}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Informacion del grupo </h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Grado:</th>
                                                <td>{{ $matriculas->grupo->grado_id}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Fechade registro:</th>
                                                <td>{{ $matriculas->grupo->fecha }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Empleado:</th>
                                                <td>{{ $matriculas->grupo->empleado_id }}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Informacion de Tutor </h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nombres:</th>
                                                <td>{{ $matriculas->estudiante->tutor->nombre }}</td>
                                                <th>Apellidos:</th>
                                                <td>{{ $matriculas->estudiante->tutor->apellido }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Cedula:</th>
                                                <td>{{ $matriculas->estudiante->tutor->cedula }}</td>
                                                <th scope="row">Telefono:</th>
                                                <td>{{ $matriculas->estudiante->tutor->telefono }}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <th scope="row">Profesion:</th>
                                                <td>{{ $matriculas->estudiante->tutor->professions->descripcion}}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <a  type="button" class="btn btn-primary" href="{{ url('empleados/') }}"> Regresar </a>
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
