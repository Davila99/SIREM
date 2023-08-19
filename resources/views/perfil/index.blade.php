@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{ $perfil->name }}</h5>
                        <p class="text-muted mb-1">{{ $perfil->email }}</p>
                        <p class="text-muted mb-4">Cuenta de Usuario</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-danger">Cambiar contraseña</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nombre completo</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->nombres }} {{ $perfil->empleado->apellidos }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Correo Electronico</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Numero de Telefono</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->telefono }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nivel Academico</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->cedula }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Direccion</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->direccion }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nivel Academico</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->nivel_academico->descripcion }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Cargo</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $perfil->empleado->cargos->descripcion }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
