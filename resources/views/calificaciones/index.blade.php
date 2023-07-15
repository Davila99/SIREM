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
                                <div class="p-2 bd-highlight">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal">
                                            Actas Ademicas
                                        </button>
                                    </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="miModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="miModalLabel">Cortes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
        <table class="table">
            <tbody>
                @foreach($cortes as $corte)
                    <tr>
                        <td>{{ $corte->descripcion }}</td>
                        <th><form action="{{ route('generar-acta', ['grupoId' => $curso->id,  'asignaturaId' => $curso->asignatura->id,'corteId' => $corte->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf 
                            <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                            <input type="submit" value="Generar Acta" class="btn btn-warning " data-toggle="modal" data-target="#miModal"/>
                        </form>
                    </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@stop
