@extends('layouts.custom-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="get" action="{{ route('grupos.index') }}" class="form-inline">
                    <label class="mr-2" for="year">Filtrar por año:</label>
                    <select class="form-control mr-2" name="year" id="year">
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
            </div>
            <div class="col-md-6 mt-3">
                <a href="{{ url('grupos/create') }}" class="btn btn-success">Nuevo Grupo</a>
            </div>
        </div>
        
        <div class="table-responsive">
            <table id="grupo-table" class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th>Grado</th>
                        <th>Año Lectivo</th>
                        <th>Docente</th>
                        <th>Seccion</th>
                        <th>Turno</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($grupos as $grupo)
                        <tr>
                            <td>{{ $grupo->grado->descripcion ?? 'N/A'}}</td>
                            <td>{{ $grupo->anio_lectivo ?? 'N/A'}}</td>
                            <td>{{ $grupo->empleado->nombres ?? 'N/A' }}</td>
                            <td>{{ $grupo->seccion->descripcion ?? 'N/A' }}</td>
                            <td>{{ $grupo->turno->descripcion ?? 'N/A'}}</td>
                            <td>
                                <div class="d-flex flex-row bd-highlight mb-6">
                                    <div class="in-diline">
                                        <a href="{{ url('/grupos/' . $grupo->id . '/edit') }}" class="btn btn-info">
                                            @include('components.buttons.edit-button') </a>
                                    </div>
                                    |
                                    <form class="form-eliminar" action="{{ url('/grupos/' . $grupo->id) }}" method="post"
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
            $('#grupo-table').DataTable({
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
                title: 'Grupo registrado!',
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
                title: 'Grupo editado exitosamente!',
                showConfirmButton: false,
                timer: 2000
            })
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
