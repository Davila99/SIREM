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
        @if (Session::has('mesajeerror'))
            <div class="alert alert-danger" role="alert" class="text-center">
                {{ Session::get('mesajeerror') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hiden="true">&times;</span>
                </button>
            </div>

        @endif
        <br>
        <a href="{{ url('matriculas/create') }}" class="btn btn-success"> Nueva Matricula </a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Fecha</th>
                    <th>Estudiante</th>
                    <th>Usuario</th>
                    <th>Tipo de Matricula</th>
                    <th>Grupo</th>
                    <th>Acciones</th>

                </tr>
            </thead>

            <tbody>

                @foreach ($matriculas as $matricula)

                    <tr>
                        <td>{{ $matricula->fecha }}</td>
                        <td>{{ $matricula->estudiante->nombres }}</td>
                        <td>{{ $matricula->user->name }}</td>
                        <td>{{ $matricula->tipo_matricula->descripcion}}</td>
                        <td>{{ $matricula->grupo->grado_id }}</td>  
                        <td><a href="{{ url('/matriculas/' . $matricula->id . '/edit') }}" class="btn btn-info">
                                Editar </a>|
                            <form action="{{ url('/matriculas/' . $matricula->id) }}" method="post" class="d-inline">
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



