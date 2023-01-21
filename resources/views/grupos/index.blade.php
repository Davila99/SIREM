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
            <div class="col-xl-12">
                <form action="{{ route('grupos.index') }}" method="get">
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
        <a href="{{ url('grupos/create') }}" class="btn btn-success"> Nuevo Grupo </a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
            </thead>

            <tbody>

                @foreach ($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->grado->descripcion }}</td>
                        <td>{{ $grupo->fecha }}</td>
                        <td>{{ $grupo->empleados->nombres }}</td>

                        <td><a href="{{ url('/grupos/' . $grupo->id . '/edit') }}" class="btn btn-info">
                                Editar </a>|
                            <form action="{{ url('/grupos/' . $grupo->id) }}" method="post" class="d-inline">
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
        {!! $grupos->links() !!}
    </div>


@stop


