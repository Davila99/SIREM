@extends('adminlte::page')
@section('content')
    <div class="table-responsive">
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
        
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        {{-- <td>{{ $curso->asignatura }}</td> --}}
                        <td>{{ $curso->matricula }}</td>
                        <td>
                            <div class="d-flex flex-row bd-highlight mb-6">
                            
                                <a href="{{ url('/calificacionesDetalles/' . $curso->id . '/edit') }}" class="btn btn-info">
                                    Editar </a>|
                                <form class="form-eliminar" action="{{ url('/calificaciones/' . $curso->id) }}"
                                    method="post" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
