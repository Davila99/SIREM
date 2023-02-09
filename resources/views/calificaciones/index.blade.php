@extends('adminlte::page')

@section('content')
    <div class="container">

        <br>
        <a href="{{ url('calificaciones/create') }}" class="btn btn-success"> Nueva Calificaciones
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

