@extends('adminlte::page')
@section('content')
<div class="container">
    @if (Session::has('mensaje'))
        <div class="alert alert-success" role="alert" class="text-center">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hiden="true">&times;</span>
            </button>
        </div>

    @endif
    <br>
    <a href="{{ url('asignaturas/create') }}" class="btn btn-success"> Nuevo Asignatura </a>
    <br>
    <br>
    <table class="table table-dark">
        <thead class="thead-light">
            <tr>
                <th>Asignaturas</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($asignaturas as $asignatura)

                <tr>
                    <td>{{ $asignatura->descripcion }}</td>
                    <td><a href="{{ url('/asignaturas/' . $asignatura->id . '/edit') }}" class="btn btn-info">
                            Editar </a>|
                        <form action="{{ url('/asignaturas/' . $asignatura->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('Estas seguro de eliminar este registro?')"
                                class="btn btn-danger" value="eliminar">
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

