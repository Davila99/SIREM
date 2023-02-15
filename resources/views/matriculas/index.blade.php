@extends('adminlte::page')
@section('content')
    <div class="container">
        <br>
        <a href="{{ url('matriculas/create') }}" class="btn btn-success"> Nueva Matricula </a>
        <br>
        <br>
        <div class="table-responsive">
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Fecha</th>
                    <th>Estudiante</th>
                    <th>Usuario</th>
                    <th>Tipo de Matricula</th>
                    <th>Grupo</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($matriculas as $matricula)

                    <tr>
                        <td>{{ $matricula->fecha }}</td>
                        <td>{{ $matricula->estudiante->nombres }}</td>
                        <td>{{ $matricula->user->name }}</td>
                        <td>{{ $matricula->tipo_matricula->descripcion}}</td>
                        <td>{{ $matricula->grupo->descripcion }}</td>  
                        <td><a href="{{ url('/matriculas/' . $matricula->id . '/edit') }}" class="btn btn-info">
                                Editar </a>|
                            <form class="form-eliminar" action="{{ url('/matriculas/' . $matricula->id) }}" method="post" class="d-inline">
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
    </div>
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (Session::has('mensaje'))
    <script>
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Matricula registrado!',
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
            title: 'Matricula editado exitosamente!',
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
            cancelButtonText:'Calcelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })

    });
</script>
@endsection

