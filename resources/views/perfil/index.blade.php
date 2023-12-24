@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{ $perfil->name }}</h5>
                        <p class="text-muted mb-1">{{ $perfil->email }}</p>
                        <p class="text-muted mb-4">Cuenta de Usuario</p>
                        <div class="d-flex justify-content-center mb-2">
                            <form class="form-eliminar" method="POST">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#cambiarContraseñaModal">
                                    Cambiar contraseña
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nombre completo</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->nombres ?? 'N/A' }}
                                    {{ $perfil->empleado->apellidos ?? 'N/A' }}</p>
                                    </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Correo Electronico</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->email ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Numero de Telefono</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->telefono ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nivel Academico</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->cedula ?? 'N/A'}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Direccion</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->direccion ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nivel Academico</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->nivel_academico->descripcion ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Cargo</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->cargos->descripcion ?? 'N/A' }}</p>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
             <!-- Modal para cambiar contraseña -->

<div class="modal fade" id="cambiarContraseñaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-cambiar-contrasena" action="{{ route('change-password') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
                    <div class="form-group">
                        <label for="current_password">Contraseña Actual:</label>
                        <input type="password" id="current_password" name="current_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Nueva Contraseña:</label>
                        <input type="password" id="new_password" name="new_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirmar Nueva Contraseña:</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                </form>
            </div>
            <div class="modal-footer">
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    <script>
                        // Muestra un alert cuando la contraseña se cambia con éxito
                        alert('Contraseña cambiada con éxito.');
                    </script>
                @endif
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

    @section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('mensaje-error-ruta'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lo sentimos',
                text: ' Por problemas técnicos, no se puede mostrar la página en este momento.',
            });
        </script>
    @endif
    @if (Session::has('error-current_password'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lo sentimos',
                text: 'La contraseña actual no coincide con la contraseña que proporcionó. Inténtalo de nuevo.',
            });
        </script>
    @endif 
    @if (Session::has('error-validatio-password'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Lo sentimos',
                text: 'La nueva contraseña y la confirmación de la contraseña no coinciden. Inténtalo de nuevo.',
            });
        </script>
@endif      
    <script>
        $('.form-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro de cambiar la contraseña?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Cambiar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#cambiarContraseñaModal').modal('show');
                }
            });
        });


    </script>
@endsection