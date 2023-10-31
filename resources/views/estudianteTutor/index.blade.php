@extends('layouts.custom-layout')

@section('content')
    <div class="container">
        <br>
        <a href="{{ url('tutorestudiante/create') }}" class="btn btn-success"> Registrar Nuevo Parentesco </a>
        <br>
        <br>
        <div  class="table-responsive">
            <table id="estudiantes-tutores-table" class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th>Estudiante</th>
                        <th>Tutor</th>
                        <th>Telefono Tutor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
    
                <tbody>
    
                    @foreach ($estudiantestutores as $estudiantestutor)
                        <tr>
                            <td>{{ $estudiantestutor->estudiante->nombres }}  {{ $estudiantestutor->estudiante->apellidos }}</td>
                            <td>{{ $estudiantestutor->tutor->nombre }}  {{ $estudiantestutor->tutor->apellido }} </td>
                            <td>{{ $estudiantestutor->tutor->telefono }} </td>
                            <td>
                                <div class="d-flex flex-row bd-highlight mb-6">
                                    <div class="class=d-inline">
                                        <a href="{{ url('/estudianteTutores/' . $estudiantestutor->id . '/edit') }}"
                                            class="btn btn-info">
                                            @include('components.buttons.edit-button') </a>
                                    </div>
                                    |
                                    <form class="form-eliminar" action="{{ url('/estudianteTutores/' . $estudiantestutor->id) }}"
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
        $('#estudiantes-tutores-table').DataTable({
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
<script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('mensaje'))
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Registrado Exitosamente!',
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
                title: 'Registro editado exitosamente!',
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
