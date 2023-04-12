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
                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Informacion de Estudiante  </h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nombres:</th>
                                                <td>{{ $estudianteTutor->estudiante->nombres }}</td>
                                                <th>Apellidos:</th>
                                                <td>{{ $estudianteTutor->estudiante->apellidos }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Fecha de Nacimiento:</th>
                                                <td>{{ $estudianteTutor->estudiante->fecha_nacimiento }}</td>
                                                <th scope="row">Edad:</th>
                                                <td>{{ $estudianteTutor->estudiante->edad }}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <th scope="row">Direcion:</th>
                                                <td>{{ $estudianteTutor->estudiante->direccion }}</td>
                                                <th>Tutor:</th>
                                                <td>{{ $estudianteTutor->estudiante->tutor->nombre }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Sexo:</th>
                                                <td>{{ $estudianteTutor->estudiante->sexo->descripcion }}</td>
                                        
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
                                                <td>{{ $estudianteTutor->tutores->nombre }}</td>
                                                <th>Apellidos:</th>
                                                <td>{{ $estudianteTutor->tutores->apellido }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Cedula:</th>
                                                <td>{{ $estudianteTutor->tutores->cedula }}</td>
                                                <th scope="row">Telefono:</th>
                                                <td>{{ $estudianteTutor->tutores->nombre }}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <th scope="row">Profesion:</th>
                                                <td>{{ $estudianteTutor->tutores->professions->descripcion }}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <a type="button" class="btn btn-primary" href="{{ url('empleados/') }}"> Regresar </a>
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
