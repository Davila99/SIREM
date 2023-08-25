 @extends('adminlte::page')

 @section('content')
     <div class="container">
         <br>
         <a href="{{ url('cargos/create') }}" class="btn btn-success"> Nuevo Cargo </a>
         <br>
         <br>
         <div class="table-responsive">
             <table class="table table-dark">
                 <thead class="thead-light">
                     <tr>
                         <th>Cargos</th>
                         <th>Acciones</th>
                     </tr>
                 </thead>

                 <tbody>

                     @foreach ($cargos as $cargo)
                         <tr>
                             <td>{{ $cargo->descripcion }}</td>

                             <td>
                                 <div class="d-flex flex-row bd-highlight mb-6">
                                    @can('cargos.edit')
                                    <a href="{{ url('/cargos/' . $cargo->id . '/edit') }}" class="btn btn-info">
                                        Editar </a>|
                                    @endcan
                                
                                     <form class="form-eliminar" action="{{ url('/cargos/' . $cargo->id) }}" method="post"
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

     </div>
 @stop
 @section('js')
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     @if (Session::has('mensaje'))
         <script>
             Swal.fire({
                 position: 'top-center',
                 icon: 'success',
                 title: 'Cargo registrado!',
                 showConfirmButton: false,
                 timer: 2000
             })
         </script>
          @endif

          @if (Session::has('mensaje-error-eliminar'))
              <script>
                  Swal.fire({
                      icon: 'error',
                      title: 'Lo sentimos',
                      text: 'Este dato esta siendo utilizado',
                  })
              </script>
          @endif
     @if (Session::has('mensaje-editar'))
         <script>
             Swal.fire({
                 position: 'top-center',
                 icon: 'success',
                 title: 'Cargo editado exitosamente!',
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
