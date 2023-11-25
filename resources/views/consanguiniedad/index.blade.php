@extends('adminlte::page')
@section('content')
    <div class="container">

        <br>
        <a href="{{ url('consanguiniedades/create') }}" class="btn btn-success"> Nuevo Consanguiniedad </a>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th> Consanguiniedades</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($consanguiniedades as $consanguiniedade)
                        <tr>
                            <td>{{ $consanguiniedade->descripcion ?? 'N/A'}}</td>
                            <td>
                                <div class="d-flex flex-row bd-highlight mb-6">
                                    <a href="{{ url('/consanguiniedades/' . $consanguiniedade->id . '/edit') }}"
                                        class="btn btn-info">
                                        @include('components.buttons.edit-button') </a>|
                                    <form class="form-eliminar"
                                        action="{{ url('/consanguiniedades/' . $consanguiniedade->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger"> @include('components.buttons.delete-button')</button>
                                    </form>
                                </div>

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
                title: 'Consanguiniedad registrado!',
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
                title: 'Consanguiniedad editado exitosamente!',
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
