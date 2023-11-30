@extends('layouts.custom-layout')
@section('content')
    <div class="container">

        <br>
        <a href="{{ url('asignaturadocente/create') }}" class="btn btn-success"> Nueva Asignatura Docente </a>
        <br>
        <br>
        <div class="table-responsive">
            <table id="asignaturaDocentes-table" class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th>Asignatura</th>
                        <th>Docente</th>
                        <th>Grado</th>
                        <th>Organización Docente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($asignaturadocentes as $asignaturadocente)
                        <tr>
                            <td>{{ $asignaturadocente->asignatura->descripcion ?? 'N/A' }}</td>
                            <td>{{ $asignaturadocente->empleado->nombres ?? 'N/A' }}</td>
                            <td>{{ $asignaturadocente->grado->descripcion ?? 'N/A' }}</td>
                            <td>{{ $asignaturadocente->organizacionAcademica->descripcion ?? 'N/A'}}</td>
                            <td>
                                <div class="d-flex flex-row bd-highlight mb-6">
                                    <div class="d-inline">
                                        <a href="{{ url('/asignaturadocente/' . $asignaturadocente->id . '/edit') }}"
                                            class="btn btn-info">
                                            @include('components.buttons.edit-button') </a>
                                    </div>
                                    |
                                    <div class="d-inline">
                                        <a href="{{ url('/asignaturadocente/' . $asignaturadocente->id) }}"
                                            class="btn btn-warning">
                                            @include('components.buttons.details-button') </a>
                                    </div>
                                    |
                                    <form class="form-eliminar"
                                        action="{{ url('/asignaturadocente/' . $asignaturadocente->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">@include('components.buttons.delete-button')</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('#asignaturaDocentes-table').DataTable({
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
                        first: '<i class="fas fa-angle-double-left"></i>',
                        previous: '<i class="fas fa-angle-left"></i>', 
                        next: '<i class="fas fa-angle-right"></i>', 
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
                title: 'Asignatura Docente registrado!',
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
                title: 'Asignatura Docente editado exitosamente!',
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
