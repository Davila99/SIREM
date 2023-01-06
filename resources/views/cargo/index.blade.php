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
        <a href="{{ url('cargos/create') }}" class="btn btn-success"> Nuevo Cargo </a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Cargos</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($cargos as $cargo)

                    <tr>
                        <td>{{ $cargo->descripcion }}</td>
                        <td><a href="{{ url('/cargos/' . $cargo->id . '/edit') }}" class="btn btn-info">
                                Editar </a>|
                            <form action="{{ url('/cargos/' . $cargo->id) }}" method="post" class="d-inline">
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

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop