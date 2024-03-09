@extends('adminlte::page')
@section('content')

    @csrf
    <div class="table-responsive" style="min-height: 250px">
           
        <table id="calificaciones-table" class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($cursos as $curso)
                    <tr>
                        <td>{{ $curso->asignatura->descripcion }}</td>
                        <td>{{ $curso->grupo->grado->descripcion }}</td>
                        <td>
                            <div class="d-flex flex-row bd-highlight mb-6">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Generar Acta
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @include('calificaciones.dropdown-cortes')
                                        </div>
                                    </div>
                                    {{-- | <div class="d-inline">
                                        <a type="button" href="{{ url('calificaciones-final', ['asignatura_id' => $curso->asignatura->id, 'grupo_id' => $curso->grupo->id]) }}" target="blank">
                                            <input type="submit" value="Imprimir Acta General" class="btn btn-warning" />
                                        </a>
                                    </div> --}}
                                    

                                </div>

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
        $('#calificaciones-table').DataTable({
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
@endsection
