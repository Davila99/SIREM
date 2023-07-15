@extends('layouts.custom-layout')
@section('content')
    <div class="container">
        <br>
        <a href="{{ url('empleados/create') }}" class="btn btn-success"> Nuevo Empleado </a>
        <br>
        <br>
        <div class="table-responsive">
            <table id="empleados-table" class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Nivel Academico</th>
                        <th>Fecha ingreso</th>
                        <th>Cargo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($empleados as $empleado)
                        <td>{{ $empleado->nombres }}</td>
                        <td>{{ $empleado->apellidos }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->nivel_academico->descripcion }}</td>
                        <td>{{ $empleado->fecha_ingreso }}</td>
                        <td>{{ $empleado->cargos->descripcion }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <div class="d-inline">
                                    <a href="{{ url('/empleados/' . $empleado->id . '/edit') }}" class="btn btn-info me-1">
                                        Editar
                                    </a>
                                </div>
                                |
                                <div class="d-inline">
                                    <a href="{{ url('/empleados/' . $empleado->id) }}" class="btn btn-warning me-1">
                                        Perfil
                                    </a>
                                </div>

                                <form class="form-eliminar" action="{{ url('/empleados/' . $empleado->id) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">
                                        Eliminar
                                    </button>
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
            $('#empleados-table').DataTable({
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
                title: 'Empleado registrado!',
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
                title: 'Empleado editado exitosamente!',
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
