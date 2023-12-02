@extends('layouts.custom-layout')
@section('content')

<head>
    <title>Mostrar Acta</title>
</head>

<body>
    <div class="table-responsive">
        <table class="table table-dark">

            <thead>
                <tr>
                    <th scope="col" colspan="4" class="text-center">
                        <h1 class="font-weight-bold font-italic">Cabecera de Acta</h1>
                        <form action="{{ route('imprimir-acta', ['actaId' => $acta->id]) }}" method="post"
                            enctype="multipart/form-data" target="blank">
                            @csrf
                            <input type="hidden" name="actaId" value="{{ $acta->id }}">
                            <input type="submit" value="Imprimir Acta" class="btn btn-warning" />
                        </form>

                    </th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th scope="col" colspan="4" class="text-center">
                        <h1 class="font-weight-bold font-italic">Acta Academica</h1>
                    </th>
                </tr>
            <tbody>
                <tr>
                    <th>Fecha de generacion</th>
                    <td>{{ $acta->fecha }}</td>
                    <th scope="row">Docente</th>
                    <td>{{ $acta->empleado->nombres }} {{ $acta->empleado->apellidos }}</td>
                </tr>
                <tr>
                    <th scope="row">Asignatura</th>
                    <td>{{ $acta->asignatura->descripcion }}</td>
                    <th scope="row">Observaciones</th>
                    <td>{{ $acta->observaciones }}</td>

                </tr>

            </tbody>
        </table>

    </div>
    <div class="table-responsive">
        <table id="tablaCalificaciones" class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Estudiante</th>
                    <th>Calificacion</th>
                    <th>Acciones</th>

                </tr>
            </thead>

            <tbody>

                @foreach ($filas as $fila)
                <tr>
                    <td>{{ $fila->estudiante->nombres }} {{ $fila->estudiante->apellidos }}</td>
                    <td>{{ $fila->calificacion }}</td>

                    <td>

                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#miModal"
                            data-id="{{ $fila->id }}">
                            Editar Nota
                        </button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="miModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="miModalLabel">Notas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <tbody>
                            <tr>
                                <th scope="row">Nota</th>
                                <form action="{{ route('change-nota') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <td>
                                        <input id="calificacion" name="calificacion" type="number" class="form-control"
                                            placeholder="Nota">

                                        @error('calificacion')
                                        <div class="invalid-feedback">
                                            <h5>{{ $message }}</h5>
                                        </div>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="hidden" name="id" id="input-id" value="">
                                        <input type="submit" value="Guardar" class="btn btn-success">

                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection

@section('js')
<script src="{{ asset('js/app.js') }}"></script>
@if (Session::has('mensaje-nota'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Nota actualizada correctamente',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif
<script>
    $(document).ready(function () {
        $('#tablaCalificaciones').DataTable({
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

<script>
    $(document).ready(function () {
        $('#miModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            console.log('ID: ' + id);


            $('#input-id').val(id);


        });
    });
</script>
@endsection