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
            <div class="form-check form-switch">
                <label   >
                    {!! Form::checkbox('roles[]',$role->id, null ,['class'=>'mr-2'])!!}
                    {{ $role->name }}
                </label>
            </div>
        @endforeach
        <div class="d-flex justify-content-around">
            {!! Form::submit('Asignar Rol', ['class'=>'  btn btn-danger']) !!}
    
            <div class="d-grid col-sm-10">
                <a type="button" class="btn btn-success" href="{{ url('users/') }}"> Regresar </a>
            </div>
            {!! Form::close() !!}
        </div>

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
            title: 'Se asigno correctamente los Roles',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif
@endsection