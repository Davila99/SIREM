@extends('adminlte::page')
@section('content')
    <div class="container">
        <br>
        <a href="{{ url('empleados/create') }}" class="btn btn-success"> Nuevo Empleado </a>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Nivel Academico</th>
                        <th>Fecha ingreso</th>
                        <th>Cargo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
    
                <tbody>
    
                    @foreach ($empleados as $empleado)
                            <td>{{ $empleado->nombres }}</td>
                            <td>{{ $empleado->apellidos }}</td>
                            <td>{{ $empleado->telefono }}</td>
                            <td>{{ $empleado->nivel_academico->descripcion }}</td>
                            <td>{{ $empleado->fecha_ingreso }}</td>
                            <td>{{ $empleado->cargos->descripcion }}</td>
                            <td><a href="{{ url('/empleados/' .$empleado->id.'/edit') }}" class="btn btn-info">
                                    Editar </a>|
                                    <a href="{{ url('/empleados/' . $empleado->id) }}" class="btn btn-warning">
                                        Perfil </a>|
                                <form class="form-eliminar" action="{{ url('/empleados/' . $empleado->id) }}" method="post" class="d-inline">
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
@endsection

@section('js')
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

