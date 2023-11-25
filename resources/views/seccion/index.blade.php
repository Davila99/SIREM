@extends('adminlte::page')
@section('content')

    <br>
    <a href="{{ url('seccion/create') }}" class="btn btn-success"> Nueva Seccion </a>
    <br>
    <br>
    <table class="table table-dark">
        <thead class="thead-light">
            <tr>
                <th>Secciones</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($secciones as $seccion)
                <tr>
                    <td>{{ $seccion->descripcion ?? 'N/A' }}</td>
                    <td>
                        <div class="d-flex flex-row bd-highlight mb-6">
                            <a href="{{ url('/seccion/' . $seccion->id . '/edit') }}" class="btn btn-info">
                                @include('components.buttons.edit-button') </a>|
                            <form class="form-eliminar" action="{{ url('/seccion/' . $seccion->id) }}" method="post"
                                class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger"> @include('components.buttons.delete-button')</button>
                            </form>
                        </div>

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
                title: 'Seccion registrado!',
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
                title: 'Seccion editado exitosamente!',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif
    @if (Session::has('mensaje-eliminar'))
        <script>
            Swal.fire(
                'Eliminado!',
                'Su archivo ha sido eliminado.',
                'success'
            )
        </script>
    @endif

    @if (Session::has('mensaje-error-eliminar'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lo sentimos',
                text: 'Este dato esta siendo utilizado',
            })
        </script>
    @endif
    <script>
        $('.form-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "No podrás revertir esto.!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si eliminar',
                cancelButtonText: 'Calcelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        });
    </script>

@endsection
