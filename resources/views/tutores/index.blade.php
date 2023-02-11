@extends('adminlte::page')
@section('content')
    <div class="container">

        <br>
        <a href="{{ url('tutores/create') }}" class="btn btn-success"> Nuevo Tutor </a>
        <br>
        <br>
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
                        <td>{{ $tutore->nombre }}</td>
                        <td>{{ $tutore->apellido }}</td>
                        <td>{{ $tutore->cedula }}</td>
                        <td>{{ $tutore->telefono }}</td>
                        <td>{{ $tutore->professions->descripcion }}</td>
                        <td>
                            <div class="d-flex flex-row bd-highlight mb-6">
                                <a href="{{ url('/tutores/' . $tutore->id . '/edit') }}" class="btn btn-info">
                                    Editar </a>|
                                    <a href="{{ url('/tutores/' . $tutore->id) }}" class="btn btn-warning">
                                        Perfil </a>|
                                <form class="form-eliminar" action="{{ url('/tutores/' . $tutore->id) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@stop

@section('js')
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
