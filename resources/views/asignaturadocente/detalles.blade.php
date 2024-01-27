@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h1 class="display-6 mb-3">
                            <i class="bi bi-person-lines-fill"></i> Informacion de asignacion docente
                        </h1>
                        <div class="mb-4">
                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Informacion de empleado </h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nombres:</th>
                                                <td>{{ $asignaturaDocente->empleado->nombres ?? 'N/A'  }}</td>
                                                <th>Apellidos:</th>
                                                <td>{{ $asignaturaDocente->empleado->apellidos ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Telefono:</th>
                                                <td>{{ $asignaturaDocente->empleado->telefono ?? 'N/A' }}</td>
                                                <th scope="row">Cedula:</th>
                                                <td>{{ $asignaturaDocente->empleado->cedula ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <th scope="row">Fecha de Nacimiento:</th>
                                                <td>{{ $asignaturaDocente->empleado->fecha_nacimiento ?? 'N/A' }}</td>
                                                <th>Nivel Academico:</th>
                                                <td>{{ $asignaturaDocente->empleado->nivel_academico->descripcion ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Direccion:</th>
                                                <td>{{ $asignaturaDocente->empleado->direccion ?? 'N/A' }}</td>
                                                <th>Email:</th>
                                                <td>{{ $asignaturaDocente->empleado->email ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Fecha de ingreso</th>
                                                <td>{{ $asignaturaDocente->empleado->fecha_ingreso ?? 'N/A' }}</td>
                                                <th>Cargo:</th>
                                                <td>{{ $asignaturaDocente->empleado->cargos->descripcion ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Informacion </h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Seccion:</th>
                                                <td>{{ $asignaturaDocente->seccion->descripcion ?? 'N/A'}}</td>
                                                <th>Turno:</th>
                                                <td>{{ $asignaturaDocente->turno->descripcion ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Asignatura:</th>
                                                <td>{{ $asignaturaDocente->asignatura->descripcion ?? 'N/A' }}</td>
                                                <th scope="row">Empleado:</th>
                                                <td>{{ $asignaturaDocente->empleado->descripcion  ?? 'N/A'}}</td>
                                                <th scope="row">Grado:</th>
                                                <td>{{ $asignaturaDocente->grado->descripcion ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Empleado:</th>
                                                <td>{{ $asignaturaDocente->empleado->descripcion  ?? 'N/A'}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Informacion de organizacion </h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Organizacion:</th>
                                                <td>{{ $asignaturaDocente->organizacionAcademica->descripcion ?? 'N/A'}}</td>
                                                <th>Fecha:</th>
                                                <td>{{ $asignaturaDocente->organizacionAcademica->fecha ?? 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Estado:</th>
                                                <td>
                                                    <div class="status-bar">
                                                        <div class="status-bar">
                                                            @if ($asignaturaDocente->organizacionAcademica->confirmed == true)
                                                                <i class="far fa-thumbs-up"></i>
                                                            @else
                                                                <i class="far fa-thumbs-down"></i>
                                                            @endif
                                                        </div>

                                                    </div>

                                                </td>
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
