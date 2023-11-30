<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Académico</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container-fluid {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .logo {
            width: 80px;
        }

        .card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f8f9fa;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .card-body {
            padding: 15px;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-info {
            color: #0c5460;
            background-color: #d1ecf1;
            border-color: #bee5eb;
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
        }

        .text-center {
            text-align: center;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .mb-6 {
            margin-bottom: 3.5rem;
        }

        .d-inline {
            display: inline;
        }

        @media (max-width: 576px) {
            .d-sm-none {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-10 text-center">
                <h1 class="font-weight-bold font-italic">Colegio Cristiano Manto de Gracia</h1>
                <img src="{{ public_path('images/logo2.png') }}" alt="Imagen de Matrícula" class="logo">
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
            <div class="card">
                <div class="card-header text-center">
                    <h2>{{ $gradoId }} Grado</h2>
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

    <footer class="footer text-center">
        <p>&copy; {{ date('Y') }} Colegio Cristiano Manto de Gracia</p>
    </footer>
</body>
</html>
