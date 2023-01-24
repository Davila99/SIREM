@extends('adminlte::page')
@section('content')
<div class="container">

    <br>
    <a href="{{ url('tmatricula/create') }}" class="btn btn-success"> Nuevo Tipo de Matricula </a>
    <br>
    <br>
    <table class="table table-dark">
        <thead class="thead-light">
            <tr>
                <th>Tipo Matricula</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($tipo__matriculas as $tipoMatricula)

                <tr>
                    <td>{{ $tipoMatricula->descripcion }}</td>
                    <td><a href="{{ url('/tmatricula/' . $tipoMatricula->id . '/edit') }}" class="btn btn-info">
                            Editar </a>|
                        <form id="form-eliminar" action="{{ url('/tmatricula/' . $tipoMatricula->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (Session::has('mensaje'))
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Tipo de Matricula registrado!',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif
@if (Session::has('mensaje-editar'))
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Tipo de Matricula editado exitosamente!',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif
@if (Session::has('mesaje-eliminar'))
    <script>
        Swal.fire(
            'Eliminado!',
            'Su archivo ha sido eliminado.',
            'success'
        )
    </script>
@endif
<script>
    $('#form-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estas seguro?',
            text: "No podrás revertir esto.!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si eliminar',
            cancelButtonText:'Calcelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })

    });
</script>
@endsection