@extends('adminlte::page')
@section('content')
    <div class="table-responsive">
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>x
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td>{{ $curso->asignatura->descripcion }}</td>
                        <td>{{ $curso->grupo->grado->descripcion}}</td>
                        <td>
                            <div class="d-flex flex-row bd-highlight mb-6">
                                <a href="{{ url('/calificacionesDetalles/' . $curso->id) }}" class="btn btn-success">
                                    Estudiantes </a>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
