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
                                    <h6>Informacion de Estudiante </h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nombres:</th>
                                                <td>{{ $matriculas->estudiante->nombres ?? 'N/A' }}</td>
                                                <th>Apellidos:</th>
                                                <td>{{ $matriculas->estudiante->apellidos ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Fecha de Nacimiento:</th>
                                                <td>{{ $matriculas->estudiante->fecha_nacimiento ?? 'N/A' }}</td>
                                                <th scope="row">Edad:</th>
                                                <td>{{ $matriculas->estudiante->edad ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <th scope="row">Direcion:</th>
                                                <td>{{ $matriculas->estudiante->direccion ?? 'N/A' }}</td>
                                                <th>Fecha de registro:</th>
                                                <td>{{ $matriculas->fecha ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Sexo:</th>
                                                <td>{{ $matriculas->estudiante->sexo->descripcion ?? 'N/A' }}</td>
                                                <th>Tipo de Matricula:</th>
                                                <td>{{ $matriculas->tipo_matricula->descripcion ?? 'N/A' }}</td>
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
                                                <td>{{ $matriculas->grado->descripcion ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Fechade registro:</th>
                                                <td>{{ $matriculas->fecha ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Docente Guia:</th>
                                                <td>{{ $matriculas->empleado->nombres ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Seccion:</th>
                                                <td>{{ $matriculas->seccion->descripcion ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Turno:</th>
                                                <td>{{ $matriculas->turno->descripcion ?? 'N/A' }}</td>
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
                                                <td>{{ $matriculas->estudiante->tutor->nombre ?? 'N/A' }}</td>
                                                <th>Apellidos:</th>
                                                <td>{{ $matriculas->estudiante->tutor->apellido ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Cedula:</th>
                                                <td>{{ $matriculas->estudiante->tutor->cedula ?? 'N/A' }}</td>
                                                <th scope="row">Telefono:</th>
                                                <td>{{ $matriculas->estudiante->tutor->telefono ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <th scope="row">Profesion:</th>
                                                <td>{{ $matriculas->estudiante->tutor->professions->descripcion ?? 'N/A' }}
                                                </td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h6>Documentos entregados</h6>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="partida_nacimiento" value="1"
                                                            name="partida_nacimiento">
                                                        <label class="form-check-label" for="partida_nacimiento">
                                                            Partida de Nacimiento
                                                        </label>
                                                    </div>
                                                </td>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="tarjeta_vacuna"
                                                            value="1" name="tarjeta_vacuna"
                                                            {{ isset($datos->tarjeta_vacuna) && $datos->tarjeta_vacuna ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="tarjeta_vacuna">
                                                            Tarjeta de Vacuna
                                                        </label>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="diploma_prescolar" value="1" name="diploma_prescolar"
                                                            {{ isset($datos->diploma_prescolar) && $datos->diploma_prescolar ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="diploma_prescolar">
                                                            Diploma de Preescolar
                                                        </label>
                                                    </div>
                                                </th>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="cedula_padres"
                                                            value="1" name="cedula_padres"
                                                            {{ isset($datos->cedula_padres) && $datos->cedula_padres ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="cedula_padres">
                                                            Cédula de los Padres
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="hoja_traslado"
                                                            value="1" name="hoja_traslado"
                                                            {{ isset($datos->hoja_traslado) && $datos->hoja_traslado ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="hoja_traslado">
                                                            Hoja de Traslado
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="diploma_secundaria" value="1" name="diploma_secundaria"
                                                            {{ isset($datos->diploma_secundaria) && $datos->diploma_secundaria ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="diploma_secundaria">
                                                            Diploma de Secundaria
                                                        </label>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="d-grid mt-2 col-sm-4">
                                        <a type="button" class="btn btn-primary btn-sm"
                                            href="{{ url('matriculas/') }}">Regresar</a>
                                    </div>
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
