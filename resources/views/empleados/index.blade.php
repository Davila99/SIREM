@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

{{--  @extends('layouts.app')  --}}

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
                <form action="{{ route('empleados.index') }}" method="get">
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
        <a href="{{ url('empleados/create') }}" class="btn btn-success"> Nuevo Empleado </a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Cedula</th>
                    <th>Fecha Nacimiento</th>
                    <th>Nivel Academico</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Fecha ingreso</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($empleados as $empleado)
                        <td>{{ $empleado->nombres }}</td>
                        <td>{{ $empleado->apellidos }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->fecha_nacimiento }}</td>
                        <td>{{ $empleado->cedula }}</td>
                        <td>{{ $empleado->nivel_academico->descripcion }}</td>
                        <td>{{ $empleado->direccion }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->fecha_ingreso }}</td>
                        <td>{{ $empleado->cargos->descripcion }}</td>
                        <td><a href="{{ url('/empleados/' .$empleado->id.'/edit') }}" class="btn btn-info">
                                Editar </a>|
                            <form action="{{ url('/empleados/' . $empleado->id) }}" method="post" class="d-inline">
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
        {!! $empleados->links() !!}
    </div>

@endsection
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop

