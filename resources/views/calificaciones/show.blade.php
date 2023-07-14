@extends('adminlte::page')
@section('content')

    <head>
        <title>Mostrar Acta</title>
    </head>

    <body>
        <div class="table-responsive">
            <table class="table table-dark">

                <thead>
                    <tr>
                        <th scope="col" colspan="4" class="text-center">
                            <h1 class="font-weight-bold font-italic">Cabecera de Acta</h1>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th>Fecha de generacion</th>
                        <td>{{ $acta->fecha }}</td>
                        <th scope="row">Empleado</th>
                        <td>{{ $acta->empleado->nombres }} {{ $acta->empleado->apellidos }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Asignatura</th>
                        <td>{{ $acta->asignatura->descripcion }}</td>
                        <th scope="row">Observaciones</th>
                        <td>{{ $acta->observaciones }}</td>

                    </tr>

                </tbody>
            </table>

        </div>
        <div class="table-responsive">
            <table class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th>Estudiante</th>
                        <th>Calificacion</th>
                        <th>Acciones</th>

                    </tr>
                </thead>

                <tbody>

                    @foreach ($filas as $fila)
                        <tr>
                            <td>{{ $fila->estudiante->nombres }} {{ $fila->estudiante->apellidos }}</td>
                            <td>{{ $fila->calificacion }}</td>

                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#miModal">
                                    Editar Nota
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="miModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="miModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="miModalLabel">Notas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <tbody>
                            <tr>
                                <th scope="row">Nota</th>
                                <td>
                                    <input id="calificacion" name="calificacion" type="text"
                                    class="form-control @error('calificacion') is-invalid @enderror" placeholder="Nota" 
                                    value="{{ isset($datos->calificacion) ? $datos->calificacion : old('calificacion') }}">
                                @error('calificacion')
                                    <div class="invalid-feedback">
                                        <h5> {{ $message }}</h5>
                                    </div>
                                @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success guardar-btn">Guardar</button>
                                </td>
                            </tr>
                        </tbody>
                        
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection
