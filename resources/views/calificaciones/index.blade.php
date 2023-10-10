@extends('adminlte::page')
@section('content')

    @csrf
    <div class="table-responsive" style="min-height: 250px">
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td>{{ $curso->asignatura->descripcion }}</td>
                        <td>{{ $curso->grupo->grado->descripcion }}</td>
                        <td>
                            <div class="d-flex flex-row bd-highlight mb-6">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Generar Acta
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @include('calificaciones.dropdown-cortes')
                                        </div>
                                    </div>

                                    <form action="{{ route('imprimir-acta') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="submit" value="Imprimir Acta" class="btn btn-warning" />
                                    </form>
                                </div>

                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@stop
