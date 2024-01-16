@extends('layouts.custom-layout')
@section('content')

<body>
    <div class="container">

        <br>
        <a href="{{ url('tutores/create') }}" class="btn btn-success"> Nuevo Tutor </a>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-dark">
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
                                    <a href="{{ url('/tutores/' . $tutore->id . '/edit') }}" class="btn btn-info">
                                        @include('components.buttons.edit-button') </a>|
                                        <a href="#" class="btn btn-warning view-profile" data-toggle="modal" data-target="#infoTutorModal"
                                        data-nombre="{{ $tutore->nombre }}"
                                        data-apellido="{{ $tutore->apellido }}"
                                        data-cedula="{{ $tutore->cedula }}"
                                        data-telefono="{{ $tutore->telefono }}"
                                    >
                                        @include('components.buttons.details-button')
                                    </a>
                                    |
                                    <form class="form-eliminar" action="{{ url('/tutores/' . $tutore->id) }}" method="post"
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
        <!-- Modal -->
 
        
   
    </div>
    <div class="modal fade" id="infoTutorModal" tabindex="-1" aria-labelledby="infoTutorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoTutorModalLabel">Información del tutor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalButton"></button>
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="cerrarModal()">Cerrar Modal</button>
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
        $('.view-profile').click(function() {
            var nombre = $(this).data('nombre');
            var apellido = $(this).data('apellido');
            var cedula = $(this).data('cedula');
            var telefono = $(this).data('telefono');

            $('#modal-nombre').text(nombre);
            $('#modal-apellido').text(apellido);
            $('#modal-cedula').text(cedula);
            $('#modal-telefono').text(telefono);
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
