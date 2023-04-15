@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row justify-content-start">
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-8 col-md-9">
                                <div class="p-3 mb-3 border rounded bg-white">
                                    <h4>Informacion del tutor </h4>
                                    <table class="table table-responsive mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Primer Nombre:</th>
                                                <td>{{ $tutores->nombre}}</td>
                                                <th>Apellidos:</th>
                                                <td>{{$tutores->apellido}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Cargo:</th>
                                                <td>{{$tutores->cedula}}</td>
                                                <th scope="row">Telefono:</th>
                                                <td>{{$tutores->telefono}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <a  type="button" class="btn btn-primary" href="{{ url('tutores/') }}"> Regresar </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
