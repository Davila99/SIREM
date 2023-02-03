@extends('adminlte::page')
@section('content')
    <div class="container">

        <br>
        <a href="{{ url('asignaturadocente/create') }}" class="btn btn-success"> Nueva Asignatura </a>
        <br>
        <br>
        <table class="table  table-dark">
            <thead class="thead-light">
                    <tr>
                        <th>Asignatura</th>
                        <th>Docente</th>
                        <th>Grado</th>
                        <th>Acciones</th>
                    </tr>
            </thead>

            <tbody>

                @foreach ($asignaturadocentes as $asignaturadocente)
                    <tr>
                        <td>{{ $asignaturadocente->asignatura->descripcion }}</td>
                        <td>{{ $asignaturadocente->empleado->nombres }}</td>
                        <td>{{ $asignaturadocente->grado->descripcion }}</td>
                        <td>
                            <div class="d-flex flex-row bd-highlight mb-6">
                                <a href="{{ url('/asignaturadocente/' . $asignaturadocente->id . '/edit') }}"
                                    class="btn btn-info">
                                    Editar </a>|
                                <form id="form-eliminar" action="{{ url('/asignaturadocente/' . $asignaturadocente->id) }}" method="post"
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
@endsection


@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (Session::has('mensaje'))
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Asignatura Docente registrado!',
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
            title: 'Asignatura Docente editado exitosamente!',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif
@if (Session::has('mesaje-eliminar'))
    <script>
        Swal.fire(
            'Eliminado!',
            'Su archivo ha sido eliminado.',
            'success'
        )
    </script>
@endif
<script>
    $('#form-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estas seguro?',
            text: "No podrás revertir esto.!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si eliminar',
            cancelButtonText:'Calcelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })

    });
</script>
@endsection