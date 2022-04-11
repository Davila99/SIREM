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
        <a href="{{ url('tutores/create') }}" class="btn btn-success"> Nuevo Tutor </a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>cedula</th>
                    <th>Telefono</th>
                    <th>Profesion</th>
                    <th>Acciones</th>


                </tr>
            </thead>

            <tbody>

                @foreach ($tutores as $tutore)

                    <tr>
                        <td>{{ $tutore->nombre }}</td>
                        <td>{{ $tutore->apellido }}</td>
                        <td>{{ $tutore->cedula }}</td>
                        <td>{{ $tutore->telefono }}</td>
                        <td>{{ $tutore->professions}}</td>
                        <td><a href="{{ url('/tutores/' . $tutore->id . '/edit') }}" class="btn btn-info">
                                Editar </a>|
                            <form action="{{ url('/tutores/' . $tutore->id) }}" method="post" class="d-inline">
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
        {!! $tutores->links() !!}
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
