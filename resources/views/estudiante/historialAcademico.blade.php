@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-10 text-center">
                <h1 class="font-weight-bold font-italic">Colegio Cristiano Manto de Gracia</h1>
                <img src="{{ asset('images/logo2.png') }}" alt="Imagen de Matrícula" width="80px" class="imagen-arriba">
            </div>
        </div>
    
        <div class="text-center mt-4">
            <h1 class="display-4">Historial Académico</h1>
            <p class="lead">Nombre del Estudiante: {{ $dataEstudiante->nombres }} {{ $dataEstudiante->apellidos }}</p>
            <p class="lead">Código de Estudiante: {{ $dataEstudiante->codigo_estudiante }}</p>
            <p class="lead">Sexo: {{ $dataEstudiante->sexo->descripcion ?? 'N/A' }}</p>
        </div>
    

        <hr class="my-4">

        @forelse ($data as $gradoId => $asignaturas)
            <div class="card mb-2">
                <div class="card-header text-center">
                    <h2> {{ $gradoId }} Grado</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Asignatura</th>
                                <th>Nota Final</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($asignaturas as $asignatura)
                                <tr>
                                    <td>{{ $asignatura['asignatura'] }}</td>
                                    <td>{{ $asignatura['nf'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No hay calificaciones registradas para este grado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">
                No hay calificaciones registradas para este estudiante.
            </div>
        @endforelse
    </div>
@endsection

@section('footer')
    <footer class="bg-dark text-light text-center py-3">
        <p>&copy; {{ date('Y') }} Colegio Cristiano Manto de Gracia</p>
    </footer>
@endsection
