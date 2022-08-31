@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

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
            <div class="col-xl-12">
                <form action="{{ route('tutores.index') }}" method="get">
                    <div class="form-row">
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="texto" value="">
                        </div>
                        <div class="col-auto">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                    </div>
                </form>
            </div>

            <br>
        <a href="{{ url('estudiantes/create') }}" class="btn btn-success"> Nuevo Estudiante </a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha Nacimiento</th>
                    <th>Direccion</th>
                    <th>Tutor</th>
                    <th>Sexo</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($estudiantes as $estudiante)

                    <tr>
                        <td>{{ $estudiante->nombres }}</td>
                        <td>{{ $estudiante->apellidos}}</td>
                        <td>{{ $estudiante->fecha_nacimiento }}</td>
                        <td>{{ $estudiante->direccion }}</td>
                        <td>{{ $estudiante->tutor->nombre}}</td>
                        <td>{{ $estudiante->sexo->descripcion}}</td>
                        <td><a href="{{ url('/estudiantes/' . $estudiante->id . '/edit') }}" class="btn btn-info">
                                Editar </a>|
                            <form action="{{ url('/estudiantes/' . $estudiante->id) }}" method="post" class="d-inline">
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
        {!! $estudiantes->links() !!}
    </div>

@endsection
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


