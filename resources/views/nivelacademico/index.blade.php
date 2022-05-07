 @extends('adminlte::page')
<<<<<<< HEAD
 @section('title', 'Dashboard')
=======
@section('title', 'Nivel-Academico')
>>>>>>> 17de8d147e35659e9fc16aef629ae31080114d94

 @section('content_header')
 @stop

 @section('content')
     <div class="container">

         @if (Session::has('mensaje'))
             <div class="alert alert-success" role="alert" class="text-center">
                 {{ Session::get('mensaje') }}
                 <button type="button" class="close" data-dismiss="alert" aria-label="close">
                     <span aria-hiden="true">&times;</span>
                 </button>
             </div>
         @endif
         <br>
         <a href="{{ url('nivelacademic/create') }}" class="btn btn-success"> Nuevo Nivel academico </a>
         <br>
         <br>
         <table class="table table-dark">
             <thead class="thead-light">
                 <tr>
                     <th>Niveles Academicos</th>
                     <th>Acciones</th>
                 </tr>
             </thead>

             <tbody>

                 @foreach ($niveles_academicos as $niveles_academico)
                     <tr>
                         <td>{{ $niveles_academico->descripcion }}</td>
                         <td><a href="{{ url('/nivelacademic/' . $niveles_academico->id . '/edit') }}"
                                 class="btn btn-info">
                                 Editar </a>|
                             <form action="{{ url('/nivelacademic/' . $niveles_academico->id) }}" method="post"
                                 class="d-inline">
                                 @csrf
                                 {{ method_field('DELETE') }}
                                 <input type="submit" onclick="return confirm('Estas seguro de eliminar este registro?')"
                                     class="btn btn-danger" value="eliminar">
                             </form>
                         </td>

                     </tr>
                 @endforeach
             </tbody>
         </table>
         {!! $niveles_academicos->links() !!}
     </div>

 @stop

 @section('css')
     <link rel="stylesheet" href="/css/admin_custom.css">
 @stop

 @section('js')
     <script>
         console.log('Hi!');
     </script>
 @stop
