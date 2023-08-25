 @extends('adminlte::page')
 @section('content')
     <div class="container">

         <br>
         <a href="{{ url('cevaluativos/create') }}" class="btn btn-success"> Nuevo Corte </a>
         <br>
         <br>
         <div class="table-responsive">
             <table class="table table-dark">
                 <thead class="thead-light">
                     <tr>
                         <th>Cortes Evaluativos</th>
                         <th>Acciones</th>
                     </tr>
                 </thead>
                 <tbody>

                     @foreach ($cortes_evaluativos as $cortes_evaluativo)
                         <tr>
                             <td>{{ $cortes_evaluativo->descripcion }}</td>
                             <td>
                                 <div class="d-flex flex-row bd-highlight mb-6">
                                     <a href="{{ url('/cevaluativos/' . $cortes_evaluativo->id . '/edit') }}"
                                         class="btn btn-info">
                                         Editar </a>|
                                     <form class="form-eliminar"
                                         action="{{ url('/cevaluativos/' . $cortes_evaluativo->id) }}" method="post"
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
                 title: 'Corte registrado!',
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
                 title: 'Corte editado exitosamente!',
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
     @if (Session::has('mensaje-error-eliminar'))
         <script>
             Swal.fire({
                 icon: 'error',
                 title: 'Lo sentimos',
                 text: 'Este dato esta siendo utilizado',
             })
         </script>
     @endifs
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
