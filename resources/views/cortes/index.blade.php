@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
@extends('layouts.app')

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
    <a href="{{ url('cevaluativos/create') }}" class="btn btn-success"> Nuevo Cargo </a>
    <br>
    <br>
    <table class="table table-dark">
        <thead class="thead-light">
            <tr>
                <th>Cortes Evaluativos</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($cevaluativos as $cevaluativo)

                <tr>
                    <td>{{ $cevaluativo->descripcion }}</td>
                    <td><a href="{{ url('/cevaluativos/' . $cevaluativo->id . '/edit') }}" class="btn btn-info">
                            Editar </a>|
                        <form action="{{ url('/cevaluativos/' . $cevaluativo->id) }}" method="post" class="d-inline">
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
    {!! $cevaluativos->links() !!}
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
