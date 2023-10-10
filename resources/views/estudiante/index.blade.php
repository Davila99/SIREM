@extends('layouts.custom-layout')

@section('content')
    <div class="container">
        <br>
        <div class="form-group ">
            <a href="{{ url('estudiantes/create') }}" class="btn btn-success"> Nuevo Estudiante </a>
        </div>

        <div class="table-responsive">
            <table id="estudiantes-table" class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Fecha Nacimiento</th>
                        <th>Edad</th>
                        <th>Direccion</th>
                        <th>Tutor</th>
                        <th>Sexo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($estudiantes as $estudiante)
                        <tr>
                            <td>{{ $estudiante->nombres }}</td>
                            <td>{{ $estudiante->apellidos }}</td>
                            <td>{{ $estudiante->fecha_nacimiento }}</td>
                            <td>{{ $estudiante->edad }}</td>
                            <td>{{ $estudiante->direccion }}</td>
                            <td>{{ $estudiante->tutor->nombre }} {{ $estudiante->tutor->apellido }}</td>
                            <td>{{ $estudiante->sexo->descripcion }}</td>
                            <td>
                                <div class="d-flex flex-row bd-highlight mb-6">
                                    <div class="class=d-inline">
                                        <a href="{{ url('/estudiantes/' . $estudiante->id . '/edit') }}" class="btn btn-info">
                                            @include('components.buttons.edit-button') </a>
                                    </div>
                                    |
                                    <form class="form-eliminar" action="{{ url('/estudiantes/' . $estudiante->id) }}"
                                        method="post" class="d-inline">
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


    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#estudiantes-table').DataTable({
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
                title: 'Estudiante registrado!',
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
                title: 'Estudiante editado exitosamente!',
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
