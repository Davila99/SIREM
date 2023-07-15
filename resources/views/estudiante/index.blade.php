@extends('adminlte::page')

@section('content')
    <div class="container">

        <br>
        <div class="form-group ">
            <a href="{{ url('estudiantes/create') }}" class="btn btn-success"> Nuevo Estudiante </a>
        </div>

        <div class="table-responsive">
            <table class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Fecha Nacimiento</th>
                        <th>Edad</th>
                        <th>Direccion</th>
                        <th>Tutor</th>
                        <th>Sexo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($estudiantes as $estudiante)
                        <tr>
                            <td>{{ $estudiante->nombres }}</td>
                            <td>{{ $estudiante->apellidos }}</td>
                            <td>{{ $estudiante->fecha_nacimiento }}</td>
                            <td>{{ $estudiante->edad }}</td>
                            <td>{{ $estudiante->direccion }}</td>
                            <td>{{ $estudiante->tutor->nombre }} {{ $estudiante->tutor->apellido }}</td>
                            <td>{{ $estudiante->sexo->descripcion }}</td>
                            <td>
                                <div class="d-flex flex-row bd-highlight mb-6">
                                    <a href="{{ url('/estudiantes/' . $estudiante->id . '/edit') }}" class="btn btn-info">
                                        Editar </a>|
                                    <form class="form-eliminar" action="{{ url('/estudiantes/' . $estudiante->id) }}"
                                        method="post" class="d-inline">
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


    </div>
@endsection
@section('js')
    <script src="{{ asset('js/app.js') }}" defer></script>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('mensaje'))
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Estudiante registrado!',
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
                title: 'Estudiante editado exitosamente!',
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
