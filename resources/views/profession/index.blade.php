
@section('title', 'Dashboard')

@section('content_header')
@stop


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
    <a href="{{ url('profession/create') }}" class="btn btn-success"> Nueva Profesion </a>
    <br>
    <br>
    <table class="table table-dark">
        <thead class="thead-light">
            <tr>Profesiones</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($professions as $profession)

                <tr>
                    <td>{{ $profession->descripcion }}</td>
                    <td><a href="{{ url('/profession/' . $profession->id . '/edit') }}" class="btn btn-info">
                            Editar </a>|
                        <form action="{{ url('/profession/' . $profession->id) }}" method="post" class="d-inline">
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
    {!! $professions->links() !!}
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
