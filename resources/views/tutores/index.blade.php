@extends('layouts.custom-layout')
@section('content')

<body>
    <div class="container">

        <br>
        <a href="{{ url('tutores/create') }}" class="btn btn-success"> Nuevo Tutor </a>
        <br>
        <br>
        <div class="table-responsive">
            <table id="tutores-table" class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>cedula</th>
                        <th>Telefono</th>
                        <th>Profesion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($tutores as $tutore)
                        <tr>
                            <td>{{ $tutore->nombre ?? 'N/A'}}</td>
                            <td>{{ $tutore->apellido ?? 'N/A'}}</td>
                            <td>{{ $tutore->cedula ?? 'N/A' }}</td>
                            <td>{{ $tutore->telefono ?? 'N/A'}}</td>
                            <td>{{ $tutore->professions->descripcion ?? 'N/A' }}</td>
                            <td>
                                <div class="d-flex flex-row bd-highlight mb-6">
                                <div class="class=d-inline">
                                    <a href="{{ url('/tutores/' . $tutore->id . '/edit') }}" class="btn btn-info">
                                        @include('components.buttons.edit-button') </a>|
                                        </div>
                                        <div class="class=d-inline">
                                        <a href="#" class="btn btn-warning view-profile" data-toggle="modal" data-target="#infoTutorModal"
                                        data-nombre="{{ $tutore->nombre }}"
                                        data-apellido="{{ $tutore->apellido }}"
                                        data-cedula="{{ $tutore->cedula }}"
                                        data-telefono="{{ $tutore->telefono }}"
                                        data-profession="{{ $tutore->professions }}"
                                    >
                                        @include('components.buttons.details-button')
                                    </a>
                                    </div>
                                    |
                                    <form class="form-eliminar" action="{{ url('/tutores/' . $tutore->id) }}"
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
        <!-- Modal -->
 
        
   
    </div>
    <div class="modal fade" id="infoTutorModal"   tabindex="-1" aria-labelledby="infoTutorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        

            <div class="modal-content">
            

                <div class="modal-header">
                    <h5 class="modal-title"  id="infoTutorModalLabel">Información del tutor</h5>
                    

                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-md-4 text-end"><strong>Primer Nombre:</strong></div>
                            <div class="col-md-8" id="modal-nombre"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 text-end"><strong>Apellidos:</strong></div>
                            <div class="col-md-8" id="modal-apellido"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 text-end"><strong>Cédula:</strong></div>
                            <div class="col-md-8" id="modal-cedula"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 text-end"><strong>Teléfono:</strong></div>
                            <div class="col-md-8" id="modal-telefono"></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 text-end"><strong>Profesion:</strong></div>
                            <div class="col-md-8" id="modal-profesion"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</body>


        

@stop

@section('js')
<script>
        <script>
            function cerrarModal() {
                var myModal = new bootstrap.Modal(document.getElementById('infoTutorModal'));
                myModal.hide();
            }
        </script>
</script>
<script>
    $(document).ready(function() {
        $('#tutores-table').DataTable({
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
<script>
    $(document).ready(function() {
        $('.view-profile').click(function() {
            var nombre = $(this).data('nombre');
            var apellido = $(this).data('apellido');
            var cedula = $(this).data('cedula');
            var telefono = $(this).data('telefono');
            var professionDescription = $(this).data('profession').descripcion;


            $('#modal-nombre').text(nombre);
            $('#modal-apellido').text(apellido);
            $('#modal-cedula').text(cedula);
            $('#modal-telefono').text(telefono);
            $('#modal-profesion').text(professionDescription);
        });
    });
</script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('mensaje'))
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Tutor registrado!',
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
                title: 'Tutor editado exitosamente!',
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
