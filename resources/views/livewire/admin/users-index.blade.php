<div>
    <br>
    <a href="{{ url('users/create') }}" class="btn btn-success"> Nuevo Usuario </a>
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
                                            <a href="{{ url('/roles/' . $user->id . '/edit') }}" class="btn btn-info">
                                                Asignar Roles </a>|
                                            <a href="{{ url('/users/' . $user->id . '/edit') }}"
                                                class="btn btn-warning">
                                                Editar Perfil</a>|
                                            <form class="form-eliminar" action="{{ url('/users/' . $user->id) }}"
                                                method="post" class="d-inline">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
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
    </div>
    @section('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
