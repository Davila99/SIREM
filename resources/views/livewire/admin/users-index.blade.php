<div>
    <br>
    <a href="{{ url('users/create') }}" class="btn btn-success"> Nuevo Usuario </a>
    <br>
    <br>
    <div class="card">
        <div class="card-header">
            <input wire:model='search' class="form-control" placeholder="Ingrese su nombre o su correo electronico">
        </div>
        @if ($users->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="d-flex flex-row bd-highlight mb-6">
                                        <a href="{{ url('/users/' . $user->id . '/editUser') }}"
                                        title="Editar" class="btn btn-info" >
                                            @include('components.buttons.edit-button')</a>
                                           |
                                           
                                           <a href="{{ url('/users/' . $user->id . '/edit') }}"class="btn btn-secondary" title="Asignar Rol"
                                           >
                                            
                                            @include('components.buttons.Asignar-button')</a>
                                           |
                                            <form class="form-eliminar" action="{{ url('/users/' . $user->id) }}"
                                                method="post" class="btn btn-info" title="Eliminar">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">@include('components.buttons.delete-button')</button>
                                            </form>|
                                            <form class="form-eliminar" method="POST">
                                                <button type="button" class="btn btn-success" title="Cambiar contraseña" data-toggle="modal"
                                                    data-target="#cambiarContraseñaModal">
                                                    @include('components.buttons.pass-button')
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @livewireScripts
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registro</strong>
            </div>
        @endif
        <div class="modal fade" id="cambiarContraseñaModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="password" id="current_password" name="current_password"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">Nueva Contraseña:</label>
                            <input type="password" id="new_password" name="new_password" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirmar Nueva Contraseña:</label>
                            <input type="password" id="confirm_password" name="confirm_password"
                                class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (Session::has('mensaje-error-ruta'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Lo sentimos',
                    text: ' Por problemas técnicos, no se puede mostrar la página en este momento.',
                })
            </script>
        @endif
        @if (Session::has('mensaje'))
            <script>
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Usuario registrado!',
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
                    title: 'Usuario editado exitosamente!',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
        @endif
        @if (Session::has('mensaje-eliminar'))
            <script>
                Swal.fire(
                    'Eliminado!',
                    'Usuario ha sido eliminado.',
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
