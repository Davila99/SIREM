@extends('layouts.custom-layout')
@section('content')
<div class="container">
<div class="d-flex justify-content-between align-items-center">
    
    <a href="{{ url('organizacionacademica/create') }}" class="btn btn-success">Nuevo Organización Académica</a>
    <form method="get" action="{{ route('organizacionacademica.index') }}" class="form-inline">
        <div class="form-group mr-2">
            <label for="year" class="mr-2">Filtrar por año:</label>
            <select class="form-control" name="year" id="year">
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>
</div>
<br>

    <div class="table-responsive">
        <table id="organizacionAcademica-table" class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Organizacion Academica</th>
                    <th>Fecha</th>
                    <th>Autorización</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($organizacionacademicas as $organizacionacademica)
                    <tr>
                        <td>{{ $organizacionacademica->descripcion ?? 'N/A'}}</td>
                        <td>{{ $organizacionacademica->fecha ?? 'N/A' }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <input data-id="{{ $organizacionacademica->id }}" class="toggle-class" type="checkbox"
                                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                                    data-off="InActive" {{ $organizacionacademica->confirmed ? 'checked' : '' }}>
                                <span class="mx-2">|</span> <!-- Add some margin between checkbox and status bar -->
                                <div class="status-bar">
                                    @if ($organizacionacademica->confirmed == true)
                                        <i class="far fa-thumbs-up text-success fa-2x"></i>
                                    @else
                                        <i class="far fa-thumbs-down text-danger fa-2x"></i>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                        
                            <div class="d-flex flex-row bd-highlight mb-6">
                            <div class="class=d-inline">
                                <a href="{{ url('/organizacionacademica/' . $organizacionacademica->id . '/edit') }}"
                                    class="btn btn-info">
                                    @include('components.buttons.edit-button')</a>|</div>
                                    <div 
                                    class="class=d-inline">
                                <a href="{{ url('/organizacionacademica/' . $organizacionacademica->id) }}"
                                    class="btn btn-warning">
                                    @include('components.buttons.details-button')</a>|</div>
                                <form class="form-eliminar"
                                    action="{{ url('/organizacionacademica/' . $organizacionacademica->id) }}"
                                    method="post" class="d-inline">
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
</div>
@stop
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#organizacionAcademica-table').DataTable({
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
    @if (Session::has('mensaje'))
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Organizacion Academica registrada!',
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
                title: 'Organización Academica editado exitosamente!',
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
    @if (Session::has('mensaje-alerta'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Organización Academica autorizada!, no se permite realizar cambios.',
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
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                Swal.fire({
                    title: '¿Estas seguro?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Autorizar',
                    cancelButtonText: 'Calcelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var confirmed = $(this).prop('checked') == true ? 1 : 0;
                        var organizacionacademica = $(this).data('id');
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: '/changeStatus',
                            data: {
                                'confirmed': confirmed,
                                'organizacionacademica': organizacionacademica
                            },
                            success: function(data) {
                                location.reload();
                                console.log(data.success)
                            }
                        });
                    } else {
                        location.reload();
                    }
                })

            })
        })
    </script>

@endsection
