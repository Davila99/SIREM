@extends('adminlte::page')
@section('content')

    <br>
    <a href="{{ url('profession/create') }}" class="btn btn-success"> Nueva Profesion </a>
    <br>
    <br>
    <table id="profesiones-table" class="table table-dark">
        <thead class="thead-light">
            <tr>
                <th>Profesiones</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($professions as $profession)
                <tr>
                    <td>{{ $profession->descripcion }}</td>
                    <td>
                        <div class="d-flex flex-row bd-highlight mb-6">
                            <a href="{{ url('/profession/' . $profession->id . '/edit') }}" class="btn btn-info">
                                Editar </a>|
                            <form class="form-eliminar" action="{{ url('/profession/' . $profession->id) }}" method="post"
                                class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Eliminar</button>
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
<script>
    $(document).ready(function() {
        $('#profesiones-table').DataTable({
            "responsive": true,
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "All"]
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontraron resultados en su busqueda",
                "searchPlaceholder": "Buscar registros",
                "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                "infoEmpty": "No existen registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "paginate": {
                    first: '<i class="fas fa-angle-double-left"></i>', // Icono para ir a la primera página
                    previous: '<i class="fas fa-angle-left"></i>', // Icono para ir a la página anterior
                    next: '<i class="fas fa-angle-right"></i>', // Icono para ir a la página siguiente
                    last: '<i class="fas fa-angle-double-right"></i>'
                },
            }

        });

    });
</script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('mensaje'))
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Profesión registrado!',
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
                title: 'Profesión editado exitosamente!',
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
