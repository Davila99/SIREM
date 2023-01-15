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
            <div class="col-xl-12">
                <form action="{{ route('matriculas.index') }}" method="get">
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
          
                </tr>
            </thead>

            <tbody>

                @foreach ($matriculas as $matricula)

                    <tr>
                        <td>{{ $matricula->nombres }}</td>
                        <td>{{ $matricula->apellidos}}</td>
                        <td>{{ $matricula->fecha_nacimiento }}</td>
                        <td>{{ $matricula->direccion }}</td>
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

@endsection
@stop



