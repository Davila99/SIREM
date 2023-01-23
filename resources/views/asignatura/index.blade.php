@extends('adminlte::page')
@section('content')

    <div class="container">

        <br>
        <a href="{{ url('asignaturas/create') }}" class="btn btn-success"> Nuevo Asignatura </a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Asignaturas</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($asignaturas as $asignatura)
                    <tr>
                        <td>{{ $asignatura->descripcion }}</td>
                        <td><a href="{{ url('/asignaturas/' . $asignatura->id . '/edit') }}" class="btn btn-info">
                                Editar </a>|
                            <form id="form-eliminar" action="{{ url('/asignaturas/' . $asignatura->id) }}" method="post"
                                class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
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
                title: 'Asignatura registrada!',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif
    @if (Session::has('mesajeerror'))
        <script>
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        </script>
    @endif
    <script>
        $('#form-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
            })

        });
    </script>
@endsection
