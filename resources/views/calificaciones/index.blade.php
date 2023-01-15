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
                <form action="{{ route('calificacionese.index') }}" method="get">
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

            <br>-----
        <a href="{{ url('calificacionese/create') }}" class="btn btn-success"> Nueva Calificaciones
         </a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
            </thead>

            <tbody>

                @foreach ($calificaciones as $calificacione)
                    <tr>
                        <td>{{ $calificaciones->Docente->nombres }}</td>
                        <td>{{ $calificaciones->asignatura->descripcion }}</td>
                        <td>{{ $calificaciones->grado->descripcion }}</td>
                        <td>{{ $calificaciones->estudiante->nombres }}</td>
                        <td>{{ $calificaciones->corteevaluativo->descripcion }}</td>


                        <td><a href="{{ url('/calificaciones/' . $calificacion->id . '/edit') }}" class="btn btn-info">
                                Editar </a>|
                            <form action="{{ url('/calificaciones/' . $calificacion->id) }}" method="post" class="d-inline">
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
