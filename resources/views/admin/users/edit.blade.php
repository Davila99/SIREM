@extends('adminlte::page')
@section('title','Sirem')


@section('content')
<div class="card">
    <div class="card-body">
        <p class="h5">Nombre:</p>
        <p class="form-control">{{ $user->name }}:</p>
        <h2 class="h5"> Lista de Roles</h2>
        {!! Form::model($user, ['route' =>['users.update',$user],'method'=>'put']) !!}
        @foreach ($roles as $role )
            <div>
                <label >
                    {!! Form::checkbox('roles[]',$role->id, null ,['class'=>'mr-1'])!!}
                    {{ $role->name }}
                </label>
            </div>
        @endforeach
         {!! Form::submit('Asignar Rol', ['class'=>'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
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
            title: 'Se asigno correctamente los permisos',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif
@endsection