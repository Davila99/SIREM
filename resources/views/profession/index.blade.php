@extends('adminlte::page')
@section('content')

        <br>
        <a href="{{ url('profession/create') }}" class="btn btn-success"> Nueva Profesion </a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Profesiones</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($professions as $profession)
                    <tr>
                        <td>{{ $profession->descripcion }}</td>
                        <td>
                            <div class="d-flex flex-row bd-highlight mb-6">
                                <a href="{{ url('/profession/' . $profession->id . '/edit') }}" class="btn btn-info">
                                    Editar </a>|
                                <form class="form-eliminar" action="{{ url('/profession/' . $profession->id) }}" method="post" class="d-inline">
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
            title: 'Profesión registrado!',
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
            title: 'Profesión editado exitosamente!',
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