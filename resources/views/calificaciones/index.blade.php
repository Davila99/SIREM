@extends('adminlte::page')
@section('content')

    @csrf
    <div class="table-responsive">
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td>{{ $curso->asignatura->descripcion }}</td>
                        <td>{{ $curso->grupo->grado->descripcion }}</td>
                        <td>
                            <div class="d-flex flex-row bd-highlight mb-6">
                                {{-- <a href="{{ url('/calificacionesDetalles/' . $curso->id) }}" class="btn btn-success">
                                    Estudiantes </a> <div class="d-grid mt-1 col-sm-1"> --}}

                                        <form action="{{ route('generar-acta', ['grupoId' => $curso->id,  'asignaturaId' => $curso->asignatura->id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                                            <input type="submit" value="Generar Acta" class="btn btn-warning"/>
                                        </form>
                                    </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop
