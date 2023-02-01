@extends('adminlte::page')
@section('content')
    <div class="container">

        <br>
        <a href="{{ url('asignaturadocente/create') }}" class="btn btn-success"> Nueva Asignatura </a>
        <br>
        <br>
        <table class="table  table-dark">
            <thead class="thead-light">
                    <tr>
                        <th>Asignatura</th>
                        <th>Docente</th>
                        <th>Grado</th>
                        <th>Acciones</th>
                    </tr>
            </thead>

            <tbody>

                @foreach ($asignaturadocentes as $asignaturadocente)
                    <tr>
                        <td>{{ $asignaturadocente->asignatura->descripcion }}</td>
                        <td>{{ $asignaturadocente->empleado->nombres }}</td>
                        <td>{{ $asignaturadocente->grado->descripcion }}</td>
                        <td>
                            <div class="d-flex flex-row bd-highlight mb-6">
                                <a href="{{ url('/asignaturadocente/' . $asignaturadocente->id . '/edit') }}"
                                    class="btn btn-info">
                                    Editar </a>|
                                <form class="form-eliminar" action="{{ url('/asignaturadocente/' . $asignaturadocente->id) }}" method="post"
                                    class="d-inline">
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
@endsection


