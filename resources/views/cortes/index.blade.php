 @extends('adminlte::page')
 @section('title', 'Cortes')

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
         <a href="{{ url('cevaluativos/create') }}" class="btn btn-success"> Nuevo Corte </a>
         <br>
         <br>
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
                         <td><a href="{{ url('/cevaluativos/' . $cortes_evaluativo->id . '/edit') }}"
                                 class="btn btn-info">
                                 Editar </a>|
                             <form action="{{ url('/cevaluativos/' . $cortes_evaluativo->id) }}" method="post"
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
         {!! $cortes_evaluativos->links() !!}
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
