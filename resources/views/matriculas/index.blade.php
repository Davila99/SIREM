@extends('layouts.custom-layout')
@section('content')
    <div class="container">
        <br>
        <a href="{{ url('matriculas/create') }}" class="btn btn-success"> Nueva Matricula </a>
        <br>
        <br>
        <div class="table-responsive">
            <table id="matriculas-table" class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th>Fecha</th>
                        <th>Estudiante</th>
                        <th>Usuario</th>
                        <th>Tipo de Matricula</th>
                        <th>Grupo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($matriculas as $matricula)
                        <tr>
                            <td>{{ $matricula->fecha ?? 'N/A' }}</td>
                            <td>{{ $matricula->estudiante->nombres ?? 'N/A' }}</td>
                            <td>{{ $matricula->user->name ?? 'N/A' }}</td>
                            <td>{{ $matricula->tipo_matricula->descripcion ?? 'N/A' }}</td>
                            <td>{{ $matricula->grupo->grado->descripcion ?? 'N/A' }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="d-inline">
                                        <a href="{{ url('/matriculas/' . $matricula->id . '/edit') }}"
                                            class="btn btn-info me-1">
                                          @include('components.buttons.edit-button')
                                        </a>
                                    </div>
                                    |
                                    <div class="d-inline">
                                        <a href="{{ url('/matriculas/' . $matricula->id) }}" class="btn btn-warning me-1">
                                           @include('components.buttons.details-button')
                                        </a>
                                    </div>
                                    |
                                    <div class="d-inline">
                                        <a type="button" class="btn btn-success " href="{{ url('/matriculas/pdf/' . $matricula->id) }}" target="blank">
                                            @include('components.buttons.pdf-button')
                                        </a>
                                    </div>
                                    |      
                                    <form class="form-eliminar" action="{{ url('/matriculas/' . $matricula->id) }}"
                                        method="post" class="d-inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">
                                            @include('components.buttons.delete-button')
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
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#matriculas-table').DataTable({
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
                title: 'Matricula registrado!',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif
    @if (Session::has('mensaje-error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Estudiante ya matriculado',
        })
    </script>
  @endif
    @if (Session::has('mensaje-editar'))
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Matricula editado exitosamente!',
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
    @if (Session::has('mensaje-error-pdf'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lo sentimos',
                text: 'La Matricula se encuentra incompleta',
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
