@extends('adminlte::page')

@section('content')
    <div class="container">
        <br>
        <a href="{{ url('tutorestudiante/create') }}" class="btn btn-success"> Registrar Nuevo Parentesco </a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Estudiante</th>
                    <th>Tutor</th>
                    <th>Telefono Tutor</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($estudiantestutores as $estudiantestutor)
                    <tr>
                        <td>{{ $estudiantestutor->estudiante->nombres }}  {{ $estudiantestutor->estudiante->apellidos }}</td>
                        <td>{{ $estudiantestutor->tutores->nombre }}  {{ $estudiantestutor->tutores->apellido }} </td>
                        <td>{{ $estudiantestutor->tutores->telefono }} </td>
                        <td>
                            <div class="d-flex flex-row bd-highlight mb-6">
                                <a href="{{ url('/estudianteTutores/' . $estudiantestutor->id . '/edit') }}" class="btn btn-info">
                                    Editar </a>|
                                    <a href="{{ url('/estudianteTutores/' . $estudiantestutor->id) }}" class="btn btn-warning">
                                        Detalles </a>|
                                <form class="form-eliminar" action="{{ url('/estudianteTutores/' . $estudiantestutor->id) }}"
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

@endsection
@section('js')
<script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('mensaje'))
        <script>
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Registrado Exitosamente!',
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
                title: 'Registro editado exitosamente!',
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
