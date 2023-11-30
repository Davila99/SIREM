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
                        <th>Antiguedad</th>
                        <th>Cargo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($empleados as $empleado)
                        <td>{{ $empleado->nombres ?? 'N/A'}}</td>
                        <td>{{ $empleado->apellidos ?? 'N/A' }}</td>
                        <td>{{ $empleado->telefono  ?? 'N/A'}}</td>
                        <td>{{ $empleado->nivel_academico->descripcion ?? 'N/A' }}</td>
                        <td>{{ $empleado->fecha_ingreso ?? 'N/A' }}</td>
                        @php
                            $fecha_ingreso = $empleado->fecha_ingreso ?? null;
                            $antiguedad = $fecha_ingreso ? \Carbon\Carbon::parse($fecha_ingreso)->age : 'N/A';
                        @endphp
                        <td>{{ $antiguedad ?? 'N/A' }} años</td>
                        <td>{{ $empleado->cargos->descripcion ?? 'N/A' }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <div class="d-inline">
                                    <a href="{{ url('/empleados/' . $empleado->id . '/edit') }}" class="btn btn-info me-1">
                                        @include('components.buttons.edit-button')
                                    </a>
                                </div>
                                |
                                <div class="d-inline">
                                    <a  class="btn btn-warning me-1" data-toggle="modal"
                                    data-target="#empleadoModal">
                                        @include('components.buttons.details-button')
                                    </a>
                                </div>
                                <form class="form-eliminar" action="{{ url('/empleados/' . $empleado->id) }}"
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
        <div class="modal fade" id="empleadoModal" tabindex="-1" aria-labelledby="empleadoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="empleadoModalLabel">
                      <i class="bi bi-person-lines-fill"></i> Información de Empleado
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>

                  </div>
                  <div class="modal-body">
                    <h6>Informacion de empleado</h6>
                    <table class="table table-responsive mt-3">
                      <tbody>
                          <tr>
                              <th scope="row">Nombres:</th>
                              <td>{{$empleado->nombres}}</td>
                              <th>Apellidos:</th>
                              <td>{{$empleado->apellidos}}</td>
                          </tr>
                          <tr>
                              <th scope="row">Telefono:</th>
                              <td>{{$empleado->telefono}}</td>
                              <th scope="row">Cedula:</th>
                              <td>{{$empleado->cedula}}</td>
                          </tr>
                          <tr>
                          </tr>
                          <tr>
                              <th scope="row">Fecha de Nacimiento:</th>
                              <td>{{$empleado->fecha_nacimiento}}</td>
                              <th>Nivel Academico:</th>
                              <td>{{$empleado->nivel_academico->descripcion}}</td>
                          </tr>
                          <tr>
                              <th scope="row">Direccion:</th>
                              <td>{{$empleado->direccion}}</td>
                              <th>Email:</th>
                              <td>{{$empleado->email}}</td>
                          </tr>
                          <tr>
                              <th scope="row">Fecha de ingreso</th>
                              <td>{{$empleado->fecha_ingreso}}</td>
                              <th>Cargo:</th>
                              <td>{{$empleado->cargos->descripcion}}</td>
                          </tr>
                          <tr>
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
                        first: '<i class="fas fa-angle-double-left"></i>', /
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
